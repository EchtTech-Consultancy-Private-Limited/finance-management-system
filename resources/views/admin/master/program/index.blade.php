@extends('layout.main')
@section('title')
@parent
| {{__('Program')}}
@endsection
@section('pageTitle')
{{ __('Program') }}
@endsection
@section('breadcrumbs')
{{ __('Program') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Program Form</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.programs.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Code</label>
                            <input type="text" name="code" value="{{ old('code', $user->code ?? '') }}" class="form-control" placeholder="Enter Code">
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Count</label>
                            <input type="text" name="count" value="{{ old('count', $user->count ?? '') }}" class="form-control" oninput="validateInput(this)" maxlength="5" placeholder="Enter Count">
                            @error('count')
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
            <div class="QA_section table-responsive">
                <div class="QA_table mb_30">
                    <table id="datatable" class=" table-responsive table table-striped table-bordered facility-mapping-list datatable" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Program Name</th>
                            <th scope="col">Program Code</th>
                            <th scope="col">Program Count</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                        @if(isset($programs) && count($programs)>0)
                            @foreach($programs as $key=>$program)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ @$program->name ?? 'N/A'}}</td>
                                    <td>{{ @$program->code ?? 'N/A' }}</td>
                                    <td>{{ @$program->count ?? 'N/A'}}</td>
                                    <td>
                                        <a href="{{ route('admin.programs.edit',$program->id) }}"
                                            class="action_btn mr_10" title="edit"> <i class="far fa-edit"></i> </a>
                                        <a href="{{ route('admin.programs.delete',$program->id) }}"
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