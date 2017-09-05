<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweet-alert/css/sweetalert2.min.css">
  <script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/iCheck/icheck.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

  <script src="<?php echo base_url(); ?>assets/input-mask/jquery.inputmask.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/bootstrap-notify-master/bootstrap-notify.min.js"></script>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini wadah">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i><b>S</b>PI</i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b> Prakerin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $jumlah; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda punya <?php echo $jumlah; ?> pemberitahuan</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url()?>guru/noaktif">
                      <i class="fa fa-users text-aqua"></i> <?php echo $jml_guru; ?> Guru baru belum aktif
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url()?>siswa/noaktif">
                      <i class="fa fa-users text-aqua"></i> <?php echo $jml_siswa; ?> Siswa baru belum aktif
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url()?>industri/noaktif">
                      <i class="fa fa-users text-aqua"></i> <?php echo $jml_industri; ?> Industri baru belum aktif
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/img/avatar/<?php echo $this->session->userdata('avatar'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/img/avatar/<?php echo $this->session->userdata('avatar'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_lengkap'); ?>
                  <small>Sistem Informasi Praktik Industri</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()?>profile/edit/<?php echo strEncrypt($this->session->userdata('id')); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>login/out" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url(); ?>dashboard">
            <i class="fa fa-dashboard"></i> Dashboard
          </a>
        </li>
        <?php $level = $this->session->userdata('level'); if ($level == 'admin') { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>guru"><i class="fa fa-circle-o text-aqua"></i> Guru</a></li>
            <li><a href="<?php echo base_url(); ?>industri"><i class="fa fa-circle-o text-aqua"></i> Industri</a></li>
            <li><a href="<?php echo base_url(); ?>siswa"><i class="fa fa-circle-o text-aqua"></i> Siswa</a></li>
          </ul>
        </li>
        <?php }?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-check-square-o"></i>
            <span>Administrasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>daftar"><i class="fa fa-circle-o text-aqua"></i> Pendaftaran</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> Status</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
      <?php echo $breadcumb ?>
      </ol>
      <h1>
        <?php echo $judul ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->load->view($view); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
