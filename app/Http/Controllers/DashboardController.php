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
            $query->where('institute_program_id', $request->program_wise);
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
            $programCount = SOEUCForm::with('SoeUcFormCalculation')->where('institute_program_id', $instituteProgram->id)->get()
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
                ->where('institute_program_id', $balanceLineChartProgram->id)
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

    public function getUserProfile(Request $request, $id){
        return view('auth.profile');
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
        return view('national-user.report');
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
            'modulename.required' => 'The Module Name field is required',
        ]);
        
        $fileName = '';
        $query = null;
        switch ($request->modulename) {
            case '1':
                $fileName = 'SOEUForm';
                $query = SOEUCForm::with('states', 'instituteProgram', 'SoeUcFormCalculation');
                break;
            default:
                return response()->json(['error' => 'Invalid module name'], 400);
        }
        // Add filters based on the request data
        if ($request->filled('program_name')) {
            $query->where('institute_program_id', $request->program_name);
        }
        if ($request->filled('financial_year')) {
            $query->where('financial_year', $request->financial_year);
        }
        if ($request->filled('institute_name')) {
            $query->where('institute_name', $request->institute_name);
        }
        if ($request->filled('month')) {
            $query->where('month', $request->month);
        }
        $arrays = [$query->get()->toArray()];
        return Excel::download(new InstituteUserExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }

}
