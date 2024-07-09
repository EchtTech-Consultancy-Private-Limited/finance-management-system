@extends('layout.main')
@section('title')
    @parent
    | {{__('Profile Update')}}
@endsection
@section('pageTitle')
 {{ __('Profile Update') }}
@endsection
@section('breadcrumbs')
 {{ __('Profile Update') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">{{Auth::user()->name}} {{Auth::user()->mname}} {{Auth::user()->lname}} Profile</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('update-profile', $user->id) }}">
                @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fname" value="{{ old('fname', $user->name ?? '') }}" id="fname" placeholder="First Name ">
                            @error('fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Middle Name</label>
                            <input type="text" class="form-control" name="mname" value="{{ old('manme', $user->mname ?? '') }}" id="mname" placeholder="Middle Name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="{{ old('lname', $user->lname ?? '') }}" id="lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email ?? '') }}" id="email" placeholder="Email" readonly>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Mobile<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" maxlength="10" oninput="validateInput(this)" value="{{ old('mobile', $user->mobile ?? '') }}" id="mobile" placeholder="Mobile">
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">LandLine</label>
                            <input type="text" class="form-control" name="landline"  maxlength="10" oninput="validateInput(this)" value="{{ old('landline', $user->landline ?? '') }}" id="landline" placeholder="LandLine">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 pe-1">
                            <label class="form-label" for="inputAddress2">DOB<span class="text-danger">*</span></label>
                            <input type="date" class="form-control px-1" name="dob" value="{{ old('dob', $user->dob ?? '') }}" id="dob" placeholder="DOB">
                            @error('dob')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="inputAddress2">Gender<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="gender">
                                <option value="">Gender</option>
                                <option value="Male" @if($user->gender == 'Male') selected @else '' @endif>Male</option>
                                <option value="Female" @if($user->gender == 'Female') selected @else '' @endif>Female</option>
                                <option value="other" @if($user->gender == 'other') selected @else '' @endif>other</option>
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">ID Type<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="@if(isset(Auth::user()->user_type) && Auth::user()->user_type ==1) {{ 'Institute User'}} @else {{'National User'}} @endif " id="inputAddress2" placeholder="ID Type" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Designation<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="designation" value="{{ old('designation', $user->designation ?? '') }}" id="inputAddress2" placeholder="Designation">
                            @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class=" col-md-12">
                            <label class="form-label" for="inputPassword4">Name of the Institute<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="institute_id" value="{{ old('institute_id', $user->institute->name ?? '') }}" id="inputPassword4" placeholder="Name of the Institute" readonly>
                            @error('institute_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection