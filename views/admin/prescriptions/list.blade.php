@extends('layouts.list')
@section('list-content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{url('/admin-panel/prescriptions/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom du client</th>
                <th>OG</th>
                <th>OD</th>
                <th>Date</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prescriptions as $prescription)
                <tr>
                  <td>{{$prescription->id}}</td>
                  <td>{{$prescription->client_name}}</td>
                  <td>{{$prescription->left_eye}}</td>
                  <td>{{$prescription->right_eye}}</td>
                  <td>{{$prescription->created_at}}</td>
                  <td> <a href="{{url('/admin-panel/prescriptions/view/'.$prescription->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                  <td> <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal-{{$prescription->id}}"><i class="fas fa-edit"></i></a></td>
                  <td> <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{$prescription->id}}"><i class="fas fa-trash"></i></a></td>
                  @include('admin.prescriptions.partials.edit-modal')
                  @include('admin.prescriptions.partials.delete-modal')
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection
