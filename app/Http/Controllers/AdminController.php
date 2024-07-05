<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Institute;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\InstituteProgram;
use Carbon\Carbon;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $institutePrograms = InstituteProgram::get();
        $registerUser = DB::table('users')->where('user_type',1)->count();
        $login_status = DB::table('users')->where('login_status',1)->where('user_type',1)->count();        
        return view('admin.dashboard',compact('registerUser','login_status','institutePrograms'));
    }
    
    /**
     * adminFilterDdashboard
     *
     * @return void
     */
    public function adminFilterDdashboard(Request $request)
    {
        $performance = $request->input('performance', 'summery');
        $programName = $request->input('programName');
        $oneHourAgo = Carbon::now()->subHour();
        $states = State::get();
        $institutePrograms = InstituteProgram::get();
        $totalUser = DB::table('users')->where('user_type', 1)->count();
        $login_status = DB::table('users')->where('login_status', 1)->where('user_type', 1)->count();
        $programUserDetails = [];
        $stateUserDetails = [];

        $loginCountHour = DB::table('users')
            ->where('login_status', 1)
            ->where('user_type', 1)
            ->where('updated_at', '>=', $oneHourAgo)
            ->count();

        // Apply performance filter
        $dateFilter = Carbon::now();
        if ($performance) {
            switch ($performance) {
                case 'week':
                    $dateFilter->subWeek();
                    break;
                case 'month':
                    $dateFilter->subMonth();
                    break;
                case 'year':
                    $dateFilter->subYear();
                    break;
                case 'summery':
                default:
                    $dateFilter = null; // No filter for summary
                    break;
            }
        }
        foreach ($institutePrograms as $instituteProgram) {
            $query = DB::table('users')->where('user_type', 1)->where('program_id', $instituteProgram->id);
            if ($dateFilter) {
                $query->where('date', '>=', $dateFilter);
            }
            if ($programName) {
                $query->where('program_id', $programName);
            }
        
            $programUserCount = $query->count();
            $programNames = $instituteProgram->name;
            $programUserDetails[] = [
                'program_name' => $programNames . '-' . $instituteProgram->code,
                'user_count' => $programUserCount,
                'totalUser' => $totalUser,
            ];
        }

        foreach ($states as $state) {
            $query = DB::table('users')->where('user_type', 1)->where('state_id', $state->id);
            if ($dateFilter) {
                $query->where('date', '>=', $dateFilter);
            }
            $programUserCount = $query->count();
            $stateName = $state->name;

            // Add the state and user count details to the array
            $stateUserDetails[] = [
                'hc-key' => $stateName,
                'value' => $programUserCount,
            ];
        }

        // Overall active user
        $overallActiveUser = round($login_status / $totalUser * 100);

        // admin-dashboard-Months-pie
        $monthPies = User::where('user_type', 1);
        if ($dateFilter) {
            $monthPies->where('date', '>=', $dateFilter);
        }
        $monthPies = $monthPies->get();
        $monthlyRegistrations = array_fill(0, 12, 0);
        foreach ($monthPies as $user) {
            $date = $user['date'];
            $monthIndex = date('n', strtotime($date)) - 1;

            $monthlyRegistrations[$monthIndex] += 1;
        }
        $adminMonthPie = [
            'month_data' => $monthlyRegistrations,
        ];

        return response()->json([
            'programUserDetails' => $programUserDetails,
            'loginCountHour' => $loginCountHour,
            'overallActiveUser' => $overallActiveUser,
            'stateUserDetails' => $stateUserDetails,
            'adminMonthPie' => $adminMonthPie
        ], 200);
    }


    public function facilityMapping(Request $request, $id=null)
    {
        $stateList = State::get();
        $institutePrograms = InstituteProgram::get();
        $institutes = Institute::get();
        $cities = City::get();
        $users = User::with('state','city','program','institute')->whereIn('user_type',['0','1'])->get();
        return view('admin.facility-mapping',[
                'state'=>$stateList,
                'institutes'=> $institutes,
                'cities'=>$cities,
                'users'=>$users,
                'institutePrograms' =>$institutePrograms
            ]);
    }    
    /**
     * facilityMappingCreate
     *
     * @param  mixed $request
     * @return void
     */
    public function facilityMappingCreate(Request $request)
    {
        $request->validate([
            'user_name' => 'required|email',
            'program_id' => 'required',
            'institute_id' => 'required',
            'password' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'date' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);
        DB::table('users')->insert([
            'email' => $request->user_name,
            'program_id' => $request->program_id,
            'institute_id' => $request->institute_id,
            'password' => Hash::make($request->password),
            'state_id' => $request->state_id,
            'district_id' => $request->city_id,
            'date' => $request->date,
            'user_type' => $request->user_type,
            'status' => $request->status,
        ]);

        Toastr::success('Record has been created successfully :)', 'Success');
        return redirect()->back();
    }
    
    /**
     * facilityMappingEdit
     *
     * @param  mixed $id
     * @return void
     */
    public function facilityMappingEdit($id ='')
    {
        $state = State::get();
        $institutePrograms = InstituteProgram::get();
        $institutes = Institute::get();
        $cities = City::get();
        $user = User::with('state','city','program','institute')->where('id', $id)->first();
        return view('admin.edit-facility-mapping',compact('user','state','institutePrograms','institutes','cities'));
    }
    
    /**
     * facilityMappingUpdate
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function facilityMappingUpdate(Request $request, $id = '')
    {
        $request->validate([
            'user_name' => 'required|email',
            'program_id' => 'required',
            'institute_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'date' => 'required',
            'user_type' => 'required',
            'status' => 'required',
        ]);

        // Prepare the data for insertion/updation
        $data = [
            'email' => $request->user_name,
            'program_id' => $request->program_id,
            'institute_id' => $request->institute_id,
            'state_id' => $request->state_id,
            'district_id' => $request->city_id,
            'date' => $request->date,
            'user_type' => $request->user_type,
            'status' => $request->status,
        ];

        // Hash and include password only if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($id) {
            // Update existing user
            DB::table('users')->where('id', $id)->update($data);
            Toastr::success('Record has been updated successfully :)', 'Success');
        } else {
            // Insert new user
            DB::table('users')->insert($data);
            Toastr::success('Record has been update successfully :)', 'Success');
        }

        return redirect()->route('admin.facility-mapping');
    }


    public function getDistrict(Request $request, $id=null){
       
        $cities = DB::table('cities')->where('state_id',$id)->get();
        return response()->json($cities);
    }
}
