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
                    <h3 class="m-0">SOE & UC Upload</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Year of UC<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control">
                                <option selected>Select Year...</option>
                                @for($i = date("Y")-10; $i <=date("Y")+10; $i++)
                                <option value="{{$i}} - {{$i+1}}">{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Month<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control">
                                <option selected>Select Month...</option>
                                @for($i = date("m")-4; $i <=date("m")+7; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">UC File Upload<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="inputAddress2" placeholder="Mobile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">UC Uploaded Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="inputAddress2" placeholder="Email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection