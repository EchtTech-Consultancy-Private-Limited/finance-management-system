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
                <!-- <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
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

<div class="row">


    <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
        <div class="crad mb_30 p-2 pe-0 total-card">
            <div class="row">
                <div class="col-md-9 row p-0">

                    <div class="col-md-4 mb-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total State + UT</p>
                                <span class="studentNumber">36</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total Sentinel Site</p>
                                <span class="studentNumber">45</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total PPCL Labs</p>
                                <span class="studentNumber">6</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total Regional Coordinator</p>
                                <span class="studentNumber">15</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total NRCP Labs</p>
                                <span class="studentNumber">10</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total PM ABHIM SSS</p>
                                <span class="studentNumber">12</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 pe-0">
                    <div class="white_card graph-card-h">
                        <div class="total-card-child d-flex align-items-center justify-content-center">
                            <h3>Total Value</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-12 white_card  user_crm_wrapper">
        <div class="crad mb_30 p-2 fund-card">
            <div class="row">
                <div class="col-md-3">
                    <div class="fund-card-child">
                        <h3>
                            Fund approved <br> (in Cr.)
                        </h3>
                        <span class="fund-number">
                            {{ @$totalArray['unspentBalance1stTotal'] }}
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="fund-card-child">
                        <h3>
                            Fund Expenditure <br> (in Cr.)
                        </h3>
                        <span class="fund-number">
                            {{ @$totalArray['actualExpenditureTotal'] }}
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fund-card-child">
                        <h3>
                            Financial Progress <br> (%)
                        </h3>
                        <span class="fund-number">
                            85%
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fund-card-child">
                        <h3>
                            Balance Amount <br> (in Cr.)
                        </h3>
                        <span class="fund-number">
                            15%
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 integrated-expenditure">
        <div class="row ">
            <div class="col-md-6">
                <div class="white_card card_height_100 mb_30">
                    <div class="">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Total Expenditure in Cr.</h3>
                            </div>

                        </div>
                    </div>
                    <div class="white_card_body p-0">
                        <div id="national-total-expenditure-cr"></div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="white_card card_height_100 mb_30">
                    <div class="">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Total Fund unspent in Cr.</h3>
                            </div>

                        </div>
                    </div>
                    <div class="white_card_body p-0">
                        <div id="national-total-unspent-cr"></div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="white_card card_height_100 mb_30 col-xl-12 user_crm_wrapper">
        <div class="white_card_body  white_card  ">

            <div class="white_card card_height_100 mb_30 mt-4">
                <div class="row">

                    <div class="col-md-6 col-lg-4 choose-financial-year-select">
                        <div class="d-flex align-items-center">
                            <label for="" class="text-nowrap me-3 font-16"><b>Financial Year <sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-user-fy" name="financial_year" class="form-control national_user_card">
                                <option value="">Select Financial Year</option>
                                @for($i = date("Y")-10; $i <=date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i) ? 'selected' : '' ; @endphp <option
                                    value="{{$i}}" {{$selected}}>{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 choose-financial-year-select">
                        <div class="d-flex align-items-center">
                            <label for="" class="text-nowrap me-3 font-16"><b>Program Wise <sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-program-wise" name="institute_program_id" class="form-control national_user_card">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row card-mm">
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-1 p-0">
                        <div class="crm_body">
                            <h4 id="national-giaReceivedTotal">{{ @$totalArray['giaReceivedTotal'] }}</h4>
                            <p>GIA Received during the Current F.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-2 p-0">
                        <div class="crm_body">
                            <h4 id="national-committedLiabilitiesTotal">{{ @$totalArray['committedLiabilitiesTotal'] }}
                            </h4>
                            <p>Interest earned in C.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-3 p-0">
                        <div class="crm_body">
                            <h4 id="national-totalBalanceTotal">{{ @$totalArray['totalBalanceTotal'] }}</h4>
                            <p>Total Balance excluding interest</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-4 p-0">
                        <div class="crm_body">
                            <h4 id="national-actualExpenditureTotal">{{ @$totalArray['actualExpenditureTotal'] }}</h4>
                            <p>Actual Expenditure incurred during the current F.Y </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-5 p-0">
                        <div class="crm_body">
                            <h4 id="national-unspentBalance31stTotal">{{ @$totalArray['unspentBalance31stTotal'] }}</h4>
                            <p>Unspent Balance (excluding Interest ) </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 overlall-expenditure">
        <div class="row custom-grid">
            <div class="col-md-6 custom-grid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="white_card  mb_30 integrated-expenditure">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Total Expenditure in %</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body">
                                <div id="national-total-expenditure" class="overall-programm-total"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="white_card  mb_30 integrated-expenditure">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Total Fund Unspent in %</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body">
                                <div id="national-total-fund-unspent" class="overall-programm-total"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="white_card  mb_30 integrated-expenditure">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Total Interest Earned in C.Y. %</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body">
                                <div id="integrated-dashboard-chart-currently-Interest-Earned"
                                    class="overall-programm-total">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 custom-grid w-40">
                <div class="row">
                    <div class="col-md-4">
                        <div class="white_card  mb_30 integrated-expenditure">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Total Interest DD</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body">
                                <div id="integrated-dashboard-total-interest-dd" class="overall-programm-total">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="white_card  mb_30 integrated-expenditure">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Overall Program Expenditure Amount</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body overall-program-expenditure-amount pb-0">
                                <div id="national-dashboard-overall-Program-expenditure-amount"></div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <!-- <div class="col-xl-2">
        <div class="white_card card_height_100 mb_30 integrated-expenditure">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Total Interest DD</h3>
                    </div>
                   
                </div>
            </div>
            <div class="white_card_body">
                <div id="integrated-dashboard-chart-currently-Interest-DD"></div>

            </div>
        </div>
    </div> -->


        </div>
    </div>


    <div class="col-xl-12 white_card meter-graph user_crm_wrapper">
        <div class="crad white_card mb_30 p-4">
            <div>
                <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Program</option>
                                <option value="">NOHPPCZ SSS</option>
                                <option value="">NOHPPCZ RC's</option>
                                <option value="">NRCP-Lab</option>
                                <option value="">PPCL-Lab</option>
                                <option value=""> PM-ABHIM-SSS</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Institute</option>
                                <option value="">Institutes 1</option>
                                <option value="">Institutes 2</option>
                                <option value="">Institutes 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Choose Financial Year</option>
                                <option value="">2023-2024</option>
                                <option value="">2022-2023</option>
                                <option value="">2021-2022</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>

            <div class="row mt-5 custom-grid ">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="white_card card_height_100">
                                <div class="">
                                    <div id="integrated-dashboard-chart-currently-UC-Received"
                                        class="border rounded mb-3 received-chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="white_card card_height_100 ">
                                <div class="">
                                    <div id="integrated-dashboard-chart-currently-UC-not-Received"
                                        class="border rounded mb-3 received-chart"></div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="">
                                <div id="integrated-dashboard-chart-currently-Nos-UC-Received"
                                    class="border rounded mb-0 received-chart"></div>

                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="white_card card_height_100 ">

                                <div class="">
                                    <div id="integrated-dashboard-chart-currently-Nos-UC-not-Received"
                                        class="border rounded mb-0 received-chart"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="integrated-dashboard-gauge1"
                                    class="border gauge-meter rounded mb-3 received-chart"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="integrated-dashboard-gauge2"
                                    class="border gauge-meter rounded mb-3 received-chart"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="integrated-dashboard-gauge3"
                                    class="border gauge-meter rounded mb-3 received-chart"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="integrated-dashboard-gauge4"
                                    class="border gauge-meter rounded mb-3 received-chart"></div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-md-4">
                    <div id="integrated-dashboard-india-map" class="border rounded mb-3"></div>
                </div>
            </div>

        </div>
    </div>


    <div class="col-md-12">
        <div class="white_card p-3 mb_30">
            <div class="row">
                <div class="col-md-12">
                    <div class="QA_table pt-3">
                        <table class="table datatable table-bordered">
                            <thead>
                                <tr>
                                    <th>Name of Institute</th>
                                    <th>Year of UC</th>
                                    <th>All UCs</th>
                                    <th>UC Uploaded Date</th>
                                    <th>UC Status</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Display Selected Name</td>
                                    <td>Display Selected Financial Year</td>
                                    <td>View UC</td>
                                    <td>Display submission date</td>
                                    <td><span class="approve badge bg-success">Approved</span></td>
                                    <td>Remarks</td>
                                </tr>
                                <tr>
                                    <td>Display Selected Name</td>
                                    <td>Display Selected Financial Year</td>
                                    <td>View UC</td>
                                    <td>Display submission date</td>
                                    <td><span class="rejected badge bg-danger">Rejected</span></td>
                                    <td>Remarks</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-6">
        <div class="white_card mb_30 card_height_100 ">
            <div class="white_card_header">
                <div class="row align-items-center justify-content-between flex-wrap">
                    <div class="col-lg-8">
                        <div class="main-title">
                            <h3 class="m-0">Program wise Yearly SOE Expenditure</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end d-flex justify-content-end">
                        <select class="nice_Select2 max-width-220">
                            <option value="1">Show by month</option>
                            <option value="1">Show by year</option>
                            <option value="1">Show by day</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div id="integrated-dashboard-program-wise-expenditure"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="white_card mb_30 card_height_100 ">
            <div class="white_card_header">
                <div class="row align-items-center justify-content-between flex-wrap">
                    <div class="col-lg-8">
                        <div class="main-title">
                            <h3 class="m-0">Institute wise Yearly Expenditure</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end d-flex justify-content-end">
                        <select class="nice_Select2 max-width-220">
                            <option value="1">Show by month</option>
                            <option value="1">Show by year</option>
                            <option value="1">Show by day</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div id="integrated-dashboard-institute-wise-expenditure"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 ">
        <div class="crad white_card yellow-graph mb_30 p-4">
            <div class="mb_30">
                <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Program</option>
                                <option value="">Program 1</option>
                                <option value="">Program 2</option>
                                <option value="">Program 3</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Choose Financial Year</option>
                                <option value="">2023-2024</option>
                                <option value="">2022-2023</option>
                                <option value="">2021-2022</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>



            <div class="row">
                <div class="col-md-5">
                    <div id="integrated-dashboard-india-map2" class="border rounded mb-3"></div>
                </div>
                <div class="col-md-7">
                    <div class="row state-graph-filter">
                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state1" class=" state-filter-highchart rounded mb-3 ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">
                                <div class="">
                                    <div id="integrated-dashboard-state2"
                                        class=" state-filter-highchart rounded mb-3 received-chart">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="">
                                <div id="integrated-dashboard-state3" class=" state-filter-highchart rounded mb-0 ">
                                </div>

                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state4"
                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state5"
                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state6"
                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state7"
                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state8"
                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                    </div>

                                </div>
                            </div>
                        </div>





                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state9"
                                        class=" state-filter-highchart rounded mb-0 received-chart"></div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state10"
                                        class=" state-filter-highchart rounded mb-0 received-chart"></div>

                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="white_card  ">

                                <div class="">
                                    <div id="integrated-dashboard-state11"
                                        class=" state-filter-highchart rounded mb-0 received-chart"></div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- <div class="row state-graph-filter">
                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state1" class=" state-filter-highchart rounded mb-3 ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">
                        <div class="">
                            <div id="integrated-dashboard-state2"
                                class=" state-filter-highchart rounded mb-3 received-chart">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="">
                        <div id="integrated-dashboard-state3" class=" state-filter-highchart rounded mb-0 "></div>

                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state4"
                                class=" state-filter-highchart rounded mb-0 received-chart">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state5"
                                class=" state-filter-highchart rounded mb-0 received-chart">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state6"
                                class=" state-filter-highchart rounded mb-0 received-chart">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state7"
                                class=" state-filter-highchart rounded mb-0 received-chart">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state8"
                                class=" state-filter-highchart rounded mb-0 received-chart">
                            </div>

                        </div>
                    </div>
                </div>





                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state9"
                                class=" state-filter-highchart rounded mb-0 received-chart"></div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state10"
                                class=" state-filter-highchart rounded mb-0 received-chart"></div>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="white_card  ">

                        <div class="">
                            <div id="integrated-dashboard-state11"
                                class=" state-filter-highchart rounded mb-0 received-chart"></div>

                        </div>
                    </div>
                </div>


            </div> -->
        </div>
    </div>

    <!-- ***** -->
    <div class="col-md-12">
        <div class="crad white_card mb_30 p-4">
            <div class="QA_table pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Institute</th>
                            <th>Unspent Balance (GIA) as on 1st April.. </th>
                            <th>GIA Received during the Current F.Y</th>
                            <th>Actual Expenditure incurred during the current F.Y </th>
                            <th>Unspent Balance (excluding Interest)</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> National Institute of Medical Health and Neuro Science, Bangalore </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <td> Infectious Disease and Beliaghata General Hospital, Kolkata </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <td> Viral Research and Diagnostic Laboratory, GMC, Amritsar </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <td > State Public Health and Clinical Laboratory, Trivandrum </td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        <tr>
                            <th class="text-center">Total</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-md-12 integrated-expenditure expenditure-bar-chart">
        <div class="main-title ">
            <h3 class="m-0"> Expenditure Bar Chart (All Programs combined data)</h3>
        </div>
        <div class="crad white_card mb_30 p-4">

            <div class="row">
                <div class="col-md-3">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program<sup
                                class="text-danger">*</sup></b></label>
                    <select name="" class="form-control" id="">
                        <option value="">Select Program</option>
                        <option value="">Program 1</option>
                        <option value="">Program 2</option>
                        <option value="">Program 3</option>
                    </select>
                </div>
                <div class="col-md-4 ">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                class="text-danger">*</sup></b></label>
                    <select name="" class="form-control" id="">
                        <option value="">Choose Financial Year</option>
                        <option value="">2023-2024</option>
                        <option value="">2022-2023</option>
                        <option value="">2021-2022</option>
                    </select>
                </div>

                <div class="col-md-1 expenditure-or">
                    <div class="d-inline-block">

                        <h3>OR</h3>
                    </div>
                </div>
                <div class="col-md-4 align-items-end justify-content-between">

                    <div>
                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Choose Expenditure/Unspent Balance<sup
                                    class="text-danger">*</sup></b></label>
                        <select name="" class="form-control" id="">
                            <option value="">Select Expenditure/Unspent Balance</option>
                            <option value="">Expenditure</option>
                            <option value="">Unspent Balance</option>
                        </select>
                    </div>

                </div>

            </div>
            <div class="row my-4 d-flex justify-content-center">

                <div class="col-md-5">
                    <div class="expenditure-bar-chart-box  d-flex">
                        <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                alt=""></div>
                        <div class="expenditure-bar-chart-box-child2">
                            <h3>Overall <br> Expenditure</h3>
                            <span class="number">95%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="expenditure-bar-chart-box unspent-bar-chart-box d-flex">
                        <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                alt=""></div>
                        <div class="expenditure-bar-chart-box-child2">
                            <h3>Overall Unspent <br> Balance</h3>
                            <span class="number">5%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="white_card card_height_100 mb_30 integrated-expenditure">
                        <div class="">
                            <div class="box_header m-0">
                                <div class="main-title ">
                                    <h3 class="m-0">Program wise Expenditure Pie </h3>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="graph-container">
                                    <h2 class="chart-title"> NOHPPCZ-RCs</h2>
                                    <div id="integrated-dashboard-program-wise-expenditure-bar-chart1"
                                        class="border border-1 "></div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="graph-container">
                                    <h2 class="chart-title"> NOHPPCZ-SSS</h2>
                                    <div id="integrated-dashboard-program-wise-expenditure-bar-chart2"
                                        class="border border-1 "></div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="graph-container">
                                    <h2 class="chart-title">NRCP-Lab</h2>
                                    <div id="integrated-dashboard-program-wise-expenditure-bar-chart3"
                                        class="border border-1 "></div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="graph-container">
                                    <h2 class="chart-title"> PPCL-Lab</h2>
                                    <div id="integrated-dashboard-program-wise-expenditure-bar-chart4"
                                        class="border border-1 "></div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="graph-container border border-1 mt-3 p-2">
                                    <div class="main-title">
                                        <h3 class="m-0">Program wise Expenditure Line Chart</h3>
                                    </div>
                                    <div id="integrated-dashboard-unspent-balance-line-chart" class=""></div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="graph-container border border-1 mt-3 p-2">

                                    <div id="integrated-dashboard-state-graph" class=""></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="col-xl-12 ">
        <div class="white_card   mb_30 p-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="crad white_card mb_30">
                        <div>
                            <form action="" class="select-form-s">
                                <div class="row">
                                    <div class="col">

                                        <select name="" class="form-control" id="">
                                            <option value="">Select Financial Year</option>
                                            <option value="">2024-25</option>
                                            <option value="">2023-24</option>
                                            <option value="">2022-23</option>
                                            <option value="">2021-22</option>
                                        </select>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="data-driven">
                <div class="row justify-content-between custom-grid">
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box1  d-flex">
                            <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                    alt="">
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>NOHPPCZ-<br>RCs</h3>
                                <span class="number">35%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box2 d-flex">
                            <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                    alt="">
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>NOHPPC-<br>SSS</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box3 d-flex">
                            <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                    alt="">
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>NRCP-<br>Lab</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box4 d-flex">
                            <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                    alt="">
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>PPCL-<br>Lab</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="expenditure-bar-chart-box box5 d-flex">
                            <div class="expenditure-bar-chart-box-child1"><img src="{{ asset('assets/img/money.png') }}"
                                    alt="">
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>PM-ABHIM-<br>SSS</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row custom-grid2 state-driven">
                    <div class="col-graph">
                        <div class="graph-container border border-1 mt-3 me-0">
                            <div id="integrated-dashboard-data-driven-graph1" class=""></div>
                        </div>

                    </div>
                    <div class="col-graph">
                        <div class="graph-container border border-1 mt-3 me-0 ms-0">
                            <div id="integrated-dashboard-data-driven-graph2" class=""></div>
                        </div>

                    </div>
                    <div class="col-graph">
                        <div class="graph-container border border-1 mt-3 me-0 ms-0">
                            <div id="integrated-dashboard-data-driven-graph3" class=""></div>
                        </div>

                    </div>
                    <div class="col-graph">
                        <div class="graph-container border border-1 mt-3 me-0 ms-0">
                            <div id="integrated-dashboard-data-driven-graph4" class=""></div>
                        </div>

                    </div>
                    <div class="col-graph">
                        <div class="graph-container border border-1 mt-3 me-0 ms-0">
                            <div id="integrated-dashboard-data-driven-graph5" class=""></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-12 ">
        <div class="crad white_card mb_30 p-4">
            <div class="mb_30">
                <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Program</option>
                                <option value="">NOHPPCZ RC's</option>
                                <option value="">NOHPPCZ SSS</option>
                                <option value="">NRCP-Lab</option>
                                <option value="">PPCL-Lab</option>
                                <option value="">PM-ABHIM-SSS</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Month</option>
                                <option value="">January</option>
                                <option value="">Febuary</option>
                                <option value="">March</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Institute</option>
                                <option value="">Institutes 1</option>
                                <option value="">Institutes 2</option>
                                <option value="">Institutes 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Choose Financial Year</option>
                                <option value="">2023-2024</option>
                                <option value="">2022-2023</option>
                                <option value="">2021-2022</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border country-overall-data p-3 rounded-1">
                        <ul>
                            <li>
                                <span class="arrow arrow-left"><span class="number">1</span></span><span
                                    class="country-list-content">Unspent Balance (GIA) as on 1st April..</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">2</span></span><span
                                    class="country-list-content">GIA Received during the Current F.Y.</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">3</span></span><span
                                    class="country-list-content">Interest earned in C.Y.</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">4</span></span><span
                                    class="country-list-content">Total Balance (a+b) excluding interest</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">5</span></span><span
                                    class="country-list-content">Actual Expenditure incurred during the current
                                    F.Y</span> <span class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">6</span></span><span
                                    class="country-list-content">Interest DD Returned to NCDC</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">7</span></span><span
                                    class="country-list-content">Unspent Balance (excluding Interest)</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">8</span></span><span
                                    class="country-list-content">Committed Liabilities (if any)</span> <span
                                    class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">9</span></span><span
                                    class="country-list-content">Unspent Balance as on 31st January 2024 (g-h)</span>
                                <span class="state-data-total">0</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">10</span></span><span
                                    class="country-list-content">Fund Utilization (%)</span> <span
                                    class="state-data-total">0%</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">11</span></span><span
                                    class="country-list-content">Fund non utilization (%)</span> <span
                                    class="state-data-total">0%</span>
                            </li>
                            <li>
                                <span class="arrow arrow-left"><span class="number">12</span></span><span
                                    class="country-list-content">UC Uploaded</span> <span
                                    class="state-data-total">0</span>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-6">
                    <div id="integrated-dashboard-india-map3" class="border rounded mb-3"></div>
                </div>
            </div>
        </div>


    </div>

</div>

</div>


<div class="row">

    <div class="col-xl-12 ">
        <div class="crad white_card mb_30 p-4">
            <div>
                <form action="" class="select-form-s export-excel-form">
                    <div class="row">
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Program</option>
                                <option value="">Program 1</option>
                                <option value="">Program 2</option>
                                <option value="">Program 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Choose Financial Year</option>
                                <option value="">2023-2024</option>
                                <option value="">2022-2023</option>
                                <option value="">2021-2022</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Form Type<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Form Type</option>
                                <option value="">SOE</option>
                                <option value="">UC</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Institute</option>
                                <option value="">Institutes 1</option>
                                <option value="">Institutes 2</option>
                                <option value="">Institutes 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="" class="form-control" id="">
                                <option value="">Select Month</option>
                                <option value="">January</option>
                                <option value="">Febuary</option>
                                <option value="">March</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <div class="float-end mt-4">
                                <button type="submit" class="btn bg-cancel me-3">Search</button>
                                <button type="reset" class="btn bg-danger me-3">Reset</button>
                                <button type="submit" class="btn btn-primary">Export Excel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="row card-mm">
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-1 p-0">
                        <div class="crm_head d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19.9" height="17.734"
                                    viewBox="0 0 19.9 17.734" class="invert-1">
                                    <g id="calender_icon" transform="translate(0 -20.9)">
                                        <g id="Group_2869" data-name="Group 2869" transform="translate(0 20.9)">
                                            <g id="Group_2868" data-name="Group 2868" transform="translate(0 0)">
                                                <path id="Path_1648" data-name="Path 1648"
                                                    d="M17.837,22.408H16.588v-.99a.518.518,0,0,0-1.037,0v.99h-5.08v-.99a.518.518,0,0,0-1.037,0v.99H4.3v-.99a.518.518,0,0,0-1.037,0v.99h-1.2A2.1,2.1,0,0,0,0,24.508V36.56a2.069,2.069,0,0,0,2.068,2.073H17.832A2.067,2.067,0,0,0,19.9,36.565V24.508A2.09,2.09,0,0,0,17.837,22.408ZM18.869,36.56A1.034,1.034,0,0,1,17.842,37.6H2.068a1.031,1.031,0,0,1-1.032-1.032V24.508a1.055,1.055,0,0,1,1.032-1.063h1.2V24.2a.518.518,0,0,0,1.037,0v-.752H9.434V24.2a.518.518,0,0,0,1.037,0v-.752h5.08V24.2a.518.518,0,0,0,1.037,0v-.752h1.249a1.054,1.054,0,0,1,1.032,1.063Z"
                                                    transform="translate(0 -20.9)" />
                                            </g>
                                        </g>
                                        <g id="Group_2871" data-name="Group 2871" transform="translate(7.164 26.815)">
                                            <g id="Group_2870" data-name="Group 2870">
                                                <path id="Path_1649" data-name="Path 1649"
                                                    d="M139.626,135h-.907a.518.518,0,1,0,0,1.037h.907a.518.518,0,1,0,0-1.037Z"
                                                    transform="translate(-138.2 -135)" />
                                            </g>
                                        </g>
                                        <g id="Group_2873" data-name="Group 2873" transform="translate(10.772 26.815)">
                                            <g id="Group_2872" data-name="Group 2872">
                                                <path id="Path_1650" data-name="Path 1650"
                                                    d="M209.226,135h-.907a.518.518,0,1,0,0,1.037h.907a.518.518,0,0,0,0-1.037Z"
                                                    transform="translate(-207.8 -135)" />
                                            </g>
                                        </g>
                                        <g id="Group_2875" data-name="Group 2875" transform="translate(14.411 26.815)">
                                            <g id="Group_2874" data-name="Group 2874">
                                                <path id="Path_1651" data-name="Path 1651"
                                                    d="M279.426,135h-.907a.518.518,0,1,0,0,1.037h.907a.518.518,0,0,0,0-1.037Z"
                                                    transform="translate(-278 -135)" />
                                            </g>
                                        </g>
                                        <g id="Group_2877" data-name="Group 2877" transform="translate(7.164 30.391)">
                                            <g id="Group_2876" data-name="Group 2876" transform="translate(0 0)">
                                                <path id="Path_1652" data-name="Path 1652"
                                                    d="M139.626,204h-.907a.518.518,0,0,0,0,1.037h.907a.518.518,0,1,0,0-1.037Z"
                                                    transform="translate(-138.2 -204)" />
                                            </g>
                                        </g>
                                        <g id="Group_2879" data-name="Group 2879" transform="translate(3.525 30.391)">
                                            <g id="Group_2878" data-name="Group 2878" transform="translate(0 0)">
                                                <path id="Path_1653" data-name="Path 1653"
                                                    d="M69.431,204h-.912a.518.518,0,0,0,0,1.037h.907A.518.518,0,0,0,69.431,204Z"
                                                    transform="translate(-68 -204)" />
                                            </g>
                                        </g>
                                        <g id="Group_2881" data-name="Group 2881" transform="translate(10.772 30.391)">
                                            <g id="Group_2880" data-name="Group 2880" transform="translate(0 0)">
                                                <path id="Path_1654" data-name="Path 1654"
                                                    d="M209.226,204h-.907a.518.518,0,0,0,0,1.037h.907a.518.518,0,1,0,0-1.037Z"
                                                    transform="translate(-207.8 -204)" />
                                            </g>
                                        </g>
                                        <g id="Group_2883" data-name="Group 2883" transform="translate(14.411 30.391)">
                                            <g id="Group_2882" data-name="Group 2882" transform="translate(0 0)">
                                                <path id="Path_1655" data-name="Path 1655"
                                                    d="M279.426,204h-.907a.518.518,0,1,0,0,1.037h.907a.518.518,0,0,0,0-1.037Z"
                                                    transform="translate(-278 -204)" />
                                            </g>
                                        </g>
                                        <g id="Group_2885" data-name="Group 2885" transform="translate(7.164 33.916)">
                                            <g id="Group_2884" data-name="Group 2884" transform="translate(0 0)">
                                                <path id="Path_1656" data-name="Path 1656"
                                                    d="M139.626,272h-.907a.518.518,0,0,0,0,1.037h.907a.518.518,0,1,0,0-1.037Z"
                                                    transform="translate(-138.2 -272)" />
                                            </g>
                                        </g>
                                        <g id="Group_2887" data-name="Group 2887" transform="translate(3.525 33.916)">
                                            <g id="Group_2886" data-name="Group 2886" transform="translate(0 0)">
                                                <path id="Path_1657" data-name="Path 1657"
                                                    d="M69.431,272h-.912a.518.518,0,0,0,0,1.037h.907A.518.518,0,0,0,69.431,272Z"
                                                    transform="translate(-68 -272)" />
                                            </g>
                                        </g>
                                        <g id="Group_2889" data-name="Group 2889" transform="translate(10.772 33.916)">
                                            <g id="Group_2888" data-name="Group 2888" transform="translate(0 0)">
                                                <path id="Path_1658" data-name="Path 1658"
                                                    d="M209.226,272h-.907a.518.518,0,1,0,0,1.037h.907a.518.518,0,0,0,0-1.037Z"
                                                    transform="translate(-207.8 -272)" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>0</h4>
                            <p>GIA Received during the Current F.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-2 p-0">
                        <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <i class="fas fa-credit-card f_s_16 white_text"></i>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>0</h4>
                            <p>Interest earned in C.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-3 p-0">
                        <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <i class="fas fa-plus f_s_16 white_text"></i>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>0</h4>
                            <p>Total Balance excluding interest</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-4 p-0">
                        <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.535" height="14.888"
                                    viewBox="0 0 15.535 14.888">
                                    <g id="infographic" transform="translate(0 -1)">
                                        <path id="Path_1511" data-name="Path 1511"
                                            d="M2.647,7.65a.647.647,0,0,1-.43-1.131L5.13,3.93a.644.644,0,0,1,.507-.159l5.038.61,2.854-2.7a.647.647,0,0,1,.89.941L11.345,5.531a.65.65,0,0,1-.523.173l-5.05-.613-2.695,2.4a.645.645,0,0,1-.43.163Z"
                                            transform="translate(-0.706 -0.177)" fill="#fff" />
                                        <path id="Path_1512" data-name="Path 1512"
                                            d="M19.751,4.236a.483.483,0,0,1-.343-.142L17.143,1.829A.485.485,0,0,1,17.486,1h2.266a.486.486,0,0,1,.485.485V3.751a.485.485,0,0,1-.485.485Z"
                                            transform="translate(-5.996)" fill="#fff" />
                                        <path id="Path_1513" data-name="Path 1513"
                                            d="M4.884,17.809v1.78H1v-1.78A.809.809,0,0,1,1.809,17H4.075A.809.809,0,0,1,4.884,17.809Z"
                                            transform="translate(-0.353 -5.643)" fill="#fff" />
                                        <path id="Path_1514" data-name="Path 1514"
                                            d="M12.884,11.809v5.664H9V11.809A.809.809,0,0,1,9.809,11h2.266A.809.809,0,0,1,12.884,11.809Z"
                                            transform="translate(-3.174 -3.527)" fill="#fff" />
                                        <path id="Path_1515" data-name="Path 1515"
                                            d="M20.884,13.809v4.369H17V13.809A.809.809,0,0,1,17.809,13h2.266A.809.809,0,0,1,20.884,13.809Z"
                                            transform="translate(-5.996 -4.232)" fill="#fff" />
                                        <path id="Path_1516" data-name="Path 1516"
                                            d="M15.05,23.471H.485a.485.485,0,1,1,0-.971H15.05a.485.485,0,1,1,0,.971Z"
                                            transform="translate(0 -7.583)" fill="#fff" />
                                    </g>
                                </svg>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>0</h4>
                            <p>Actual Expenditure incurred during the current F.Y </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-5 p-0">
                        <div class="crm_head crm_bg_4 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.412" height="15.412"
                                    viewBox="0 0 15.412 15.412" class="briteness-10">
                                    <g id="XMLID_17_" transform="translate(0 -0.002)">
                                        <path id="XMLID_40_" d="M257.823.4A7.874,7.874,0,0,0,255,0V3.221Z"
                                            transform="translate(-247.294 0)" fill="#5e3787" />
                                        <path id="XMLID_560_"
                                            d="M406.712,164.428a7.873,7.873,0,0,0-.4-2.823l-2.823,2.823Z"
                                            transform="translate(-391.3 -156.719)" fill="#5e3787" />
                                        <path id="XMLID_561_"
                                            d="M255,65.9h.641l5.252-5.252a7.285,7.285,0,0,0-.641-.641L255,65.263Z"
                                            transform="translate(-247.294 -58.195)" fill="#5e3787" />
                                        <path id="XMLID_562_"
                                            d="M319.921,109.629l3.724-3.724a7.253,7.253,0,0,0-.475-.807l-4.531,4.531Z"
                                            transform="translate(-309.01 -101.92)" fill="#5e3787" />
                                        <path id="XMLID_2261_"
                                            d="M255,30.729,259.53,26.2a7.238,7.238,0,0,0-.807-.476L255,29.447Z"
                                            transform="translate(-247.294 -24.943)" fill="#5e3787" />
                                        <path id="XMLID_2337_"
                                            d="M6.8,29.884l-.513.068A7.254,7.254,0,0,0,1.813,41.939L6.8,36.953Z"
                                            transform="translate(0 -28.979)" fill="#5e3787" />
                                        <path id="XMLID_2340_"
                                            d="M81.205,290.006a7.254,7.254,0,0,0,11.987-4.473l.068-.513H86.191Z"
                                            transform="translate(-78.751 -276.405)" fill="#5e3787" />
                                    </g>
                                </svg>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4>0</h4>
                            <p>Unspent Balance (excluding Interest ) </p>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="QA_section">
                <div class="QA_table">
                    <table class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">View / Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-1
                                    </a></th>
                                <td>1 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-2
                                    </a></th>
                                <td>2 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-3
                                    </a></th>
                                <td>3 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-4
                                    </a></th>
                                <td>4 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-5
                                    </a></th>
                                <td>5 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-6
                                    </a></th>
                                <td>6 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-7
                                    </a></th>
                                <td>7 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-8
                                    </a></th>
                                <td>8 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-9
                                    </a></th>
                                <td>9 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-10
                                    </a></th>
                                <td>10 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"> <a href="#" class="question_content"> Name of Institute-11
                                    </a></th>
                                <td>11 September 2023</td>
                                <td class="download-icon-width">
                                    <div class="download ">
                                        <a href="#"><span class="view">View</span></a>
                                        <i class="fas fa-file-pdf ms-2 me-2 black_text" aria-hidden="true"></i>
                                        <span class="size">(3.59MB)
                                        </span>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


</div>
@endsection