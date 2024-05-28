<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

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
        return view('admin.dashboard');
    }

    public function facilityMapping(Request $request, $id=null){

        if(isset($id) && $id !=''){
            $userList = DB::table('users as u')
                    ->select('u.*','s.name as state_name','ip.name as pname')
                    //->leftjoin('cities as c','u.district_id','=','c.state_id')
                    ->leftjoin('states as s','u.state_id','=','s.id')
                    ->leftjoin('institute_programs as ip','u.program_id','=','ip.id')
                    ->where('u.id',$id)
                    ->first();
        }
        $AlluserList = DB::table('users as u')
                         ->select('u.*','s.name as state_name','ip.name as pname')
                        //->leftjoin('cities as c','u.district_id','=','c.state_id')
                        ->leftjoin('states as s','u.state_id','=','s.id')
                        ->leftjoin('institute_programs as ip','u.program_id','=','ip.id')
                        ->where('u.user_type','!=','admin')
                        ->get();
        $stateList = DB::table('states')->get();
        $institutePrograms = DB::table('institute_programs')->get();

        return view('admin.facility-mapping',[
                'user'=>$userList??'',
                'allUser'=>$AlluserList,
                'state'=>$stateList,
                'institutePrograms' =>$institutePrograms
            ]);
    }
    public function facilityMappingUpdate(Request $request, $id=null){

        $request->validate(
            [
                'program_id'=> 'required',
                'state_name'=> 'required',
                'city_id'=> 'required',
                'user_type'=> 'required',
                'status'=> 'required',
            ],[
              'program_id.required' => 'Select field is required.',
              'state_name.required' => 'Select field is required.',
              'city_id.required' => 'Select is required.',
              'user_type.required' => 'Select field is required.',
              'status.required' => 'Select Status',
          ]);

          $result = DB::table('users')->where('id',$id)->update([
                    'program_id'=>$request->program_id,
                    'state_id'=>$request->state_name,
                    'district_id'=>$request->city_id,
                    'user_type'=>$request->user_type,
                    'status'=>$request->status,
                ]);
          Toastr::success('Has been update successfully :)','Success');
          return redirect()->back();
    }
    public function getDistrict(Request $request, $id=null){
       
        $cities = DB::table('cities')->where('state_id',$id)->get();
        return response()->json($cities);
    }
}
