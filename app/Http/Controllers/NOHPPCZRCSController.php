<?php

namespace App\Http\Controllers;

use App\Models\NOHPPCZRCS;
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
        $institutes = Institute::get();
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
        $UcUploadCount = SOEUCUploadForm::count();
        $UcUploadApproved = SOEUCUploadForm::where('status', '1')->count();
        $UcUploadNotApproved = SOEUCUploadForm::where('status', '2')->count();
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

}