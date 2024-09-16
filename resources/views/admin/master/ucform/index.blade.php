@extends('layout.main')
@section('title')
@parent
| {{__('Utilization Certificate (UC)')}}
@endsection
@section('pageTitle')
{{ __('Utilization Certificate (UC)') }}
@endsection
@section('breadcrumbs')
{{ __('Utilization Certificate (UC)') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Utilization Certificate (UC) Form</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.ucuploads.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Status<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="">Select status</option>
                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>In-Active</option>
                            </select>                            
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">UC File<span class="text-danger">*</span></label>
                            <input type="file" name="file" value="{{ old('file') }}" class="form-control">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Utilization Certificate (UC) List</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table mb_30">
                    <table id="datatable" class="table table-striped table-bordered facility-mapping-list datatable" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                        @if(isset($ucForms) && count($ucForms)>0)
                            @foreach($ucForms as $key=>$ucForm)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ @$ucForm->title }}</td>
                                    <td>@php if($ucForm->status ==1){ echo 'Active'; }else{ echo 'In-Active'; } @endphp</td>
                                    <td>
                                        @if ($ucForm->file)
                                        <a class="nhm-file"
                                            href="{{ asset('public/images/uploads/ucform/'.$ucForm->file) }}" download>
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            <span>Download</span>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                        <span style="font-size: 12px; margin-left: 5px;color: #000; font: weight 600px;" tabindex="0">(205.06KB)</span>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ucuploads.edit',$ucForm->id) }}"
                                            class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="{{ route('admin.ucuploads.delete',$ucForm->id) }}"
                                            class="action_btn"
                                            onclick="return confirm('Are you sure you want to delete this record?');">
                                            <i class="fas fa-trash text-danger"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection