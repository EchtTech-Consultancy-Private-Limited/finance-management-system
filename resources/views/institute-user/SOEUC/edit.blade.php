@extends('layout.main')
@section('title')
    @parent
    | {{__('Edit')}}
@endsection
@section('pageTitle')
 {{ __('Edit') }}
@endsection
@section('breadcrumbs')
 {{ __('Edit') }}
@endsection
@section('content')
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Statement of Expenditure (SOE) Edit</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body pb-5">
                <form method="POST" action="{{ route('institute-user.soe-update',$soeForm->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="hidden" name="state_id" value="{{ $soeForm->state_id }}">
                            <input type="hidden" name="city_id" value="{{ $soeForm->city_id }}">
                            <label class="form-label" for="inputEmail4">Name of program<span class="text-danger">*</span></label>
                            <select id="inputState" name="program_id" class="form-control">
                                <option value="{{ @$soeForm->instituteProgram->id }}">{{ @$soeForm->instituteProgram->name }} - {{ @$soeForm->instituteProgram->code }}</option>
                            </select>
                            @error('program_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-6">
                            <label class="form-label" for="inputPassword4">Name of the Institute<span
                                    class="text-danger">*</span></label>
                            <select id="inputState" name="institute_id" class="form-control">
                                <option value="{{ @$soeForm->institute->id }}">{{ @$soeForm->institute->name }}</option>
                                {{-- @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}"
                                    {{ old('program_id') == $value->id ? 'selected' : '' }}>{{ $value->name }} -
                                    {{ $value->code }}</option>
                                @endforeach --}}
                            </select>
                            @error('institute_name')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Name of the Finance /Accounts officer<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer" value="{{ old('finance_account_officer',$soeForm->finance_account_officer) }}" id="inputAddress" placeholder="Name of the Finance /Accounts officer">
                            @error('finance_account_officer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Mobile<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer_mobile" value="{{ old('finance_account_officer_mobile',$soeForm->finance_account_officer_mobile) }}" id="inputAddress2" maxlength="10" oninput="validateInput(this)" placeholder="Mobile">
                            @error('finance_account_officer_mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Email</label>
                            <input type="text" class="form-control" name="finance_account_officer_email" value="{{ old('finance_account_officer_email',$soeForm->finance_account_officer_email) }}" id="inputAddress2" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Name of Nodal/Program Officer<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer" value="{{ old('nadal_officer',$soeForm->nadal_officer) }}" id="inputAddress2" placeholder="Name of Nodal/Program Officer">
                            @error('nadal_officer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Mobile<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer_mobile" value="{{ old('nadal_officer_mobile',$soeForm->nadal_officer_mobile) }}" maxlength="10" oninput="validateInput(this)" id="inputAddress2" placeholder="Mobile">
                            @error('nadal_officer_mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Email</label>
                            <input type="text" class="form-control" name="nadal_officer_email" value="{{ old('nadal_officer_email',$soeForm->nadal_officer_email) }}" id="inputAddress2" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">State<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="state">
                                <option value=""> Select state</option> 
                                @foreach ($states as $key => $state) 
                                <option value="{{ $state->id }}" {{ $state->id == $soeForm->state ? 'selected' : '' }}>
                                {{ ucwords($state->name) }}
                                </option> 
                                @endforeach
                            </select>
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Month</label>
                            <select id="inputState" class="form-control" name="month">
                                <option value="">Select Month</option>
                                @foreach ($financialYearMonths as $key => $month)
                                    @php
                                        $selected = $soeForm->month == $month ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $month }}" {{ $selected }}>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Financial Year<span class="text-danger">*</span></label>
                            <select id="institute-user-fy" name="financial_year" class="form-control">
                                <option value="">Select Year</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                    @php
                                        $selected = $soeForm->financial_year == ($i . ' - ' . ($i+1)) ? 'selected' : '';
                                    @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>
                            @error('financial_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                                        <input type="hidden" name="id[]" value="{{ $value->id }}">
                                        <input type="hidden" name="head[]" value="{{ $value->head }}">
                                    </th>
                                    @if($value->head == 'Man Power with Human Resource')
                                        <td rowspan="7" class="vertical-align-top"><textarea name="sanction_order" class="form-control textarea-h" id="manpower-A" rows="16">{{ $value->sanction_order }}</textarea></td>
                                    @endif
                                    <td>
                                        <input type="text" name="previous_month_expenditure[]" value="{{ $final_data[$value->head][0] ?? '' }}" class="form-control" id="previous_month_expenditure" maxlength="5" oninput="validateInput(this)" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="previous_month_total[]" value="{{ $final_data[$value->head][1] ?? '' }}" class="form-control" id="previous_month_total" maxlength="5" oninput="validateInput(this)" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value="{{ $value->unspent_balance_1st }}">
                                    </td>
                                    <td>
                                        <input type="text" name="gia_received[]" class="form-control manpower-C" value="{{ $value->gia_received }}">
                                    </td>
                                    <td>
                                        <input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly value="{{ $value->total_balance }}">
                                    </td>
                                    <td>
                                        <input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value="{{ $value->actual_expenditure }}">
                                    </td>
                                    <td>
                                        <input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly value="{{ $value->unspent_balance_last }}">
                                    </td>
                                    <td>
                                        <input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value="{{ $value->committed_liabilities }}">
                                    </td>
                                    <td>
                                        <input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly value="{{ $value->unspent_balance_31st }}">
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
                            <input type="hidden" name="id[]" value="{{ $value->id }}">
                            <input type="hidden"name="head[]" value="Grand Total">
                        </th>
                        <th class="grandTotal-A"></th>
                        <th class="grandTotal-B">
                            <input type="text" name="previous_month_expenditure[]" class="form-control grandTotal-B"
                                id="manpower-A" value="{{ old('previous_month_expenditure.7') }}" readonly>
                        </th>
                        <th class="grandTotal-B">
                            <input type="text" name="previous_month_total[]" class="form-control grandTotal-B"
                                id="manpower-A" value="{{ old('previous_month_total.7', $final_data[$value->head][2] ?? '') }}" readonly>
                        </th>
                        <th class="grandTotal-B">
                            <input type="text" name="unspent_balance_1st[]" class="form-control grandTotal-B" id="manpower-A" value="{{ $value->unspent_balance_1st }}" readonly>
                        </th>
                        <th class="grandTotal-C">
                            <input type="text" name="gia_received[]" class="form-control grandTotal-C" id="manpower-A" value="{{ $value->gia_received }}" readonly>
                        </th>
                        <th class="grandTotal-D">
                            <input type="text" name="total_balance[]" class="form-control grandTotal-D" id="manpower-A" value="{{ $value->total_balance }}" readonly>
                        </th>
                        <th class="grandTotal-E">
                            <input type="text" name="actual_expenditure[]" class="form-control grandTotal-E" id="manpower-A" value="{{ $value->actual_expenditure }}" readonly>
                        </th>
                        <th class="grandTotal-F">
                            <input type="text" name="unspent_balance_last[]" class="form-control grandTotal-F" id="manpower-A" value="{{ $value->unspent_balance_last }}" readonly>
                        </th>
                        <th class="grandTotal-G">
                            <input type="text" name="committed_liabilities[]" class="form-control grandTotal-G" id="manpower-A" value="{{ $value->committed_liabilities }}" readonly>
                        </th>
                        <th class="grandTotal-H">
                            <input type="text" name="unspent_balance_31st[]" class="form-control grandTotal-H" id="manpower-A" value="{{ $value->unspent_balance_31st }}" readonly>
                        </th>
                    </tr>                    
                    @endif
                    @endforeach
                    </tfoot>
                    </table>
                   </div>

                   <div class="float-end">
                   <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button type="reset" class="btn bg-cancel">Reset</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection