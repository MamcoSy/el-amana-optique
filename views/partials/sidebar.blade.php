<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">El Amana Optique</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session('auth_full_name')}}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panneau d'administration
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul> --}}
          </li>
          @if (session('auth_role') == 2)
            <li class="nav-item">
              <a href="{{ url('/admin-panel/users') }}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Gestion des utilisateur
                </p>
              </a>
            </li>
          @endif
          @if (session('auth_role') == 2)
            <li class="nav-item">
              <a href="{{ url('/admin-panel/prescriptions') }}" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Gestion des ordonances
                </p>
              </a>
            </li>
          @endif
          <li class="nav-item">
              <a href="{{ url('/admin-panel/users') }}" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Gestion des factures
                </p>
              </a>
            </li>
          @if (session('auth_role') == 2 || session('auth_role') == 1)
            <li class="nav-item">
              <a href="{{ url('/admin-panel/users') }}" class="nav-link">
                <i class="nav-icon fas fa-wallet"></i>
                <p>
                  Comptablité
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
