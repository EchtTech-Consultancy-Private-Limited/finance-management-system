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
                <form method="POST" action="{{ route('national-user.soe-update',$nationalSeoExpans->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputState">State<span class="text-danger">*</span></label>
                            <select id="nationalState" class="form-control" name="state">
                                <option value="">Select state</option> 
                                @foreach ($states as $key => $state)
                                    <option value="{{ $state->id }}" {{ $state->id == $nationalSeoExpans->state_id ? 'selected' : '' }}>
                                        {{ ucwords($state->name) }}
                                    </option> 
                                @endforeach
                            </select>
                            @error('state')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputState">District<span class="text-danger">*</span></label>
                            <select id="filter-city" class="form-control" name="city_id">
                                <option value="">Select District</option>
                                @if($nationalSeoExpans->city_id)
                                <option value="{{ $nationalSeoExpans->city_id }}" selected>{{ ucwords($nationalSeoExpans->cities->name) }}</option>
                                @endif
                            </select>
                            @error('city_id')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Expense Plan<span class="text-danger">*</span></label>
                            <div>
                                <input type="radio" id="yearPlan" name="expanse_plan" value="1" {{ $nationalSeoExpans->expanse_plan == 1 ? 'checked' : '' }}>
                                <label for="yearPlan">Year</label>
                    
                                <input type="radio" id="monthPlan" name="expanse_plan" value="2" {{ $nationalSeoExpans->expanse_plan == 2 ? 'checked' : '' }}>
                                <label for="monthPlan">Month</label>
                    
                                <input type="radio" id="quarterPlan" name="expanse_plan" value="3" {{ $nationalSeoExpans->expanse_plan == 3 ? 'checked' : '' }}>
                                <label for="quarterPlan">Quarter</label>
                            </div>
                            @error('expanse_plan')
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
                    @if(!$nationalSeoExpans->SoeUcFormCalculation->isEmpty())
                    @foreach($nationalSeoExpans->SoeUcFormCalculation as $key => $value)
                    @if($value->head != "Grand Total")
                    <tr>
                        <th>
                            {{ $value->head }}
                            <input type="hidden" name="id[]" value="{{ $value->id }}">
                            <input type="hidden" name="head[]" value="{{ $value->head }}">
                        </th>
                        <td><input type="text" name="sanction_order[]" class="form-control" id="manpower-A" maxlength="5" oninput="validateInput(this)" value="{{ $value->sanction_order }}"></td>
                        <td><input type="text" name="unspent_balance_1st[]" class="form-control manpower-B" maxlength="5" oninput="validateInput(this)" value="{{ $value->unspent_balance_1st }}" readonly></td>
                        <td><input type="text" name="gia_received[]" class="form-control manpower-C" maxlength="5" oninput="validateInput(this)" value="{{ $value->gia_received }}"></td>
                        <td><input type="text" name="total_balance[]" class="form-control manpower-D" maxlength="5" oninput="validateInput(this)" value="{{ $value->total_balance }}" readonly></td>
                        <td><input type="text" name="actual_expenditure[]" class="form-control manpower-E" maxlength="5" oninput="validateInput(this)" value="{{ $value->actual_expenditure }}" readonly></td>
                        <td><input type="text" name="unspent_balance_last[]" class="form-control manpower-F" maxlength="5" oninput="validateInput(this)" value="{{ $value->unspent_balance_last }}" readonly></td>
                        <td><input type="text" name="committed_liabilities[]" class="form-control manpower-G" maxlength="5" oninput="validateInput(this)" value="{{ $value->committed_liabilities }}" readonly></td>
                        <td><input type="text" name="unspent_balance_31st[]" class="form-control manpower-H" maxlength="5" oninput="validateInput(this)" value="{{ $value->unspent_balance_31st }}" readonly></td>
                    </tr>
                    @endif
                    @endforeach                    
                    @endif
                   </tbody>
                   <tfoot>
                    @foreach($nationalSeoExpans->SoeUcFormCalculation as $key => $value)
                    @if($value->head == "Grand Total")
                    <tr>
                        <th>
                            Grand Total
                            <input type="hidden" name="id[]" value="{{ $value->id }}">
                            <input type="hidden"name="head[]" value="Grand Total">
                        </th>
                        <th class="grandTotal-A">
                            <input type="text" name="sanction_order[]" class="form-control grandTotal-A" id="manpower-A" value="{{ $value->sanction_order }}">
                        </th>
                        <th class="grandTotal-B">
                            <input type="text" name="unspent_balance_1st[]" class="form-control grandTotal-B" id="manpower-A" value="{{ $value->unspent_balance_1st }}"readonly>
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
<script>
    $(document).on('change', '#nationalState', function() {
    let state_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "{{route('filterCity')}}",
        data: {
            'state_id': state_id
        },
        success: function(data) {
            $("#filter-city").html(data);
        }
    });
});
</script>
@endsection