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
{!! Toastr::message() !!}
<div class="col-lg-12 institute">
    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
        <div class="page_title_left d-flex align-items-center">
            <h3 class="f_s_25 f_w_700 dark_text mr_30">Statement of Expenditure (SOE)</h3>
            <!-- <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
        </div>
        <div class="page_title_right">
            <div class="page_date_button d-flex align-items-center">
                <img src="http://localhost/limitedfinance-management-system/assets/img/icon/calender_icon.svg" alt="">
                July 01 ,2024 - July 31 ,2024
            </div>
        </div>
    </div>
    <div class="white_card card_height_100 mb_30">
        <!-- <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Statement of Expenditure (SOE)</h3>
                </div>
            </div>
        </div> -->
        <div class="white_card_body">
            <div class="card-body pb-5 financial-year-institute-dashboard">
                <form method="POST" action="{{ route('institute-user.soe-save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <input type="hidden" name="state_id" value="{{ optional(Auth::user()->state)->id }}">
                            <input type="hidden" name="city_id" value="{{ optional(Auth::user()->city)->id }}">
                            <label class="form-label" for="inputEmail4">Name of program<span
                                    class="text-danger">*</span></label>
                            <select id="inputState" name="program_id" class="form-control">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $key => $value)
                                @if(in_array($value->id, explode(',', Auth::user()->program_id)))
                                        <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->code }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('program_id')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-4 mb-4">
                            <label class="form-label" for="inputPassword4">Name of the Institute<span
                                    class="text-danger">*</span></label>
                            <select id="inputState" name="institute_id" class="form-control">
                                <option value="">Select Institute</option>
                                @foreach($institutes as $key => $value)
                                @if(in_array($value->id, explode(',', Auth::user()->institute_id)))
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('institute_id')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                   
                        <div class="col-md-4 mb-4">
                            <label class="form-label" for="inputAddress">Name of the Finance /Accounts officer<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer"
                                value="{{ old('finance_account_officer', @$soeFormData->finance_account_officer) }}" id="inputAddress"
                                placeholder="Name of the Finance /Accounts officer">
                            @error('finance_account_officer')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Mobile<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer_mobile"
                                value="{{ old('finance_account_officer_mobile', @$soeFormData->finance_account_officer_mobile) }}" id="inputAddress2" maxlength="10"
                                oninput="validateInput(this)" placeholder="Mobile">
                            @error('finance_account_officer_mobile')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="finance_account_officer_email"
                                value="{{ old('finance_account_officer_email' , @$soeFormData->finance_account_officer_email) }}" id="inputAddress2"
                                placeholder="Email">
                                @error('finance_account_officer_email')
                                <span class="text-danger error">{{ $message }}</span>
                                @enderror
                        </div>
                  
                        <div class="col-md-4 mb-4">
                            <label class="form-label" for="inputAddress2">Name of Nodal/Program Officer<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer"
                                value="{{ old('nadal_officer', @$soeFormData->nadal_officer) }}" id="inputAddress2"
                                placeholder="Name of Nodal/Program Officer">
                            @error('nadal_officer')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>



                        
                        <div class="col-md-4 mb-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Mobile<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer_mobile"
                                value="{{ old('nadal_officer_mobile', @$soeFormData->nadal_officer_mobile) }}" maxlength="10" oninput="validateInput(this)"
                                id="inputAddress2" placeholder="Mobile">
                            @error('nadal_officer_mobile')
                            <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nadal_officer_email"
                                value="{{ old('nadal_officer_email', @$soeFormData->nadal_officer_email) }}" id="inputAddress2" placeholder="Email">
                                @error('nadal_officer_email')
                                <span class="text-danger error">{{ $message }}</span>
                                @enderror
                        </div>
                   
                        {{-- <div class="col-md-4 mb-4">
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
                    <div class="col-md-4 mb-4">
                        <label class="form-label" for="inputAddress2">Month<span class="text-danger">*</span></label>
                        <select id="soe_form_month" class="form-control" name="month">
                            <option value="">Select Month</option>
                            @foreach ($financialYearMonths as $key => $month)
                            @php
                            $selected = old('month') == $month ? 'selected' : '';
                            @endphp
                            <option value="{{ $month }}" {{ $selected }}>
                                {{ $month }}
                            </option>
                            @endforeach
                        </select>
                        @error('month')
                        <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
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
                @if(@$final_data['Grand Total'])
                <div><b id="total-balance-doe">Total Unspent Balance : {{ @$final_data['Grand Total']['0'] }}</b></div><br>
                @endif
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="table-color-head">
                            <th>Heads</th>
                            <th>Sanction Order Nos.</th>
                            {{-- <th>Previous Month Expenditure</th> --}}                            
                            <th>Unspent Balance (GIA) as on Perivious Month</th>
                            <th>GIA Received in F.Y</th>
                            <th>Total Balance</th>
                            <th>Expenditure Till Last Month</th>
                            <th>Actual Expenditure incurred during the current Month</th>
                            <th>Total Expenditure Till date</th>
                            <th>Unspent Balance as on <span class="current_month_selected_text">{{ date('dS M Y', strtotime('last day of this month')) }}</span></th>

                            <th>Committed Liabilities (if any)</th>
                            <th>Unspent Balance after Committed Liabilities as on <span class="current_month_selected_text">{{ date('dS M Y', strtotime('last day of this month')) }}</span></th>
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
                        @if(!empty($final_data))
                        @foreach($final_data as $head => $previousTotalMonth)
                        @if($head != 'Grand Total')
                        <tr>
                            <th>
                                {{ @$head }}
                                <input type="hidden" name="head[]" value="{{ @$head }}">
                            </th>
                            @if($head == 'Man Power with Human Resource')
                            <td rowspan="7" class="vertical-align-top"><textarea name="sanction_order"
                                    class="form-control textarea-h" id="manpower-A"
                                    rows="16">{{ old('sanction_order') }}</textarea></td>
                            @endif
                            {{-- <td><input type="text" name="previous_month_expenditure[]"
                                    value="{{ @$previousTotalMonth['0'] }}" class="form-control"
                                    id="previous_month_expenditure" maxlength="5" oninput="validateInput(this)"
                                    readonly="">
                                </td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"
                                        value="{{ @$previousTotalMonth['0'] }}" readonly></td>
                                <td><input type="text" name="gia_received[]" class="form-control manpower-C"
                                        value="{{ old('gia_received.0') }}"></td>
                                <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5"
                                        oninput="validateInput(this)" readonly=""
                                        value="{{ old('total_balance.' . $loop->iteration) }}"></td>
                                <td><input type="text" name="previous_month_total[]" value="{{ @$previousTotalMonth['1'] }}"
                                                class="form-control manpower-J" id="previous_month_total" maxlength="5"
                                                oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E"
                                        maxlength="5" oninput="validateInput(this)"
                                        value="{{ old('actual_expenditure.'. $loop->iteration) }}"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                                maxlength="5" oninput="validateInput(this)" readonly=""
                                                value="{{ @$previousTotalMonth['1'] }}"></td>
                                <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('unspent_balance_last.'. $loop->iteration) }}"></td>
                                <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"
                                        value="{{ old('committed_liabilities.'. $loop->iteration) }}"></td>
                                <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""
                                    value="{{ old('unspent_balance_31st.'. $loop->iteration) }}"></td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                            <th>
                                Man Power with Human Resource
                                <input type="hidden" name="head[]" value="Man Power with Human Resource">
                            </th>
                            <td rowspan="7" class="vertical-align-top"><textarea name="sanction_order"
                                    class="form-control textarea-h" id="manpower-A"
                                    rows="16">{{ old('sanction_order') }}</textarea></td>
                            {{-- <td><input type="text" name="previous_month_expenditure[]" class="form-control"
                                    id="previous_month_expenditure" maxlength="5" oninput="validateInput(this)" value=""
                                    readonly=""></td> --}}                               
                                <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"
                                        value="{{ old('unspent_balance_1st.0') }}"></td>
                                <td><input type="text" name="gia_received[]" class="form-control manpower-C"
                                        value="{{ old('gia_received.0') }}"></td>
                                <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5"
                                        oninput="validateInput(this)" readonly="" value="{{ old('total_balance.0') }}"></td>
                                <td><input type="text" name="previous_month_total[]" class="form-control manpower-J"
                                                id="previous_month_total" maxlength="5" oninput="validateInput(this)" value=""
                                                readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E"
                                    maxlength="5" oninput="validateInput(this)"
                                    value="{{ old('actual_expenditure.0') }}"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('total_expenditure_till_date.0') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('unspent_balance_last.0') }}"></td>
                                <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"
                                        value="{{ old('committed_liabilities.0') }}"></td>
                                <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""
                                    value="{{ old('unspent_balance_31st.0') }}"></td>
                        </tr>
                        <tr>
                            <th>
                                Meetings, Training &amp; Research

                                <input type="hidden" name="head[]" value="Meetings, Training Research">
                            </th>
                            {{-- <td><input type="text" name="previous_month_expenditure[]"
                                    value="{{ old('previous_month_expenditure.1') }}" class="form-control"
                                    id="previous_month_expenditure" readonly=""></td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]"
                                        value="{{ old('unspent_balance_1st.1') }}" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="gia_received[]" value="{{ old('gia_received.1') }}"
                                        class="form-control manpower-C"></td>
                                <td><input type="text" name="total_balance[]" value="{{ old('total_balance.1') }}"
                                        class="form-control manpower-D" maxlength="5" oninput="validateInput(this)"
                                        readonly=""></td>
                                <td><input type="text" name="previous_month_total[]"
                                                value="{{ old('previous_month_total.1') }}" class="form-control manpower-J"
                                                id="previous_month_total" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" value="{{ old('actual_expenditure.1') }}"
                                    class="form-control manpower-E" maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('total_expenditure_till_date.1') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]"
                                        value="{{ old('unspent_balance_last.1') }}" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="committed_liabilities[]"
                                        value="{{ old('committed_liabilities.1') }}" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="unspent_balance_31st[]"
                                    value="{{ old('unspent_balance_31st.1') }}" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""></td>
                        </tr>
                        <tr>
                            <th>
                                Lab Strengthening Kits, Regents &amp; Consumable (Recurring)

                                <input type="hidden" name="head[]"
                                    value="Lab Strengthening Kits, Regents &amp; Consumable (Recurring)">
                                </th>
                                {{-- <td><input type="text" name="previous_month_expenditure[]"
                                        value="{{ old('previous_month_expenditure.2') }}" class="form-control"
                                        id="previous_month_expenditure" readonly=""></td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]"
                                        value="{{ old('unspent_balance_1st.2') }}" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="gia_received[]" value="{{ old('gia_received.2') }}"
                                        class="form-control manpower-C"></td>
                                <td><input type="text" name="total_balance[]" value="{{ old('total_balance.2') }}"
                                        class="form-control manpower-D" maxlength="5" oninput="validateInput(this)"
                                        readonly=""></td>
                                <td><input type="text" name="previous_month_total[]"
                                                value="{{ old('previous_month_total.2') }}" class="form-control manpower-J"
                                                id="previous_month_total" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" value="{{ old('actual_expenditure.2') }}"
                                        class="form-control manpower-E" maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                                maxlength="5" oninput="validateInput(this)" readonly=""
                                                value="{{ old('total_expenditure_till_date.2') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]"
                                        value="{{ old('unspent_balance_last.2') }}" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="committed_liabilities[]"
                                        value="{{ old('committed_liabilities.2') }}" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="unspent_balance_31st[]"
                                    value="{{ old('unspent_balance_31st.2') }}" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""></td>
                        </tr>
                        <tr>
                            <th>
                                IEC

                                <input type="hidden" name="head[]" value="IEC">
                            </th>
                            {{-- <td><input type="text" name="previous_month_expenditure[]"
                                    value="{{ old('previous_month_expenditure.3') }}" class="form-control"
                                    id="previous_month_expenditure" readonly=""></td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]"
                                        value="{{ old('unspent_balance_1st.3') }}" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="gia_received[]" value="{{ old('gia_received.3') }}"
                                        class="form-control manpower-C"></td>
                                <td><input type="text" name="total_balance[]" value="{{ old('total_balance.3') }}"
                                        class="form-control manpower-D" maxlength="5" oninput="validateInput(this)"
                                        readonly=""></td>
                                <td><input type="text" name="previous_month_total[]"
                                                value="{{ old('previous_month_total.3') }}" class="form-control manpower-J"
                                                id="previous_month_total" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" value="{{ old('actual_expenditure.3') }}"
                                        class="form-control manpower-E" maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                                maxlength="5" oninput="validateInput(this)" readonly=""
                                                value="{{ old('total_expenditure_till_date.3') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]"
                                        value="{{ old('unspent_balance_last.3') }}" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="committed_liabilities[]"
                                        value="{{ old('committed_liabilities.3') }}" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="unspent_balance_31st[]"
                                    value="{{ old('unspent_balance_31st.3') }}" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""></td>
                        </tr>
                        <tr>
                            <th>
                                Office Expenses &amp; Travel

                                <input type="hidden" name="head[]" value="Office Expenses &amp; Travel">
                            </th>
                            {{-- <td><input type="text" name="previous_month_expenditure[]"
                                    value="{{ old('previous_month_expenditure.4') }}" class="form-control"
                                    id="previous_month_expenditure" readonly=""></td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]"
                                        value="{{ old('unspent_balance_1st.4') }}" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="gia_received[]" value="{{ old('gia_received.4') }}"
                                        class="form-control manpower-C"></td>
                                <td><input type="text" name="total_balance[]" value="{{ old('total_balance.4') }}"
                                        class="form-control manpower-D" maxlength="5" oninput="validateInput(this)"
                                        readonly=""></td>
                                <td><input type="text" name="previous_month_total[]"
                                                value="{{ old('previous_month_total.4') }}" class="form-control manpower-J"
                                                id="previous_month_total" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" value="{{ old('actual_expenditure.4') }}"
                                        class="form-control manpower-E" maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('total_expenditure_till_date.4') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]"
                                        value="{{ old('unspent_balance_last.4') }}" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="committed_liabilities[]"
                                        value="{{ old('committed_liabilities.4') }}" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="unspent_balance_31st[]"
                                    value="{{ old('unspent_balance_31st.4') }}" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""></td>
                        </tr>
                        <tr>
                            <th>
                                Lab Strengthening (Non Recurring)

                                <input type="hidden" name="head[]" value="Lab Strengthening (Non Recurring)">
                            </th>
                            {{-- <td><input type="text" name="previous_month_expenditure[]"
                                    value="{{ old('previous_month_expenditure.5') }}" class="form-control"
                                    id="previous_month_expenditure" readonly=""></td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]"
                                        value="{{ old('unspent_balance_1st.5') }}" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="gia_received[]" value="{{ old('gia_received.5') }}"
                                        class="form-control manpower-C"></td>
                                <td><input type="text" name="total_balance[]" value="{{ old('total_balance.5') }}"
                                        class="form-control manpower-D" maxlength="5" oninput="validateInput(this)"
                                        readonly=""></td>
                                <td><input type="text" name="previous_month_total[]"
                                                value="{{ old('previous_month_total.5') }}" class="form-control manpower-J"
                                                id="previous_month_total" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" value="{{ old('actual_expenditure.5') }}"
                                        class="form-control manpower-E" maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                                maxlength="5" oninput="validateInput(this)" readonly=""
                                                value="{{ old('total_expenditure_till_date.5') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]"
                                        value="{{ old('unspent_balance_last.5') }}" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="committed_liabilities[]"
                                        value="{{ old('committed_liabilities.5') }}" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="unspent_balance_31st[]"
                                    value="{{ old('unspent_balance_31st.5') }}" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""></td>
                        </tr>
                        <tr>
                            <th>
                                Other Activities

                                <input type="hidden" name="head[]" value="Other Activities">
                            </th>
                            {{-- <td><input type="text" name="previous_month_expenditure[]"
                                    value="{{ old('previous_month_expenditure.6') }}" class="form-control"
                                    id="previous_month_expenditure" readonly=""></td> --}}                                
                                <td><input type="text" name="unspent_balance_1st[]"
                                        value="{{ old('unspent_balance_1st.6') }}" class="form-control manpower-B"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="gia_received[]" value="{{ old('gia_received.6') }}"
                                        class="form-control manpower-C"></td>
                                <td><input type="text" name="total_balance[]" value="{{ old('total_balance.6') }}"
                                        class="form-control manpower-D" maxlength="5" oninput="validateInput(this)"
                                        readonly=""></td>
                                <td><input type="text" name="previous_month_total[]"
                                        value="{{ old('previous_month_total.6') }}" class="form-control manpower-J"
                                        id="previous_month_total" readonly=""></td>
                                <td><input type="text" name="actual_expenditure[]" value="{{ old('actual_expenditure.6') }}"
                                        class="form-control manpower-E" maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="total_expenditure_till_date[]" class="form-control manpower-I"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('total_expenditure_till_date.6') }}"></td>
                                <td><input type="text" name="unspent_balance_last[]"
                                        value="{{ old('unspent_balance_last.6') }}" class="form-control manpower-F"
                                        maxlength="5" oninput="validateInput(this)" readonly=""></td>
                                <td><input type="text" name="committed_liabilities[]"
                                        value="{{ old('committed_liabilities.6') }}" class="form-control manpower-G"
                                        maxlength="5" oninput="validateInput(this)"></td>
                                <td><input type="text" name="unspent_balance_31st[]"
                                    value="{{ old('unspent_balance_31st.6') }}" class="form-control manpower-H"
                                    maxlength="5" oninput="validateInput(this)" readonly=""></td>
                        </tr>
                        @endif
                    
                        <tr class="t-foot">
                            <th>
                                Grand Total

                                <input type="hidden" name="head[]" value="Grand Total">
                            </th>
                            <th class="grandTotal-A">

                            </th>
                            {{-- <th class="grandTotal-B">
                                <input type="text" name="previous_month_expenditure[]" class="form-control grandTotal-B"
                                    id="manpower-A" value="{{ old('previous_month_expenditure.7') }}" readonly>
                            </th> --}}                            
                            <th class="grandTotal-B">
                                <input type="text" name="unspent_balance_1st[]" class="form-control grandTotal-B"
                                    id="manpower-A" value="{{ @$previousTotalMonth['0'] }}" readonly>
                            </th>
                            <th class="grandTotal-C">
                                <input type="text" name="gia_received[]" class="form-contal-C grandTotal-C"
                                    id="manpower-A" value="{{ old('gia_received.7') }}" readonly>
                            </th>
                            <th class="grandTotal-D">
                                <input type="text" name="total_balance[]" class="form-control grandTotal-D"
                                    id="manpower-A" value="{{ old('total_balance.7') }}" readonly>
                            </th>
                            <th class="grandTotal-J">
                                <input type="text" name="previous_month_total[]" class="form-control manpower-J"
                                    id="manpower-A"
                                    value="{{ old('previous_month_total.7', @$previousTotalMonth['2']) }}" readonly>
                            </th>
                            <th class="grandTotal-E">
                                <input type="text" name="actual_expenditure[]" class="form-control grandTotal-E"
                                    id="manpower-A" value="{{ old('actual_expenditure.7') }}" readonly>
                            </th>
                                <th class="grandTotak-I">
                                <input type="text" name="total_expenditure_till_date[]" class="form-control grandTotal-I"
                                        maxlength="5" oninput="validateInput(this)" readonly=""
                                        value="{{ old('previous_month_total.7', @$previousTotalMonth['2']) }}">
                                </th>
                            <th class="grandTotal-F">
                                <input type="text" name="unspent_balance_last[]" class="form-control grandTotal-F"
                                    id="manpower-A" value="{{ old('unspent_balance_last.7') }}" readonly>
                            </th>
                            <th class="grandTotal-G">
                                <input type="text" name="committed_liabilities[]" class="form-control grandTotal-G"
                                    id="manpower-A" value="{{ old('committed_liabilities.7') }}" readonly>
                            </th>
                            <th class="grandTotal-H">
                                <input type="text" name="unspent_balance_31st[]" class="form-control grandTotal-H"
                                    id="manpower-A" value="{{ old('unspent_balance_31st.7') }}" readonly>
                            </th>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="float-end">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn bg-cancel">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection