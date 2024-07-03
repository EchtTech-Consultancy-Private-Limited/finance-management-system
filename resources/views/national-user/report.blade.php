@extends('layout.main')
@section('title')
    @parent
    | {{__('Report')}}
@endsection
@section('pageTitle')
 {{ __('Report') }}
@endsection
@section('breadcrumbs')
 {{ __('Report') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Generate Report</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form action="{{ route('national-user.report-export') }}" id="national-report" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label" for="inputAddress2">Program<span class="text-danger">*</span></label>
                            <select id="program" class="form-control" name="program_id">
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{  request('program_id') == $program->id ? 'selected' : '' }}>{{ $program->name }} - {{ $program->code }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="form-label">Module<span class="text-danger">*</span></label>
                                <select class="form-control"  name="modulename" id="form_type">
                                <option value="">Select Module</option>
                                <option value='1' {{  request('modulename') == '1' ? 'selected' : '' }}>SOE Form</option>
                                <option value='2' {{  request('modulename') == '2' ? 'selected' : '' }}>UC Upload</option>
                            </select>
                            @error('modulename') 
                                <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group">
                                <label class="form-label" for="district">From Date</label>
                                <input type="date" name="startdate" value="{{ request('startdate') }}" class="form-control">
                                @error('startdate') 
                                    <span class="form-text text-muted">{{ $message }}</span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6">
                            <div class="form-group">
                                <label class="form-label" for="fromYear">To Date</label>
                                <input type="date" name="enddate" value="{{ request('enddate') }}" class="form-control">
                                @error('enddate') 
                                    <span class="form-text text-muted">{{ $message }}</span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="float-end mt-4">
                                <button type="submit" class="btn bg-cancel me-3 form_type_uc_list">Search</button>
                                <a href="{{ route('national-user.report') }}" class="btn bg-danger me-3 form_type_uc_list">Reset</a>
                                <button type="submit" class="btn btn-primary" id="form_type_export_button">Export Excel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="QA_section">
                <div class="QA_table form_type_uc_list" id="form_type_uc_list">
                    <table class="table datatable table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">QTR UC</th>
                                <th scope="col">Program</th>
                                <th scope="col">Year of UC</th>
                                <th scope="col">Month</th>
                                <th scope="col">UC File Upload</th>
                                <th scope="col">UC Uploaded Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sorUcLists as $key => $sorUcList)
                                <tr>
                                    <th scope="row">{{ @$loop->iteration }}</th>
                                    <td>{{ $sorUcList->qtr_uc }}</td>
                                    <td>{{ $sorUcList->program->name }} - {{ $sorUcList->program->code }}</td>
                                    <td>{{ $sorUcList->financial_year }}</td>
                                    <td>{{ $sorUcList->month }}</td>                                    
                                    <td>
                                        @if ($sorUcList->file)
                                        <a class="nhm-file" href="{{ asset('images/uploads/soeucupload/'.$sorUcList->file) }}" download>
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                                            <span>Download ({{ $sorUcList->file_size }})</span>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y',strtotime($sorUcList->date)) }}</td>
                                    <td>{{ ($sorUcList->status == 1) ? 'Approved' : (($sorUcList->status == 2) ? 'Returned by NHQ' : '') }}</td>
                                    <td>{{ $sorUcList->reason ?? 'N/A' }}</td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection