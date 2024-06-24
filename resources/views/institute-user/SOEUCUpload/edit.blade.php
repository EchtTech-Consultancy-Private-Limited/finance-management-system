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
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Edit SOE & UC Upload</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('institute-user.update',$soeUCUpload->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">QTR UC<span class="text-danger">*</span></label>
                            <select id="qtr_uc" class="form-control" name="qtr_uc">
                                <option value="">Select QTR UC</option>
                                <option value="30 June" {{($soeUCUpload->qtr_uc == "30 June") ? 'selected':''}}>30 June</option>
                                <option value="30 September" {{($soeUCUpload->qtr_uc == "30 September") ? 'selected':''}}>30 September</option>
                                <option value="31 December" {{($soeUCUpload->qtr_uc == "31 December") ? 'selected':''}}>31 December</option>
                                <option value="31 March" {{($soeUCUpload->qtr_uc == "31 March") ? 'selected':''}}>31 March</option>                                
                            </select>
                            @error('qtr_uc')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Program<span class="text-danger">*</span></label>
                            <select id="program" class="form-control" name="program_id">
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{($soeUCUpload->program_id == $program->id) ? 'selected':''}} >{{ $program->name }} - {{ $program->code }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Year of UC<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="yearofuc">
                                <option value="">Select Year...</option>
                                @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                    @php
                                        $selected = $soeUCUpload->year == ($i . ' - ' . ($i+1)) ? 'selected' : '';
                                    @endphp
                                    <option value="{{$i}} - {{$i+1}}" {{$selected}}>{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>                            
                            @error('yearofuc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Month<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="month">
                                <option value="">Select Month</option>
                                @foreach ($months as $key => $month)
                                    @php
                                        $selected = $soeUCUpload->month == $month ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $month }}" {{ $selected }}>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('month')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">UC File Upload<span class="text-danger">*</span></label>
                            <input type="hidden" value="{{$soeUCUpload->file}}" name="old_file">
                            <input type="hidden" value="{{$soeUCUpload->file_size}}" name="old_file_size">
                            <input type="file" class="form-control" name="ucfileupload" id="inputAddress2">
                            @if ($soeUCUpload->file)
                                <a class="nhm-file" href="{{ asset('images/uploads/soeucupload/'.$soeUCUpload->file) }}" download>
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                                    <span>Download ({{ $soeUCUpload->file_size }})</span>
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            @endif
                            @error('ucfileupload')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">UC Uploaded Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="ucuploaddate" value="{{ old('ucuploaddate',$soeUCUpload->date) }}" id="inputAddress2" placeholder="">
                            @error('ucuploaddate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection