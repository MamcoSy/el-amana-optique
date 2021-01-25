@extends('layouts.DashboardLayout')
@section('page-content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a class="btn btn-primary" href="{{url('/admin-panel/users/add')}}"><i class="fas fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Uom d'utilisateur</th>
                <th>Role</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->first_name}}</td>
                  <td>{{$user->last_name}}</td>
                  <td>{{$user->username}}</td>
                  <td>
                    @if ($user->role == 2)<span class="rigth badge badge-success">ADMIN</span> @elseif($user->role == 1) <span class="rigth badge badge-primary">COMPTABLE</span> @else <span class="rigth badge badge-secondary">CAISSIER</span> @endif</td>
                  <td> <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal-{{$user->id}}"><i class="fas fa-edit"></i></a></td>
                  <td> <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{$user->id}}"><i class="fas fa-trash"></i></a></td>
                  <div class="modal fade" id="delete-modal-{{$user->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Supprimer {{$user->username}}</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Attention soyer sure de ce que vous faite!!</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                          <a href="{{url('/admin-panel/users/delete/'.$user->id)}}"  class="btn btn-danger" data-confirme="">Supprimer</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <div class="modal fade" id="edit-modal-{{$user->id}}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Large Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="{{url("/admin-panel/users/edit/".$user->id)}}" method="POST">
                            <div class="card-body">
                              <div class="form-group row">
                                <label for="first_name" class="col-sm-2 col-form-label">Prénom</label>
                                <div class="col-sm-10">
                                  <input name="first_name" type="text" value="{{$user->first_name}}" class="form-control" id="first_name" placeholder="Prénom" >
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="last_name" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-10">
                                  <input name="last_name" type="text" value="{{$user->last_name}}" class="form-control" id="first_name" placeholder="Prénom" >
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Nom d'utilisation</label>
                                <div class="col-sm-10">
                                  <input name="username" type="text" value="{{$user->username}}" class="form-control" id="first_name" placeholder="Prénom" >
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                                <div class="col-sm-10">
                                  <input name="password" type="password" value="" class="form-control" id="password" placeholder="Password">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="custom-select rounded-0" id="role">
                                  <option value="2" @if($user->role == 2) selected @endif >ADMIN</option>
                                  <option value="1" @if($user->role == 1) selected @endif >COMPTABLE</option>
                                  <option value="0" @if($user->role == 0) selected @endif >CAISSIER</option>
                                </select>
                              </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Annulé</button>
                          <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Uom d'utilisateur</th>
                <th>Role</th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
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
      "searching": false,
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
