@extends('layout.main')
@section('title')
    @parent
    | {{__('List')}}
@endsection
@section('pageTitle')
 {{ __('List') }}
@endsection
@section('breadcrumbs')
 {{ __('List') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header ps-2">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Utilization Certificate (UC) List</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table mb_30">
                    <table id="datatable" class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">User</th>
                                <th scope="col">QTR UC</th>
                                <th scope="col">Program</th>
                                <th scope="col">Institute</th>
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
                                    <th>{{$sorUcList->users->name}}</th>
                                    <td>{{ $sorUcList->qtr_uc }}</td>
                                    <td>{{ $sorUcList->program->name }} - {{ $sorUcList->program->code }}</td>
                                    <td>{{ @$sorUcList->institute->name }}</td>
                                    <td>{{ $sorUcList->financial_year }}</td>
                                    <td>{{ $sorUcList->month }}</td>                                    
                                    <td>
                                        @if ($sorUcList->file)
                                        <a class="nhm-file" href="{{ asset('public/images/uploads/soeucupload/'.$sorUcList->file) }}" download>
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                                            <span>Download ({{ $sorUcList->file_size }})</span>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y',strtotime($sorUcList->date)) }}</td>
                                    <td class="{{ ($sorUcList->status == 1) ? 'approved' : (($sorUcList->status == 2) ? 'returned_by_nhq' : 'pending') }}">
                                        <a href="#" class="action_btn mr_10" data-bs-toggle="modal"
                                            data-bs-target="#soe_uc_form_{{ $sorUcList->id }}">{{ ($sorUcList->status == 1) ? "Approved" : (($sorUcList->status == 2) ? 'Returned by NHQ' : 'Awaiting') }}</a>
                                           <div class="modal fade" id="soe_uc_form_{{ $sorUcList->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="soe_uc_form_{{ $sorUcList->id }}Title"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">UC Form Status
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="myForm" method="post"
                                                            action="{{ route('national-user.soe-uc-update-change-status',$sorUcList->id) }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="reasonInput">Reason:</label>
                                                                <textarea class="form-control" name="reason"
                                                                    id="reasonInput"
                                                                    placeholder="Enter reason">{{ $sorUcList->reason }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="statusSelect">Status:</label>
                                                                <select class="form-control" id="statusSelect"
                                                                    name="status">
                                                                    <option value="">Select Status</option>
                                                                    <option value="1"
                                                                        {{ $sorUcList->status == '1' ? 'selected' : '' }}>
                                                                        Approved</option>
                                                                    <option value="2"
                                                                        {{ $sorUcList->status == '2' ? 'selected' : '' }}>
                                                                        Returned by NHQ</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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