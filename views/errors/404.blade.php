@extends('layouts.ErrorLayout')
@section('page-content')
    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page introuvable.</h3>

          <p>
            Nous n'avons pas trouvé la page que vous cherchiez.
            En attendant, vous pouvez <a href="{{url('/admin-panel')}}">revenir au tableau de bord</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
@endsection
