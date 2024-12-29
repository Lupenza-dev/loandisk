<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\CompanyBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches =CompanyBranch::where('company_id',getCompanyId())->get();
        return view('management.company_branches',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
        ]);

        $check =CompanyBranch::where([
            'name' =>$valid['name'],
            'company_id' =>getCompanyId()
        ])->first();

        if ($check) {
            return response()->json([
                'success' =>false,
                'errors'  =>'The Branch Already Exist'
            ],500);
        }

        CompanyBranch::updateOrCreate([
            'name' =>$valid['name'],
            'company_id' =>getCompanyId()
        ],[
            'email'          =>$valid['email'],
            'address'        =>$valid['location'],
            'phone_number'   =>$valid['phone_number'],
            'uuid'           =>(string)Str::orderedUuid(),
            'created_by'     =>Auth::user()->id,
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Registration Done Successfully '
        ],200);
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
