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
                    <h3 class="m-0">SOE & UC</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body pb-5">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="inputEmail4">Name of program<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control">
                                <option selected>Select...</option>
                                <option>AAA</option>
                                <option>AAA</option>
                                <option>AAA</option>
                            </select>
                        </div>
                        <div class=" col-md-6">
                            <label class="form-label" for="inputPassword4">Name of the Institute<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Name of the Institute">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress">Name of the Finance /Accounts officer<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Name of the Finance /Accounts officer">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="Mobile">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2"> Finance/Accounts officer Email</label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Name of Nodal/Program Officer<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Name of Nodal/Program Officer">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Mobile<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="Mobile">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Nodal/Program Officer Email</label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">State<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control">
                                <option selected>Select...</option>
                                @foreach($state as $states)
                                <option value="{{$states->id}}">{{$states->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Month</label>
                            <select id="inputState" class="form-control">
                                <option selected>Select...</option>
                                @for($i = date("m")-4; $i <=date("m")+7; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="inputAddress2">Financial Year<span class="text-danger">*</span></label>
                            <select id="inputState" class="form-control">
                                <option selected>Select...</option>
                                @for($i = date("Y")-10; $i <=date("Y")+10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                   <div class="table-responsive fms-table mt-5">
                    <table class="table table-bordered text-center">
                   <thead>
                    <tr class="table-color-head">
                        <th>Heads</th>
                        <th>Sanction Order Nos.</th>
                        <th>Unspent Balance (GIA) as on 1st April</th>
                        <th>GIA Received in F.Y</th>
                        <th>Total Balance (a+b) excluding interest</th>
                        <th>Actual Expenditure incurred during the current F.Y</th>
                        <th>Unspent Balance</th>
                        <th>Committed Liabilities (if any)</th>
                        <th>Unspent Balance of (GIA) as on 31st March</th>
                    </tr>

                    <tr>
                        <th></th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D=(B+C)</th>
                        <th>E</th>
                        <th>F=(D-E)</th>
                        <th>G</th>
                        <th>H=(F-G)</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                        <th>Man Power with Human Resource</th>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                    </tr>
                    <tr>
                        <th>Lab Strengthening Kits, Regents & Consumable (Recurring)</th>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                    </tr>
                    <tr>
                        <th>IEC</th>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                    </tr>
                    <tr>
                        <th>Office Expenses & Travel</th>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                    </tr>
                    <tr>
                        <th>Lab Strengthening (Non Recurring)</th>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                    </tr>
                    <tr>
                        <th>Other Activities</th>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Fill locked for HQ"></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder="Auto Calculate"></td>
                    </tr>
                   
                   </tbody>
                   <tfoot>                 
                   
                        <tr>
                            <th>Grand Total</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                            <th>0</th>
                        </tr>
                        </tfoot>
                    </table>
                   </div>

                   <div class="float-end">
                   <button type="submit" class="btn btn-primary me-2">Save</button>
                    <button type="reset" class="btn bg-cancel">Reset</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection