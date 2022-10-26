<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet"
        href="{{asset("admin_assets/plugins/summernote/summernote-bs4.min.css")}}">

  <link rel="icon"
        style="width: 1080px; height: 1080px;"
        href="{{asset("admin_assets/dist/img/logo.png")}}" type="image/x-icon">
</head>
<body class="sidebar-mini layout-fixed bg-dark">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark d-flex justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link push-menu-btn"
           data-widget="pushmenu"
           href="#"
           role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin"
           class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item mr-4">
        <a href="/admin/logout"
           class="btn btn-danger">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-1 overflow-hidden">
    <!-- Brand Logo -->

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href=""
             class="brand-link text-center mr-2">
            <span class="brand-text">ArhamTrans</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("admin_assets/dist/img/logo.png")}}"
               class="img-circle elevation-2"
               alt="User Image">
        </div>
        <div class="info">
          <a href="#"
             class="d-block">ArhamTrans</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false">
          <li class="nav-item menu-open">
            <a href="/dashboard"
               class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="/data"
               class="nav-link">
              <i class="nav-icon fas fa-car-alt"></i>
              <p>
                Data Mobil
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="/admin/services/data"
               class="nav-link">
              <i class="nav-icon fas fa-hands-helping"></i>
              <p>
                Data Services
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="/data/tambah"
               class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Tambah Data</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="/admin/services"
               class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Tambah Services</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
