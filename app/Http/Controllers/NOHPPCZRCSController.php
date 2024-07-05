<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\SOEUCForm;
use Carbon\Carbon;
use App\Models\SOEUCUploadForm;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\InstituteProgram;
use Exception;
use App\Exports\InstituteUserExport;
use App\Models\Institute;
use App\Models\State;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;

class NOHPPCZRCSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $months = [];
        $currentYear = date('Y');
        for ($m = 0; $m < 12; $m++) {
            $month = new DateTime("$currentYear-04-01");
            $month->modify("+$m months");
            $months[] = $month->format('F');
        }
        $currentFY = date('Y').' - '.date('Y')+1;
        $institutePrograms = InstituteProgram::get();
        $institutes = Institute::where('program_id', 1)->get();
        $sorUcLists = SOEUCUploadForm::with('users')->where('program_id', 1)->orderBy('id','desc')->get();
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', $currentFY)
            ->where('program_id', 1)
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
        return view('national-user.NOHPPCZ-RCs-dashboard', compact('totalArray','sorUcLists','institutePrograms','institutes','months'));
    }
    
    /**
     * nohppczrcsNationalFilterDdashboard
     *
     * @param  mixed $request
     * @return void
     */
    public function nohppczrcsNationalFilterDdashboard(Request $request)
    {
        $query = SOEUCForm::with('states', 'SoeUcFormCalculation');
        if ($request->has('financial_year') && $request->financial_year) {
            $query->where('financial_year', $request->financial_year);
        }
        if ($request->has('month') && $request->month) {
            $query->where('month', $request->month);
        }
        $query->where('program_id', 1);
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

        // UC Received or not map code
        $UcUploadCount = SOEUCUploadForm::where('program_id', 1)->count();
        $UcUploadApproved = SOEUCUploadForm::where(['status' => '1', 'program_id' => 1])->count();
        $UcUploadNotApproved = SOEUCUploadForm::where(['status' => '2', 'program_id' => 1])->count();
        $UcUploadDetails = [
            'UcApprovedPercentage' => ($UcUploadCount > 0) ? ($UcUploadApproved / $UcUploadCount) * 100 : 0,
            'UcNotApprovedPercentage' => ($UcUploadCount > 0) ? ($UcUploadNotApproved / $UcUploadCount) * 100 : 0,
            'UcApprovedNumber' => $UcUploadApproved,
            'UcNotApprovedNumber' => $UcUploadNotApproved,
            'TotalUcForm' => $UcUploadCount,
        ];
        // End UC Received or not map code

        // number of percentage Head wise specific program
        $instituteProgram = InstituteProgram::where('id', 1)->first();
        $programNames = $instituteProgram->name;
        $finalArray = [];
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
                'actual_expenditure_total' => $grandTotalActualExpenditure,
                'unspent_balance_31st_total' => $grandTotalUnspentBalance,
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
            $totalHeads['Man Power with Human Resource'] += $entry['man_power_with_human_resource'];
            $totalHeads['Meetings, Training Research'] += $entry['meetings_training_research'];
            $totalHeads['Lab Strengthening Kits, Regents & Consumable (Recurring)'] += $entry['lab_strengthening_kits_regents'];
            $totalHeads['IEC'] += $entry['iec'];
            $totalHeads['Office Expenses & Travel'] += $entry['office_expenses_travel'];
            $totalHeads['Lab Strengthening (Non Recurring)'] += $entry['lab_strengthening'];
            $totalHeads['Other Activities'] += $entry['other_activities'];
        }

        // Convert $totalHeads to the desired format
        $headExpenditureFormatted = [];
        foreach ($totalHeads as $head => $amount) {
            $headExpenditureFormatted[] = [
                'name' => $head,
                'y' => $amount
            ];
        }
        
        $programHeadDetails = [
            'head_name' => $programNames . '-' . $instituteProgram->code,
            'totalHeads' => $headExpenditureFormatted,
            'total_program_expenditure' => $grandTotalActualExpenditure ?? 0,
        ];
        
        // End number of percentage program wise
        return response()->json(['totalArray' => $totalArray, 'UcUploadDetails' => $UcUploadDetails, 'programHeadDetails' => $programHeadDetails], 200);
    }
    
    /**
     * nohppczrcsNationalFilterUcFormDashboard
     *
     * @param  mixed $request
     * @return void
     */
    public function nohppczrcsNationalFilterUcFormDashboard(Request $request)
    {
        $query = SOEUCUploadForm::query();        
        if ($request->has('nohppczrcsNationalUcformFy') && $request->nohppczrcsNationalUcformFy) {
            $query->where('financial_year', $request->nohppczrcsNationalUcformFy);
        }        
        if ($request->has('nohppczrcsNationalInstituteUcForm') && $request->nohppczrcsNationalInstituteUcForm) {
            $query->where('institute_id', $request->nohppczrcsNationalInstituteUcForm);
        }        
        $UcUploadCount = $query->count();
        $UcUploadApproved = clone $query;
        $UcUploadApprovedCount = $UcUploadApproved->where('status', 1)->count();
        $UcUploadNotApproved = clone $query;
        $UcUploadNotApprovedCount = $UcUploadNotApproved->where('status', 2)->count();
        
        $UcUploadDetails = [
            'UcApprovedPercentage' => $UcUploadCount > 0 ? ($UcUploadApprovedCount / $UcUploadCount) * 100 : 0,
            'UcNotApprovedPercentage' => $UcUploadCount > 0 ? ($UcUploadNotApprovedCount / $UcUploadCount) * 100 : 0,
            'UcApprovedNumber' => $UcUploadApprovedCount,
            'UcNotApprovedNumber' => $UcUploadNotApprovedCount,
            'TotalUcForm' => $UcUploadCount,
        ];
        return response()->json(['UcUploadDetails' => $UcUploadDetails], 200);
    }
    
    /**
     * nohppczrcsSoeExpenditureFilter
     *
     * @return void
     */
    public function nohppczrcsSoeExpenditureFilter(Request $request)
    {
        $yearlySoeExpenditureProgram = [];
        $yearlySoeExpenditureInstitute = [];       

        if ($request->filled('program_wise_month')) {
            $queryProgram = SOEUCForm::with('SoeUcFormCalculation')
                            ->where('month', $request->program_wise_month)
                            ->where('program_id', 1)
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
                            ->where('program_id', 1)
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
        
        if ($request->filled('institute_wise_nohppczrcs')) {
            $queryInstitute = SOEUCForm::with('SoeUcFormCalculation')
                            ->where('institute_id', $request->institute_wise_nohppczrcs)
                            ->where('program_id', 1)
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
                            ->where('program_id', 1)
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
            'month' => $yearlySoeExpenditureProgram,
            'institute' => $yearlySoeExpenditureInstitute,
        ];
        return response()->json(['yearlySoeDetails' => $yearlySoeDetails], 200);
    }
    
    /**
     * nohppczrcsDashboardReport
     *
     * @param  mixed $request
     * @return void
     */
    public function nohppczrcsDashboardReport(Request $request)
    {
        $fileName = '';
        $arrays = [];
        switch ($request->modulename) {
            case '1':
                $fileName = 'SOEUForm';
                $query = SOEUCForm::with('states','instituteProgram','SoeUcFormCalculation')->where('program_id', 1);
                break;
            case '2':
                $fileName = 'UCUpload';
                $query = SOEUCUploadForm::with('program')->where('program_id', 1);
                break;
            default:
                return response()->json(['error' => 'Invalid module name'], 400);
        }
        if(!empty($request->national_institute_name)){
            $query->where('institute_id', $request->national_institute_name);
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