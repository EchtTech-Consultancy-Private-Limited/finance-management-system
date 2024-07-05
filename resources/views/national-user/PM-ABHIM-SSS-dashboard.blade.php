@extends('layout.main')
@section('title')
@parent
| {{__('PM-ABHIM-SSS Dashboard')}}
@endsection
@section('pageTitle')
{{ __('PM-ABHIM-SSS Dashboard') }}
@endsection
@section('breadcrumbs')
{{ __('PM-ABHIM-SSS Dashboard') }}
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
                <!-- <h3 class="f_s_25 f_w_700 dark_text mr_30">PM-ABHIM-SSS Dashboard</h3> -->
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item acctive"><a href="{{url('/national-users/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">PM-ABHIM-SSS Dashboard</li>
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

    <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
        <div class="crad white_card mb_30 p-4">
            <div class="row">

                <div class="col-md-4 ">
                    <div class="">
                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year <sup
                                    class="text-danger">*</sup></b></label>
                        <select name="" class="form-control" id="">
                            <option value="">Choose Financial Year</option>
                            <option value="">2023-2024</option>
                            <option value="">2022-2023</option>
                            <option value="">2021-2022</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="">
                        <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Month<sup
                                    class="text-danger">*</sup></b></label>
                        <select name="" class="form-control" id="">
                            <option value="">Select Month</option>
                            <option value="">January</option>
                            <option value="">Febuary</option>
                            <option value="">March</option>
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
                                <div id="national-total-expenditure-lac-pm-abhim" class="expenditure_lacks"></div>

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
                                <div id="national-total-unspent-lac-pm-abhim" class="expenditure_lacks"></div>

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
                            <div class="col-md-6">
                                <div id="integrated-dashboard-chart-overall-program-expenditure-amount-pm-abhim"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-light  rounded-2 overall-content">
                                    <ul>
                                        <li>Current Man Power</li>
                                        <li>Meetings, Training & Research</li>
                                        <li>Lab Strengthening Kits, Regents & Consumable (Recurring)</li>
                                        <li>IEC</li>
                                        <li>Office Expenses & Travel</li>
                                        <li>Lab Strengthening (Non Recurring)</li>
                                        <li>Other Activities</li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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

                        <div id="national_expenditure_percentage_nohppcz_pm_abhiim" class="overall-programm-total">
                        </div>
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

                        <div id="national_fund_unspent_percentage_nohppcz_pm_abhiim" class="overall-programm-total">
                        </div>
                    </div>

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
                    <div class="expenditure_height">

                        <div id="national_interest_earned_cy_percentage_nohppcz_pm_abhiim"
                            class="overall-programm-total">
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

                        <div id="national_dd_percentage_nohppcz_pm_abhiim" class="overall-programm-total">
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
    </div>



    <div class="white_card_body col-xl-12 white_card card_height_100 user_crm_wrapper mb-3">
        <div class="row card-mm">
            <div class="col-md-4 col-lg">
                <div class="single_crm border-line-1 p-0">
                    <div class="crm_body">
                        <h4 id="national-giaReceivedTotal">0</h4>
                        <p>GIA Received during the Current F.Y. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="single_crm border-line-2 p-0">
                    <div class="crm_body">
                        <h4 id="national-committedLiabilitiesTotal">0
                        </h4>
                        <p>Interest earned in C.Y. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="single_crm border-line-3 p-0">
                    <div class="crm_body">
                        <h4 id="national-totalBalanceTotal">0</h4>
                        <p>Total Balance excluding interest</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="single_crm border-line-4 p-0">
                    <div class="crm_body">
                        <h4 id="national-actualExpenditureTotal">0</h4>
                        <p>Actual Expenditure incurred during the current F.Y </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg">
                <div class="single_crm border-line-5 p-0">
                    <div class="crm_body">
                        <h4 id="national-unspentBalance31stTotal">0</h4>
                        <p>Unspent Balance (excluding Interest ) </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
        <div class="crad white_card mb_30 p-4">
            <div class="row">
            <div class="col-md-6 ">
                    <div class="d-flex align-items-center">
                        <label for="" class="text-nowrap me-3 font-16"><b>Name of the Institutes<sup
                                    class="text-danger">*</sup></b></label>
                        <select name="" class="form-control" id="">
                            <option value="">Choose the Institute</option>
                            <option value="">Institute Name</option>
                            <option value="">Institute Name</option>
                            <option value="">Institute Name</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="d-flex align-items-center">
                        <label for="" class="text-nowrap me-3 font-16"><b>Financial Year <sup
                                    class="text-danger">*</sup></b></label>
                        <select name="" class="form-control" id="">
                            <option value="">Choose Financial Year</option>
                            <option value="">2023-2024</option>
                            <option value="">2022-2023</option>
                            <option value="">2021-2022</option>
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
                    <div id="nohppz_rc_chart_currently_UC_Received_pm_abhiim" class=" mb-3 received-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="white_card  ">
                <div class="">
                    <div id="nohppz_rc_chart_currently_UC_not_Received_pm_abhiim" class=" mb-3 received-chart"></div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="white_card">
                <div id="nohppz_rc_chart_currently_Nos_UC_Received_pm_abhiim" class=" mb-0 received-chart"></div>

            </div>
        </div>

        <div class="col-md-3 pe-0">
            <div class="white_card  ">

                <div class="">
                    <div id="nohppz_rc_chart_currently_Nos_UC_not_Received_pm_abhiim" class=" mb-0 received-chart">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="white_card p-3 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive-sm pt-3">
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
                            <h3 class="m-0">Yearly SOE Expenditure under PM-ABHIM-SSS</h3>
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
                <div id="national_expnediture_nohppcz_pm_abhiim"></div>
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
                <div id="national_instiute_wise_yearly_nohppcz_pm_abhiim"></div>
            </div>
        </div>
    </div>
    <div class="devider-line">
        <div></div>
    </div>
    <div class="col-xl-12 white_card card_height_100 user_crm_wrapper ">
        <div class="crad white_card mb_30 p-4">
            <div>
            <form action="" class="select-form-s">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Financial Year
                                            <sup class="text-danger">*</sup></b></label>
                                    <select name="" class="form-control" id="">
                                        <option value="">Choose Financial Year</option>
                                        <option value="">2023-2024</option>
                                        <option value="">2022-2023</option>
                                        <option value="">2021-2022</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Form Type
                                            <sup class="text-danger">*</sup></b></label>
                                    <select name="" class="form-control" id="">
                                        <option value="">Select Form Type</option>
                                        <option value="">SOE</option>
                                        <option value="">UC</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="text-nowrap me-3 font-16 mb-2"><b>Monthly
                                            <sup class="text-danger">*</sup></b></label>
                                    <select name="" class="form-control" id="">
                                        <option value="">Select Month</option>
                                        <option value="">January</option>
                                        <option value="">Febuary</option>
                                        <option value="">March</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end form-btn-sm mt-4 pt-2">
                                <button type="submit" class="btn bg-cancel me-1">Search</button>
                                <button type="reset" class="btn bg-danger me-1">Reset</button>
                                <button type="submit" class="btn btn-primary">Export Excel</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="white_card card_height_100 mb_30">

            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <!-- <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Data table 1</h3>
                            </div>
                        </div>
                    </div> -->
                    <div class="white_card_body">
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
                                                    <i class="fas fa-file-pdf ms-2 me-2 black_text"
                                                        aria-hidden="true"></i>
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
    </div>




</div>
@endsection