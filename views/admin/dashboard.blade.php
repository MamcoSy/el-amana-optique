@extends('layouts.DashboardLayout')
@section('page-content')
        @if (session('auth_role') == 0)
          @include('partials.caissierBoard')
        @elseif (session('auth_role') == 1)
          @include('partials.comptaBoard')
        @else
          @include('partials.adminBoard')
        @endif
@endsection
