<div class="modal fade" id="edit-modal-{{$prescription->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{url("/admin-panel/prescriptions/edit/".$prescription->id)}}" method="POST">
          <div class="card-body">
            <div class="form-group row">
              <label for="client_name" class="col-sm-2 col-form-label">Prénom</label>
              <div class="col-sm-10">
                <input name="client_name" type="text" value="{{$prescription->client_name}}" class="form-control" id="first_name" placeholder="Prénom" >
              </div>
            </div>
            <div class="form-group row">
              <label for="left_eye" class="col-sm-2 col-form-label">Nom</label>
              <div class="col-sm-10">
                <input name="left_eye" type="text" value="{{$prescription->left_eye}}" class="form-control" id="first_name" placeholder="oeil gauche" >
              </div>
            </div>
            <div class="form-group row">
              <label for="right_eye" class="col-sm-2 col-form-label">Nom d'utilisation</label>
              <div class="col-sm-10">
                <input name="right_eye" type="text" value="{{$prescription->right_eye}}" class="form-control" id="first_name" placeholder="oeil droit" >
              </div>
            </div>
            <div class="form-group mb-3">
              <label>Ordonnance</label>
              <textarea name="prescription_content" class="compose-textarea" class="form-control" style="height: 300px">{{$prescription->content}}</textarea>
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
