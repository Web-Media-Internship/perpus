
<!DOCTYPE html>
<html lang="en">
<head>
  @include('adminlte/header')
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  @include('adminlte/preloader')

  <!-- Navbar -->
  @include('adminlte/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('adminlte/sidebar')

  <!-- Content Wrapper. Contains page content -->
  @include('adminlte/main-header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('adminlte/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('adminlte/javascript')
@livewireScripts
</body>
</html>
