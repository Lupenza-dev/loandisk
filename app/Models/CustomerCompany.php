<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerCompany extends Model
{
    use SoftDeletes;

    public $fillable=['customer_id','company_id','created_by','is_active','uuid','image'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
