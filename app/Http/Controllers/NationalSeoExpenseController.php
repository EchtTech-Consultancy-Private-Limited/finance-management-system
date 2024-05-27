<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Auth;
use App\Models\NationalSeoExpanse;
use App\Models\NationalSeoExpanseCalculation;
use App\Models\State;

class NationalSeoExpenseController extends Controller
{    
    /**
     *  @index show national expanse state list
     *
     * @return void
     */
    public function index()
    {
        $nationalSeoExpanses = NationalSeoExpanse::with('states','cities','SoeUcFormCalculation')->get();
        return view('national-user.soe-form.index', compact('nationalSeoExpanses'));
    }
    /**
     *  @Create SOE Expense create form for national user
     *
     * @return void
     */
    public function create()
    {
        $states = State::get();
        return view('national-user.soe-form.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'state'     => 'required',
            'city_id'     => 'required',
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
                'city_id' => $request->city_id,
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
            return redirect()->route('national-user.soe-expense-index');            
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Something went wrong !  :)','Error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            DB::beginTransaction();
            $states = State::get();
            $nationalSeoExpans = NationalSeoExpanse::with('states','cities','SoeUcFormCalculation')->where('id',$id)->first();
            DB::commit();
            return view('national-user.soe-form.edit',compact('states','nationalSeoExpans'));
        }catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = '')
    {
        try{
            DB::beginTransaction();
            $soeexpanseId = NationalSeoExpanse::where('id', $id)->Update([
                'user_id' => Auth::id(),
                'state_id' => $request->state,
                'city_id' => $request->city_id,
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
            ]);
            foreach($request->id as $key => $value){
                NationalSeoExpanseCalculation::where('id', $value)->Update([
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
            \Toastr::success('Has been update successfully :)','Success');
            return redirect()->route('national-user.soe-expense-index');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student  :)','Error');
        }
    }


    /**
     *  @changeStatus of form
     *
     * @param  mixed $id
     * @return void
     */
    public function changeStatus(Request $request, $id = '')
    {
        try{
            DB::beginTransaction();
            NationalSeoExpanse::where('id', $id)->Update([
                'reason' => $request->reason,
                'status' => $request->status,
            ]);
            DB::commit();
            \Toastr::success('Has been staus change successfully :)','Success');
            return redirect()->back();
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student  :)','Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        NationalSeoExpanse::where('id', $id)->delete();
        // SOEUCFormCalculatin::where('soe_form_id', $id)->delete();
        \Toastr::success('Has been delete successfully :)','Success');
        return redirect()->back();
    }
}
