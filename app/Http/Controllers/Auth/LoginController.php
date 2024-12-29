<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    public function authenticateUser(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'email is required',
                'password.required' => 'Password is required',
            ]
        );

        $username =$request->input('email');
        $password =$request->input('password');
        $remember =$request->input('remember');


        if (Auth::attempt(['email' => $username, 'password' => $password],$remember)) {
            $user = User::find(auth()->user()->id);
            if ($user->is_active) { 
               if ($user->hasRole('Admin') || $user->hasRole('Company Admin') ) {
                if ($user->hasRole('Admin') || $user->hasRole('Company Admin') ) {
                    return response()->json([
                        'success' =>true,
                        'message' =>$user->name.' Welcome Again',
                        'url'     =>URL::to('dashboard')
                    ]);
                }
                elseif($user->hasRole('Customer')){
                    $last_url =Session::get('url.intended');
                    $url =$last_url ?? URL::to('customer/dashboard');
                   // Session::forget('last_url');
                    Session::forget('url.intended');
                    return response()->json([
                        'success' =>true,
                        'message' =>$user->name.' Welcome Again',
                        'url'     =>$url,
                    ]);
                } 
                else {
                    return response()->json([
                        'success' =>true,
                        'message' =>$user->name.' Welcome Again',
                        'url'     =>URL::to('/')
                    ]);
                }
               
               } else {
                Auth::logout();
                return response()->json([
                    'success' =>false,
                    'errors' =>'You dont have Permission to access this site',
                ],500);
               }
               

            } else {
                Auth::logout();
                return response()->json([
                    'success' =>false,
                    'errors' =>'Your Account has been Deactivated , Contact System Adminstrator to Activate Your Account',
                ],500);
            }
        } else {
            return response()->json([
                'success' =>false,
                'errors' =>'Invalid email/Username or Password',
            ],500);
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
}
