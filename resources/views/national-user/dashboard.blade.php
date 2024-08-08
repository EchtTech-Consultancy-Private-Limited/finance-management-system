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

    <div class="col-xl-12 ">
        <div class="row">
            <div class="col-md-9 ">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="profile-text white_card total-box1">
                            <div class="school-info-box">
                                <div class="card-icon-wrapper">
                                    <div>
                                        <i class="fas fa-flag"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-content-wrapper">

                                        <div class="total-ut-input">
                                            <input type="text" name="total_state_ut"
                                                value="{{ @$totalcard->total_state_ut }}" maxlength="5"
                                                oninput="validateInput(this)" class="studentNumber editmode" readonly>

                                        </div>
                                        <p>Total State + UT <span tooltip="Doble Click on Number for Edit" flow="down"
                                                class="total-ut-tooltip">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 ">
                        <div class="profile-text white_card total-box2">
                            <div class="school-info-box">

                                <div class="card-icon-wrapper">
                                    <div>
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-content-wrapper">

                                        <div class="total-ut-input">
                                            <input type="text" name="total_sentinel_site"
                                                value="{{ @$totalcard->total_sentinel_site }}" maxlength="5"
                                                oninput="validateInput(this)" class="studentNumber editmode" readonly>
                                            <p>Total Sentinel Site <span tooltip="Doble Click on Number for Edit"
                                                    flow="down" class="total-ut-tooltip">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="profile-text white_card total-box3">
                            <div class="school-info-box">
                                <div class="card-icon-wrapper">
                                    <div>
                                        <i class="fas fa-vials"></i>
                                    </div>
                                </div>
                                <div class="card-content-wrapper">
                                    <div class="total-ut-input">
                                        <input type="text" name="total_ppcl_labs"
                                            value="{{ @$totalcard->total_ppcl_labs }}" maxlength="5"
                                            oninput="validateInput(this)" class="studentNumber editmode" readonly>
                                    </div>
                                    <p>Total PPCL Labs <span tooltip="Doble Click on Number for Edit" flow="down"
                                            class="total-ut-tooltip">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text white_card total-box4">

                            <div class="school-info-box">
                                <div class="card-icon-wrapper">
                                    <div>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <div class="card-content-wrapper">
                                    <div class="total-ut-input">
                                        <input type="text" name="total_regional_coordinator"
                                            value="{{ @$totalcard->total_regional_coordinator }}" maxlength="5"
                                            oninput="validateInput(this)" class="studentNumber editmode" readonly>
                                        <p>Total Regional Coordinator <span tooltip="Doble Click on Number for Edit"
                                                flow="down" class="total-ut-tooltip">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text white_card total-box5">
                            <div class="school-info-box">
                                <div class="card-icon-wrapper">
                                    <div>
                                        <i class="fas fa-flask"></i>
                                    </div>
                                </div>
                                <div class="card-content-wrapper">
                                    <div class="total-ut-input">
                                        <input type="text" name="total_nrcp_labs"
                                            value="{{ @$totalcard->total_nrcp_labs }}" maxlength="5"
                                            oninput="validateInput(this)" class="studentNumber editmode" readonly>
                                    </div>
                                    <p>Total NRCP Labs <span tooltip="Doble Click on Number for Edit" flow="down"
                                            class="total-ut-tooltip">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-text white_card total-box6">
                            <div class="school-info-box ">
                                <div class="card-icon-wrapper">
                                    <div>
                                        <i class="fas fa-solid fa-hospital"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="card-content-wrapper">
                                        <div class="total-ut-input">
                                            <input type="text" name="total_pm_abhim_sss"
                                                value="{{ @$totalcard->total_pm_abhim_sss }}" maxlength="5"
                                                oninput="validateInput(this)" class="studentNumber editmode" readonly>
                                        </div>
                                        <p>Total PM ABHIM SSS <span tooltip="Doble Click on Number for Edit" flow="down"
                                                class="total-ut-tooltip">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-3 total-card">
                <div class="white_card graph-card-h m-0">
                    <div class="total-card-child d-flex align-items-center justify-content-center">
                        <h3 class="text-center total_number_of_institute">
                            <span>{{ $totalSum }}</span>
                            <span class=""> Total Number <br> of Institutes</span>

                        </h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-12">
        <div class="crad fund-card">
            <div class="row">
                <div class="col-md-3">
                    <div class="fund-card-child white_card">
                        <h3>
                            Fund Approved <br> (in Lakh)
                        </h3>
                        <span class="fund-number">
                            {{ @$totalArray['unspentBalance1stTotal'] }}
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="fund-card-child white_card">
                        <h3>
                            Fund Expenditure <br> (in Lakh)
                        </h3>
                        <span class="fund-number">
                            {{ @$totalArray['actualExpenditureTotal'] }}
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fund-card-child white_card">
                        <h3>
                            Financial Progress <br> (%)
                        </h3>
                        <span class="fund-number">
                            85%
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fund-card-child white_card">
                        <h3>
                            Balance Amount <br> (in Lakh)
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
                                <h3 class="m-0">Total Expenditure in Lakh</h3>
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
                                <h3 class="m-0">Total Fund unspent in Lakh</h3>
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
    <div class="  col-xl-12 user_crm_wrapper">
        <div class="white_card_body  white_card  p-4">

            <div class="  mb_30">
                <div class="row">

                    <div class="col-md-6 col-lg-4 choose-financial-year-select">
                        <div class="align-items-center">
                            <label for="" class="text-nowrap me-3 mb-2 font-16"><b>Financial Year  </b></label>
                            <select id="national-user-fy" name="financial_year" class="form-control national_user_card">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 choose-financial-year-select">
                        <div class="align-items-center">
                            <label for="" class="text-nowrap me-3 mb-2 font-16"><b>Program Wise  </b></label>
                            <select id="national-program-wise" name="program_id"
                                class="form-control national_user_card">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row card-mm">
                <div class="col">
                    <div class="single_crm border-line-1 p-0">
                        <div class="crm_body">
                            <h4 id="national-giaReceivedTotal">{{ @$totalArray['giaReceivedTotal'] }}</h4>
                            <p>GIA Received during the Current F.Y. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single_crm border-line-3 p-0">
                        <div class="crm_body">
                            <h4 id="national-totalBalanceTotal">{{ @$totalArray['totalBalanceTotal'] }}</h4>
                            <p>Total Balance excluding interest</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single_crm border-line-4 p-0">
                        <div class="crm_body">
                            <h4 id="national-actualExpenditureTotal">
                                {{ @$totalArray['actualExpenditureTotal'] }}</h4>
                            <p>Actual Expenditure incurred during the current F.Y </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single_crm border-line-5 p-0">
                        <div class="crm_body">
                            <h4 id="national-unspentBalance31stTotal">
                                {{ @$totalArray['unspentBalance31stTotal'] }}</h4>
                            <p>Unspent Balance (excluding Interest) </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="single_crm border-line-2 p-0">
                        <div class="crm_body">
                            <h4 id="national-committedLiabilitiesTotal">
                                {{ @$totalArray['committedLiabilitiesTotal'] }}
                            </h4>
                            <p>Committed Liabilities</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 overlall-expenditure">
        <div class="row overall-expeniture-percent">
            <div class="col-md-6">
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

            <div class="col-md-6">
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

            <div class="col-md-6">
                <div class="white_card  mb_30 integrated-expenditure">
                    <div class="">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Committed Liabilities <br> in Lakh</h3>
                            </div>

                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="integrated-dashboard-chart-currently-Interest-Earned" class="overall-programm-total">
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
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
                <!-- <div class="row">
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

                </div> -->


            </div>
        </div>
    </div>

    <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12  meter-graph user_crm_wrapper">
        <div class="crad white_card mb_30 p-4">
           <div class="page_title_left d-flex align-items-center justify-content-center mb-4">
                <h3 >UC</h3>
            </div>
            <div>
                <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program </b></label>
                            <select id="national-program-ucform" name="program_id"
                                class="form-control filter_program_id national_ucForm_filter">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes </b></label>
                            <select name="institute_name"
                                class="form-control national_institute_name national_ucForm_filter"
                                id="national_institute_name">
                                <option value="">Select Institute</option>
                                @foreach($institutes as $institute)
                                <option value="{{ $institute->id }}"
                                    {{ old('institute_id', $user->institute_id ?? '') == $institute->id ? 'selected' : '' }}>
                                    {{ $institute->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year </b></label>
                            <select id="national-ucform-fy" name="uc_financial_year"
                                class="form-control national_ucForm_filter">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}
                                    </option>
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
                            <div class=" card_height_100">
                                <div class="">
                                    <div id="integrated-dashboard-chart-currently-UC-Received"
                                        class="border rounded mb-3 received-chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class=" card_height_100 ">
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
                            <div class=" card_height_100 ">
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
                    
                        <div id="integrated-dashboard-india-map" class="border rounded mb-3"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="col-md-12">
        <div class="white_card p-3 mb_30 p-4 pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="QA_table pt-3">
                        <table class="table national_uc_datatable table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">QTR UC</th>
                                    <th scope="col">Program</th>
                                    <th>Year of UC</th>
                                    <th>UC File Upload</th>
                                    <th>UC Uploaded Date</th>
                                    <th>UC Status</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sorUcLists as $key => $sorUcList)
                                <tr>
                                    <td>{{ @$sorUcList->qtr_uc }}</td>
                                    <td>{{ @$sorUcList->program->name }} - {{ $sorUcList->program->code }}</td>
                                    <td>{{ @$sorUcList->financial_year }}</td>
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
                                    <td class="{{ ($sorUcList->status == 1) ? 'approved' : (($sorUcList->status == 2) ? 'returned_by_nhq' : 'pending') }}">
                                        <a href="#" class="action_btn mr_10" data-bs-toggle="modal"
                                            data-bs-target="#soe_uc_form_{{ $sorUcList->id }}">{{ ($sorUcList->status == 1) ? "Approved" : (($sorUcList->status == 2) ? 'Returned by NHQ' : 'Awaiting') }}
                                        </a>
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
                        <select id="program_wise_yearly" name="program_wise_yearly"
                            class="form-control yearly_soe_expenditure">
                            <option value="">Select Program</option>
                            @foreach($institutePrograms as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                            @endforeach
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
                        <select name="institute_wise" class="form-control institute_wise yearly_soe_expenditure"
                            id="institute_wise">
                            <option value="">Select Institute</option>
                            @foreach($institutes as $institute)
                            <option value="{{ $institute->id }}"
                                {{ old('institute_id', $user->institute_id ?? '') == $institute->id ? 'selected' : '' }}>
                                {{ $institute->name }}
                            </option>
                            @endforeach
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
    <div class="col-md-12 integrated-expenditure expenditure-bar-chart">
        <div class="main-title ">
            <h3 class="m-0"> Expenditure Bar Chart (All Programs combined data)</h3>
        </div>
        <div class="card white_card mb_30 p-4">

            <div class="row">
                <div class="col-md-3">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program</b></label>
                    <select id="national-program-barchart" name="national-program-barchart"
                        class="form-control national_program_barchart">
                        <option value="">Select Program</option>
                        @foreach($institutePrograms as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 ">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year</b></label>
                    <select id="national-user-fy-barchart" name="financial_year"
                        class="form-control national_program_barchart">
                        <option value="">Select Year</option>
                        @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php $selected=old('financial_year')==($i
                            . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp <option value="{{$i}} - {{$i+1}}"
                            {{$selected}}>{{$i}} - {{$i+1}}</option>
                            @endfor
                    </select>
                </div>
                <div class="col-md-4 align-items-end justify-content-between">

                    <div>
                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Choose Expenditure/Unspent
                                Balance</b></label>
                        <select id="expenditure_unspent" name="expenditure_unspent"
                            class="form-control national_program_barchart">
                            <option value="">Select Expenditure/Unspent Balance</option>
                            <option value="expenditure">Expenditure</option>
                            <option value="unspent">Unspent Balance</option>
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
                            <span class="number" id="overall_expenditure_chart"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="expenditure-bar-chart-box unspent-bar-chart-box d-flex">
                        <div class="expenditure-bar-chart-box-child1">

                            <i class="bi bi-currency-rupee"></i>
                        </div>
                        <div class="expenditure-bar-chart-box-child2">
                            <h3>Overall Unspent <br> Balance</h3>
                            <span class="number" id="overall_unspent_chart"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <div class=" card_height_100 integrated-expenditure">
                    <div class="">
                        <div class="box_header m-0">
                            <div class="main-title ">
                                <h3 class="m-0">Program wise Expenditure Pie </h3>
                            </div>

                        </div>
                    </div>
                    <div class="row program-wise-expenditure-pie">
                        <div class="col">
                            <div class="graph-container white_card">
                                <h2 class="chart-title"> NOHPPCZ-RCs</h2>
                                <div id="integrated-dashboard-program-wise-expenditure-bar-chart1"
                                    class="border border-1 "></div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="graph-container white_card">
                                <h2 class="chart-title"> NOHPPCZ-SSS</h2>
                                <div id="integrated-dashboard-program-wise-expenditure-bar-chart2"
                                    class="border border-1 "></div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="graph-container white_card">
                                <h2 class="chart-title">NRCP-Lab</h2>
                                <div id="integrated-dashboard-program-wise-expenditure-bar-chart3"
                                    class="border border-1 "></div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="graph-container white_card">
                                <h2 class="chart-title"> PPCL-Lab</h2>
                                <div id="integrated-dashboard-program-wise-expenditure-bar-chart4"
                                    class="border border-1 "></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="graph-container white_card">
                                <h2 class="chart-title"> PM-ABHIM-SSS</h2>
                                <div id="integrated-dashboard-program-wise-expenditure-bar-chart5"
                                    class="border border-1 "></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="graph-container white_card border border-1 ">
                                <div class="main-title">
                                    <h3 class="m-0">Program wise Expenditure Line Chart</h3>
                                </div>
                                <div id="integrated-dashboard-unspent-balance-line-chart" class=""></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="graph-container white_card border border-1 mb-0 p-3">

                                {{-- <div id="integrated-dashboard-state-graph" class=""></div> --}}
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
                    <div class="crad  mb_30">
                        <div>
                            <form action="" class="select-form-s">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Select
                                                Year</b></label>
                                        <select id="national-user-fy-barchart-head" name="financial_year"
                                            class="form-control">
                                            <option value="">Select Year</option>
                                            @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                                $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : ''
                                                ; @endphp <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} -
                                                {{$i+1}}</option>
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
                                <span class="number" id="program_percentagedriven_graph1"></span>
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
                                <span class="number" id="program_percentagedriven_graph2"></span>
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
                                <span class="number" id="program_percentagedriven_graph3"></span>
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
                                <span class="number" id="program_percentagedriven_graph4"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="expenditure-bar-chart-box box5 d-flex">
                            <div class="expenditure-bar-chart-box-child1">
                                <i class="fas fa-solid fa-hospital"></i>
                                <!-- <i class="fas fa-heartbeat"></i> -->
                            </div>
                            <div class="expenditure-bar-chart-box-child2">
                                <h3>PM-ABHIM-<br>SSS</h3>
                                <span class="number" id="program_percentagedriven_graph5"></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="row custom-grid2 state-driven">
            <div class="col-graph">
                <div class="graph-container border border-1 me-0 white_card">
                    <div id="integrated-dashboard-data-driven-graph1" class=""></div>
                </div>
            </div>
            <div class="col-graph">
                <div class="graph-container border border-1 me-0 white_card ms-0">
                    <div id="integrated-dashboard-data-driven-graph2" class=""></div>
                </div>
            </div>
            <div class="col-graph">
                <div class="graph-container border border-1 me-0 white_card ms-0">
                    <div id="integrated-dashboard-data-driven-graph3" class=""></div>
                </div>
            </div>
            <div class="col-graph">
                <div class="graph-container border border-1 me-0 white_card ms-0">
                    <div id="integrated-dashboard-data-driven-graph4" class=""></div>
                </div>
            </div>
            <div class="col-graph">
                <div class="graph-container border border-1 me-0 white_card ms-0">
                    <div id="integrated-dashboard-data-driven-graph5" class=""></div>
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
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of Program </b></label>
                            <select name="program_wise" class="form-control filter_program_id national_all_form_map"
                                id="program_wise_all_form">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes </b></label>
                            <select name="institute_wise"
                                class="form-control national_institute_name national_all_form_map"
                                id="institute_wise_all_form">
                                <option value="">Select Institute</option>
                                @foreach($institutes as $institute)
                                <option value="{{ $institute->id }}">
                                    {{ $institute->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month </b></label>
                            <select name="month_name_all_form" class="form-control national_all_form_map"
                                id="month_wise_all_form">
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
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year </b></label>
                            <select name="financial_year" class="form-control national_all_form_map"
                                id="financial_wise_all_form">
                                <option value="">Select Financial Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}
                                    </option>
                                    @endfor
                            </select>
                        </div>

                    </div>
                </form>
            </div>

        </div>


    </div>
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="border country-overall-data white_card rounded-1 pt-0 p-4">
                <ul>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">1</span></span><span
                                    class="country-list-content">Unspent Balance (GIA) as on 1st
                                    April..</span>
                            </div>
                            <div>

                                <span class="state-data-total" id="unspent_balance_1st_total">0</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">2</span></span><span
                                    class="country-list-content">GIA Received in F.Y</span>
                            </div>
                            <div>
                                <span class="state-data-total" id="gia_received_total">0</span>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">3</span></span><span
                                    class="country-list-content">Total Balance excluding interest</span>
                            </div>
                            <div>
                                <span class="state-data-total" id="total_balance_excluding_total">0</span>
                            </div>
                        </div>


                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">4</span></span><span
                                    class="country-list-content">Actual Expenditure incurred during the
                                    current
                                    F.Y
                                </span>
                            </div>
                            <div>
                                <span class="state-data-total" id="actual_expenditure_incurred_total">0</span>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">5</span></span><span
                                    class="country-list-content">Unspent Balance F=(D-E)</span>
                            </div>
                            <div>
                                <span class="state-data-total" id="unspent_balance_d_e_total">0</span>
                            </div>
                        </div>


                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">6</span></span><span
                                    class="country-list-content">Committed Liabilities (if any)</span>
                            </div>
                            <div>
                                <span class="state-data-total" id="committed_liabilities_total">0</span>
                            </div>
                        </div>


                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">7</span></span><span
                                    class="country-list-content">Unspent Balance of (GIA) as on 31st
                                    March
                                    H=(F-G)</span>
                            </div>
                            <div>
                                <span class="state-data-total" id="unspent_balance_31st_march_total">0</span>
                            </div>
                        </div>



                    </li>
                    <li>
                        <div class="overall-data-li">
                            <div>
                                <span class="arrow arrow-left"><span class="number">8</span></span><span
                                    class="country-list-content">UC Uploaded</span>
                            </div>
                            <div>

                                <span class="state-data-total" id="uc_uploads_total">0</span>
                            </div>
                        </div>

                    </li>
                </ul>

            </div>
        </div>
        <div class="col-md-6">
            <div class="white_card">

                <div id="integrated-dashboard-india-map3" class="border rounded"></div>
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

    {{-- <div class="col-xl-12 ">
        <div class="crad white_card mb_30 p-4">
            <div>
                <form action="{{ route('national-user.dashboard-report') }}" method="get" id="institute-report">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Program </b></label>
                            <select name="program_name" class="form-control filter_program_id" id="national_program_id">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year </b></label>
                            <select id="financial_year" name="financial_year" class="form-control national_user_card">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                    $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col">
                            <label for="state" class="form-label">Module</label>
                            <select class="form-control" name="modulename" id="form_type" required>
                                <option value="">Select Module</option>
                                <option value='1' {{  request('modulename') == '1' ? 'selected' : '' }}>SOE Form
                                </option>
                                <option value='2' {{  request('modulename') == '2' ? 'selected' : '' }}>UC Upload
                                </option>
                            </select>
                            @error('modulename')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes </b></label>
                            <select name="institute_name" class="form-control national_institute_name"
                                id="national_institute_name">
                                <option value="">Select Institute</option>
                                @foreach($institutes as $institute)
                                <option value="{{ $institute->id }}"
                                    {{ old('institute_id', $user->institute_id ?? '') == $institute->id ? 'selected' : '' }}>
                                    {{ $institute->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month </b></label>
                            <select name="month" class="form-control" id="national_month">
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
                                <button type="button" class="btn bg-cancel me-3 form_type_uc_list"
                                    id="form_type_uc_list">Search</button>
                                <button type="reset" class="btn bg-danger me-3 form_type_uc_list">Reset</button>
                                <button type="submit" class="btn btn-primary" id="form_type_export_button">Export
                                    Excel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="QA_section">
                <div class="QA_table form_type_uc_list" id="form_type_uc_list">
                    <table class="table national_uc_filter_datatable table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">QTR UC</th>
                                <th scope="col">Program</th>
                                <th scope="col">Year of UC</th>
                                <th scope="col">Month</th>
                                <th scope="col">UC File Upload</th>
                                <th scope="col">UC Uploaded Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody id="national_report_data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

</div>


</div>
@endsection