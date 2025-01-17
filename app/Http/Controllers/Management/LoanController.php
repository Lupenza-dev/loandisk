<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\CustomerCompany;
use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function allLoans(){
        return view('loan.all_loan');
    }

    public function createLoan(){
        $loan_types =LoanType::get();
        $customers =CustomerCompany::with('customer')->where('company_id',getCompanyId())->get();
        return view('loan.add_loan',compact('loan_types','customers'));
    }

    public function getPlan($loan_type_id){
        $data =[];
        $loan_type =LoanType::find($loan_type_id);
        $plan =explode(',',$loan_type->plan);
        foreach ($plan as $key) {
            $data[]=[
                'id' =>$key,
                'name' =>$key
            ];
        }

        return response()->json($data);

    }
}
