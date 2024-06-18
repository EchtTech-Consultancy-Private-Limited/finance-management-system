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
use App\Models\NationalSeoExpanse;

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
        $soeucForms =  SOEUCForm::with('states','SoeUcFormCalculation','instituteProgram','instituteProgram')->get();
        return view($this->list,compact('soeucForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::get();
        $institutePrograms = InstituteProgram::get();
        $months = [];
        for ($m=1; $m<=12; $m++) {
            $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        $soeForm = NationalSeoExpanse::with('states','SoeUcFormCalculation','instituteProgram')->where(['state_id' => Auth::user()->state_id,'city_id' => Auth::user()->district_id])->first();
        if(!is_null($soeForm)){
            return view($this->create,compact('soeForm','states','months','institutePrograms'));
        }else{
            \Toastr::error('fail, No Permission)','Error');
            return redirect()->route('institute-user.SOE-&-UC-list');
        }
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'institute_program_id'    => 'required',
            'institute_name'     => 'required',
            'finance_account_officer'     => 'required',
            'finance_account_officer_mobile'     => 'required|digits:10',
            'nadal_officer'     => 'required',
            'nadal_officer_mobile'     => 'required|digits:10',
            'financial_year'     => 'required',
        ],
        [
            'nadal_officer.required'=> 'The Nodal Officer field is required',
            'nadal_officer_mobile.required'=> 'The Nodal Officer mobile field is required',
        ]);
        try {
            $currentDate = Carbon::now();
            $programCount = SOEUCForm::where('institute_program_id', $request->institute_program_id)->count();
            $programNumber = InstituteProgram::where('id', $request->institute_program_id)->first();
            $expansePlanCheck = 0;
            $expansePlan = $request->expanse_plan;
            $query = SOEUCForm::where('state_id', $request->state_id)
                ->where('city_id', $request->city_id)
                ->where('expanse_plan', $expansePlan);

            if ($expansePlan == 1) {
                $expansePlanCheck = $query->whereYear('created_at', $currentDate->year)->count();
            } elseif ($expansePlan == 2) {
                $expansePlanCheck = $query->whereYear('created_at', $currentDate->year)
                    ->whereMonth('created_at', $currentDate->month)->count();
            } elseif ($expansePlan == 3) {
                $expansePlanCheck = $query->whereYear('created_at', $currentDate->year)->count();
            }

            if (($expansePlan == 1 && $expansePlanCheck >= 1) ||
                ($expansePlan == 2 && $expansePlanCheck >= 1) ||
                ($expansePlan == 3 && $expansePlanCheck >= 3)) {
                \Toastr::error('Expanse plan limit exceeded', 'Error');
                return redirect()->route('institute-user.SOE-&-UC-list');
            }

            if($programCount <= $programNumber->count ){
                DB::beginTransaction();
                $soeucFormId = SOEUCForm::Create([
                    'user_id' => Auth::id(),
                    'institute_program_id' => $request->institute_program_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
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
                \Toastr::success('The Reconrd has been deleted successfully.','Success');
                return redirect()->route('institute-user.SOE-&-UC-list');
            }else{
                \Toastr::error('fail, Program Number of count full  :)','Error');
                return redirect()->route('institute-user.SOE-&-UC-list');
            }
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, Something went wrong !  :)','Error');
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
            DB::beginTransaction();
            $states = State::get();
            $months = [];
            for ($m=1; $m<=12; $m++) {
                $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
            }
            $institutePrograms = InstituteProgram::get();
            $soeForm = SOEUCForm::with('states','SoeUcFormCalculation','instituteProgram')->where('id',$id)->first();
            DB::commit();
            return view($this->edit,compact('months','soeForm','states','institutePrograms'));
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
        $request->validate([
            'institute_program_id'    => 'required',
            'institute_name'     => 'required',
            'finance_account_officer'     => 'required',
            'finance_account_officer_mobile'     => 'required|digits:10',
            'nadal_officer'     => 'required',
            'nadal_officer_mobile'     => 'required|digits:10',
            'financial_year'     => 'required',
        ],
        [
            'nadal_officer.required'=> 'The Nodal Officer field is required',
            'nadal_officer_mobile.required'=> 'The Nodal Officer mobile field is required',
        ]);
        try{
            $programCount = SOEUCForm::where('institute_program_id', $request->institute_program_id)->count();
            $programNumber = InstituteProgram::where('id', $request->institute_program_id)->first();
            if($programCount <= $programNumber->count ){
                DB::beginTransaction();
                SOEUCForm::where('id', $id)->Update([
                    'user_id' => Auth::id(),
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'expanse_plan' => $request->expanse_plan,
                    'institute_program_id' => $request->institute_program_id,
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
                \Toastr::success('The Reconrd has been updated successfully.','Success');
                return redirect()->route('institute-user.SOE-&-UC-list');
            }else{
                \Toastr::error('fail, Program Number of count full  :)','Error');
                return redirect()->route('institute-user.SOE-&-UC-list');
            }
            \Toastr::error('fail, Program Number of count full  :)','Error');
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
        return view('institute-user.report');
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
        ]
    );

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
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }        
        $arrays = [$query->get()->toArray()];
        return Excel::download(new InstituteUserExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }
}
