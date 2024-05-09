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
        if($data['segment'] == 'national-user'){
            $file = 'national-user.dashboard';
        }else{
            $file = 'institute-user.dashboard';
        }
        
        return view($file);
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
