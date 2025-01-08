<?php


//check_time

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

if (!function_exists('greeting')) {
    function greeting()
    {
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            return "Good morning";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            return "Good afternoon";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            return "Good evening";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            return "Good evening";
        }
    }
}

if (!function_exists('getCompanyId')) {
    function getCompanyId(){
        return Auth::user()->company_user?->company_id;
    }
    # code...
}

if (!function_exists('getCompanyName')) {
    function getCompanyName(){
        return Auth::user()->company_user?->company?->name;
    }
    # code...
}

if (!function_exists('getCustomerCode')) {
    function getCustomerCode(){
        do
        {
            $token =char_string(4);
            $code = 'LS' . $token . substr(date("Y"), 2);
            $user_code = Customer::where('customer_code',$code)->first();
        }
        while(!empty($user_code));
        return $code;
    }
    # code...
}
if (!function_exists('char_string')) {
    function char_string($length){
        $token = "";
        $codeAlphabet = "LOANSPHERECOMPANY";
        $codeAlphabet.= "0123456789875532423458609543";
    
        for($i=0;$i< $length;$i++){
            $token .= $codeAlphabet[mt_rand(0,strlen($codeAlphabet)-1)];
        }
        return $token;
    }
    # code...
}









