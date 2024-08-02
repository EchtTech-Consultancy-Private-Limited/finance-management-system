<?php

namespace App\Http\Controllers;

use App\Models\SOEUCForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Auth;
use DateTime;
use App\Services\SendNotificationServices;

class NationalSeoExpenseController extends Controller
{
    public $SendNotificationServices;

    function __construct()
    {
        $this->SendNotificationServices = new SendNotificationServices;
    }
    /**
     *  @index show national expanse state list
     *
     * @return void
     */
    public function index()
    {
        $soeucForms =  SOEUCForm::with('SoeUcFormCalculation','instituteProgram','institute')->get();
        return view('national-user.soe-form.index', compact('soeucForms'));
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
            $targetIndex = array_search($soeForm->month, $financialYearMonths);
            $monthsBefore = array_slice($financialYearMonths, 0, $targetIndex);
            $soeForms = SOEUCForm::with('SoeUcFormCalculation')->whereIn('month', $monthsBefore)->where('user_id', $soeForm->user_id)->get();
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
                $total_str = $previous_month_total[$head];
                if($head == "Grand Total"){
                    $grand_total = $previous_month_total[$head];
                }
                unset($months['total']);
                $months_str = implode(', ', $months);
                $final_data[$head] = [
                    $months_str,
                    $total_str,
                    $grand_total ?? '0',
                ];
            }
            DB::commit();
            return view('national-user.soe-form.view', compact('soeForm', 'financialYearMonths', 'final_data', 'previous_month_expenditure', 'previous_month_total'));
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
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
            $user =  SOEUCForm::where('id', $id)->first();
            $formType = '1'; //Soe Uc Form
            $this->SendNotificationServices->sendNotification($id, $formType, $user->user_id, $request->status);
            DB::commit();
            \Toastr::success('The status has been successfully updated','Success');
            return redirect()->route('national-user.soe-expense-index');
        } catch(Exception $e) {
            DB::rollBack();
            \Toastr::error('fail, The status has not been changed ','Error');
        }
    }
}