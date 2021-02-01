<div class="modal fade" id="edit-modal-{{$invoice->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{url("/admin-panel/invoices/edit/".$invoice->id)}}" method="POST">
          <div class="card-body">
            <div class="row">
              {{-- client_name input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="client_name">Nom du client</label>
                  <input name="client_name" type="text" value="{{$invoice->client_name}}" class="form-control" id="client_name" placeholder="Enter le nom du client">
                </div>
              </div>
              {{-- doctor name input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="doctor_name">Nom du Medecin <em>(optional)</em></label>
                  <input name="doctor_name" type="text" value="{{$invoice->doctor_name}}" class="form-control" id="doctor_name" placeholder="Enter le nom du Medecin">
                </div>
              </div>
              {{-- left eye input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="left_eye">OG</label>
                  <input name="left_eye" type="number" step="0.01" value="{{$invoice->left_eye}}" class="form-control" id="left_eye">
                </div>
              </div>
              {{-- right eye input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="right_eye">OD</label>
                  <input name="right_eye" type="number" step="0.01" value="{{$invoice->right_eye}}" class="form-control" id="right_eye">
                </div>
              </div>
              {{-- left eye price input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="left_eye_price">OG prix</label>
                  <input name="left_eye_price" type="number" value="{{$invoice->left_eye_price}}" class="form-control" id="left_eye_price">
                </div>
              </div>
              {{-- right eye price input  --}}
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="right_eye_price">OD prix</label>
                  <input name="right_eye_price" type="number" value="{{$invoice->right_eye_price}}" class="form-control" id="right_eye_price">
                </div>
              </div>
              {{-- mount price input  --}}
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="mount_price">Monture</label>
                  <input name="mount_price" type="number" value="{{$invoice->mount_price}}" class="form-control" id="mount_price">
                </div>
              </div>
              {{-- amount to pay input  --}}
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="amount_to_pay">Somme a payé</label>
                  <input name="amount_to_pay" type="number" value="{{$invoice->amount_to_pay}}" class="form-control" id="amount_to_pay">
                </div>
              </div>
              {{-- paid amount input  --}}
              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="paid_amount">Somme payé</label>
                  <input name="paid_amount" type="number" value="{{$invoice->paid_amount}}" class="form-control" id="paid_amount">
                </div>
              </div>
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
