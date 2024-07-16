<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\InstituteProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Brian2694\Toastr\Facades\Toastr;

class ProgramController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $programs = InstituteProgram::get();   
        return view('admin.master.program.index', compact('programs'));
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
            'name' => 'required',
        ]);
        try {            
            DB::beginTransaction();
            InstituteProgram::create(
                [
                    'name' => $request->name,
                    'code' => $request->code,
                    'count'   => $request->count,
                ]
            );
            DB::commit();
            Toastr::success('Record has been Add successfully :)', 'Success');
            return redirect()->route('admin.programs.index');
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
        $program = InstituteProgram::where('id', $id)->first();
        return view('admin.master.program.edit', compact('program'));
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
            InstituteProgram::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'code' => $request->code,
                    'count'   => $request->count,
                ]
            );
            DB::commit();
            Toastr::success('Record has been Update successfully :)', 'Success');
            return redirect()->route('admin.programs.index');
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
            InstituteProgram::where('id', $id)->delete();
            DB::commit();
            Toastr::success('Record has been Delete successfully :)', 'Success');
            return redirect()->route('admin.programs.index');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
