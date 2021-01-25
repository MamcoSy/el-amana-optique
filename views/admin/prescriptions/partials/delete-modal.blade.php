<div class="modal fade" id="delete-modal-{{$prescription->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supprimer l'ordonance de {{$prescription->client_name}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Attention soyer sure de ce que vous faite!!</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="{{url('/admin-panel/prescriptions/delete/'.$prescription->id)}}"  class="btn btn-danger" data-confirme="">Supprimer</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
