<?php

namespace App\Http\Controllers;

use App\Models\SOEUCForm;
use App\Models\SOEUCFormCalculatin;
use App\Models\SOEUCUploadForm;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Auth;
use App\Exports\InstituteUserExport;
use App\Models\InstituteProgram;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

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
        $soeucForms =  SOEUCForm::with('SoeUcFormCalculation','instituteProgram','institute')->where('user_id', Auth::id())->get();
        return view($this->list,compact('soeucForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $financialYearMonths = [];
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-04-01");
            $month->modify("+$m months");
            $financialYearMonths[] = $month->format('F');
        }
        $soeForms = SOEUCForm::with('SoeUcFormCalculation')->where('user_id', Auth::id())->get();
        $previous_month_expenditure = [];
        $previous_month_total = [];
        $final_data = [];
        if ($soeForms) {
            foreach ($soeForms as $soeForm) {
                if ($soeForm->SoeUcFormCalculation) {
                    foreach ($soeForm->SoeUcFormCalculation as $calculation) {
                        $head = $calculation->head;
                        $month = $calculation->previous_month_expenditure;
                        $total = $calculation->previous_month_total;
                        if (!isset($previous_month_expenditure[$head])) {
                            $previous_month_expenditure[$head] = [];
                            $previous_month_total[$head] = 0;
                        }
                        $previous_month_expenditure[$head][] = $month;
                        $previous_month_expenditure[$head]['total'][] = $total;
                        $previous_month_total[$head] += $total;
                    }
                }
            }
        }
        foreach ($previous_month_expenditure as $head => $months) {
            $total_str = implode('+', $months['total']) . '=' . $previous_month_total[$head];
            unset($months['total']);
            $months_str = implode(', ', $months);
            $final_data[$head] = [
                $months_str,
                $total_str,
                "Overall total of every head"
            ];
        }
        $overall_total = array_sum($previous_month_total);
        foreach ($final_data as $head => &$data) {
            $data[2] = $overall_total;
        }
        return view($this->create,compact('financialYearMonths','final_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id'    => 'required',
            'institute_id'     => 'required',
            'finance_account_officer'     => 'required',
            'finance_account_officer_mobile'     => 'required|digits:10',
            'nadal_officer'     => 'required',
            'nadal_officer_mobile'     => 'required|digits:10',
            'month'     => 'required',
            'financial_year'     => 'required',
        ],
        [
            'nadal_officer.required'=> 'The Nodal Officer field is required',
            'nadal_officer_mobile.required'=> 'The Nodal Officer mobile field is required',
        ]);
        try {
                DB::beginTransaction();
                $soeucFormId = SOEUCForm::Create([
                    'user_id' => Auth::id(),
                    'program_id' => $request->program_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'institute_id' => $request->institute_id,
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
                    SOEUCFormCalculatin::Create([
                        'soe_form_id' => $soeucFormId,
                        'head' => $request->head[$key],
                        'sanction_order' => $request->sanction_order,
                        'previous_month_expenditure' => $request->month,
                        'previous_month_total' => $request->actual_expenditure[$key],
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
                \Toastr::success('The Reconrd has been create successfully.','Success');
                return redirect()->route('institute-user.soe-form-list');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Something went wrong !  :)','Error');
        }
    }
    
    /**
     * view
     *
     * @param  mixed $id
     * @return void
     */
    public function view($id)
    {
        try {
            DB::beginTransaction();
            $financialYearMonths = [];
            $currentYear = date('Y');
            for ($m = 0; $m < 12; $m++) {
                $month = new DateTime("$currentYear-04-01");
                $month->modify("+$m months");
                $financialYearMonths[] = $month->format('F');
            }
            $soeForm = SOEUCForm::with('SoeUcFormCalculation', 'instituteProgram', 'institute')->where('id', $id)->first();
            $soeForms = SOEUCForm::with('SoeUcFormCalculation')->where('user_id', $soeForm->user_id)->get();
            $previous_month_expenditure = [];
            $previous_month_total = [];
            $final_data = [];
            if ($soeForms) {
                foreach ($soeForms as $soeFormPrev) {
                    if ($soeFormPrev->SoeUcFormCalculation) {
                        foreach ($soeFormPrev->SoeUcFormCalculation as $calculation) {
                            $head = $calculation->head;
                            $month = $calculation->previous_month_expenditure;
                            $total = $calculation->previous_month_total;
                            if (!isset($previous_month_expenditure[$head])) {
                                $previous_month_expenditure[$head] = [];
                                $previous_month_total[$head] = 0;
                            }
                            $previous_month_expenditure[$head][] = $month;
                            $previous_month_expenditure[$head]['total'][] = $total;
                            $previous_month_total[$head] += $total;
                        }
                    }
                }
            }
            foreach ($previous_month_expenditure as $head => $months) {
                $total_str = implode('+', $months['total']) . '=' . $previous_month_total[$head];
                unset($months['total']);
                $months_str = implode(', ', $months);
                $final_data[$head] = [
                    $months_str,
                    $total_str,
                    "Overall total of every head"
                ];
            }
            $overall_total = array_sum($previous_month_total);
            foreach ($final_data as $head => &$data) {
                $data[2] = $overall_total;
            }
            DB::commit();
            return view('institute-user.SOEUC.view', compact('soeForm', 'financialYearMonths', 'final_data', 'previous_month_expenditure', 'previous_month_total'));
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            DB::beginTransaction();
            $financialYearMonths = [];
            $currentYear = date('Y');
            for ($m = 0; $m < 12; $m++) {
                $month = new DateTime("$currentYear-04-01");
                $month->modify("+$m months");
                $financialYearMonths[] = $month->format('F');
            }
            $soeForm = SOEUCForm::with('SoeUcFormCalculation', 'instituteProgram', 'institute')->where('id', $id)->first();
            $soeForms = SOEUCForm::with('SoeUcFormCalculation')->where('user_id', Auth::id())->get();
            $previous_month_expenditure = [];
            $previous_month_total = [];
            $final_data = [];
            if ($soeForms) {
                foreach ($soeForms as $soeFormPrev) {
                    if ($soeFormPrev->SoeUcFormCalculation) {
                        foreach ($soeFormPrev->SoeUcFormCalculation as $calculation) {
                            $head = $calculation->head;
                            $month = $calculation->previous_month_expenditure;
                            $total = $calculation->previous_month_total;
                            if (!isset($previous_month_expenditure[$head])) {
                                $previous_month_expenditure[$head] = [];
                                $previous_month_total[$head] = 0;
                            }
                            $previous_month_expenditure[$head][] = $month;
                            $previous_month_expenditure[$head]['total'][] = $total;
                            $previous_month_total[$head] += $total;
                        }
                    }
                }
            }
            foreach ($previous_month_expenditure as $head => $months) {                
                $total_str = implode('+', $months['total']) . '=' . $previous_month_total[$head];                
                unset($months['total']);
                $months_str = implode(', ', $months);
                $final_data[$head] = [
                    $months_str,
                    $total_str,
                    "Overall total of every head"
                ];
            }
            
            $overall_total = array_sum($previous_month_total);
            foreach ($final_data as $head => &$data) {
                $data[2] = $overall_total;
            }
            DB::commit();
            return view($this->edit, compact('soeForm', 'financialYearMonths', 'final_data', 'previous_month_expenditure', 'previous_month_total'));
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = '')
    {
        $request->validate([
            'program_id'    => 'required',
            'institute_id'     => 'required',
            'finance_account_officer'     => 'required',
            'finance_account_officer_mobile'     => 'required|digits:10',
            'nadal_officer'     => 'required',
            'nadal_officer_mobile'     => 'required|digits:10',
            'month'     => 'required',
            'financial_year'     => 'required',
        ],
        [
            'nadal_officer.required'=> 'The Nodal Officer field is required',
            'nadal_officer_mobile.required'=> 'The Nodal Officer mobile field is required',
        ]);
        try{
            DB::beginTransaction();
            SOEUCForm::where('id', $id)->Update([
                'user_id' => Auth::id(),
                'program_id' => $request->program_id,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'institute_id' => $request->institute_id,
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
                SOEUCFormCalculatin::where('id', $value)->Update([
                    'soe_form_id' => $id,
                    'head' => $request->head[$key],
                    'sanction_order' => $request->sanction_order,
                    'previous_month_expenditure' => $request->month,
                    'previous_month_total' => $request->actual_expenditure[$key],
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
            \Toastr::success('The Reconrd has been updated successfully.','Success');
            return redirect()->route('institute-user.soe-form-list');
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
            SOEUCForm::where('id', $id)->Update([
                'reason' => $request->reason,
                'status' => $request->status,
            ]);
            DB::commit();
            \Toastr::success('Has been staus change successfully :)','Success');
            return redirect()->route('institute-user.soe-form-list');
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
        \Toastr::success('The Reconrd has been deleted successfully.','Success');
        return redirect()->back();
    }
    
    /**
     *  @report excel report generate
     *
     * @return void
     */
    public function report()
    {
        $programs = InstituteProgram::get();
        $sorUcLists = SOEUCUploadForm::with('users')->get();
        return view('institute-user.report',compact('programs','sorUcLists'));
    }
    
    /**
     * export excel file
     *
     * @param  mixed $request
     * @return void
     */
    public function export(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'modulename' => 'required',
        ],
        [
            'modulename.required' => 'The Module Name field id required',
        ]);
        // Parse the start and end date if provided
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $start_date = Carbon::parse("$request->startdate 00:00:00")->format('Y-m-d H:i:s');
            $end_date = Carbon::parse("$request->enddate 23:59:59")->format('Y-m-d H:i:s');
        } else {
            // Set a wide range if start and end dates are empty
            $start_date = Carbon::parse("1900-01-01 00:00:00")->format('Y-m-d H:i:s');
            $end_date = Carbon::now()->addYear(100)->format('Y-m-d H:i:s');
        }
        $fileName = '';
        $arrays = [];
        switch ($request->modulename) {
            case '1':
                $fileName = 'SOEUForm';
                $query = SOEUCForm::with('states','instituteProgram','SoeUcFormCalculation');
                break;
            case '2':
                $fileName = 'UCUpload';
                $query = SOEUCUploadForm::query();
                break;
            default:
                return response()->json(['error' => 'Invalid module name'], 400);
        }
        if(!empty($request->program_id)){
            $query->where('program_id', $request->program_id);
        }
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        if ($request->modulename == '2') {
            $sorUcLists = $query->get();
            $programs = InstituteProgram::get();
            return view('institute-user.report',compact('programs','sorUcLists'));
        }
        $arrays = [$query->get()->toArray()];
        return Excel::download(new InstituteUserExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }
}
