@extends('layouts.DashboardLayout')

@section('styles')
  <link rel="stylesheet" href="{{asset('/admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('page-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Ajouter une Facture</h3>
        </div>

        <form action="" method="POST">
          <div class="card-body">
            <div class="row">
              {{-- client_name input  --}}
              <div class="col-md-6">
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
              {{-- doctor name input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="doctor_name">Nom du Medecin <em>(optional)</em></label>
                  <input name="doctor_name" type="text" value="{{$old['doctor_name']  ?? ''}}" class="form-control" id="doctor_name" placeholder="Enter le nom du Medecin">
                </div>
                @if ($errors && $errors->has('doctor_name'))
                <p style="color: red">
                  {{$errors->first('doctor_name')}}
                </p>
                @endif
              </div>
              {{-- left eye input  --}}
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
              {{-- right eye input  --}}
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
              {{-- left eye price input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="left_eye_price">OG prix</label>
                  <input name="left_eye_price" type="number" value="{{$old['left_eye_price']  ?? ''}}" class="form-control" id="left_eye_price">
                </div>
                @if ($errors && $errors->has('left_eye_price'))
                <span style="color: red">
                  {{$errors->first('left_eye_price')}}
                </span>
                @endif
              </div>
              {{-- right eye price input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="right_eye_price">OD prix</label>
                  <input name="right_eye_price" type="number" value="{{$old['right_eye_price']  ?? ''}}" class="form-control" id="right_eye_price">
                </div>
                @if ($errors && $errors->has('right_eye_price'))
                <span style="color: red">
                  {{$errors->first('right_eye_price')}}
                </span>
                @endif
              </div>
              {{-- mount price input  --}}
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="mount_price">Monture</label>
                  <input name="mount_price" type="number" value="{{$old['mount_price']  ?? ''}}" class="form-control" id="mount_price">
                </div>
                @if ($errors && $errors->has('mount_price'))
                <span style="color: red">
                  {{$errors->first('mount_price')}}
                </span>
                @endif
              </div>
              {{-- amount to pay input  --}}
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="amount_to_pay">Somme a payé</label>
                  <input name="amount_to_pay" type="number" value="{{$old['amount_to_pay']  ?? ''}}" class="form-control" id="amount_to_pay">
                </div>
                @if ($errors && $errors->has('amount_to_pay'))
                <span style="color: red">
                  {{$errors->first('amount_to_pay')}}
                </span>
                @endif
              </div>
              {{-- paid amount input  --}}
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="paid_amount">Somme payé</label>
                  <input name="paid_amount" type="number" value="{{$old['paid_amount']  ?? ''}}" class="form-control" id="paid_amount">
                </div>
                @if ($errors && $errors->has('paid_amount'))
                <span style="color: red">
                  {{$errors->first('paid_amount')}}
                </span>
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
  <!-- Summernote -->
  <script src="{{asset('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script>
    $(function () {
      //Add text editor
      $('#compose-textarea').summernote()
    })
  </script>
@endsection
