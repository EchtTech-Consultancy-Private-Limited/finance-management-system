@extends('layout.main')
@section('title')
@parent
| {{__('PPCL -Lab')}}
@endsection
@section('pageTitle')
{{ __('PPCL -Lab') }}
@endsection
@section('breadcrumbs')
{{ __('PPCL -Lab') }}
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
                <!-- <h3 class="f_s_25 f_w_700 dark_text mr_30">PPCL-Lab Dashboard</h3> -->
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item acctive"><a href="{{url('/national-users/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">PPCL-Lab Dashboard</li>
                </ol>
               
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{ asset('assets/img/icon/calender_icon.svg') }}" alt>
                    @php
                    $currentYear = date('Y');
                    $currentMonth = date('m');
                    $endDate = strtotime("last day of $currentYear-$currentMonth");
                    @endphp
                    {{ date('F m ,Y') }} - {{ date('M jS ,Y', $endDate) }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 ">
        <div class="crad white_card mb_30 p-4">
            <div class="row">

                <div class="col-md-4 ">
                    <div class="">
                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year </b></label>
                        <select id="ppcllab-year" name="financial_year" class="form-control ppcllab_card">
                            <option value="">Select Year</option>
                            @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="">
                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month</b></label>
                        <select name="ppcllab-month" class="form-control ppcllab_card" id="ppcllab-month">
                            <option value="">Select Month</option>
                            @foreach ($months as $key => $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
    <div class="col-xl-12 integrated-expenditure">
        <div class="row ">

            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Total Expenditure in Lakhs</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body p-0">
                                <div id="national-ppcllab-total-expenditure-lac" class="expenditure_lacks"></div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="white_card card_height_100 mb_30">
                            <div class="">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Total Fund unspent in Lakhs</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="white_card_body p-0">
                                <div id="national-ppcllab-total-unspent-lac" class="expenditure_lacks"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="white_card card_height_100 mb_30">
                    <div class="">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Overall Head Expenditure</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body p-0 overall-expenditure">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div id="integrated-dashboard-chart-overall-program-expenditure-amount-nrcplab"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
    <div class="col-md-12">
    <div class="row expenditure_percentage">
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

                    <div class="expenditure_height">

                        <div id="national_expenditure_percentage_nrcplab" class="overall-programm-total"></div>
                    </div>

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
                    <div class="expenditure_height">
                        <div id="national_fund_unspent_percentage_nrcplab" class="overall-programm-total"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="white_card  mb_30 integrated-expenditure">
                <div class="">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Total Committed Liabilities</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="expenditure_height">
                        <div id="national_interest_earned_cy_percentage_nrcplab" class="overall-programm-total">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <div class="white_card  mb_30 integrated-expenditure">
                <div class="">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Total Interest <br> DD</h3>
                        </div>

                    </div>
                </div>
                <div class="white_card_body">
                    <div class="expenditure_height">

                        <div id="national_dd_percentage_nohppcz_rc" class="overall-programm-total">
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
    </div>



    <div class="white_card_body col-xl-12  card_height_100 user_crm_wrapper mb-3">
        <div class="row card-mm">
            <div class="col">
                <div class="single_crm border-line-1 p-0">
                    <div class="crm_body">
                        <h4 id="national-ppcllab-giaReceivedTotal">{{ @$totalArray['giaReceivedTotal'] }}</h4>
                        <p>GIA Received during the Current F.Y. </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="single_crm border-line-3 p-0">
                    <div class="crm_body">
                        <h4 id="national-ppcllab-totalBalanceTotal">{{ @$totalArray['totalBalanceTotal'] }}</h4>
                        <p>Total Balance excluding interest</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="single_crm border-line-4 p-0">
                    <div class="crm_body">
                        <h4 id="national-ppcllab-actualExpenditureTotal">{{ @$totalArray['actualExpenditureTotal'] }}</h4>
                        <p>Actual Expenditure incurred during the current F.Y </p>
                    </div>
                </div>
            </div>                
            <div class="col">
                <div class="single_crm border-line-5 p-0">
                    <div class="crm_body">
                        <h4 id="national-ppcllab-unspentBalance31stTotal">{{ @$totalArray['unspentBalance31stTotal'] }}</h4>
                        <p>Unspent Balance (excluding Interest) </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="single_crm border-line-2 p-0">
                    <div class="crm_body">
                        <h4 id="national-ppcllab-committedLiabilitiesTotal">{{ @$totalArray['committedLiabilitiesTotal'] }}
                        </h4>
                        <p>Committed Liabilities</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12 ">
        <div class="crad white_card mb_30 p-4">
            <div class="row">
                <div class="col-md-4">
                <div class="">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes</b></label>
                    <select name="nrcplab-national-ucform-fy" class="form-control ppcllab_national_ucForm_filter" id="nrcplab-national-ucform-fy">
                        <option value="">Choose the Institute</option>
                        @foreach($institutes as $institute)
                        <option value="{{ $institute->id }}">
                            {{ $institute->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                </div>
               
                <div class="col-md-4">
                <div class="">
                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year </b></label>
                    <select name="nrcplab-national-institute-ucform" class="form-control ppcllab_national_ucForm_filter" id="nrcplab-national-institute-ucform">
                        <option value="">Choose Financial Year</option>
                        @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                            <option value="{{$i}} - {{$i+1}}">{{$i}} - {{$i+1}}</option>
                        @endfor
                    </select>
                </div>
                </div>




            </div>

        </div>
    </div>
    <div class="row pe-0">
        <div class="col-md-3">
            <div class="white_card  ">

                <div class="white_card">
                    <div id="nrcplab_chart_currently_UC_Received" class=" mb-3 received-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="white_card  ">
                <div class="">
                    <div id="nrcplab_chart_currently_UC_not_Received" class=" mb-3 received-chart"></div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="white_card">
                <div id="nrcplab_chart_currently_Nos_UC_Received" class=" mb-0 received-chart"></div>

            </div>
        </div>

        <div class="col-md-3 pe-0">
            <div class="white_card  ">

                <div class="">
                    <div id="nrcplab_chart_currently_Nos_UC_not_Received" class=" mb-0 received-chart"></div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="white_card p-3 mb_30 p-4">
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
                                    <td>{{ $sorUcList->qtr_uc }}</td>
                                    <td>{{ $sorUcList->program->name }} - {{ $sorUcList->program->code }}</td>
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
                                            class="approve badge {{ ($sorUcList->status == 1) ? "bg-success" : (($sorUcList->status == 2) ? 'bg-danger' : 'bg-primary') }} ">{{ ($sorUcList->status == 1) ? "Approved" : (($sorUcList->status == 2) ? 'Returned' : 'Pending') }}</span>
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
    <div class="col-xl-6">
        <div class="white_card mb_30 card_height_100 ">
            <div class="white_card_header">
                <div class="row align-items-center justify-content-between flex-wrap">
                    <di v class="col-lg-8">
                        <div class="main-title">
                            <h3 class="m-0">Yearly SOE Expenditure under PPCL-Lab</h3>
                        </div>
                    </di>
                    <div class="col-lg-4 text-end d-flex justify-content-end">
                        <select name="nrcplab-month-soe-expenditure" id="nrcplab-month-soe-expenditure" class="nice_Select2 max-width-220 ppcllab_yearly_soe_expenditure">
                            <option value="">Show by month</option>
                            @foreach ($months as $key => $month)
                            <option value="{{ $month }}">
                                {{ $month }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div id="national_expnediture_ppcllap"></div>
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
                    <div class="col-lg-4">
                        <div class="float-right">
                        <select name="nrcplab-institute-soe-expenditure" id="nrcplab-institute-soe-expenditure" class="nice_Select2 max-width-220 ppcllab_yearly_soe_expenditure">
                            <option value="">Show by Institute</option>
                            @foreach($institutes as $institute)
                            <option value="{{ $institute->id }}">
                                {{ $institute->name }}
                            </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div id="national_instiute_wise_yearly_ppcllab"></div>
            </div>
        </div>
    </div>
    {{-- <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12 ">
            <div class="crad white_card mb_30 p-4">
                <div>
                    <form action="{{ route('national-user.nohppczrsss-dashboard-report') }}" method="get" id="institute-report">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year</b></label>
                                <select id="financial_year" name="financial_year" class="form-control national_user_card">
                                    <option value="">Select Year</option>
                                    @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php
                                        $selected=old('financial_year')==($i . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp
                                        <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
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
                                <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Name of the Institutes</b></label>
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
                                <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month</b></label>
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
                                        id="ppcllab_form_type_uc_list">Search</button>
                                    <button type="reset" class="btn bg-danger me-3 form_type_uc_list">Reset</button>
                                    <button type="submit" class="btn btn-primary" id="form_type_export_button">Export
                                        Excel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="QA_section">
                    <div class="QA_table form_type_uc_list" id="ppcllab_form_type_uc_list">
                        <table class="table ppcllab_national_uc_filter_datatable table-bordered">
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
        </div>
    




    </div> --}}
@endsection