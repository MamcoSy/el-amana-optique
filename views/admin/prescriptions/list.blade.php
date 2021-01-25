@extends('layouts.DashboardLayout')
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('page-content')
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

@section('scripts')
<script src="{{asset('/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('/admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
  @if (flash('success'))
      <script>
        $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Operation reussi',
        subtitle: '',
        body: 'Tout c\'est deroulé comme prevue'
      })
      </script>
  @endif
@endsection
