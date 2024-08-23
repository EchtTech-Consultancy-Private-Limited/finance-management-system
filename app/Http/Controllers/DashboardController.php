<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\SOEUCForm;
use Carbon\Carbon;
use App\Models\SOEUCUploadForm;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\InstituteProgram;
use App\Models\NationalDashboardTotalCards;
use Exception;
use App\Exports\InstituteUserExport;
use App\Models\Institute;
use App\Models\State;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;
use NunoMaduro\Collision\Adapters\Laravel\Inspector;
use Illuminate\Support\Facades\Hash;

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
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-04-01");
            $month->modify("+$m months");
            $months[] = $month->format('F');
        }
        $currentFY = date('Y').' - '.date('Y')+1;
        $institutePrograms = InstituteProgram::get();
        $institutes = Institute::get();
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', $currentFY)
            ->get();

        $totalcard = NationalDashboardTotalCards::first();
        $totalSum = collect($totalcard)->only([
            'total_sentinel_site',
            'total_ppcl_labs',
            'total_regional_coordinator',
            'total_nrcp_labs',
            'total_pm_abhim_sss'
        ])->sum(function($value) {
            return (int) $value;
        });

        $sorUcLists = SOEUCUploadForm::with('users')->orderBy('id','desc')->get();

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
        return view($file, compact('totalArray','sorUcLists','institutePrograms','institutes','totalcard','totalSum','months'));
    }
    
    /**
     * instituteDashboard
     *
     * @param  mixed $request
     * @return void
     */
    public function instituteDashboard(Request $request)
    {
        $months = [];
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-04-01");
            $month->modify("+$m months");
            $months[] = $month->format('F');
        }
        $currentFY = date('Y').' - '.date('Y')+1;
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', $currentFY)
            ->where('user_id', Auth::id())
            ->get();

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
        return view('institute-user.dashboard', compact('totalArray','months'));
    }
    
    /**
     * instituteFilterDdashboard
     *
     * @param  mixed $request
     * @return void
     */
    public function instituteFilterDdashboard(Request $request)
    {
        $currentFY = date('Y').' - '.date('Y')+1;
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', $request->financial_year ?? $currentFY)
            ->where('user_id', Auth::id())
            ->get();

        $finalArray = [];
        foreach ($dataForms as $dataForm) {
            $grandTotalUnspentFirst = 0;
            $grandTotalGiaReceived = 0;
            $grandTotalCommittedLiabilities = 0;
            $grandTotalTotalBalance = 0;
            $grandTotalActualExpenditure = 0;
            $grandTotalUnspentBalance = 0;
            foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                if ($formCalculate->head == 'Grand Total') {
                    $grandTotalUnspentFirst += (int)$formCalculate->unspent_balance_1st;
                    $grandTotalGiaReceived += (int)$formCalculate->gia_received;
                    $grandTotalCommittedLiabilities += (int)$formCalculate->committed_liabilities;
                    $grandTotalTotalBalance += (int)$formCalculate->total_balance;
                    $grandTotalActualExpenditure += (int)$formCalculate->actual_expenditure;
                    $grandTotalUnspentBalance += (int)$formCalculate->unspent_balance_31st;
                }
            }
            $finalArray[] = [
                'unspent_balance_1st' => $grandTotalUnspentFirst,
                'gia_received_total' => $grandTotalGiaReceived,
                'committed_liabilities_total' => $grandTotalCommittedLiabilities,
                'total_balance_total' => $grandTotalTotalBalance,
                'actual_expenditure_total' => $grandTotalActualExpenditure,
                'unspent_balance_31st_total' => $grandTotalUnspentBalance,
            ];
        }
        
        $totalArray = [
            'unspentBalance1stTotal' => 0,
            'giaReceivedTotal' => 0,
            'committedLiabilitiesTotal' => 0,
            'totalBalanceTotal' => 0,
            'actualExpenditureTotal' => 0,
            'unspentBalance31stTotal' => 0,
        ];
        
        foreach ($finalArray as $entry) {
            $totalArray['unspentBalance1stTotal'] += $entry['unspent_balance_1st'];
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
            $programPercentage = $programCount/2;
            $programNames[] = $instituteProgram->name . '-' . $instituteProgram->code;
            $programPercentages[] = $programPercentage;
        }
        $programDetails[] = [
                'program_names' => $programNames,
                'program_percentages' => $programPercentages,
                'allProgramTotalExpenditure' => $allProgramTotalExpenditure/2,
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
                $monthlyExpenditures[$monthIndex] = $expenditure/2;
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

        // program wise expenditure column institute wise
        $institutes = Institute::get();
        $instituteColumnDetails = [];

        foreach($institutes as $key => $institute){
            $instituteCount = SOEUCForm::with('SoeUcFormCalculation')
                ->where('institute_id', $institute->id)
                ->get()
                ->pluck('SoeUcFormCalculation')
                ->flatten()
                ->sum('actual_expenditure');
            $instituteExpenditure = $instituteCount / 2;
            $instituteColumnDetails[] = [$institute->name . '' . $institute->code, $instituteExpenditure];
        }
        $instituteColumnDetails = [
                'data' => $instituteColumnDetails
            ];
        // end program wise expenditure column institute wise
        $dataForms = $query->get();
        
        $finalArray = [];
        foreach ($dataForms as $dataForm) {
            $grandTotalGiaReceived = 0;
            $grandTotalCommittedLiabilities = 0;
            $grandTotalTotalBalance = 0;
            $grandTotalActualExpenditure = 0;
            $grandTotalUnspentBalanceFirst = 0;
            $grandTotalUnspentBalance = 0;
            foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                if ($formCalculate->head == 'Grand Total') {
                    $grandTotalGiaReceived += (int)$formCalculate->gia_received;
                    $grandTotalCommittedLiabilities += (int)$formCalculate->committed_liabilities;
                    $grandTotalTotalBalance += (int)$formCalculate->total_balance;
                    $grandTotalActualExpenditure += (int)$formCalculate->actual_expenditure;
                    $grandTotalUnspentBalanceFirst += (int)$formCalculate->unspent_balance_1st;
                    $grandTotalUnspentBalance += (int)$formCalculate->unspent_balance_31st;
                }
            }
            $finalArray[] = [
                'gia_received_total' => $grandTotalGiaReceived,
                'committed_liabilities_total' => $grandTotalCommittedLiabilities,
                'total_balance_total' => $grandTotalTotalBalance,
                'actual_expenditure_total' => $grandTotalActualExpenditure,
                'unspent_balance_1st_total' => $grandTotalUnspentBalanceFirst,
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
            $totalArray['unspentBalance1stTotal'] += $entry['unspent_balance_1st_total'];
            $totalArray['unspentBalance31stTotal'] += $entry['unspent_balance_31st_total'];
        }

        // yearly soe expenditure
        $yearlySoeExpenditure = [];
        $query = SOEUCForm::with('SoeUcFormCalculation');
        $expenditures = $query->get()
            ->groupBy('financial_year')
            ->map(function ($group) {
                return $group->pluck('SoeUcFormCalculation')
                            ->flatten()
                            ->sum('actual_expenditure');
            });
        foreach ($expenditures as $financialYear => $expenditure) {
            $yearlySoeExpenditure[] = [$financialYear, $expenditure / 2];
        }

        $yearlySoeDetails = [
            'program' => $yearlySoeExpenditure,
            'institute' => $yearlySoeExpenditure,
        ];
        // end Soe Expenditure

        // UC Reveived or not map code
            $currentYear = Carbon::now()->year;
            $query = SOEUCUploadForm::whereYear('date', $currentYear);;
            $UcUploadDetails = [];
            for ($month = 1; $month <= 12; $month++) {
                $queryForMonth = clone $query;
                // Total count for the month
                $total = $queryForMonth->whereMonth('date', $month)->count();
                // Approved count for the month
                $queryForApproved = clone $queryForMonth;
                $approved = $queryForApproved->where('status', 1)->count();
                // Not approved count for the month
                $queryForNotApproved = clone $queryForMonth;
                $notApproved = $queryForNotApproved->where('status', 2)->count();

                $UcUploadDetails[$month] = [
                    'total' => $total ?: 0,
                    'approved' => $approved ?: 0,
                    'not_approved' => $notApproved ?: 0,
                ];
            }
            $UcFormstateDetails = [];
            $states = State::all();
            foreach ($states as $state) {
                $UcFormCount = SOEUCUploadForm::whereHas('users', function ($query) use ($state) {
                    $query->where('state_id', $state->id);
                })->count();
                $UcFormstateDetails[] = [
                    'hc-key' => $state->name,
                    'value' => $UcFormCount,
                ];
            }
        // End UC Reveived or not map code
        return response()->json(['totalArray'=>$totalArray,'programDetails'=>$programDetails,'balanceProgramLineChart'=>$balanceProgramLineChart,'UcUploadDetails'=>$UcUploadDetails,'UcFormstateDetails'=>$UcFormstateDetails,'yearlySoeDetails'=>$yearlySoeDetails,'instituteColumnDetails'=>$instituteColumnDetails], 200);
    }

    public function yearlySoeExpenditureFilter(Request $request)
    {
        $yearlySoeExpenditure = [];
        $yearlySoeExpenditureProgram = [];
        $yearlySoeExpenditureInstitute = [];        
        $query = SOEUCForm::with('SoeUcFormCalculation');
        if ($request->filled('program_wise_yearly')) {
            $query->where('program_id', $request->program_wise_yearly);
        }
        if ($request->filled('institute_wise_yearly')) {
            $query->where('institute_id', $request->institute_wise_yearly);
        }        
        if ($request->filled('program_wise_yearly')) {
            $queryProgram = SOEUCForm::with('SoeUcFormCalculation')
                            ->where('program_id', $request->program_wise_yearly)
                            ->get()
                            ->groupBy('financial_year')
                            ->map(function ($group) {
                                return $group->pluck('SoeUcFormCalculation')
                                            ->flatten()
                                            ->sum('actual_expenditure');
                            });
            foreach ($queryProgram as $financialYear => $expenditure) {
                $yearlySoeExpenditureProgram[] = [$financialYear, $expenditure / 2];
            }
        }else {
            $queryProgram = SOEUCForm::with('SoeUcFormCalculation')
                            ->get()
                            ->groupBy('financial_year')
                            ->map(function ($group) {
                                return $group->pluck('SoeUcFormCalculation')
                                            ->flatten()
                                            ->sum('actual_expenditure');
                            });
    
            foreach ($queryProgram as $financialYear => $expenditure) {
                $yearlySoeExpenditureProgram[] = [$financialYear, $expenditure / 2];
            }
        }
        
        if ($request->filled('institute_wise_yearly')) {
            $queryInstitute = SOEUCForm::with('SoeUcFormCalculation')
                            ->where('institute_id', $request->institute_wise_yearly)
                            ->get()
                            ->groupBy('financial_year')
                            ->map(function ($group) {
                                return $group->pluck('SoeUcFormCalculation')
                                            ->flatten()
                                            ->sum('actual_expenditure');
                            });

            foreach ($queryInstitute as $financialYear => $expenditure) {
                $yearlySoeExpenditureInstitute[] = [$financialYear, $expenditure / 2];
            }
        }else {
            $queryInstitute = SOEUCForm::with('SoeUcFormCalculation')
                            ->get()
                            ->groupBy('financial_year')
                            ->map(function ($group) {
                                return $group->pluck('SoeUcFormCalculation')
                                            ->flatten()
                                            ->sum('actual_expenditure');
                            });
    
            foreach ($queryInstitute as $financialYear => $expenditure) {
                $yearlySoeExpenditureInstitute[] = [$financialYear, $expenditure / 2];
            }
        }

        $yearlySoeDetails = [
            'program' => $yearlySoeExpenditureProgram,
            'institute' => $yearlySoeExpenditureInstitute,
        ];
        return response()->json(['yearlySoeDetails' => $yearlySoeDetails], 200);
    }
    
    /**
     * expenditureBarChartPieFilter
     *
     * @param  mixed $request
     * @return void
     */
    public function expenditureBarChartPieFilter(Request $request)
    {
        $query = SOEUCForm::with('states', 'SoeUcFormCalculation');

        if ($request->has('financial_year') && $request->financial_year) {
            $query->where('financial_year', $request->financial_year);
        }
        if ($request->has('program_wise_yearly') && $request->program_wise_yearly) {
            $query->where('program_id', $request->program_wise_yearly);
        }
        
        $expenditureSelected = $request->has('expenditure_unspent') && $request->expenditure_unspent === 'expenditure';
        $unspentSelected = $request->has('expenditure_unspent') && $request->expenditure_unspent === 'unspent';
        $filterSelected = $expenditureSelected || $unspentSelected;
        
        $institutePrograms = InstituteProgram::get();
        $programUserDetails = [];
        
        foreach ($institutePrograms as $instituteProgram) {
            $programNames = $instituteProgram->name;
            $finalArray = [];
        
            // Clone the original query instance to avoid modifying it directly
            $programQuery = clone $query;
            $programQuery->where('program_id', $instituteProgram->id);
        
            $dataForms = $programQuery->get();
        
            foreach ($dataForms as $dataForm) {
                $grandTotalActualExpenditure = 0;
                $grandTotalUnspentBalance = 0;
                // Head Expenditure
                $manPowerwithHumanResource = 0;
                $meetingsTrainingResearch = 0;
                $labStrengtheningKitsRegents = 0;
                $iec = 0;
                $officeExpensesTravel = 0;
                $labStrengthening = 0;
                $otherActivities = 0;
        
                foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                    if ($formCalculate->head == 'Grand Total') {
                        $grandTotalActualExpenditure += (int)$formCalculate->actual_expenditure;
                        $grandTotalUnspentBalance += (int)$formCalculate->unspent_balance_31st;
                    }
                    // Head Expenditure
                    if ($formCalculate->head == 'Man Power with Human Resource') {
                        $manPowerwithHumanResource += (int)$formCalculate->actual_expenditure;
                    }
                    if ($formCalculate->head == 'Meetings, Training Research') {
                        $meetingsTrainingResearch += (int)$formCalculate->actual_expenditure;
                    }
                    if ($formCalculate->head == 'Lab Strengthening Kits, Regents & Consumable (Recurring)') {
                        $labStrengtheningKitsRegents += (int)$formCalculate->actual_expenditure;
                    }
                    if ($formCalculate->head == 'IEC') {
                        $iec += (int)$formCalculate->actual_expenditure;
                    }
                    if ($formCalculate->head == 'Office Expenses & Travel') {
                        $officeExpensesTravel += (int)$formCalculate->actual_expenditure;
                    }
                    if ($formCalculate->head == 'Lab Strengthening (Non Recurring)') {
                        $labStrengthening += (int)$formCalculate->actual_expenditure;
                    }
                    if ($formCalculate->head == 'Other Activities') {
                        $otherActivities += (int)$formCalculate->actual_expenditure;
                    }
                }
        
                $finalArray[] = [
                    'actual_expenditure_total' => $filterSelected ? ($expenditureSelected ? $grandTotalActualExpenditure : $grandTotalActualExpenditure) : $grandTotalActualExpenditure,
                    'unspent_balance_31st_total' => $filterSelected ? ($unspentSelected ? $grandTotalUnspentBalance : $grandTotalUnspentBalance) : $grandTotalUnspentBalance,
                    // Head Expenditure
                    'man_power_with_human_resource' => $manPowerwithHumanResource,
                    'meetings_training_research' => $meetingsTrainingResearch,
                    'lab_strengthening_kits_regents' => $labStrengtheningKitsRegents,
                    'iec' => $iec,
                    'office_expenses_travel' => $officeExpensesTravel,
                    'lab_strengthening' => $labStrengthening,
                    'other_activities' => $otherActivities,
                ];
            }
        
            $totalArray = [
                'actualExpenditureTotal' => 0,
                'unspentBalance31stTotal' => 0,
            ];
            // Head Expenditure Total
            $totalHeads = [
                'Man Power with Human Resource' => 0,
                'Meetings, Training Research' => 0,
                'Lab Strengthening Kits, Regents & Consumable (Recurring)' => 0,
                'IEC' => 0,
                'Office Expenses & Travel' => 0,
                'Lab Strengthening (Non Recurring)' => 0,
                'Other Activities' => 0,
            ];
        
            foreach ($finalArray as $entry) {
                $totalArray['actualExpenditureTotal'] += $entry['actual_expenditure_total'];
                $totalArray['unspentBalance31stTotal'] += $entry['unspent_balance_31st_total'];
                // Head Expenditure
                $totalHeads['Man Power with Human Resource'] += $entry['man_power_with_human_resource'];
                $totalHeads['Meetings, Training Research'] += $entry['meetings_training_research'];
                $totalHeads['Lab Strengthening Kits, Regents & Consumable (Recurring)'] += $entry['lab_strengthening_kits_regents'];
                $totalHeads['IEC'] += $entry['iec'];
                $totalHeads['Office Expenses & Travel'] += $entry['office_expenses_travel'];
                $totalHeads['Lab Strengthening (Non Recurring)'] += $entry['lab_strengthening'];
                $totalHeads['Other Activities'] += $entry['other_activities'];
            }
            // return $totalArray;
            // Convert $totalHeads to the desired format
            $headExpenditureFormatted = [];
            foreach ($totalHeads as $head => $amount) {
                $headExpenditureFormatted[] = [$head, $amount];
            }
            $programUserDetails[] = [
                'program_name' => $programNames . '-' . $instituteProgram->code,
                'totalArray' => $totalArray,
                'totalHeads' =>  $headExpenditureFormatted,
            ];
        }
        
        return response()->json(['programUserDetails' => $programUserDetails], 200);        
    }
    
    /**
     * allFormMapFilter
     *
     * @param  mixed $request
     * @return void
     */
    public function allFormMapFilter(Request $request)
    {
        $applyFilters = function ($query, $request) {
            if ($request->has('program_wise') && $request->program_wise) {
                $query->where('program_id', $request->program_wise);
            }
            if ($request->has('institute_wise') && $request->institute_wise) {
                $query->where('institute_id', $request->institute_wise);
            }
            if ($request->has('month') && $request->month) {
                $query->where('month', $request->month);
            }
            if ($request->has('financial_year') && $request->financial_year) {
                $query->where('financial_year', $request->financial_year);
            }
        };

        // Apply filters to SOEUCForm model
        $soeucFormsQuery = SOEUCForm::with('SoeUcFormCalculation');
        $applyFilters($soeucFormsQuery, $request);
        $soeucForms = $soeucFormsQuery->get();
        
        // Apply filters to SOEUCUploadForm model
        $soeucUploadFormsQuery = SOEUCUploadForm::query();
        $applyFilters($soeucUploadFormsQuery, $request);
        $soeucUploadForms = $soeucUploadFormsQuery->count();
        $aggregatedData = [];
        foreach ($soeucForms as $dataForm) {
            if (!isset($aggregatedData[$dataForm->state_id])) {
                $aggregatedData[$dataForm->state_id] = [
                    'gia_received_total' => 0,
                    'committed_liabilities_total' => 0,
                    'total_balance_total' => 0,
                    'actual_expenditure_total' => 0,
                    'unspent_balance_1st_total' => 0,
                    'unspent_balance_last_total' => 0,
                    'unspent_balance_31st_total' => 0,
                ];
            }
            foreach ($dataForm->SoeUcFormCalculation as $formCalculate) {
                if ($formCalculate->head == 'Grand Total') {
                    $aggregatedData[$dataForm->state_id]['gia_received_total'] += (int)$formCalculate->gia_received;
                    $aggregatedData[$dataForm->state_id]['committed_liabilities_total'] += (int)$formCalculate->committed_liabilities;
                    $aggregatedData[$dataForm->state_id]['total_balance_total'] += (int)$formCalculate->total_balance;
                    $aggregatedData[$dataForm->state_id]['actual_expenditure_total'] += (int)$formCalculate->actual_expenditure;
                    $aggregatedData[$dataForm->state_id]['unspent_balance_1st_total'] += (int)$formCalculate->unspent_balance_1st;
                    $aggregatedData[$dataForm->state_id]['unspent_balance_last_total'] += (int)$formCalculate->unspent_balance_last;
                    $aggregatedData[$dataForm->state_id]['unspent_balance_31st_total'] += (int)$formCalculate->unspent_balance_31st;
                }
            }
        }
        $totalArray = [
            'giaReceivedTotal' => 0,
            'committedLiabilitiesTotal' => 0,
            'totalBalanceTotal' => 0,
            'actualExpenditureTotal' => 0,
            'unspentBalance1stTotal' => 0,
            'unspentBalanceLastTotal' => 0,
            'unspentBalance31stTotal' => 0,
            'soeucUploadForms' => $soeucUploadForms ?? '0',
        ];

        foreach ($aggregatedData as $entry) {
            $totalArray['giaReceivedTotal'] += $entry['gia_received_total'];
            $totalArray['committedLiabilitiesTotal'] += $entry['committed_liabilities_total'];
            $totalArray['totalBalanceTotal'] += $entry['total_balance_total'];
            $totalArray['actualExpenditureTotal'] += $entry['actual_expenditure_total'];
            $totalArray['unspentBalance1stTotal'] += $entry['unspent_balance_1st_total'];
            $totalArray['unspentBalanceLastTotal'] += $entry['unspent_balance_last_total'];
            $totalArray['unspentBalance31stTotal'] += $entry['unspent_balance_31st_total'];
        }

        // Initialize array for state details
        $UcFormstateDetails = [];
        $states = State::all();
        foreach ($states as $state) {
            $UcUploadMap = clone $soeucUploadFormsQuery;
            $UcFormCount = $UcUploadMap->whereHas('users', function ($query) use ($state) {
                $query->where('state_id', $state->id);
            })->count();

            $stateInstituteCount = User::where('state_id', $state->id)
                ->whereNotNull('institute_id')
                ->pluck('institute_id')
                ->map(function ($instituteIds) {
                    return count(explode(',', $instituteIds));
                })->sum();

            
            $soeucFormData = isset($aggregatedData[$state->id]) ? $aggregatedData[$state->id] : [
                'gia_received_total' => 0,
                'committed_liabilities_total' => 0,
                'total_balance_total' => 0,
                'actual_expenditure_total' => 0,
                'unspent_balance_1st_total' => 0,
                'unspent_balance_last_total' => 0,
                'unspent_balance_31st_total' => 0,
            ];

            $UcFormstateDetails[] = [
                'hc-key' => $state->name,
                'value' => $UcFormCount,
                'state_institute' =>$stateInstituteCount,
                'gia_received_total' => $soeucFormData['gia_received_total'],
                'committed_liabilities_total' => $soeucFormData['committed_liabilities_total'],
                'total_balance_total' => $soeucFormData['total_balance_total'],
                'actual_expenditure_total' => $soeucFormData['actual_expenditure_total'],
                'unspent_balance_1st_total' => $soeucFormData['unspent_balance_1st_total'],
                'unspent_balance_last_total' => $soeucFormData['unspent_balance_last_total'],
                'unspent_balance_31st_total' => $soeucFormData['unspent_balance_31st_total'],
            ];            
        }
        return response()->json(['totalArray' => $totalArray, 'UcFormstateDetails' => $UcFormstateDetails], 200);
    }



    
    /**
     * nationalFilterUcFormDdashboard
     *
     * @return void
     */
    public function nationalFilterUcFormDashboard(Request $request)
    {
        $query = SOEUCUploadForm::query();
        
        if ($request->has('nationalUcformFy') && $request->nationalUcformFy) {
            $financialYear = $request->nationalUcformFy;
        } else {
            $financialYear = Carbon::now()->year;
        }        
        $query->where('financial_year', $financialYear);

        if ($request->has('nationalProgramUcForm') && $request->nationalProgramUcForm) {
            $query->where('program_id', $request->nationalProgramUcForm);
        }
        if ($request->has('nationalInstituteName') && $request->nationalInstituteName) {
            $query->where('institute_id', $request->nationalInstituteName);
        }
        $UcUploadDetails = [];

        for ($month = 1; $month <= 12; $month++) {
            $queryForMonth = clone $query;
            // Total count for the month
            $total = $queryForMonth->whereMonth('date', $month)->count();
            // Approved count for the month
            $queryForApproved = clone $queryForMonth;
            $approved = $queryForApproved->where('status', 1)->count();
            // Not approved count for the month
            $queryForNotApproved = clone $queryForMonth;
            $notApproved = $queryForNotApproved->where('status', 2)->count();

            $UcUploadDetails[$month] = [
                'total' => $total ?: 0,
                'approved' => $approved ?: 0,
                'not_approved' => $notApproved ?: 0,
            ];
        }

        // Initialize array for state details
        $UcFormstateDetails = [];
        $states = State::all();
        foreach ($states as $state) {
            $UcUploadMap = clone $query;
            $UcFormCount = $UcUploadMap->whereHas('users', function ($query) use ($state) {
                $query->where('state_id', $state->id);
            })->count();
            $UcFormstateDetails[] = [
                'hc-key' => $state->name,
                'value' => $UcFormCount,
            ];
        }
        return response()->json(['UcUploadDetails' => $UcUploadDetails, 'UcFormstateDetails' => $UcFormstateDetails], 200);
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
        $institutes = Institute::whereIn('program_id', [$request->program_id])->get();
        if (!$institutes->isEmpty()) {
            $output .='<option value="">Select Institute</option>';
            foreach ($institutes as $institute) {
                $count++;
                $output .='<option value="'.$institute->id.'">' . $institute->name . '</option>';
            }
        } else {
            $output .='<option value="">Select Institute</option>';
        }
        return $output;
    }

    public function getUserProfile(Request $request, $id)
    {
        $user = User::with('state','city')->where('id', Auth::id())->first();
        $institutes = Institute::get();
        $institutePrograms = InstituteProgram::get();
        return view('auth.profile',compact('user','institutes','institutePrograms'));
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
        return view('auth.password-update', compact('id'));
    }
        
    /**
     *  @changePassword
     *
     * @return void
     */
    public function changePassword(Request $request, $id = '') {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8',
        ]);

        $user = User::find($id);
        if (!Hash::check($request->oldpassword, $user->password)) {
            Toastr::error('Old password is incorrect)', 'Wrong');
            return redirect()->back();
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();
        Toastr::success('Password updated successfully)', 'Success');
        return redirect()->back();
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
        $institutes = Institute::get();
        $sorUcLists = SOEUCUploadForm::with('users')->get();
        return view('national-user.report',compact('programs','sorUcLists','institutes'));
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
        if(!empty($request->institute_id)){
            $query->where('institute_id', $request->institute_id);
        }
        if (!empty($request->startdate) && !empty($request->enddate)) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }
        if ($request->modulename == '2') {
            $sorUcLists = $query->get();
            $programs = InstituteProgram::get();
            $institutes = Institute::get();
            return view('national-user.report',compact('programs','sorUcLists','institutes'));
        }
        $arrays = [$query->get()->toArray()];
        return Excel::download(new InstituteUserExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }
    
    /**
     * dashboardReport
     *
     * @return void
     */
    public function dashboardReport(Request $request)
    {
        $fileName = '';
        $arrays = [];
        switch ($request->modulename) {
            case '1':
                $fileName = 'SOEUForm';
                $query = SOEUCForm::with('states','instituteProgram','SoeUcFormCalculation');
                break;
            case '2':
                $fileName = 'UCUpload';
                $query = SOEUCUploadForm::with('program');
                break;
            default:
                return response()->json(['error' => 'Invalid module name'], 400);
        }
        if(!empty($request->program_id)){
            $query->where('program_id', $request->program_id);
        }
        if(!empty($request->financial_year)){
            $query->where('financial_year', $request->financial_year);
        }        
        if(!empty($request->month)){
            $query->where('month', $request->month);
        }
        if ($request->modulename == '2') {
            $sorUcLists = $query->get();
            $output = "";
            $count = 0;
            if ($sorUcLists) {
                foreach ($sorUcLists as $sorUcList) {
                    $count++;
                    $output .= '<tr>
                                    <td>' . $count . '</td>
                                    <td>' . htmlspecialchars($sorUcList->qtr_uc) . '</td>
                                    <td>' . htmlspecialchars($sorUcList->program->name) . '</td>
                                    <td>' . htmlspecialchars($sorUcList->financial_year) . '</td>
                                    <td>' . htmlspecialchars($sorUcList->month) . '</td>
                                    <td>';
                    if ($sorUcList->file) {
                        $output .= '<a class="nhm-file" href="' . asset('images/uploads/soeucupload/' . $sorUcList->file) . '" download>
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                                        <span>Download (' . htmlspecialchars($sorUcList->file_size) . ')</span>
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </a>';
                    } else {
                        $output .= 'N/A';
                    }
                    $output .= '</td>
                                    <td>' . date('d-m-Y', strtotime($sorUcList->date)) . '</td>
                                    <td>' . htmlspecialchars($sorUcList->status == '1' ? 'Approved' : 'Returened') . '</td>
                                    <td>' . ($sorUcList->reason ?? 'N/A') . '</td>
                    </tr>';
                }
            } else {
                $output .= 'Oops, something went wrong';
            }
            return $output;
        }
        if(!empty($request->national_institute_name)){
            $query->where('institute_id', $request->national_institute_name);
        }
        $arrays = [$query->get()->toArray()];
        
        return Excel::download(new InstituteUserExport($arrays), Carbon::now()->format('d-m-Y') . '-' . $fileName . '.xlsx');
    }

}
