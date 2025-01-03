<?php


//check_time

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








