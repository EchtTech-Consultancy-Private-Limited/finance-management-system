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
                <form method="POST" action="{{ route('admin.update-facility-mapping') }}">
                @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">User Name<span class="text-danger">*</span></label>
                           <input type="text" value="{{$user->email??''}}" class="form-control" readonly>
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Institue Name<span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->institute_name??'N/A'}}" class="form-control" readonly>
                            @error('institue_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Password</label>
                            <input type="text" class="form-control" name="mname" value="{{Auth::user()->mname??old('mname')}}" id="mname" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Program</label>
                            <select id="inputState" class="form-control" name="program_id" id="program_id">
                                <option value="">Program</option>
                                @foreach($institutePrograms as $instituteProgram)
                                 <option value="{{ $instituteProgram->id }}">{{ $instituteProgram->name }} -{{ $instituteProgram->code }}   -{{ $instituteProgram->count }} Nos Institutes</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">State Name</label>
                            <select id="state_name" class="form-control" name="state_name">
                                <option value="">State Name</option>
                                @foreach($state as $statelist)
                                 <option value="{{ $statelist->id }}">{{ $statelist->name }}</option>
                                @endforeach
                            </select>
                            @error('state_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">District<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="district" id="district">
                            </select>
                            @error('district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Facility Search</label>
                            <input type="number" class="form-control" name="landline" value="{{Auth::user()->landline}}" id="landline" placeholder="LandLine">
                        </div>
                        <div class="col-md-2 pe-1">
                            <label class="form-label" for="inputAddress2">Assign Role<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="user_type">
                                <option value="">Assign Role</option>
                                <option value="0" @if($user->user_type == 0) selected @else '' @endif>National</option>
                                <option value="1" @if($user->user_type == 1) selected @else '' @endif>Institute</option>
                            </select>
                            @error('user_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-2 pe-1">
                            <label class="form-label" for="inputAddress2">Status<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="">status</option>
                                <option value="1" @if($user->status == 1) selected @else '' @endif>Enable</option>
                                <option value="0" @if($user->status == 0) selected @else '' @endif>Disable</option>
                            </select>
                            @error('status')
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
                            <th scope="col">Program</th>
                            <th scope="col">State</th>
                            <th scope="col">Name Of Institute</th>
                            <th scope="col">Login ID</th>
                            <th scope="col">Password</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                        <tbody>
                        @if(isset($allUser) && count($allUser)>0)
                            @foreach($allUser as $key=>$allUsers)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>{{$allUsers->institute_name??'N/A'}}</td>
                                    <td>{{str_repeat('*', strlen(explode('@',$allUsers->email)[0]))}}{{'@'}}{{explode('@',$allUsers->email)[1]}}</td>
                                    <td class="hidetext">{{ Str::limit($allUsers->password, 4) }}</td>
                                    <td>@php if($allUsers->login_status ==1){ echo 'Running'; }else{ echo 'Stope'; } @endphp</td>
                                    <td>@php if($allUsers->status ==1){ echo 'Active'; }else{ echo 'Deactive'; } @endphp</td>
                                    <td><a href="{{ url('admin/facility-mapping/'.$allUsers->id) }}">Edit</a></td>
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