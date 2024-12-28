<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function signUp(Request $request){
        $valid = $request->validate([
            'company_name' => [
                'required',
                Rule::unique('companies', 'name'),
            ],
            'company_email' => [
                'required',
                Rule::unique('companies', 'email'),
            ],
            'company_address' =>'required',
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],
            'fullname' => 'required',
            'phone_number' => 'required',
            'password'     =>['required','confirmed','string','min:6','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'],
        ]);


        try {
            DB::transaction(function() use ($valid){

                $company =Company::create([
                    'name' =>$valid['company_name'],
                    'email' =>$valid['company_email'],
                    'address' =>$valid['company_address'],
                    'uuid' =>(string)Str::orderedUuid(),
                ]);
    
                $fullname =$this->extractNameParts($valid['fullname']);
    
                $user =User::create([
                    'first_name' =>$fullname['firstName'] ?? null,
                    'middle_name' =>$fullname['middleName'] ?? null,
                    'last_name' =>$fullname['lastName'] ?? null,
                    'name' =>$valid['fullname'],
                    'phone_number' =>$valid['phone_number'],
                    'email' =>$valid['email'],
                    'password' =>Hash::make($valid['password']),
                    'uuid' =>(string)Str::orderedUuid(),
                ]);
    
                $user->assignRole('Company Admin');
    
                $company_user =CompanyUser::create([
                    'user_id' =>$user->id,
                    'company_id' =>$company->id,
                    'uuid' =>(string)Str::orderedUuid(),
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
            'message' =>'Registration Done Successfully , You will confirmaation email'
        ],200);
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
