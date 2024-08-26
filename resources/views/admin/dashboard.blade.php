@extends('layout.main')
@section('title')
@parent
| {{__('Dashboard')}}
@endsection
@section('pageTitle')
{{ __('Dashboard') }}
@endsection
@section('breadcrumbs')
{{ __('Dashboard') }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Admin Dashboard</h3>
                <!-- <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{ asset('assets/img/icon/calender_icon.svg') }}" alt>
                    {{ date('F d ,Y',strtotime('first day of this month')) }} -
                    {{ date('F d ,Y',strtotime('last day of this month')) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="crad white_card mb_30 p-4 pb-0">
        <div class="col-xl-12 user_crm_wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-tab-group mb-4">
                        <button class="btn btn-tab-admin active performance" data-val="summery">Summary</button>
                        <button class="btn btn-tab-admin performance" data-val="week">Weekly Performance </button>
                        <button class="btn btn-tab-admin performance" data-val="month">Monthly Performance</button>
                        <button class="btn btn-tab-admin performance" data-val="year">Yearly Performance</button>
                    </div>
                </div>
            </div>
            <div class="row dash-frst-row">

                <div class="col-md-3 row special-card special-card-w-33">
                    <div class="col-md-6">
                        <div class="single_crm border-line-3 p-0">
                            <div class="crm_body">
                                <h4>{{ @$registerUser }}</h4>
                                <p>Registered User </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single_crm border-line-1 p-0">
                            <div class="crm_body">
                                <h4>{{ @$login_status }}</h4>
                                <p>Active User </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 row spaicel-card-w-66 p-0">
                    <div class="col p-0">
                        <div class="">
                            <div class="">
                                <div id="admin-dashboard-0" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0">
                        <div class="">
                            <div class="">
                                <div id="admin-dashboard-1" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0">
                        <div class="">
                            <div class="">
                                <div id="admin-dashboard-2" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0">
                        <div class="">
                            <div class="">
                                <div id="admin-dashboard-3" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0">
                        <div class="">
                            <div class="">
                                <div id="admin-dashboard-4" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 row special-card-w-44">
                    <div class="col-md-6 p-0">
                        <div class="">
                            <div class="login-hrs">
                                <div id="admin-dashboard-Average-Login-Hours" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="">
                            <div class="user-actv">
                                <div id="admin-dashboard-Overall-User-Active" class="rounded mb-3 received-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="col-md-5 ps-0">
        <div class="white_card ps-2 p-2 min-h-470">
            <div id="integrated-dashboard-india-map-admin" class="rounded mb-3"></div>
        </div>
    </div>

    <div class="col-xl-7">
        <div class="white_card mb_30 min-h-470">
            <div class="white_card_header">
                <div class="row align-items-center justify-content-between flex-wrap">
                    <div class="col-lg-8">
                        <div class="main-title">
                            <h3 class="m-0">Sessions In Last 30 Days (UTC+10)</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body pb-1">
                <div id="integrated-dashboard-unspent-Sessions" class=""></div>
            </div>
        </div>
    </div>


    <div class="col-md-12 p-0 mt-1">
        <div class="white_card card_height_100 mb_30 integrated-expenditure">
            <div class="">
                <div class="box_header m-0">
                    <div class="main-title text-white ps-3 pr-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <label for="" class="text-nowrap me-3 font-16"><b>Program</b></label>
                                    <select name="user_program" id="user_program" class="form-control">
                                        <option value="">Select Program</option>
                                        @foreach($institutePrograms as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="radio-group float-right">
                                    <input type="radio" id="Pie" name="Hit_Months" value="Pie" checked
                                        onclick="show1();">
                                    <label for="Pie"><img src="{{ asset('assets/img/pie.png') }}" alt=""></label>
                                    <input type="radio" id="Bar" name="Hit_Months" value="Bar" class="ms-3"
                                        onclick="show2();">
                                    <label for="Bar"><img src="{{ asset('assets/img/bar-chart.png') }}" alt=""></label>
                                </div>
                            </div>

                        </div> 
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-5">
                    <div class="white_card_body">
                        <div id="admin-dashboard-calls-qtr" class="mt-5 "></div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="white_card_body">
                        <div id="admin-dashboard-Months-pie" class="mt-5 "></div>
                        <div id="admin-dashboard-Months-bar" class="mt-5 mb-5 d-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection