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
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{ asset('assets/img/icon/calender_icon.svg') }}" alt>
                    {{ date('F d ,Y',strtotime('first day of this month')) }} - {{ date('F d ,Y',strtotime('last day of this month')) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="crad white_card mb_30 p-4 ">
        <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-tab-group mb-4">
                        <button class="btn btn-tab-admin active">Summary</button>
                        <button class="btn btn-tab-admin">Weekly Performance </button>
                        <button class="btn btn-tab-admin">Monthly Performance</button>
                        <button class="btn btn-tab-admin">Yearly Performance</button>                        
                    </div>
                </div>
            </div>
            <div class="row card-mm">
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-1 p-0">                      
                        <div class="crm_body">
                            <h4 id="giaReceivedTotal">30</h4>
                            <p>GIA Received during the Current F.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-2 p-0">                       
                        <div class="crm_body">
                            <h4 id="committedLiabilitiesTotal">40</h4>
                            <p>Interest earned in C.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-3 p-0">                        
                        <div class="crm_body">
                            <h4 id="totalBalanceTotal">60</h4>
                            <p>Total Balance excluding interest</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-4 p-0">                        
                        <div class="crm_body">
                            <h4 id="actualExpenditureTotal">70</h4>
                            <p>Actual Expenditure incurred during the current F.Y </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-5 p-0">                       
                        <div class="crm_body">
                            <h4 id="unspentBalance31stTotal">80</h4>
                            <p>Unspent Balance (excluding Interest ) </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection