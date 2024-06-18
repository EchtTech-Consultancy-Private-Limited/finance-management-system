@extends('layout.main')
@section('title')
    @parent
    | {{__('Create')}}
@endsection
@section('pageTitle')
 {{ __('Create') }}
@endsection
@section('breadcrumbs')
 {{ __('Create') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Create UC</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('institute-user.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Year of UC<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="yearofuc">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                    @php
                                        $selected = old('yearofuc') == ($i . ' - ' . ($i+1)) ? 'selected' : '';
                                    @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>                            
                            @error('yearofuc')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Month<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="month">
                                <option value="">Select Month</option>
                                @foreach ($months as $key => $month)
                                    @php
                                        $selected = old('month') == $month ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $month }}" {{ $selected }}>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('month')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">UC File Upload<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="ucfileupload" id="inputAddress2">
                            @error('ucfileupload')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">UC Uploaded Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="ucuploaddate" value="{{ old('ucuploaddate') }}" id="inputAddress2" placeholder="">
                            @error('ucuploaddate')
                                <span class="text-danger error">{{ $message }}</span>
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