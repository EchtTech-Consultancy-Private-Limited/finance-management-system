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

    <!-- <div class="title mb_30">
        <h3> All Programs combined data</h3>
    </div> -->

    <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
        <div class="row">
            <div class="col-md-9 ">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total State + UT</p>
                                <input type="text" name="total_state_ut" value="{{ @$totalcard->total_state_ut }}"
                                    maxlength="5" oninput="validateInput(this)" class="studentNumber editmode" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total Sentinel Site</p>
                                <input type="text" name="total_sentinel_site"
                                    value="{{ @$totalcard->total_sentinel_site }}" maxlength="5"
                                    oninput="validateInput(this)" class="studentNumber editmode" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total PPCL Labs</p>
                                <input type="text" name="total_ppcl_labs" value="{{ @$totalcard->total_ppcl_labs }}"
                                    maxlength="5" oninput="validateInput(this)" class="studentNumber editmode" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total Regional Coordinator</p>
                                <input type="text" name="total_regional_coordinator"
                                    value="{{ @$totalcard->total_regional_coordinator }}" maxlength="5"
                                    oninput="validateInput(this)" class="studentNumber editmode" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total NRCP Labs</p>
                                <input type="text" name="total_nrcp_labs" value="{{ @$totalcard->total_nrcp_labs }}"
                                    maxlength="5" oninput="validateInput(this)" class="studentNumber editmode" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text">
                            <div class="school-info-box">
                                <p>Total PM ABHIM SSS</p>
                                <input type="text" name="total_pm_abhim_sss"
                                    value="{{ @$totalcard->total_pm_abhim_sss }}" maxlength="5"
                                    oninput="validateInput(this)" class="studentNumber editmode" readonly>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-3 total-card">
                <div class="white_card graph-card-h m-0">
                    <div class="total-card-child d-flex align-items-center justify-content-center">
                        <h3>Total Value</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-12 white_card  user_crm_wrapper mt_30">
        <div class="crad mb_30 fund-card">
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
    <div class="devider-line">
        <div></div>
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
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 choose-financial-year-select">
                        <div class="d-flex align-items-center">
                            <label for="" class="text-nowrap me-3 font-16"><b>Program Wise <sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-program-wise" name="institute_program_id"
                                class="form-control national_user_card">
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
                            <p>Unspent Balance (excluding Interest) </p>
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
                                        <h3 class="m-0">Total Expenditure <br> in %</h3>
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
                                        <h3 class="m-0">Total Fund Unspent <br> in %</h3>
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
                                        <h3 class="m-0">Total Interest Earned <br> in C.Y. %</h3>
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
                                        <h3 class="m-0">Total Interest <br> DD</h3>
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
                                        <h3 class="m-0">Overall Program Expenditure <br> Amount</h3>
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

    <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12 white_card meter-graph user_crm_wrapper">
        <div class="crad white_card mb_30 p-4">
            <div>
                <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-program" name="institute_program_id" class="form-control">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                @endforeach
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
                            <select id="uc-financial-year" name="uc_financial_year" class="form-control">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                    @endfor
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
                                @foreach($sorUcLists as $key => $sorUcList)
                                <tr>
                                    <td>{{ @$sorUcList->users->institute_name }}</td>
                                    <td>{{ @$sorUcList->year }}</td>
                                    <td>
                                        @if ($sorUcList->file)
                                        <a class="nhm-file"
                                            href="{{ asset('images/uploads/soeucupload/'.$sorUcList->file) }}" download>
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            <span>Download ({{ $sorUcList->file_size }})</span>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y',strtotime($sorUcList->date)) }}</td>
                                    <td><span
                                            class="approve badge {{ ($sorUcList->status == 1) ? "bg-success" : (($sorUcList->status == 2) ? 'bg-danger' : 'bg-primary') }} ">{{ ($sorUcList->status == 1) ? "Approved" : (($sorUcList->status == 2) ? 'Not-Approved' : 'Pending') }}</span>
                                    </td>
                                    <td>{{ @$sorUcList->reason ?? 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="devider-line">
        <div></div>
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
    <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12 ">
        <div class="crad white_card yellow-graph mb_30 p-4">
            <div class="mb_30">
                <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-program-map" name="institute_program_id" class="form-control">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-user-fy-map" name="financial_year_map"
                                class="form-control national_user_card">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                    @endfor
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
                            <td> State Public Health and Clinical Laboratory, Trivandrum </td>
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
    <div class="devider-line">
        <div></div>
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
                    <select id="national-program-barchart" name="institute_program_id" class="form-control">
                        <option value="">Select Program</option>
                        @foreach($institutePrograms as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 ">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                class="text-danger">*</sup></b></label>
                    <select id="national-user-fy-barchart" name="financial_year"
                        class="form-control national_user_card">
                        <option value="">Select Year</option>
                        @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php $selected=old('financial_year')==($i
                            . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp <option value="{{$i}} - {{$i+1}}"
                            {{$selected}}>{{$i}} - {{$i+1}}</option>
                            @endfor
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
                        <div class="expenditure-bar-chart-box-child1">
                           
                            <i class="fas fa-balance-scale"></i>
                            </div>
                        <div class="expenditure-bar-chart-box-child2">
                            <h3>Overall <br> Expenditure</h3>
                            <span class="number">95%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="expenditure-bar-chart-box unspent-bar-chart-box d-flex">
                        <div class="expenditure-bar-chart-box-child1">
                           
                            <i class="bi bi-currency-dollar"></i>
                        </div>
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

    <div class="devider-line">
        <div></div>
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
                                            @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                                @php
                                                    $selected = old('financial_year') == ($i . ' - ' . ($i+1)) ? 'selected' : '';
                                                @endphp
                                                <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                            @endfor
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
                            <div class="expenditure-bar-chart-box-child1">
                                
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>NOHPPCZ-<br>RCs</h3>
                                <span class="number">35%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box2 d-flex">
                            <div class="expenditure-bar-chart-box-child1">
                                
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>NOHPPC-<br>SSS</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box3 d-flex">
                            <div class="expenditure-bar-chart-box-child1">
                               
                                <i class="fas fa-flask"></i> 
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>NRCP-<br>Lab</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="expenditure-bar-chart-box box4 d-flex">
                            <div class="expenditure-bar-chart-box-child1">
                               
                                <i class="fas fa-vials"></i>
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>PPCL-<br>Lab</h3>
                                <span class="number">60%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="expenditure-bar-chart-box box5 d-flex">
                            <div class="expenditure-bar-chart-box-child1">
                            <i class="fas fa-stethoscope"></i>
                                <!-- <i class="fas fa-heartbeat"></i> -->
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
                                @foreach ($months as $key => $month)
                                @php
                                    $selected = old('month') == $month ? 'selected' : '';
                                @endphp
                                <option value="{{ $month }}" {{ $selected }}>
                                    {{ $month }}
                                </option>
                            @endforeach
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
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                    @php
                                        $selected = old('financial_year') == ($i . ' - ' . ($i+1)) ? 'selected' : '';
                                    @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border country-overall-data p-3 rounded-1 pt-0">
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

<div class="devider-line">
    <div></div>
</div>
<div class="row">

    <div class="col-xl-12 ">
        <div class="crad white_card mb_30 p-4">
            <div>
                <form action="{{ route('national-user.report-export') }}" method="post" id="institute-report">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Program<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="program_name" class="form-control" id="">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year<sup
                                        class="text-danger">*</sup></b></label>
                            <select id="national-user-list-show" name="financial_year" class="form-control national_user_card">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                    @php
                                        $selected = old('financial_year') == ($i . ' - ' . ($i+1)) ? 'selected' : '';
                                    @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Form Type<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="modulename" class="form-control" id="form_type">
                                <option value="">Select Form Type</option>
                                <option value="1">SOE</option>
                                <option value="2">UC</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="institute_name" class="form-control" id="">
                                <option value="">Select Institute</option>
                                <option value="">Institutes 1</option>
                                <option value="">Institutes 2</option>
                                <option value="">Institutes 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month<sup
                                        class="text-danger">*</sup></b></label>
                            <select name="month" class="form-control" id="">
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
                        </div>

                        <div class="col-md-12">
                            <div class="float-end mt-4">
                                <button type="submit" class="btn bg-cancel me-3 form_type_uc_list">Search</button>
                                <button type="reset" class="btn bg-danger me-3 form_type_uc_list">Reset</button>
                                <button type="submit" class="btn btn-primary" id="form_type_export_button">Export Excel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="QA_section">
                <div class="QA_table form_type_uc_list" id="form_type_uc_list">
                    <table class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">View / Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sorUcLists as $key => $sorUcList)
                                <tr>
                                    <td>{{ @$sorUcList->users->institute_name }}</td>
                                    <td>{{ date('d-m-Y',strtotime($sorUcList->date)) }}</td>
                                    <td>
                                        @if ($sorUcList->file)
                                        <a class="nhm-file" href="{{ asset('images/uploads/soeucupload/'.$sorUcList->file) }}" download>
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                                            <span>Download ({{ $sorUcList->file_size }})</span>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


</div>
@endsection