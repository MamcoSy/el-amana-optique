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
              <form>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                            <div class="form-group">
                                <label for="client_name">Nom du client</label>
                                <input type="text" class="form-control" id="client_name" placeholder="Enter le nom du client">
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="left_eye">OG</label>
                                <input type="number" class="form-control" id="left_eye">
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="right_eye">OD</label>
                                <input type="number" class="form-control" id="right_eye">
                            </div>
                      </div>
                      <div class="col-md-12">
                            <div class="form-group">
                                <label>Ordonnance</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                      </div>
                      <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
@endsection
