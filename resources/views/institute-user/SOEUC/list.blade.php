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
                                <th scope="col">Year of UC</th>
                                <th scope="col">Month</th>
                                <th scope="col">UC File Upload</th>
                                <th scope="col">UC Uploaded Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>2024 - 2025</td>
                                <td>May</td>
                                <td>abc.jpg</td>
                                <td>22-05-2024</td>
                                <td><a href="#" class="status_btn">Active</a></td>
                                <td>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection