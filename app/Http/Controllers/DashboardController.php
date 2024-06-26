<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\SOEUCForm;
use App\Models\SOEUCFormCalculatin;
use Carbon\Carbon;
use App\Models\SOEUCUploadForm;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\InstituteProgram;
use App\Models\NationalDashboardTotalCards;
use Exception;
use App\Exports\InstituteUserExport;
use App\Models\Institute;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['segment'] = $request->segment(1);
        if($data['segment'] == 'national-users'){
            $file = 'national-user.dashboard';
        }else{
            $file = 'institute-user.dashboard';
        }
        $months = [];
        for ($m=1; $m<=12; $m++) {
            $months[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        $currentFY = date('Y').' - '.date('Y')+1;
        $institutePrograms = InstituteProgram::get();
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', $currentFY)
            ->get();

        $totalcard = NationalDashboardTotalCards::first();

        $sorUcLists = SOEUCUploadForm::with('users')->get();

            $finalArray = [];
            foreach ($dataForms as $dataForm) {
                $grandTotalGiaReceived = 0;
                $grandTotalCommittedLiabilities = 0;
                $grandTotalTotalBalance = 0;
                $grandTotalActualExpenditure = 0;
                $grandTotalUnspentFirst = 0;
                $grandTotalUnspentBalance = 0;
                foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                    if ($formCalculate->head == 'Grand Total') {
                        $grandTotalGiaReceived += (int)$formCalculate->gia_received;
                        $grandTotalCommittedLiabilities += (int)$formCalculate->committed_liabilities;
                        $grandTotalTotalBalance += (int)$formCalculate->total_balance;
                        $grandTotalActualExpenditure += (int)$formCalculate->actual_expenditure;
                        $grandTotalUnspentFirst += (int)$formCalculate->unspent_balance_1st;
                        $grandTotalUnspentBalance += (int)$formCalculate->unspent_balance_31st;
                    }
                }
                $finalArray[] = [
                    'gia_received_total' => $grandTotalGiaReceived,
                    'committed_liabilities_total' => $grandTotalCommittedLiabilities,
                    'total_balance_total' => $grandTotalTotalBalance,
                    'actual_expenditure_total' => $grandTotalActualExpenditure,
                    'unspent_balance_1st' => $grandTotalUnspentFirst,
                    'unspent_balance_31st_total' => $grandTotalUnspentBalance,
                ];
            }
            
            $totalArray = [
                'giaReceivedTotal' => 0,
                'committedLiabilitiesTotal' => 0,
                'totalBalanceTotal' => 0,
                'actualExpenditureTotal' => 0,
                'unspentBalance1stTotal' => 0,
                'unspentBalance31stTotal' => 0,
            ];
            
            foreach ($finalArray as $entry) {
                $totalArray['giaReceivedTotal'] += $entry['gia_received_total'];
                $totalArray['committedLiabilitiesTotal'] += $entry['committed_liabilities_total'];
                $totalArray['totalBalanceTotal'] += $entry['total_balance_total'];
                $totalArray['actualExpenditureTotal'] += $entry['actual_expenditure_total'];
                $totalArray['unspentBalance1stTotal'] += $entry['unspent_balance_1st'];
                $totalArray['unspentBalance31stTotal'] += $entry['unspent_balance_31st_total'];
            }
        return view($file, compact('totalArray','sorUcLists','institutePrograms','totalcard','months'));
    }

    public function instituteFilterDdashboard(Request $request)
    {
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', $request->financial_year)
            ->get();

        $finalArray = [];
        foreach ($dataForms as $dataForm) {
            $grandTotalGiaReceived = 0;
            $grandTotalCommittedLiabilities = 0;
            $grandTotalTotalBalance = 0;
            $grandTotalActualExpenditure = 0;
            $grandTotalUnspentBalance = 0;
            foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                if ($formCalculate->head == 'Grand Total') {
                    $grandTotalGiaReceived += (int)$formCalculate->gia_received;
                    $grandTotalCommittedLiabilities += (int)$formCalculate->committed_liabilities;
                    $grandTotalTotalBalance += (int)$formCalculate->total_balance;
                    $grandTotalActualExpenditure += (int)$formCalculate->actual_expenditure;
                    $grandTotalUnspentBalance += (int)$formCalculate->unspent_balance_31st;
                }
            }
            $finalArray[] = [
                'gia_received_total' => $grandTotalGiaReceived,
                'committed_liabilities_total' => $grandTotalCommittedLiabilities,
                'total_balance_total' => $grandTotalTotalBalance,
                'actual_expenditure_total' => $grandTotalActualExpenditure,
                'unspent_balance_31st_total' => $grandTotalUnspentBalance,
            ];
        }
        
        $totalArray = [
            'giaReceivedTotal' => 0,
            'committedLiabilitiesTotal' => 0,
            'totalBalanceTotal' => 0,
            'actualExpenditureTotal' => 0,
            'unspentBalance31stTotal' => 0,
        ];
        
        foreach ($finalArray as $entry) {
            $totalArray['giaReceivedTotal'] += $entry['gia_received_total'];
            $totalArray['committedLiabilitiesTotal'] += $entry['committed_liabilities_total'];
            $totalArray['totalBalanceTotal'] += $entry['total_balance_total'];
            $totalArray['actualExpenditureTotal'] += $entry['actual_expenditure_total'];
            $totalArray['unspentBalance31stTotal'] += $entry['unspent_balance_31st_total'];
        }

        return response()->json(['totalArray'=>$totalArray], 200);
    }
    
    /**
     *  @nationalFilterDdashboard filter
     *
     * @param  mixed $request
     * @return void
     */
    public function nationalFilterDdashboard(Request $request)
    {
        $query = SOEUCForm::with('states', 'SoeUcFormCalculation');
        if ($request->has('financial_year') && $request->financial_year) {
            $query->where('financial_year', $request->financial_year);
        }
        if ($request->has('program_wise') && $request->program_wise) {
            $query->where('program_id', $request->program_wise);
        }
        // number of percentage program wise
        $institutePrograms = InstituteProgram::get();
        $programNames = [];
        $programPercentages = [];
        $programDetails = [];
        $numberCount = SOEUCForm::count();
        $allProgramTotalExpenditure = SOEUCForm::with('SoeUcFormCalculation')
            ->get()
            ->pluck('SoeUcFormCalculation')
            ->flatten()
            ->sum('actual_expenditure');

        foreach($institutePrograms as $key => $instituteProgram){
            $programCount = SOEUCForm::with('SoeUcFormCalculation')->where('program_id', $instituteProgram->id)->get()
            ->pluck('SoeUcFormCalculation')
            ->flatten()
            ->sum('actual_expenditure');
            $programPercentage = $programCount;
            $programNames[] = $instituteProgram->name . '-' . $instituteProgram->code;
            $programPercentages[] = $programPercentage;
        }
        $programDetails[] = [
                'program_names' => $programNames,
                'program_percentages' => $programPercentages,
                'allProgramTotalExpenditure' => $allProgramTotalExpenditure,
            ];
        // End number of percentage program wise       

        // Retrieve all institute programs
        $balanceLineChartPrograms = InstituteProgram::get();
        $balanceProgramDetails = [];

        foreach ($balanceLineChartPrograms as $balanceLineChartProgram) {
            // Initialize an array to hold expenditures for each month
            $monthlyExpenditures = array_fill(0, 12, 0);

            // Get expenditures grouped by month for each program
            $expenditures = SOEUCForm::with('SoeUcFormCalculation')
                ->where('program_id', $balanceLineChartProgram->id)
                ->get()
                ->groupBy('month')
                ->map(function ($group) {
                    return $group->pluck('SoeUcFormCalculation')
                                ->flatten()
                                ->sum('actual_expenditure');
                });

            // Map the expenditures to the correct month index
            foreach ($expenditures as $month => $expenditure) {
                $monthIndex = date('n', strtotime($month)) - 1; // Convert month to index (0-11)
                $monthlyExpenditures[$monthIndex] = $expenditure;
            }

            $balanceProgramDetails[] = [
                'name' => $balanceLineChartProgram->name . '-' . $balanceLineChartProgram->code,
                'data' => $monthlyExpenditures,
            ];
        }
        $balanceProgramLineChart = [
            'programs' => $balanceProgramDetails,
        ];
        // End number of percentage program wise for balance-line-chart

        $dataForms = $query->get();
        
        $finalArray = [];
        foreach ($dataForms as $dataForm) {
            $grandTotalGiaReceived = 0;
            $grandTotalCommittedLiabilities = 0;
            $grandTotalTotalBalance = 0;
            $grandTotalActualExpenditure = 0;
            $grandTotalUnspentBalance = 0;
            foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                if ($formCalculate->head == 'Grand Total') {
                    $grandTotalGiaReceived += (int)$formCalculate->gia_received;
                    $grandTotalCommittedLiabilities += (int)$formCalculate->committed_liabilities;
                    $grandTotalTotalBalance += (int)$formCalculate->total_balance;
                    $grandTotalActualExpenditure += (int)$formCalculate->actual_expenditure;
                    $grandTotalUnspentBalance += (int)$formCalculate->unspent_balance_31st;
                }
            }
            $finalArray[] = [
                'gia_received_total' => $grandTotalGiaReceived,
                'committed_liabilities_total' => $grandTotalCommittedLiabilities,
                'total_balance_total' => $grandTotalTotalBalance,
                'actual_expenditure_total' => $grandTotalActualExpenditure,
                'unspent_balance_31st_total' => $grandTotalUnspentBalance,
            ];
        }
        
        $totalArray = [
            'giaReceivedTotal' => 0,
            'committedLiabilitiesTotal' => 0,
            'totalBalanceTotal' => 0,
            'actualExpenditureTotal' => 0,
            'unspentBalance31stTotal' => 0,
        ];
        
        foreach ($finalArray as $entry) {
            $totalArray['giaReceivedTotal'] += $entry['gia_received_total'];
            $totalArray['committedLiabilitiesTotal'] += $entry['committed_liabilities_total'];
            $totalArray['totalBalanceTotal'] += $entry['total_balance_total'];
            $totalArray['actualExpenditureTotal'] += $entry['actual_expenditure_total'];
            $totalArray['unspentBalance31stTotal'] += $entry['unspent_balance_31st_total'];
        }
        return response()->json(['totalArray'=>$totalArray,'programDetails'=>$programDetails,'balanceProgramLineChart'=>$balanceProgramLineChart], 200);
    }

    /**
     * @filterCity
     * show city name 
     * 
     * @param  mixed $request
     * @return void
     */
    public function filterCity(Request $request)
    {
        $output = "";
        $count = 0;
        $cities = City::where('state_id', $request->state_id)->get();
        if ($cities) {
            foreach ($cities as $city) {
                $count++;
                $output .='<option value="'.$city->id.'">' . $city->name . '</option>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }
    
    /**
     * filterProgram
     *
     * @param  mixed $request
     * @return void
     */
    public function filterProgram(Request $request)
    {
        $output = "";
        $count = 0;
        $institutes = Institute::where('program_id', $request->program_id)->get();
        if ($institutes) {
            foreach ($institutes as $institute) {
                $count++;
                $output .='<option value="'.$institute->id.'">' . $institute->name . '</option>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }

    public function getUserProfile(Request $request, $id)
    {
        $user = User::with('state','city','program','institute')->where('id', Auth::id())->first();
        return view('auth.profile',compact('user'));
    }
    
    /**
     * updateProfile
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateProfile(Request $request, $id = '')
    {
        $data = [
            'name' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'landline' => $request->landline,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'designation' => $request->designation,
        ];
        if ($id) {
            // Update existing user
            DB::table('users')->where('id', $id)->update($data);
            Toastr::success('Record has been updated successfully :)', 'Success');
        }

        return redirect()->back();
    }

    public function getUserPassword(Request $request,$id){
        return view('auth.password-update');
    }
    
    /**
     * totalCard
     *
     * @return void
     */
    public function totalCard(Request $request)
    {
        DB::beginTransaction();

        try {
            NationalDashboardTotalCards::where('id', 1)->update([
                $request->fieldName => $request->value,
            ]);
            DB::commit();
            \Toastr::success('Dashboard card updated successfully :)','Success');
            return response()->json(['message' => 'Dashboard card updated successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            \Toastr::error('Fail, No Update :)', 'Error');
            return response()->json(['message' => 'Failed to update'], 500);
        }
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
        return view('national-user.report',compact('programs','sorUcLists'));
    }
    
    /**
     * export
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
            return view('national-user.report',compact('programs','sorUcLists'));
        }
        $arrays = [$query->get()->toArray()];
        return Excel::download(new InstituteUserExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }

}
