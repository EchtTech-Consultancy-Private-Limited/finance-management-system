<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\CMSModels\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;

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
        return view('national-user.dashboard');
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
                'fname'=> 'required|string',
                //'mname'=> 'required|string',
                //'lname'=> 'required|string',
                'dob'=> 'required',
                'gender'=> 'required|string',
                'email' => ['required','string','email','max:50','regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'mobile'=> 'required',
                'designation'=> 'required|string',
                'institute_name'=> 'required',
                
            ],[
              'fname.required' => 'The first name field is required.',
              'email.email' => 'The email must be a email.',
              'dob.required' => 'The dob is required.',
              'gender.required' => 'The gender is required.',
              'mobile.required' => 'The mobile field is required.',
              'designation.required' => 'The designation field is required',
              'institute_name.required' => 'The institute name is required',
          ]);
       // DB::beginTransaction();
        try {
          $result = DB::table('users')->where('id',Auth::user()->id)->update([
                                'name' => $request->fname,
                                'mname' => $request->mname??'',
                                'lname' => $request->lname??'',
                                'email' => $request->email,
                                'dob' => $request->dob,
                                'gender' => $request->gender,
                                'mobile' => $request->mobile,
                                'landline' => $request->landline??'',
                                'designation' => $request->designation,
                                'institute_name' => $request->institute_name,
                            ]);
            if($result){
                Toastr::success('Has been update successfully :)','Success');
                return redirect()->back();
            }
        } catch(\Exception $e) {
           // DB::rollback();
            return redirect()->back();
        }
        Toastr::success('Has been update successfully :)','Success');
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
