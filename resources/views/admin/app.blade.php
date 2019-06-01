<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/layouts/head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        
          <header class="main-header">
            <!-- Logo -->
          <a href="{{ route('admin.home') }}" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>A</b>LT</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><i class="fa fa-pie-chart"></i> <b>Forex</b></span>
            </a>
                @include('admin/layouts/nav')
          </header>  

          @include('admin/layouts/sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        @include('admin/layouts/messages')
                    <h1>
                        @yield('page-name')
                    </h1>
                    <ol class="breadcrumb">
                        @section('breadcrumbs')
                            @show
                    </ol>
                    </section>
                    @section('main-content')
                            @show
            
            </div>
            <!-- /.content-wrapper -->
    @include('admin/layouts/footer')
    @include('admin/layouts/scripts')
</body>
</html>