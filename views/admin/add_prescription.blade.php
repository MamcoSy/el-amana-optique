@extends('layouts.DashboardLayout')
@section('page-content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ajouter une ordonnance</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="client_name">Nom du client</label>
                                <input name="client_name" type="text" value="{{$old['client_name']}}" class="form-control" id="client_name" placeholder="Enter le nom du client">
                            </div>
                            @if ($errors && $errors->has('client_name'))
                                <p style="color: red">
                                    {{$errors->first('client_name')}}
                                </p>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="left_eye">OG</label>
                                <input name="left_eye" type="number" step="0.01" value="{{$old['left_eye']}}" class="form-control" id="left_eye">
                            </div>
                            @if ($errors && $errors->has('left_eye'))
                                <span style="color: red">
                                    {{$errors->first('left_eye')}}
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="right_eye">OD</label>
                                <input name="right_eye" type="number" step="0.01" value="{{$old['right_eye']}}" class="form-control" id="right_eye">
                            </div>
                            @if ($errors && $errors->has('right_eye'))
                                <span style="color: red">
                                    {{$errors->first('right_eye')}}
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Ordonnance</label>
                                <textarea name="prescription_content" class="form-control" rows="3" placeholder="Enter ...">{{$old['prescription_content']}}</textarea>
                            </div>
                            @if ($errors && $errors->has('prescription_content'))
                                <p style="color: red">
                                    {{$errors->first('prescription_content')}}
                                </p>
                            @endif
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
