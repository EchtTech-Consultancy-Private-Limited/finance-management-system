@extends('layout.main')
@section('title')
@parent
| {{ __('View') }}
@endsection
@section('pageTitle')
{{ __('View') }}
@endsection
@section('breadcrumbs')
{{ __('View') }}
@endsection
@section('content')
<div class="col-lg-12">
    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
        <div class="page_title_left d-flex align-items-center">
            <h3 class="f_s_25 f_w_700 dark_text mr_30">Statement of Expenditure (SOE) View</h3>
        </div>
        <div class="page_title_right">
            <div class="page_date_button d-flex align-items-center">
                <img src="http://localhost/limitedfinance-management-system/assets/img/icon/calender_icon.svg" alt="">
                @php
                    $first_date = date('F d ,Y',strtotime('first day of this month'));
                    $last_date = date('F d ,Y',strtotime('last day of this month'));
                    @endphp
                    {{ $first_date }} - {{ $last_date }}
            </div>
        </div>
    </div>
    <div class="white_card card_height_100 mb_30 position-relative" id="institute_view_soe">
    <button class="dt-button buttons-print soe-print-button" type="button" onclick="printDiv('institute_view_soe')"><span> <i class="fa fa-print"></i></span></button>

        <div class="white_card_body">
            <div class="card-body pb-5">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name of program</label>
                        <p>{{ @$soeForm->instituteProgram->name }} - {{ @$soeForm->instituteProgram->code }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name of the Institute</label>
                        <p>{{ @$soeForm->institute->name }}</p>
                    </div>
               
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name of the Finance /Accounts officer</label>
                        <p>{{ $soeForm->finance_account_officer }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Finance/Accounts officer Mobile</label>
                        <p>{{ $soeForm->finance_account_officer_mobile }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Finance/Accounts officer Email</label>
                        <p>{{ $soeForm->finance_account_officer_email }}</p>
                    </div>
               
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Name of Nodal/Program Officer</label>
                        <p>{{ $soeForm->nadal_officer }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Nodal/Program Officer Mobile</label>
                        <p>{{ $soeForm->nadal_officer_mobile }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Nodal/Program Officer Email</label>
                        <p>{{ $soeForm->nadal_officer_email }}</p>
                    </div>
               
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Month</label>
                        <p>{{ $soeForm->month }}</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Financial Year</label>
                        <p>{{ $soeForm->financial_year }}</p>
                    </div>
                </div>

                <div class="table-responsive fms-table mt-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="table-color-head">
                                <th>Heads</th>
                                <th>Sanction Order Nos.</th>
                                {{-- <th>Previous Month Expenditure</th> --}}                                
                                <th>Unspent Balance (GIA) as on Perivious Month</th>
                                <th>GIA Received in Current Month</th>
                                <th>Total Balance</th>
                                <th>Expenditure Till Last Month</th>
                                <th>Actual Expenditure incurred during the current month</th>
                                <th>Total Expenditure Till date</th>
                                <th>Unspent Balance as on {{ date('d', strtotime("last day of $soeForm->month " . date('Y'))) }}st {{ @$soeForm->month }}</th>
                                <th>Committed Liabilities (if any)</th>
                                <th>Unspent Balance after Committed Liabilities as on {{ date('d', strtotime("last day of $soeForm->month " . date('Y'))) }}st {{ @$soeForm->month }}</th>
                            </tr>

                            <tr class="table-color-th">
                                <th></th>
                                <th>A</th>
                                {{-- <th></th> --}}                            
                                <th>B</th>
                                <th>C</th>
                                <th>D=(B+C)</th>
                                <th>E</th>
                                <th>F</th>
                                <th>G=(E+F)</th>
                                <th>H=(D-F)</th>
                                <th>I</th>
                                <th>J=(H-I)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$soeForm->SoeUcFormCalculation->isEmpty())
                            @foreach($soeForm->SoeUcFormCalculation as $key => $value)
                            @if($value->head != "Grand Total")
                            <tr>
                                <th>
                                    {{ $value->head }}
                                </th>
                                @if($value->head == 'Man Power with Human Resource')
                                <td rowspan="7" class="vertical-align-top">
                                    <p>{{ $value->sanction_order }}</p>
                                </td>
                                @endif
                                {{-- <td>
                                    <p>{{ $final_data[$value->head][0] ?? '' }}</p>
                                </td> --}}                                
                                <td>
                                    <p>{{ $value->unspent_balance_1st }}</p>
                                </td>
                                <td>
                                    <p>{{ $value->gia_received }}</p>
                                </td>
                                <td>
                                    <p>{{ $value->total_balance }}</p>
                                </td>
                                <td>
                                    <p>{{ $final_data[$value->head][1] ?? '0' }}</p>
                                </td>
                                <td>
                                    <p>{{ $value->actual_expenditure }}</p>
                                </td>
                                <td>
                                    <p>{{ @$final_data[$value->head][1]+@$value->actual_expenditure }}</p>
                                </td>
                                <td>
                                    <p>{{ $value->unspent_balance_last }}</p>
                                </td>
                                <td>
                                    <p>{{ $value->committed_liabilities }}</p>
                                </td>
                                <td>
                                    <p>{{ $value->unspent_balance_31st }}</p>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            @foreach($soeForm->SoeUcFormCalculation as $key => $value)
                            @if($value->head == "Grand Total")
                            <tr class="t-foot">
                                <th>
                                    Grand Total
                                </th>
                                <th class="grandTotal-A"></th>
                                {{-- <th class="grandTotal-B">
                                </th> --}}                                
                                <th class="grandTotal-B">
                                    <p>{{ $value->unspent_balance_1st }}</p>
                                </th>
                                <th class="grandTotal-C">
                                    <p>{{ $value->gia_received }}</p>
                                </th>
                                <th class="grandTotal-D">
                                    <p>{{ $value->total_balance }}</p>
                                </th>
                                <th class="grandTotal-B">
                                    <p>{{ $final_data[$value->head][2] ?? '0' }}</p>
                                </th>
                                <th class="grandTotal-E">
                                    <p>{{ $value->actual_expenditure }}</p>
                                </th>
                                <th class="grandTotal-I">
                                    <p>{{ @$final_data[$value->head][2]+@$value->actual_expenditure }}</p>
                                </th>
                                <th class="grandTotal-F">
                                    <p>{{ $value->unspent_balance_last }}</p>
                                </th>
                                <th class="grandTotal-G">
                                    <p>{{ $value->committed_liabilities }}</p>
                                </th>
                                <th class="grandTotal-H">
                                    <p>{{ $value->unspent_balance_31st }}</p>
                                </th>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection