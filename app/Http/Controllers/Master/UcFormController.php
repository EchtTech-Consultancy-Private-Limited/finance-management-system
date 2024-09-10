<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\UcForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use App\Services\FileSizeServices;
use Illuminate\Support\Facades\Storage;

class UcFormController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $ucForms = UcForm::orderBy('id', 'DESC')->get();
        return view('admin.master.ucform.index',compact('ucForms'));
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
            'title' => 'required',
            'status' => 'required',
            'file' => 'required|file|max:5120|mimes:doc,docx,pdf',
        ]);        
        try {            
            DB::beginTransaction();
            $ucFile = $request->file('file');
            if ($ucFile) {
                $ucFileSize =  FileSizeServices::getFileSize($ucFile->getSize());
                $ucFileName = $ucFile->getClientOriginalName();
                $ucFile->move(public_path('public/images/uploads/ucform'), $ucFileName);
            }
            UcForm::create([
                'title' => $request->title,
                'status' => $request->status,
                'file'   => $ucFileName,
            ]);
            DB::commit();
            Toastr::success('Record has been Add successfully :)', 'Success');
            return redirect()->route('admin.ucuploads.index');
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
        $ucForm = UcForm::where('id', $id)->first();
        return view('admin.master.ucform.edit',compact('ucForm'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'file' => 'nullable|file|max:5120',
        ]);

        try {
            DB::beginTransaction();

            // Find the existing record
            $ucForm = UcForm::findOrFail($id);

            $ucFileName = $ucForm->file; 
            $ucFile = $request->file('file');
            
            if ($ucFile) {
                $ucFileName = $ucFile->getClientOriginalName();
                $ucFile->move(public_path('public/images/uploads/ucform'), $ucFileName);
            }

            // Update the record
            $ucForm->update([
                'title' => $request->title,
                'status' => $request->status,
                'file' => $ucFileName, // Update with new or old file name
            ]);

            DB::commit();
            Toastr::success('Record has been updated successfully :)', 'Success');
            return redirect()->route('admin.ucuploads.index');
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
            UcForm::where('id', $id)->delete();
            DB::commit();
            Toastr::success('Record has been Delete successfully :)', 'Success');
            return redirect()->route('admin.ucuploads.index');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

}
