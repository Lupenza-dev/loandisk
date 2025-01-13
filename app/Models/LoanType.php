<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    public $fillable =['name','plan','maturity','loan_repayment_id','company_id','status','created_by','uuid','interest','grace_period'];

    public function getStatusLabelAttribute(){
        if ($this->status) {
            return "<span class='badge bg-success'>Active</span>";
        } else {
            return "<span class='badge bg-danger'>In Active</span>";
        }
        
    }

    public function loan_calculation(){
        return $this->hasOne(LoanCalculation::class,'id','loan_repayment_id');
    }
   
}
