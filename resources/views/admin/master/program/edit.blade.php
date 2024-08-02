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
                    <h3 class="m-0">Program Form Edit</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.programs.update', $program->id) }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $program->name) }}" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Code</label>
                            <input type="text" name="code" value="{{ old('code', $program->code) }}" class="form-control" placeholder="Enter Code">
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Program Count</label>
                            <input type="text" name="count" value="{{ old('count', $program->count) }}" class="form-control" oninput="validateInput(this)" maxlength="5" placeholder="Enter Count">
                            @error('count')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection