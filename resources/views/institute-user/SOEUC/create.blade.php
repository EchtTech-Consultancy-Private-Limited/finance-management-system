@extends('layout.main')
@section('title')
@parent
| {{__('Create')}}
@endsection
@section('pageTitle')
{{ __('Create') }}
@endsection
@section('breadcrumbs')
{{ __('Create') }}
@endsection
@section('content')

<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Statement of Expenditure (SOE)</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body pb-5 financial-year-institute-dashboard">
                <form method="POST" action="{{ route('institute-user.soe-uc-save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="hidden" name="state_id" value="#">
                            <input type="hidden" name="city_id" value="#">
                            <input type="hidden" name="expanse_plan" value="#">
                            <label class="form-label" for="inputEmail4">Name of program<span
                                    class="text-danger">*</span></label>
                            <select id="inputState" name="program_id" class="form-control">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                <option value="{{ $value->id }}"
                                    {{ old('program_id') == $value->id ? 'selected' : '' }}>{{ $value->name }} -
                                    {{ $value->code }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-6">
                            <label class="form-label" for="inputPassword4">Name of the Institute<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="institute_name"
                                value="{{ Auth::user()->institute_name }}" id="inputPassword4" readonly>
                            @error('institute_name')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Name of the Finance /Accounts officer<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer"
                                value="{{ old('finance_account_officer') }}" id="inputAddress"
                                placeholder="Name of the Finance /Accounts officer">
                            @error('finance_account_officer')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Mobile<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer_mobile"
                                value="{{ old('finance_account_officer_mobile') }}" id="inputAddress2" maxlength="10"
                                oninput="validateInput(this)" placeholder="Mobile">
                            @error('finance_account_officer_mobile')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Email</label>
                            <input type="text" class="form-control" name="finance_account_officer_email"
                                value="{{ old('finance_account_officer_email') }}" id="inputAddress2"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Name of Nodal/Program Officer<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer"
                                value="{{ old('nadal_officer') }}" id="inputAddress2"
                                placeholder="Name of Nodal/Program Officer">
                            @error('nadal_officer')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Mobile<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer_mobile"
                                value="{{ old('nadal_officer_mobile') }}" maxlength="10" oninput="validateInput(this)"
                                id="inputAddress2" placeholder="Mobile">
                            @error('nadal_officer_mobile')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Email</label>
                            <input type="text" class="form-control" name="nadal_officer_email"
                                value="{{ old('nadal_officer_email') }}" id="inputAddress2" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">State<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="state">
                                <option value=""> Select state</option> 
                                @foreach ($states as $key => $state) 
                                <option value="{{ $state->id }}" {{ $state->id == old('state') ? 'selected' : '' }}>
                        {{ ucwords($state->name) }}
                        </option>
                        @endforeach
                        </select>
                        @error('state')
                        <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">Month</label>
                        <select id="inputState" class="form-control" name="month">
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
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">Financial Year<span
                                class="text-danger">*</span></label>
                        <select id="institute-user-fy" name="financial_year" class="form-control">
                            <option value="">Select Year</option>
                            @for ($i = date("Y")-10; $i <= date("Y")+10; $i++) @php $selected=old('financial_year')==($i
                                . ' - ' . ($i+1)) ? 'selected' : '' ; @endphp <option value="{{$i}} - {{$i+1}}"
                                {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                        </select>
                        @error('financial_year')
                        <span class="text-danger error">{{ $message }}</span>
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

                        <tr>
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
                        <tr>
                            <th>
                                Man Power with Human Resource
                                <input type="hidden" name="id[]" value="">
                                <input type="hidden" name="head[]" value="Man Power with Human Resource">
                            </th>
                            <td rowspan="7" class="vertical-align-top">
                           <textarea name="sanction_order[]" class="form-control" id="manpower-A" rows="16"></textarea>
                        </td>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C abc" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>
                        <tr>
                            <th>
                                Meetings, Training &amp; Research
                                <input type="hidden" name="id[]" value="2">
                                <input type="hidden" name="head[]" value="Meetings, Training Research">
                            </th>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>
                        <tr>
                            <th>
                                Lab Strengthening Kits, Regents &amp; Consumable (Recurring)
                                <input type="hidden" name="id[]" value="3">
                                <input type="hidden" name="head[]" value="Lab Strengthening Kits, Regents &amp; Consumable (Recurring)">
                            </th>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>
                        <tr>
                            <th>
                                IEC
                                <input type="hidden" name="id[]" value="4">
                                <input type="hidden" name="head[]" value="IEC">
                            </th>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>
                        <tr>
                            <th>
                                Office Expenses &amp; Travel
                                <input type="hidden" name="id[]" value="5">
                                <input type="hidden" name="head[]" value="Office Expenses &amp; Travel">
                            </th>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>
                        <tr>
                            <th>
                                Lab Strengthening (Non Recurring)
                                <input type="hidden" name="id[]" value="6">
                                <input type="hidden" name="head[]" value="Lab Strengthening (Non Recurring)">
                            </th>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>
                        <tr>
                            <th>
                                Other Activities
                                <input type="hidden" name="id[]" value="7">
                                <input type="hidden" name="head[]" value="Other Activities">
                            </th>
                            <td><input type="text" name="previous_month_expenditure" class="form-control" id="previous_month_expenditure" value="" readonly=""></td>
                            <td><input type="text" name="previous_month_total" class="form-control" id="previous_month_total" value="" readonly=""></td>
                            <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="gia_received[]" class="form-control manpower-C" oninput="validateArthmeticInput(this)" value=""></td>
                            <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                            <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value=""></td>
                            <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" readonly="" value=""></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Grand Total
                                <input type="hidden" name="id[]" value="">
                                <input type="hidden" name="head[]" value="Grand Total">
                            </th>
                            <th class="grandTotal-A">
                                <input type="text" name="sanction_order[]" class="form-control grandTotal-A"
                                    id="manpower-A" readonly>
                            </th>
                            <th class="grandTotal-B">
                                <input type="text" name="unspent_balance_1st[]" class="form-control grandTotal-B"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-B">
                                <input type="text" name="unspent_balance_1st[]" class="form-control grandTotal-B"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-B">
                                <input type="text" name="unspent_balance_1st[]" class="form-control grandTotal-B"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-C">
                                <input type="text" name="gia_received[]" class="form-contal-C grandTotal-C"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-D">
                                <input type="text" name="total_balance[]" class="form-control grandTotal-D"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-E">
                                <input type="text" name="actual_expenditure[]" class="form-control grandTotal-E"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-F">
                                <input type="text" name="unspent_balance_last[]" class="form-control grandTotal-F"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-G">
                                <input type="text" name="committed_liabilities[]" class="form-control grandTotal-G"
                                    id="manpower-A" value="" readonly>
                            </th>
                            <th class="grandTotal-H">
                                <input type="text" name="unspent_balance_31st[]" class="form-control grandTotal-H"
                                    id="manpower-A" value="" readonly>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="float-end">
                <button type="submit" class="btn btn-primary me-2">Save</button>
                <button type="reset" class="btn bg-cancel">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection