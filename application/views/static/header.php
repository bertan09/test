<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>BTT Soft</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-sign-out-alt"> Çıkış Yap</i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?php echo base_url("assets"); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Firma Adı</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url("assets"); ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Kullanıcı Adı</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?= base_url("dashboard")?>" class="nav-link <?= $this->uri->segment(1) == "dashboard" ? "active" : null?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Ana Sayfa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("add-device")?>" class="nav-link <?= $this->uri->segment(1) == "add-device" ? "active" : null?>">
                            <i class="nav-icon fas fa-save"></i>
                            <p>
                                Cihaz Kayıt
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("devices")?>" class="nav-link <?= $this->uri->segment(1) == "devices" ? "active" : null?>">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                Cihaz Sorgula
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("customers")?>" class="nav-link <?= $this->uri->segment(1) == "customers" ? "active" : null?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Müşteriler
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("parts")?>" class="nav-link <?= $this->uri->segment(1) == "parts" ? "active" : null?>">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Yedek Parça
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("finance")?>" class="nav-link <?= $this->uri->segment(1) == "finance" ? "active" : null?>">
                            <i class="nav-icon fas fa-university"></i>
                            <p>
                                Muhasebe
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?= $this->uri->segment(1) == "settings" ? "menu-open" : null?>">
                        <a href="#" class="nav-link <?= $this->uri->segment(1) == "settings" ? "active" : null?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Ayarlar
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url("settings")?>" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Genel Ayarlar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SMS Ayarları</p>
                                </a>
                            </li>
                        </ul>
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
                        <h1 class="m-0 text-dark"><?=$title;?></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">