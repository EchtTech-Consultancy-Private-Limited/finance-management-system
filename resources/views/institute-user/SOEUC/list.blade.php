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
                    <h3 class="m-0">SOE UC List</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table mb_30">
                    <table class="table lms_table_active3 ">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">Name of program</th>
                                <th scope="col">Name of the Institute</th>
                                <th scope="col">State</th>
                                <th scope="col">Month</th>
                                <th scope="col">Financial Year</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($soeucForms as $soeucForm)
                            <tr>
                                <th scope="row">{{ @$loop->iteration }}</th>
                                <td>{{ @$soeucForm->program_name }}</td>
                                <td>{{ @$soeucForm->institute_name }}</td>
                                <td>{{ @$soeucForm->states->name }}</td>
                                <td>{{ @$soeucForm->month }}</td>
                                <td>{{ @$soeucForm->financial_year }}</td>
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{ route('institute-user.soe-uc-edit',$soeucForm->id) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="{{ route('institute-user.soe-uc-destroy',$soeucForm->id) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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