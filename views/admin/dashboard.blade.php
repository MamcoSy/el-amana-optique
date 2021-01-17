@extends('layouts.DashboardLayout')
@section('page-content')
        @if (session('auth_role') == 0)
          @include('partials.caissierBoard')
        @elseif (session('auth_role') == 1)
          @include('partials.comptaBoard')
        @else
          @include('partials.adminBoard')
        @endif

        <div class="col-md-6">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Infos
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-info">
                  <h5>Infos de connexion</h5>

                  <p>Vue la derniere fois le <span style="color: blue;font-style: italic">{{session('auth_last_time_see')}}</span></p>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection
