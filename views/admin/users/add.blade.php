@extends('layouts.DashboardLayout')
@section('page-content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ajouter un utilisateur</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{url('/admin-panel/users/add')}}" method="POST">
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="first_name">Prénom</label>
                <input name="first_name" type="text" value="{{$old['first_name'] ?? ''}}" class="form-control" id="first_name" placeholder="Prénom...">
            </div>
            @if ($errors && $errors->has('first_name'))
                <p style="color: red">
                    {{$errors->first('first_name')}}
                </p>
            @endif
            <div class="form-group mb-3">
                <label for="last_name">Nom</label>
                <input name="last_name" type="text" value="{{$old['last_name'] ?? ''}}" class="form-control" id="last_name" placeholder="Nom...">
            </div>
            @if ($errors && $errors->has('last_name'))
                <p style="color: red">
                    {{$errors->first('last_name')}}
                </p>
            @endif
            <div class="form-group mb-3">
                <label for="username">Nom d'utilisateur</label>
                <input name="username" type="text" value="{{$old['username'] ?? ''}}" class="form-control" id="username" placeholder="Nom d'utilisateur...">
            </div>
            @if ($errors && $errors->has('username'))
                <p style="color: red">
                    {{$errors->first('username')}}
                </p>
            @endif
            <div class="form-group mb-3">
                <label for="password">Mot de passe</label>
                <input name="password" type="password" value="{{$old['password'] ?? ''}}" class="form-control" id="password" placeholder="Mot de passe...">
            </div>
            @if ($errors && $errors->has('password'))
                <p style="color: red">
                    {{$errors->first('password')}}
                </p>
            @endif
            <div class="form-group mb-3">
                <label for="confirm_password">Confirmer Mot de passe</label>
                <input name="confirm_password" type="password" value="{{$old['confirm_password'] ?? ''}}" class="form-control" id="confirm_password" placeholder="Confirmer Mot de passe...">
            </div>
            @if ($errors && $errors->has('confirm_password'))
                <p style="color: red">
                    {{$errors->first('confirm_password')}}
                </p>
            @endif
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="custom-select rounded-0" id="role">
                    <option value="2" @if($old['role'] == 2) selected @endif >ADMIN</option>
                    <option value="1" @if($old['role'] == 1) selected @endif >COMPTABLE</option>
                    <option value="0" @if($old['role'] == 0) selected @endif >CAISSIER</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
