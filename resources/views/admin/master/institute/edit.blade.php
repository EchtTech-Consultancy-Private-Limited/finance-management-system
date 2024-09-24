@extends('layout.main')
@section('title')
@parent
| {{__('institute')}}
@endsection
@section('pageTitle')
{{ __('institute') }}
@endsection
@section('breadcrumbs')
{{ __('institute') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Edit Institute Form </h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.institutes.update', $institute->id) }}">
                    @csrf
                    <div class="row mb-3">                        
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Name<span class="text-danger">*</span></label>
                            <select id="program" class="form-control" name="program_id">
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{  $institute->program->id == $program->id ? 'selected' : '' }}>{{ $program->name }} - {{ $program->code }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Institute Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $institute->name) }}" class="form-control" placeholder="Enter Name">
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
@endsection