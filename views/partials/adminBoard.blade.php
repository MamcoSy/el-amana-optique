<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $userCount }}</h3>
        
        <p>Utilisateur(s)</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ url('/admin-panel/users') }}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $prescpriptionsCount }}</h3>
        <p>Ordonance(s)</p>
      </div>
      <div class="icon">
        <i class="nav-icon fas fa-file-invoice"></i>
      </div>
      <a href="{{url('/admin-panel/prescriptions')}}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $invoicesCount }}</h3>
        <p>Facture(s)</p>
      </div>
      <div class="icon">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
      </div>
      <a href="{{url('/admin-panel/invoices')}}" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $users_gain_per_day }} MRU</h3>
        <p>Gain journalier</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
