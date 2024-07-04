@extends('layout.main')
@section('title')
@parent
| {{__('Facility Mapping')}}
@endsection
@section('pageTitle')
{{ __('Facility Mapping') }}
@endsection
@section('breadcrumbs')
{{ __('Facility Mapping') }}
@endsection
@section('content')
{!! Toastr::message() !!}
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Facility Mapping Form</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.create-facility-mapping') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">User Name<span class="text-danger">*</span></label>
                            <input type="text" name="user_name" value="{{ old('user_name', $user->user_name ?? '') }}" class="form-control" placeholder="Enter User Name">
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Select Program<span class="text-danger">*</span></label>
                            <select class="form-control" name="program_id" id="program_id">
                                <option value="">Select Program</option>
                                @foreach($institutePrograms as $instituteProgram)
                                    <option value="{{ $instituteProgram->id }}" {{ old('program_id', $user->program_id ?? '') == $instituteProgram->id ? 'selected' : '' }}>
                                        {{ $instituteProgram->name }} -{{ $instituteProgram->code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Select Institute<span class="text-danger">*</span></label>
                            <select id="institute_name" class="form-control" name="institute_id">
                                <option value="">Select Institute</option>
                                @foreach($institutes as $institute)
                                    <option value="{{ $institute->id }}" {{ old('institute_id', $user->institute_id ?? '') == $institute->id ? 'selected' : '' }}>
                                        {{ $institute->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('institute_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Password<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="password" value="{{ old('password', $user->password ?? '') }}" id="password" placeholder="Enter Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">State Name<span class="text-danger">*</span></label>
                            <select id="state_name" class="form-control" name="state_id">
                                <option value="">State Name</option>
                                @foreach($state as $statelist)
                                    <option value="{{ $statelist->id }}" {{ old('state_id', $user->state_id ?? '') == $statelist->id ? 'selected' : '' }}>
                                        {{ $statelist->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">District<span class="text-danger">*</span></label>
                            <select id="filter-city" class="form-control" name="city_id">
                                <option value="">Select District</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $user->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" value="{{ old('date', $user->date ?? '') }}" id="date">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 pe-1">
                            <label class="form-label" for="inputAddress2">Assign Role<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="user_type">
                                <option value="">Assign Role</option>
                                <option value="0" {{ old('user_type', $user->user_type ?? '') == 0 ? 'selected' : '' }}>National</option>
                                <option value="1" {{ old('user_type', $user->user_type ?? '') == 1 ? 'selected' : '' }}>Institute</option>
                            </select>
                            @error('user_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 pe-1">
                            <label class="form-label" for="inputAddress2">Status<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="">status</option>
                                <option value="1" {{ old('status', $user->status ?? '') == 1 ? 'selected' : '' }}>Enable</option>
                                <option value="0" {{ old('status', $user->status ?? '') == 0 ? 'selected' : '' }}>Disable</option>
                            </select>
                            @error('status')
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
<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Facility Mapping List</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="QA_section">
                <div class="QA_table mb_30">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">State</th>
                            <th scope="col">Program</th>
                            <th scope="col">Name Of Institute</th>
                            <th scope="col">Login ID</th>
                            <th scope="col">Password</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                        <tbody>
                        @if(isset($users) && count($users)>0)
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $user->state->name??'N/A' }}</td>
                                    <td>{{ $user->program->name??'N/A' }}-{{ $user->program->code??'N/A' }}</td>                                    
                                    <td>{{ $user->institute->name??'N/A'}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="hidetext">{{ Str::limit($user->password, 4) }}</td>
                                    <td>@php if($user->login_status ==1){ echo 'Running'; }else{ echo 'Stope'; } @endphp</td>
                                    <td>@php if($user->status ==1){ echo 'Active'; }else{ echo 'Deactive'; } @endphp</td>
                                    <td><a href="{{route('admin.facility-mapping-edit',$user->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection