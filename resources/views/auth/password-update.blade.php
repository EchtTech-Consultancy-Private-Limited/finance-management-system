@extends('layout.main')
@section('title')
    @parent
    | {{__('Password Update')}}
@endsection
@section('pageTitle')
 {{ __('Password Update') }}
@endsection
@section('breadcrumbs')
 {{ __('Password Update') }}
@endsection
@section('content')
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">{{Auth::user()->name}} {{Auth::user()->mname}} {{Auth::user()->lname}} Password Update</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="">
                @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Old Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">New Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection