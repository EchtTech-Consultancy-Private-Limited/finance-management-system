@extends('layout.main')
@section('title')
@parent
| {{__('NOHPPCZ -RCs')}}
@endsection
@section('pageTitle')
{{ __('NOHPPCZ -RCs') }}
@endsection
@section('breadcrumbs')
{{ __('NOHPPCZ -RCs') }}
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">NOHPPCZ -RC's Dashboard</h3>
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">NOHPPCZ -RC's Dashboard</li>
                </ol>
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{ asset('assets/img/icon/calender_icon.svg') }}" alt>
                    August 1, 2020 - August 31, 2020
                </div>
            </div>
        </div>
    </div>
</div>

@endsection