<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Auth;
use App\Models\NationalSeoExpanse;
use App\Models\NationalSeoExpanseCalculation;

class NationalSeoExpenseController extends Controller
{
    /**
     *  @Create SOE Expense create form for national user
     *
     * @return void
     */
    public function create()
    {
        $states = DB::table('states')->where('status',1)->get();
        return view('national-user.soe-form.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'state'     => 'required',
            'expanse_plan' => 'required',
            ],
            [
                'expanse_plan.required'=> 'The Expanse Plan field is required'
            ]
        
        );        
        try {
            DB::beginTransaction();
            $soeexpanseId = NationalSeoExpanse::Create([
                'user_id' => Auth::id(),
                'state_id' => $request->state,
                'institute_program_id' => $request->institute_program_id,
                'expanse_plan' => $request->expanse_plan,
                'institute_name' => $request->institute_name,
                'finance_account_officer' => $request->finance_account_officer,
                'finance_account_officer_mobile' => $request->finance_account_officer_mobile,
                'finance_account_officer_email' => $request->finance_account_officer_email,
                'nadal_officer' => $request->nadal_officer,
                'nadal_officer_mobile' => $request->nadal_officer_mobile,
                'nadal_officer_email' => $request->nadal_officer_email,
                'month' => $request->month,
                'financial_year' => $request->financial_year,
            ])->id;
            foreach($request->head as $key => $value){
                NationalSeoExpanseCalculation::Create([
                    'national_seo_expanse_id' => $soeexpanseId,
                    'head' => $request->head[$key],
                    'sanction_order' => $request->sanction_order[$key],
                    'unspent_balance_1st' => $request->unspent_balance_1st[$key],
                    'gia_received' => $request->gia_received[$key],
                    'total_balance' => $request->total_balance[$key],
                    'actual_expenditure' => $request->actual_expenditure[$key],
                    'unspent_balance_last' => $request->unspent_balance_last[$key],
                    'committed_liabilities' => $request->committed_liabilities[$key],
                    'unspent_balance_31st' => $request->unspent_balance_31st[$key],
                ]);
            }
            DB::commit();
            \Toastr::success('Has been add successfully :)','Success');
            return redirect()->route('national-user.soe-expense-create');            
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Something went wrong !  :)','Error');
        }
    }
}
