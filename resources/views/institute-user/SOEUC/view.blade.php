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
                </div>
            </div>
        </div>
        <div class="white_card_body">
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
                                <th>Previous Month Expenditure</th>
                                <th>Previous Month Total</th>
                                <th>Unspent Balance (GIA) as on 1st April</th>
                                <th>GIA Received in F.Y</th>
                                <th>Total Balance excluding interest</th>
                                <th>Actual Expenditure incurred during the current F.Y</th>
                                <th>Unspent Balance</th>
                                <th>Committed Liabilities (if any)</th>
                                <th>Unspent Balance of (GIA) as on 31st March</th>
                            </tr>

                            <tr class="table-color-th">
                                <th></th>
                                <th>A</th>
                                <th></th>
                                <th></th>
                                <th>B</th>
                                <th>C</th>
                                <th>D=(B+C)</th>
                                <th>E</th>
                                <th>F=(D-E)</th>
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
                                            <td>
                                                <p>{{ $final_data[$value->head][0] ?? '' }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $final_data[$value->head][1] ?? '' }}</p>
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
                        </tbody>

                        <tfoot>
                            @foreach($soeForm->SoeUcFormCalculation as $key => $value)
                                @if($value->head == "Grand Total")
                                    <tr>
                                        <th>
                                            Grand Total
                                        </th>
                                        <th class="grandTotal-A"></th>
                                        <th class="grandTotal-B">
                                        </th>
                                        <th class="grandTotal-B">
                                            <p>{{ $final_data[$value->head][2] ?? '' }}</p>
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
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection