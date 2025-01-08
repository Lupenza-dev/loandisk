<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public $fillable=['first_name','middle_name','last_name','phone_number','email','id_type','id_number','dob','gender_id','maritial_status_id',
    'region_id','district_id','location','customer_code','uuid','is_active'];
}