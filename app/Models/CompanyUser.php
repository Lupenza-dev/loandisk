<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{
    use SoftDeletes;

    public $fillable=['user_id','company_id','uuid','branch_id'];

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function branch(){
        return $this->hasOne(CompanyBranch::class,'id','branch_id');
    }
}


