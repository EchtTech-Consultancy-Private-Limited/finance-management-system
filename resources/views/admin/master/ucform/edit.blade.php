@extends('layout.main')
@section('title')
@parent
| {{__('Utilization Certificate (UC)')}}
@endsection
@section('pageTitle')
{{ __('Utilization Certificate (UC)') }}
@endsection
@section('breadcrumbs')
{{ __('Utilization Certificate (UC)') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Utilization Certificate (UC) Form Edit</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.ucuploads.update', $ucForm->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $ucForm->title) }}" class="form-control" placeholder="Enter Title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="status">Status<span class="text-danger">*</span></label>
                            <select id="status" class="form-control" name="status">
                                <option value="">Select status</option>
                                <option value="1" {{ old('status', $ucForm->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $ucForm->status) == '0' ? 'selected' : '' }}>In-Active</option>
                            </select>                            
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="file">UC File<span class="text-danger">*</span></label>
                            <input type="file" name="file" class="form-control">
                            @if($ucForm->file)
                                <small class="form-text text-muted">Current file: {{ $ucForm->file }}</small>
                            @endif
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
