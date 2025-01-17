<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\CompanyBranch;
use App\Models\LoanCalculation;
use App\Models\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Str;

class LoanSettingController extends Controller
{
    public function loanTypes(){
        $repayments =LoanCalculation::get();
        $loan_types =LoanType::with('loan_calculation')->where('company_id',getCompanyId())->get();
        return view('loan.loan_types',compact('repayments','loan_types'));
    }

    public function loanTypeStore(Request $request){
        $valid = $request->validate([
            'name'    => 'required',
            'plan'    => 'required',
            'maturity'          => 'required',
            'loan_repayment_id' => 'required',
            'grace_period'      => 'required',
            'interest'         => 'required',
        ]);

        LoanType::updateOrCreate([
            'name'  =>$valid['name'],
            'plan'  =>$valid['plan'],
            'maturity'            =>$valid['maturity'],
            'loan_repayment_id'  =>$valid['loan_repayment_id'],
            'company_id' =>getCompanyId(),
            'interest'   =>str_replace('%','',$valid['interest']),
        ],[
            'grace_period' =>$valid['grace_period'],
            'deleted_at' =>null,
            'status'     =>true,
            'created_by' =>Auth::user()->id,
            'uuid'       =>(string)Str::orderedUuid(),
        ]);

        return response()->json([
            'success' =>true,
            'message' =>'Registration Done Successfully'
        ],200);
    }

    public function getWorkFlowLevel(){
        $roles =Role::whereIn('id',[3,4,5])->get();
        $branches =CompanyBranch::where('company_id',getCompanyId())->get();
        return view('management.workflow_level',compact('roles','branches'));
    }
}
