@extends('layouts.DashboardLayout')
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('page-content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ajouter une ordonnance</h3>
            </div>

            <form action="" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="client_name">Nom du client</label>
                                <input name="client_name" type="text" value="{{$old['client_name']  ?? ''}}" class="form-control" id="client_name" placeholder="Enter le nom du client">
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
                                <input name="left_eye" type="number" step="0.01" value="{{$old['left_eye']  ?? ''}}" class="form-control" id="left_eye">
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
                                <input name="right_eye" type="number" step="0.01" value="{{$old['right_eye']  ?? ''}}" class="form-control" id="right_eye">
                            </div>
                            @if ($errors && $errors->has('right_eye'))
                                <span style="color: red">
                                    {{$errors->first('right_eye')}}
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="prescription_content" id="compose-textarea" class="form-control" style="height: 300px">{{$old['prescription_content']  ?? ''}}</textarea>
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
@section('scripts')
{{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap 4 -->
{{-- <script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script> --}}
<!-- Summernote -->
<script src="{{asset('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admin/dist/js/demo.js')}}"></script>
{{-- <script src=".{{asset('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
@endsection
