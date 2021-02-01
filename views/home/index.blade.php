<?php use LiteFramework\Globals\Session; ?>
@extends('layouts.loginLayout')

@section('content')
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>El Amana</b> Optique</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>
        @if (session('message'))
          <div class="alert alert-danger">
            <p>{{flash('message')}}</p>
          </div>
        @endif
        <form action="{{ url('/login') }}" method="post">
          <div class="input-group mb-3 @if ($errors) is_invalid @endif">
            <input name="username" type="text" class="form-control" placeholder="nom d'utilisateur" value="{{$old['username'] ?? ''}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @if ($errors && $errors->has('username'))
            <p style="color: red">
              {{$errors->first('username')}}
            </p>
          @endif
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Mot de passe" value="{{$old['password'] ?? ''}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if ($errors && $errors->has('password'))
            <p style="color: red">
              {{$errors->first('password')}}
            </p>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input name="remember" type="checkbox" id="remember">
                <label for="remember">
                  Se souvenir de moi
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12 mt-2">
              <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        
        <p class="mb-1 mt-2">
          <a href="#">j'ai oublié mon mot de passe</a>
        </p>
        <p class="mb-0">
          <a href="#" class="text-center">Crée un nouveau utilisateur</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection

