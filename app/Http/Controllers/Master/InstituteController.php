<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\InstituteProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Brian2694\Toastr\Facades\Toastr;

class InstituteController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $institutes = Institute::with('program')->get();
        $programs = InstituteProgram::get();
        return view('admin.master.institute.index', compact('institutes','programs'));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'name' => 'required',
        ]);
        try {            
            DB::beginTransaction();
            Institute::create(
                [
                    'program_id' => $request->program_id,
                    'name' => $request->name,
                ]
            );
            DB::commit();
            Toastr::success('Record has been Add successfully :)', 'Success');
            return redirect()->route('admin.institutes.index');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id = '')
    {
        $institute = Institute::with('program')->where('id', $id)->first();
        $programs = InstituteProgram::get();
        return view('admin.master.institute.edit', compact('institute','programs'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {            
            DB::beginTransaction();
            Institute::where('id', $id)->update(
                [
                    'program_id' => $request->program_id,
                    'name' => $request->name,
                ]
            );
            DB::commit();
            Toastr::success('Record has been Update successfully :)', 'Success');
            return redirect()->route('admin.institutes.index');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id = '')
    {
        try {            
            DB::beginTransaction();
            Institute::where('id', $id)->delete();
            DB::commit();
            Toastr::success('Record has been Delete successfully :)', 'Success');
            return redirect()->route('admin.institutes.index');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
