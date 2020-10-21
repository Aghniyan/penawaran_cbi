<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/ekko-lightbox/ekko-lightbox.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
  
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/summernote/summernote-bs4.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/summernote/summernote-bs4.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link"  href="<?=base_url('auth/logout')?>">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
