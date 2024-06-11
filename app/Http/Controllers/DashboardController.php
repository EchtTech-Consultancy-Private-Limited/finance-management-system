<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\SOEUCForm;
use App\Models\SOEUCFormCalculatin;
use App\Models\SOEUCUploadForm;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\InstituteProgram;

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
        $institutePrograms = InstituteProgram::get();
        $dataForms = SOEUCForm::with('states', 'SoeUcFormCalculation')
            ->where('financial_year', date('Y'))
            ->get();

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
        return view($file, compact('totalArray','sorUcLists','institutePrograms'));
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
        foreach($institutePrograms as $key => $instituteProgram){
            $programCount = SOEUCForm::where('institute_program_id', $instituteProgram->id)->count();
            $programPercentage = $programCount / $numberCount * 100;
            $programNames[] = $instituteProgram->name . '-' . $instituteProgram->code. '-' . $instituteProgram->count;
            $programPercentages[] = $programPercentage;
        }
        $programDetails[] = [
                'program_names' => $programNames,
                'program_percentages' => $programPercentages,
            ];
        // End number of percentage program wise

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
        return response()->json(['totalArray'=>$totalArray,'programDetails'=>$programDetails], 200);
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

    public function updateProfile(Request $request){
        $request->validate(
            [
                'oldpassword'=> 'required|string',
                'newpassword'=> 'required|string',
                
            ],[
              'oldpassword.required' => 'The old password field is required.',
              'newpassword.required' => 'The New Password field is required.',
          ]);
       // DB::beginTransaction();
        // try {
        //   $result = DB::table('users')->where('id',Auth::user()->id)->update([
        //                         'name' => $request->fname,
        //                         'password' => $request->mname??'',
        //                     ]);
        //     if($result){
        //         Toastr::success('Has been update successfully :)','Success');
        //         return redirect()->back();
        //     }
        // } catch(\Exception $e) {
        //    // DB::rollback();
        //     return redirect()->back();
        // }
        // Toastr::success('Has been update successfully :)','Success');
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
