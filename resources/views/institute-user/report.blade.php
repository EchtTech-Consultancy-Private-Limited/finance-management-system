@extends('layout.main')
@section('title')
    @parent
    | {{__('Report')}}
@endsection
@section('pageTitle')
 {{ __('Report') }}
@endsection
@section('breadcrumbs')
 {{ __('Report') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Report</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form action="{{ route('institute-user.report-export') }}" method="post" id="institute-report">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group">
                                <label for="state">Module<span class="star">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="modulename" id="modulename">
                                    <option value="">Select Module</option>
                                    <option value='1'>SOE Form</option>
                                    <option value='2'>UC Upload</option>
                                </select>
                                @error('modulename') 
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group">
                                <label for="district">From Date</label>
                                <input type="date" name="startdate" class="form-control">
                                @error('startdate') 
                                    <span class="form-text text-muted">{{ $message }}</span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group">
                                <label for="fromYear">To Date</label>
                                <input type="date" name="enddate" class="form-control">
                                @error('enddate') 
                                    <span class="form-text text-muted">{{ $message }}</span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 search-reset">
                            <div class="apply-filter mt-4 pt-1">
                                <button type="submit" class="btn bg-primary search-patient-btn mt-0 mr-3" name="bthValue" value="excel">Export Excel</button>
                                <!-- <button type="submit" class="btn bg-primary mr-3" name="bthValue" value="pdf">Download PDF</button> -->
                                <button type="reset" class="btn bg-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection