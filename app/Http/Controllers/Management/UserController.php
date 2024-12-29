<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\CompanyBranch;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Str;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles =Role::whereIn('id',[3,4,5])->get();
        $branches =CompanyBranch::where('company_id',getCompanyId())->get();
        $users    =CompanyUser::where('company_id',getCompanyId())->whereNot('user_id',Auth::user()->id)->get();
        return view('management.company_users',compact('roles','branches','users'));
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
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],
            'name' => 'required',
            'phone_number' => 'required',
            'role_id'     =>'required',
            'branch_id'   =>'required',
        ]);

        try {
            DB::transaction(function() use ($valid){

                $fullname =$this->extractNameParts($valid['name']);
    
                $user =User::create([
                    'first_name' =>$fullname['firstName'] ?? null,
                    'middle_name' =>$fullname['middleName'] ?? null,
                    'last_name' =>$fullname['lastName'] ?? null,
                    'name' =>$valid['name'],
                    'phone_number' =>$valid['phone_number'],
                    'email' =>$valid['email'],
                    'password' =>Hash::make(123456),
                    'uuid' =>(string)Str::orderedUuid(),
                    'created_by' =>Auth::user()->id
                ]);
                
                foreach ($valid['role_id'] as $value) {
                    $user->assignRole($value);
                }

                CompanyUser::create([
                    'user_id' =>$user->id,
                    'company_id' =>getCompanyId(),
                    'uuid' =>(string)Str::orderedUuid(),
                    'branch_id' =>$valid['branch_id']
                ]);
    
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

    function extractNameParts($fullName) {
        // Trim and normalize the name string
        $fullName = trim(preg_replace('/\s+/', ' ', $fullName));
        $nameParts = explode(' ', $fullName);
    
        $firstName = $nameParts[0]; // The first part is always the first name
        $middleName = '';
        $lastName = '';
    
        if (count($nameParts) > 2) {
            // If there are more than 2 parts, treat the last part as the last name
            $lastName = array_pop($nameParts);
            // Everything in between is the middle name
            $middleName = implode(' ', array_slice($nameParts, 1));
        } elseif (count($nameParts) === 2) {
            // If there are exactly 2 parts, the second part is the last name
            $lastName = $nameParts[1];
        }
    
        return [
            'firstName' => $firstName,
            'middleName' => $middleName,
            'lastName' => $lastName,
        ];
    }
}
