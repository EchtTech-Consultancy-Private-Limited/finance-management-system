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
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Statement of Expenditure (SOE) View</h3>
                    <button class="buttons-print float-right" type="button"
                        onclick="printDiv('view_soe')"><span> <i
                        class="fa fa-print"></i></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="white_card_body" id="view_soe">
            <div class="card-body pb-5">
                <div class="row mb-3">
                    <div class="col-md-6">                       
                        <label class="form-label">Name of program</label>
                        <p>{{ @$soeForm->instituteProgram->name }} - {{ @$soeForm->instituteProgram->code }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name of the Institute</label>
                        <p>{{ @$soeForm->institute->name }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Name of the Finance /Accounts officer</label>
                        <p>{{ $soeForm->finance_account_officer }}</p>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Finance/Accounts officer Mobile</label>
                        <p>{{ $soeForm->finance_account_officer_mobile }}</p>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Finance/Accounts officer Email</label>
                        <p>{{ $soeForm->finance_account_officer_email }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Name of Nodal/Program Officer</label>
                        <p>{{ $soeForm->nadal_officer }}</p>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nodal/Program Officer Mobile</label>
                        <p>{{ $soeForm->nadal_officer_mobile }}</p>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Nodal/Program Officer Email</label>
                        <p>{{ $soeForm->nadal_officer_email }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Month</label>
                        <p>{{ $soeForm->month }}</p>
                    </div>
                    <div class="col-md-4">
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
                                <th>Expenditure Till Last Month</th>
                                <th>Unspent Balance (GIA) as on 1st April</th>
                                <th>GIA Received in F.Y</th>
                                <th>Total Balance excluding interest</th>
                                <th>Actual Expenditure incurred during the current Month</th>
                                <th>Total Expenditure Till date</th>
                                <th>Unspent Balance as on 31st March</th>
                                <th>Committed Liabilities (if any)</th>
                                <th>Unspent Balance after Committed Liabilities as on 31st March</th>
                            </tr>

                            <tr class="table-color-th">
                                <th></th>
                                <th>A</th>
                                {{-- <th></th> --}}
                                <th></th>
                                <th>B</th>
                                <th>C</th>
                                <th>D=(B+C)</th>
                                <th>E</th>
                                <th>F=(D-E)</th>
                                <th></th>
                                <th>G</th>
                                <th>H=(F-G)</th>
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
                                                <td rowspan="7" class="vertical-align-top"><p>{{ $value->sanction_order }}</p></td>
                                            @endif
                                            {{-- <td>
                                                <p>{{ $final_data[$value->head][0] ?? '' }}</p>
                                            </td> --}}
                                            <td>
                                                <p>{{ $final_data[$value->head][1] ?? 'N/A' }}</p>
                                            </td>
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
                                            <p>{{ old('previous_month_expenditure.7') }}</p>
                                        </th> --}}
                                        <th class="grandTotal-B">
                                            <p>{{ $final_data[$value->head][2] ?? 'N/A' }}</p>
                                        </th>
                                        <th class="grandTotal-B">
                                            <p>{{ $value->unspent_balance_1st }}</p>
                                        </th>
                                        <th class="grandTotal-C">
                                            <p>{{ $value->gia_received }}</p>
                                        </th>
                                        <th class="grandTotal-D">
                                            <p>{{ $value->total_balance }}</p>
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