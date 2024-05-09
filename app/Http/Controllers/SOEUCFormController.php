<?php

namespace App\Http\Controllers;

use App\Models\SOEUCForm;
use App\Models\SOEUCFormCalculatin;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class SOEUCFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $create = 'institute-user.SOEUC.create';   
    protected $edit = 'institute-user.SOEUC.edit';   
    protected $list = 'institute-user.SOEUC.list';   

    public function index()
    {
        $soeucForms =  SOEUCForm::with('states','SoeUcFormCalculation')->get();
        return view($this->list,compact('soeucForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = DB::table('states')->where('status',1)->get();
        $months = [];
        for ($m=1; $m<=12; $m++) {
            $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        return view($this->create,compact('states','months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_name'    => 'required',
            'institute_name'     => 'required',
            'finance_account_officer'     => 'required',
            'finance_account_officer_mobile'     => 'required',
            'nadal_officer'     => 'required',
            'nadal_officer_mobile'     => 'required',
            'state'     => 'required',
            'financial_year'     => 'required',
        ]);
        try {
            DB::beginTransaction();
            $soeucFormId = SOEUCForm::Create([
                'program_name' => $request->program_name,
                'institute_name' => $request->institute_name,
                'finance_account_officer' => $request->finance_account_officer,
                'finance_account_officer_mobile' => $request->finance_account_officer_mobile,
                'finance_account_officer_email' => $request->finance_account_officer_email,
                'nadal_officer' => $request->nadal_officer,
                'nadal_officer_mobile' => $request->nadal_officer_mobile,
                'nadal_officer_email' => $request->nadal_officer_email,
                'state' => $request->state,
                'month' => $request->month,
                'financial_year' => $request->financial_year,
            ])->id;
            foreach($request->head as $key => $value){
                SOEUCFormCalculatin::Create([
                    'soe_form_id' => $soeucFormId,
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
            return redirect()->route('institute-user.SOE-&-UC-list');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Add new student  :)','Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SOEUCForm $sOEUCForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $breadCrum = "NHM Dashboard";
            DB::beginTransaction();
            $states = DB::table('states')->where('status',1)->get();
            $months = [];
            for ($m=1; $m<=12; $m++) {
                $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
            }            
            $soeForm = SOEUCForm::with('states','SoeUcFormCalculation')->where('id',$id)->first();
            DB::commit();
            return view($this->edit,compact('months','soeForm','states'));
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
            SOEUCForm::where('id', $id)->Update([
                'program_name' => $request->program_name,
                'institute_name' => $request->institute_name,
                'finance_account_officer' => $request->finance_account_officer,
                'finance_account_officer_mobile' => $request->finance_account_officer_mobile,
                'finance_account_officer_email' => $request->finance_account_officer_email,
                'nadal_officer' => $request->nadal_officer,
                'nadal_officer_mobile' => $request->nadal_officer_mobile,
                'nadal_officer_email' => $request->nadal_officer_email,
                'state' => $request->state,
                'month' => $request->month,
                'financial_year' => $request->financial_year,
            ]);
            foreach($request->id as $key => $value){                
                SOEUCFormCalculatin::where('id', $value)->Update([
                    'soe_form_id' => $id,
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
            return redirect()->route('institute-user.SOE-&-UC-list');
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
        SOEUCForm::where('id', $id)->delete();
        SOEUCFormCalculatin::where('soe_form_id', $id)->delete();
        \Toastr::success('Has been delete successfully :)','Success');
        return redirect()->back();
    }
}
