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
                <form method="POST" action="">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fname" value="{{Auth::user()->name}}" id="fname" placeholder="First Name ">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Middle Name</label>
                            <input type="text" class="form-control" name="mname" value="{{Auth::user()->mname}}" id="mname" placeholder="Middle Name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="{{Auth::user()->lname}}" id="lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="email" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="mobile " value="{{Auth::user()->mobile }}" id="mobile" placeholder="Mobile">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">LandLine</label>
                            <input type="number" class="form-control" name="landline" value="{{Auth::user()->landline}}" id="landline" placeholder="LandLine">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label" for="inputAddress2">DOB<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="dob" value="{{Auth::user()->dob}}" id="dob" placeholder="DOB">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="inputAddress2">Gender<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="gender">
                                <option selected>Gender...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">ID Type<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="@if(isset(Auth::user()->user_type) && Auth::user()->user_type ==1) {{ 'Institute User'}} @else {{'National User'}} @endif " id="inputAddress2" placeholder="ID Type" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Designation<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="designation" value="{{Auth::user()->designation}}" id="inputAddress2" placeholder="Designation">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class=" col-md-12">
                            <label class="form-label" for="inputPassword4">Name of the Institute<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="institute_name" value="{{Auth::user()->institute_name}}" id="inputPassword4" placeholder="Name of the Institute">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection