<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">
          @if (session('auth_role') == 2)
            <span class="rigth badge badge-success">ADMIN</span>
          @elseif(session('auth_role') == 1)
            <span class="rigth badge badge-primary">COMPTABLE</span>
          @else
            <span class="rigth badge badge-secondary">CAISSIER</span>
          @endif</td>
        </a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Voulez vous vraiment vous déconnecté ?')" role="button" href="{{url('/logout')}}">
          <i class="fa fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
