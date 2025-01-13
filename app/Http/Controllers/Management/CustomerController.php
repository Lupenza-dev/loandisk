<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerFormRequest;
use App\Models\Customer;
use App\Models\CustomerCompany;
use App\Models\District;
use App\Models\Gender;
use App\Models\IdType;
use App\Models\MaritialStatus;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_companies =CustomerCompany::with('customer')->where('company_id',getCompanyId())->get();
        return view('customers.customer_list',compact('customer_companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions =Region::get();
        $genders =Gender::get();
        $id_types =IdType::get();
        $maritial_status =MaritialStatus::get();
        return view('customers.add_customer',compact('regions','genders','id_types','maritial_status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CustomerFormRequest $valid)
    {
        try {
            DB::transaction(function() use ($valid,$request){
                $customer =Customer::updateOrCreate([
                    'first_name' =>$valid['first_name'],
                    'last_name'  =>$valid['last_name'],
                    'middle_name'  =>$valid['middle_name'],
                    'dob'        =>$valid['dob'],
                    'gender_id'        =>$valid['gender_id'],
                ],[
                    'id_number'          =>$valid['id_number'],
                    'id_type_id'         =>$valid['id_type_id'],
                    'maritial_status_id' =>$valid['maritial_status_id'],
                    'phone_number'        =>$valid['phone_number'],
                    'region_id'           =>$valid['region_id'],
                    'district_id'         =>$valid['district_id'],
                    'location'            =>$valid['location'],
                    'email'               =>$request['email'],
                ]);

               $customer_company = CustomerCompany::updateOrCreate([
                    'customer_id' =>$customer->id,
                    'company_id'  =>getCompanyId()
                ],[
                    'created_by' =>Auth::user()->id,
                    'uuid'       =>(string)Str::orderedUuid(),
                    'deleted_at' =>Null,
                ]);

                if ($request->hasfile('image')) {
                    $file = $request->file('image');
                    $filename =$customer_company->id;
                    $path     =Storage::disk('local')->putFileAs('',$file,$filename);
                    
                    $customer_company->image =$path;
                    $customer_company->save();
                }

            });
        } catch (\Throwable $th) {
             return response()->json([
                'success' =>true,
                'errors'  =>$th->getMessage()
            ],500);
        }

        return response()->json([
            'success' =>true,
            'message' =>'Registration Done Successfully'
        ],200);
    }

    public function getDistrict($region_id){
        $districts =District::where('region_id',$region_id)->get(['id','name']);
        return response()->json($districts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
