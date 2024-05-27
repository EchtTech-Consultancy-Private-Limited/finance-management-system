<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
            $userList = DB::table('users')->where('id',$id)->first();
        }
        $AlluserList = DB::table('users')->where('user_type','!=','admin')->get();
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

    }
    public function getDistrict(Request $request, $id=null){
        dd($id);
        $cities = DB::table('cities')->where('state_id',$id)->get();
        return response()->json($cities);
    }
}
