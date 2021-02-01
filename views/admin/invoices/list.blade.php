@extends('layouts.list')
@section('list-content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{url('/admin-panel/invoices/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom du client</th>
                  <th>Somme à payé</th>
                  <th>Somme payé</th>
                  <th>Somme restant</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                  <td>{{sprintf('%07d', $invoice->id)}}</td>
                  <td>{{$invoice->client_name}}</td>
                  <td>{{$invoice->amount_to_pay}}</td>
                  <td>{{$invoice->paid_amount}}</td>
                  <td>{{$invoice->	remaining_amount}}</td>
                  <td>{{$invoice->created_at}}</td>
                  <td> <a href="{{url('/admin-panel/invoices/view/'.$invoice->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                  <td> <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal-{{$invoice->id}}"><i class="fas fa-edit"></i></a></td>
                  <td> <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{$invoice->id}}"><i class="fas fa-trash"></i></a></td>
                  @include('admin.invoices.partials.edit-modal')
                  @include('admin.invoices.partials.delete-modal')
                </tr>
                @endforeach
              {{-- </tbody> --}}
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
