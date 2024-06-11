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
                <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{ asset('assets/img/icon/calender_icon.svg') }}" alt>
                    @php
                    $first_date = date('F d ,Y',strtotime('first day of this month'));
                    $last_date = date('F d ,Y',strtotime('last day of this month'));
                    @endphp
                    {{ $first_date }} - {{ $last_date }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row integrated-expenditure">

    <div class="crad white_card mb_30 p-4 ">
        <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
            <!-- **************************** -->
            <div class="row">
                <div class="col-md-6 col-lg-4  mb-5 financial-year-select">
                    <div class="d-flex align-items-center">
                        <label for="" class="text-nowrap me-3 font-16"><b>Financial Year <sup
                                    class="text-danger">*</sup></b></label>
                        <select id="institute-user-fy" name="financial_year" class="form-control">
                            <option value="">Select Financial Year</option>
                            @for($i = date("Y")-10; $i <=date("Y")+10; $i++) @php $selected=old('financial_year')==($i)
                                ? 'selected' : '' ; @endphp <option value="{{$i}}" {{$selected}}>{{$i}}</option>
                                @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="row card-mm">
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-1 p-0">
                        <div class="crm_body">
                            <h4 id="giaReceivedTotal">{{ @$totalArray['giaReceivedTotal'] }}</h4>
                            <p>GIA Received during the Current F.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-2 p-0">
                        <div class="crm_body">
                            <h4 id="committedLiabilitiesTotal">{{ @$totalArray['committedLiabilitiesTotal'] }}</h4>
                            <p>Interest earned in C.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-3 p-0">
                        <div class="crm_body">
                            <h4 id="totalBalanceTotal">{{ @$totalArray['totalBalanceTotal'] }}</h4>
                            <p>Total Balance excluding interest</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-4 p-0">
                        <div class="crm_body">
                            <h4 id="actualExpenditureTotal">{{ @$totalArray['actualExpenditureTotal'] }}</h4>
                            <p>Actual Expenditure incurred during the current F.Y </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-5 p-0">
                        <div class="crm_body">
                            <h4 id="unspentBalance31stTotal">{{ @$totalArray['unspentBalance31stTotal'] }}</h4>
                            <p>Unspent Balance (excluding Interest ) </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- **************************** -->


        </div>
    </div>

    <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30">
            <div class="main-title">
                <h3 class="m-0">Total Expenditure in Lakhs</h3>
            </div>
            <div class="white_card_body">
                <div id="chart-currently"></div>

            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30">
            <div class="">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Total Fund Unspent in Lakhs</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div id="chart-currently-again"></div>

            </div>
        </div>
    </div>

</div>

@endsection