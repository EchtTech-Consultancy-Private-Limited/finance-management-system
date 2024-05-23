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
<div class="row">

    <div class="crad white_card mb_30 p-4 ">
        <div class="col-xl-12 white_card card_height_100 user_crm_wrapper">
            <div class="row">
                <div class="col-md-6 col-lg-4 mx-auto mb-4 financial-year-select">
                    <div class="d-flex align-items-center">
                        <label for="" class="text-nowrap me-3 font-16"><b>Financial Year <sup class="text-danger">*</sup></b></label>
                        <select id="institute-user-fy" name="financial_year" class="form-control">
                            <option value="">Select Financial Year</option>
                            @for($i = date("Y")-10; $i <=date("Y")+10; $i++)
                                @php
                                    $selected = old('financial_year') == ($i) ? 'selected' : '';
                                @endphp
                                <option value="{{$i}}" {{$selected}}>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="row card-mm">
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-1 p-0">
                        <div class="crm_head d-flex align-items-center justify-content-between">
                            <div class="thumb">
                            <i class="fas fa-calendar f_s_16 white_text"></i>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4 id="giaReceivedTotal">{{ @$totalArray['giaReceivedTotal'] }}</h4>
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
                            <h4 id="committedLiabilitiesTotal">{{ @$totalArray['committedLiabilitiesTotal'] }}</h4>
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
                            <h4 id="totalBalanceTotal">{{ @$totalArray['totalBalanceTotal'] }}</h4>
                            <p>Total Balance excluding interest</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-4 p-0">
                        <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.535" height="14.888" viewBox="0 0 15.535 14.888">
                                <g id="infographic" transform="translate(0 -1)">
                                    <path id="Path_1511" data-name="Path 1511" d="M2.647,7.65a.647.647,0,0,1-.43-1.131L5.13,3.93a.644.644,0,0,1,.507-.159l5.038.61,2.854-2.7a.647.647,0,0,1,.89.941L11.345,5.531a.65.65,0,0,1-.523.173l-5.05-.613-2.695,2.4a.645.645,0,0,1-.43.163Z" transform="translate(-0.706 -0.177)" fill="#fff"/>
                                    <path id="Path_1512" data-name="Path 1512" d="M19.751,4.236a.483.483,0,0,1-.343-.142L17.143,1.829A.485.485,0,0,1,17.486,1h2.266a.486.486,0,0,1,.485.485V3.751a.485.485,0,0,1-.485.485Z" transform="translate(-5.996)" fill="#fff"/>
                                    <path id="Path_1513" data-name="Path 1513" d="M4.884,17.809v1.78H1v-1.78A.809.809,0,0,1,1.809,17H4.075A.809.809,0,0,1,4.884,17.809Z" transform="translate(-0.353 -5.643)" fill="#fff"/>
                                    <path id="Path_1514" data-name="Path 1514" d="M12.884,11.809v5.664H9V11.809A.809.809,0,0,1,9.809,11h2.266A.809.809,0,0,1,12.884,11.809Z" transform="translate(-3.174 -3.527)" fill="#fff"/>
                                    <path id="Path_1515" data-name="Path 1515" d="M20.884,13.809v4.369H17V13.809A.809.809,0,0,1,17.809,13h2.266A.809.809,0,0,1,20.884,13.809Z" transform="translate(-5.996 -4.232)" fill="#fff"/>
                                    <path id="Path_1516" data-name="Path 1516" d="M15.05,23.471H.485a.485.485,0,1,1,0-.971H15.05a.485.485,0,1,1,0,.971Z" transform="translate(0 -7.583)" fill="#fff"/>
                                </g>
                                </svg>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4 id="actualExpenditureTotal">{{ @$totalArray['actualExpenditureTotal'] }}</h4>
                            <p>Actual Expenditure incurred during the current F.Y </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg">
                    <div class="single_crm border-line-5 p-0">
                        <div class="crm_head crm_bg_4 d-flex align-items-center justify-content-between">
                            <div class="thumb">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.412" height="15.412" viewBox="0 0 15.412 15.412" class="briteness-10">
                            <g id="XMLID_17_" transform="translate(0 -0.002)">
                                <path id="XMLID_40_" d="M257.823.4A7.874,7.874,0,0,0,255,0V3.221Z" transform="translate(-247.294 0)" fill="#5e3787"/>
                                <path id="XMLID_560_" d="M406.712,164.428a7.873,7.873,0,0,0-.4-2.823l-2.823,2.823Z" transform="translate(-391.3 -156.719)" fill="#5e3787"/>
                                <path id="XMLID_561_" d="M255,65.9h.641l5.252-5.252a7.285,7.285,0,0,0-.641-.641L255,65.263Z" transform="translate(-247.294 -58.195)" fill="#5e3787"/>
                                <path id="XMLID_562_" d="M319.921,109.629l3.724-3.724a7.253,7.253,0,0,0-.475-.807l-4.531,4.531Z" transform="translate(-309.01 -101.92)" fill="#5e3787"/>
                                <path id="XMLID_2261_" d="M255,30.729,259.53,26.2a7.238,7.238,0,0,0-.807-.476L255,29.447Z" transform="translate(-247.294 -24.943)" fill="#5e3787"/>
                                <path id="XMLID_2337_" d="M6.8,29.884l-.513.068A7.254,7.254,0,0,0,1.813,41.939L6.8,36.953Z" transform="translate(0 -28.979)" fill="#5e3787"/>
                                <path id="XMLID_2340_" d="M81.205,290.006a7.254,7.254,0,0,0,11.987-4.473l.068-.513H86.191Z" transform="translate(-78.751 -276.405)" fill="#5e3787"/>
                            </g>
                            </svg>
                            </div>
                            <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                        </div>
                        <div class="crm_body">
                            <h4 id="unspentBalance31stTotal">{{ @$totalArray['unspentBalance31stTotal'] }}</h4>
                            <p>Unspent Balance (excluding Interest ) </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Total Expenditure in Lakhs</h3>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div id="chart-currently"></div>
              
            </div>
        </div>
    </div>
  
    <div class="col-xl-4">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
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