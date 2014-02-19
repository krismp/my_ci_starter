<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/images/ka.ico">

    <title> <?php echo $title; ?> | <?php echo $this->config->item('app_name') ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/styles/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?php echo base_url() ?>assets/admin/styles/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/styles/font-awesome.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/admin/styles/theme.css" rel="stylesheet">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/styles/style.css">

    <!-- DataTables -->
    <link href="<?php echo base_url() ?>assets/admin/styles/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/admin/scripts/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.scripts/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- JS Files -->
    <script src="<?php echo base_url() ?>assets/admin/scripts/jquery-1.10.2.min.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-xs-3">
          <a href="<?php echo base_url() ?>">
            <img src="<?php echo base_url() ?>assets/admin/images/analytics_logo.png" class="logo">
          </a>
        </div>
        <div class="col-xs-9">
          <p class="pull-right">
            <!-- <a href="#"><i class="fa fa-cogs"></i> Setting</a> -->
            <a href="<?php echo site_url('admin/user/details/'.$this->session->userdata('id')) ?>"><i class="fa fa-user"></i> My Account</a>
            <a href="<?php echo site_url('admin/auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo site_url('admin/dashboard') ?>"> Aplikasi Reservasi Tiket KA</a>
        </div>
        <ul class="nav navbar-nav">
          <li <?php echo ($current == 'dashboard' ? 'class="active"' : '') ?>><a href="<?php echo site_url('admin/dashboard') ?>"><i class="fa fa-home"></i></a></li>
          <li <?php echo ($current == 'penumpang' ? 'class="active"' : '') ?>><a href="<?php echo site_url('admin/penumpang') ?>">Penumpang</a></li>
          <li <?php echo ($current == 'relasi' ? 'class="active"' : '') ?>><a href="<?php echo site_url('admin/relasi') ?>">Relasi</a></li>
          <?php 
            // Only admin can access this page
            if ($this->session->userdata('group_id') == 1) {
          ?>
              <li class="dropdown <?php echo ($current == 'master' ? 'active' : '') ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Data Master <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('admin/pejabat') ?>">Pejabat</a></li>
                  <li><a href="<?php echo site_url('admin/kelas_kereta') ?>">Kelas Kereta</a></li>
                  <li><a href="<?php echo site_url('admin/kereta') ?>">Kereta</a></li>
                </ul>
              </li>
              <li class="dropdown <?php echo ($current == 'setting' ? 'active' : '') ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manajemen User <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('admin/user') ?>">User</a></li>
                  <li><a href="<?php echo site_url('admin/group') ?>">Group</a></li>
                </ul>
              </li>
          <?php 
            }
          ?>

        </ul>
        <div class="navbar-collapse">
          <p class="navbar-text navbar-right">Hello, <a href="<?php echo site_url('admin/user/details/'.$this->session->userdata('id')) ?>" class="navbar-link"><?php echo $this->session->userdata['username'] ?> !</a></p>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-xs-12">
          
          <!-- BREADCRUMB -->
          <div class="row">
            <div class="col-xs-6">
              <?php
                if(!empty($breadcrumb)){
                  echo '<ol class="breadcrumb">';
                  echo '<li><a href="'.base_url().'admin/dashboard"><i class="fa fa-home"></i></a></li>';
                  foreach($breadcrumb as $key => $link){
                    echo '<li class="active"><a href="'.$link.'">'.ucwords($key).'</a></li>';
                  }
                  echo '</ol>';   
                }
                else{
                  echo '<ol class="breadcrumb">';
                  echo '<li class="active"><a href="'.base_url().'admin/dashboard"><i class="fa fa-home"></i></a></li>';
                  echo '</ol>';
                }
              ?>
            </div>

            <div class="col-xs-6">
              <small class="pull-right"><span class="system-time"><span class="advedia-date"></span> &#149; <span class="advedia-time"></span></span></small>
            </div>
          </div>
          <!-- END OF BREADCRUMB -->