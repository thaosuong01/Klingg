<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if (isset($data['title'])) {
  ?>
    <title>Admin | <?php echo $data['title'] ?></title>
  <?php
  } else {
  ?>
    <title>Admin | Dashboard</title>
  <?php
  }
  ?>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;1,300&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/fontawesome-free/css/all.min.css' ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/jqvmap/jqvmap.min.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/dist/css/adminlte.min.css' ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/daterangepicker/daterangepicker.css' ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo _PUBLIC . '/admin/plugins/summernote/summernote-bs4.min.css' ?>">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/0461/9036/2778/files/favicon_1_16x16.png?v=1630996498" type="image/png" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo _WEB_ROOT . '/admin/dasboard' ?>" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <div class="user-panel d-flex navbar-nav ml-auto">
        <div class="image">
          <img src="<?php echo _PATH_AVATAR . $_SESSION['user']['avatar'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user']['name'] ?></a>
        </div>
      </div>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-black-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <a href="<?php echo _WEB_ROOT ?>" class="navbar-nav mt-3 pb-3 mb-3 ">
          <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/logo_41be5bb0-ee12-4cb7-8ae7-3267b91b49e3_300x300.png?v=1598248765" alt="" class="w-[160px] mx-auto">
        </a>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->
        <?php
        $bg = '';
        $text = 'text-black';
        if (isset($data['bg']) && $data['bg']  != "") {
          $bg = 'bg-[#000]';
        }
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item <?php echo $data['pageactive'] == 'dashboard' ? $bg : "" ?> menu-open rounded">
              <a href="<?php echo _WEB_ROOT . '/admin/dashboard' ?>" class="<?php echo $data['pageactive'] == 'dashboard' ? 'text-white' : 'text-black' ?> hover:text-[#fff] d-flex py-2 px-3 hover:bg-[#eb6420] rounded">
                <i class="mr-2 mt-[2px] nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item <?php echo $data['pageactive'] == 'group' ? $bg : "" ?>   hover:bg-[#eb6420] rounded ">
              <a class="<?php echo $data['pageactive'] == 'group' ? 'text-white' : 'text-black' ?> hover:text-[#fff] active d-flex align-items-center py-2 px-3" href="<?php echo _WEB_ROOT . '/admin/list_group' ?>" class="nav-link">
                <i class="mr-2 nav-icon fas fa-users"></i>
                <p>
                  User Group
                </p>
              </a>
            </li>
            <li class="nav-item <?php echo $data['pageactive'] == 'user' ? $bg : "" ?>  hover:bg-[#eb6420] rounded">
              <a class="<?php echo $data['pageactive'] == 'user' ? 'text-white' : 'text-black' ?> hover:text-[#fff] d-flex align-items-center py-2 px-3" href="<?php echo _WEB_ROOT . '/user/list_user' ?>" class="nav-link">
                <i class="mr-2 nav-icon bi bi-person-fill"></i>
                <p>
                  User
                </p>
              </a>
            </li>
            <li class="nav-item <?php echo $data['pageactive'] == 'category' ? $bg : "" ?>  hover:bg-[#eb6420] rounded">
              <a class="<?php echo $data['pageactive'] == 'category' ? 'text-white' : 'text-black' ?> hover:text-[#fff] d-flex align-items-center py-2 px-3" href="<?php echo _WEB_ROOT . '/category/list_category' ?>" class="nav-link">
                <i class="mr-2 nav-icon bi bi-card-list"></i>
                <p>
                  Category
                </p>
              </a>
            </li>
            <li class="nav-item <?php echo $data['pageactive'] == 'product' ? $bg : "" ?>  hover:bg-[#eb6420] rounded">
              <a class="<?php echo $data['pageactive'] == 'product' ? 'text-white' : 'text-black' ?> hover:text-[#fff] d-flex align-items-center py-2 px-3" href="<?php echo _WEB_ROOT . '/product/list_product' ?>" class="nav-link">
                <i class="mr-2 nav-icon bi bi-handbag-fill"></i>
                <p>
                  Product
                </p>
              </a>
            </li>
            <li class="nav-item <?php echo $data['pageactive'] == 'bill' ? $bg : "" ?>  hover:bg-[#eb6420] rounded">
              <a class="<?php echo $data['pageactive'] == 'bill' ? 'text-white' : 'text-black' ?> hover:text-[#fff] d-flex align-items-center py-2 px-3" href="<?php echo _WEB_ROOT . '/bill/list_bill' ?>" class="nav-link">
                <i class="mr-2 nav-icon bi bi-receipt"></i>
                <p>
                  Bills
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <?php
              if (!empty($data['title'])) {
              ?>
                <h1 class="m-0"><?php echo $data['title'] ?></h1>
              <?php
              } else {
              ?>
                <h1 class="m-0">Dashboard</h1>
              <?php
              }
              ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <?php if (!empty($data['title'])) {
                ?>
                  <li class="breadcrumb-item active"><?php echo $data['title'] ?></li>
                <?php
                } else {
                ?>
                  <li class="breadcrumb-item active">Dashboard</li>
                <?php
                }
                ?>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php require_once './mvc/views/pages/admin/' . $data['page'] . '.php';  ?>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/jquery/jquery.min.js' ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/chart.js/Chart.min.js' ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/sparklines/sparkline.js' ?>"></script>
  <!-- JQVMap -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/jqvmap/jquery.vmap.min.js' ?>"></script>
  <script src="<?php echo _PUBLIC . '/admin/plugins/jqvmap/maps/jquery.vmap.usa.js' ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/jquery-knob/jquery.knob.min.js' ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/moment/moment.min.js' ?>"></script>
  <script src="<?php echo _PUBLIC . '/admin/plugins/daterangepicker/daterangepicker.js' ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ?>"></script>
  <!-- Summernote -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/summernote/summernote-bs4.min.js' ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo _PUBLIC . '/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo _PUBLIC . '/admin/dist/js/adminlte.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo _PUBLIC . '/admin/dist/js/demo.js' ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo _PUBLIC . '/admin/dist/js/pages/dashboard.js' ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <?php
  if (isset($data['js'])) {

    foreach ($data['js'] as $item) {
  ?>
      <script src="<?php echo _PUBLIC . '/admin/assets/js/' . $item . '.js' ?>"></script>
  <?php
    }
  }

  ?>
  <script>
    setTimeout(function() {
      if(document.getElementById("toast-success")){

        document.getElementById("toast-success").classList.add("hidden");
      }
    }, 3000);
  </script>
</body>

</html>