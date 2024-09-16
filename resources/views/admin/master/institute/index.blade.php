@extends('layout.main')
@section('title')
@parent
| {{__('Institute')}}
@endsection
@section('pageTitle')
{{ __('Institute') }}
@endsection
@section('breadcrumbs')
{{ __('Institute') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Institute Form</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.institutes.store') }}">
                    @csrf
                    <div class="row mb-3">                        
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Name <span class="text-danger">*</span></label>
                            <select id="program" class="form-control" name="program_id">
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{  request('program_id') == $program->id ? 'selected' : '' }}>{{ $program->name }} - {{ $program->code }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Institute Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name">
                            @error('name')
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
                    <h3 class="m-0">Facility Mapping List</h3>
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
                            <th scope="col">Program Name</th>
                            <th scope="col">Program Code</th>
                            <th scope="col">Institute Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                        @if(isset($institutes) && count($institutes)>0)
                            @foreach($institutes as $key=>$institute)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ @$institute->program->name }}</td>
                                    <td>{{ @$institute->program->code }}</td>
                                    <td>{{ @$institute->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.institutes.edit',$institute->id) }}"
                                            class="action_btn mr_10" title="edit"> <i class="far fa-edit"></i> </a>
                                        <a href="{{ route('admin.institutes.delete',$institute->id) }}"
                                            class="action_btn"
                                            onclick="return confirm('Are you sure you want to delete this record?');" title="delete">
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