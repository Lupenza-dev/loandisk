<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranch extends Model
{
    use SoftDeletes;
    public $fillable=['name','company_id','phone_number','email','created_by','uuid','address'];

    public function getStatusLabelAttribute(){
        if ($this->is_active) {
            return "<span class='badge bg-success'>Active</span>";
        } else {
            return "<span class='badge bg-danger'>In Active</span>";
        }
        
    }
}
