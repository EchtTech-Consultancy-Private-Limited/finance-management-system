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
                    <h3 class="m-0">SOE UC Upload List</h3>
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
                            <th scope="col">Year of UC</th>
                            <th scope="col">Month</th>
                            <th scope="col">UC File Upload</th>
                            <th scope="col">UC Uploaded Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($sorUcLists as $sorUcList)
                            <tr>
                                <th scope="row">{{ @$loop->iteration }}</th>
                                <td>{{ $sorUcList->year }}</td>
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
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="{{ route('institute-user.SOE-UC-upload-edit',$sorUcList->id) }}" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="{{ route('institute-user.SOE-UC-upload-destroy',$sorUcList->id) }}" class="action_btn"> <i class="fas fa-trash"></i> </a>
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