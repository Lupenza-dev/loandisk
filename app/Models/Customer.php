<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public $fillable=['first_name','middle_name','last_name','phone_number','email','id_type_id','id_number','dob','gender_id','maritial_status_id',
    'region_id','district_id','location','customer_code','uuid','is_active'];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function getStatusLabelAttribute(){
        if ($this->is_active) {
            return "<span class='badge bg-success'>Active</span>";
        } else {
            return "<span class='badge bg-danger'>In Active</span>";
        }
        
    }

    public function getCustomerNameAttribute(){
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }
}
