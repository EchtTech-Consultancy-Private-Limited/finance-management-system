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
                    <h3 class="m-0">Statement of Expenditure (SOE) List</h3>
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
                                <th scope="col">Name of program</th>
                                <th scope="col">Name of the Institute</th>
                                <th scope="col">Month</th>
                                <th scope="col">Financial Year</th>
                                <th scope="col">Status</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($soeucForms as $soeucForm)
                            <tr>
                                <th scope="row">{{ @$loop->iteration }}</th>
                                <td>{{ @$soeucForm->instituteProgram->name }} - {{ @$soeucForm->instituteProgram->code }}</td>
                                <td>{{ @$soeucForm->institute->name }}</td>
                                <td>{{ @$soeucForm->month }}</td>
                                <td>{{ @$soeucForm->financial_year }}</td>
                                <td class="{{ ($soeucForm->status == 1) ? 'approved' : (($soeucForm->status == 2) ? 'returned_by_nhq' : 'pending') }}">
                                    <a href="#" class="action_btn" data-bs-toggle="modal" data-bs-target="#soe_uc_form_{{ $soeucForm->id }}">{{ ($soeucForm->status == 1) ? "Approved" : (($soeucForm->status == 2) ? 'Returned by NHQ' : 'Awaiting') }}</a>
                                    <div class="modal fade" id="soe_uc_form_{{ $soeucForm->id }}" tabindex="-1" role="dialog" aria-labelledby="soe_uc_form_{{ $soeucForm->id }}Title"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">SOE Form Status</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="myForm" method="post" action="{{ route('national-user.soe-change-status',$soeucForm->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="reasonInput">Upload Sanction Order:</label>
                                                            <input type="hidden" value="{{$soeucForm->section_order_file}}" name="old_section_order">
                                                            <input type="hidden" value="{{$soeucForm->section_order_file_size}}" name="old_section_order_file_size">
                                                            <input type="file" class="form-control" name="section_order" id="section_order" {{ $soeucForm->section_order_file ? '' : 'required' }}>

                                                        </div>
                                                        @if ($soeucForm->section_order_file)
                                                        <a class="nhm-file" href="{{ asset('public/images/uploads/soeuc/'.$soeucForm->section_order_file) }}"
                                                            download>
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                            <span>Download ({{ $soeucForm->section_order_file_size }})</span>
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a><br>
                                                        @endif
                                                        @error('section_order')
                                                            <span class="text-danger error">{{ $message }}</span>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label for="reasonInput">Reason:</label>
                                                            <textarea class="form-control" name="reason" id="reasonInput" placeholder="Enter reason">{{ $soeucForm->reason }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="statusSelect">Status:</label>
                                                            <select class="form-control" id="statusSelect" name="status">
                                                                <option value="">Select Status</option>
                                                                <option value="1" {{ $soeucForm->status == '1' ? 'selected' : '' }}>Approved</option>
                                                                <option value="2" {{ $soeucForm->status == '2' ? 'selected' : '' }}>Returned by NHQ</option>                                                                
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ @$soeucForm->reason ?? 'N/A' }}</td>
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{ route('national-user.soe-expense-view',$soeucForm->id) }}" class="action_btn mr_10"> <i class="far fa-eye"></i> </a>
                                    </div>
                                </td>
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