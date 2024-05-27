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
        <div class="white_card_header">
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
                                <th scope="col">State</th>
                                <th scope="col">District</th>
                                <th scope="col">Expense Plan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nationalSeoExpanses as $nationalSeoExpanse)
                            <tr>
                                <th scope="row">{{ @$loop->iteration }}</th>
                                <td>{{ ucwords(@$nationalSeoExpanse->states->name) }}</td>
                                <td>{{ ucwords(@$nationalSeoExpanse->cities->name) }}</td>
                                <td>{{ ($nationalSeoExpanse->expanse_plan == 1 ? 'Year' : ($nationalSeoExpanse->expanse_plan == 2 ? 'Month' : 'Quarter')) }}</td>
                                <td>
                                    <a href="#" class="action_btn mr_10" data-bs-toggle="modal" data-bs-target="#national_soe_form_{{ $nationalSeoExpanse->id }}">{{ ($nationalSeoExpanse->status == 1) ? "Approved" : (($nationalSeoExpanse->status == 2) ? 'Not-Approved' : 'Pending') }}</a>
                                    <div class="modal fade" id="national_soe_form_{{ $nationalSeoExpanse->id }}" tabindex="-1" role="dialog" aria-labelledby="national_soe_form_{{ $nationalSeoExpanse->id }}Title"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">SOE Expanse Status</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="myForm" method="post" action="{{ route('national-user.soe-change-status',$nationalSeoExpanse->id) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="reasonInput">Reason:</label>
                                                            <textarea class="form-control" name="reason" id="reasonInput" placeholder="Enter reason">{{ $nationalSeoExpanse->reason }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="statusSelect">Status:</label>
                                                            <select class="form-control" id="statusSelect" name="status">
                                                                <option value="">Select Status</option>
                                                                <option value="1" {{ $nationalSeoExpanse->status == '1' ? 'selected' : '' }}>Approve</option>
                                                                <option value="3" {{ $nationalSeoExpanse->status == '3' ? 'selected' : '' }}>Pending</option>
                                                                <option value="2" {{ $nationalSeoExpanse->status == '2' ? 'selected' : '' }}>Not Approved</option>
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
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{ route('national-user.soe-edit',$nationalSeoExpanse->id) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="{{ route('national-user.soe-destroy',$nationalSeoExpanse->id) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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