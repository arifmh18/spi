<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Praktik Industri</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweet-alert/css/sweetalert2.min.css">
  <script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
  <script type="text/javascript">
    function cekform()
    {
      if(!$("#username").val())
      {
        swal('Oops...','Username tidak boleh kosong','error');
        $('#username').focus();
        return false;
      }
      if(!$("#password").val())
      {
        swal('Oops...','Password tidak boleh kosong','error');
        $('#password').focus();
        return false;
      }
    }
  </script>

</head>
<body class="lockscreen">
<div class="lockscreen-wrapper">
<?php echo $this->session->flashdata('pesan'); ?>
  <div class="lockscreen-logo">
      <strong>Sistem Infomasi Praktik Industri</strong>
  </div>
  <div class="lockscreen-name">Silahkan Login</div>

  <div class="lockscreen-item">
    <div class="lockscreen-image">
      <img src="<?php echo base_url(); ?>assets/img/icon-user.png" alt="User Pengguna">
    </div>
    <form method="post" action="login/auth" class="lockscreen-credentials" onsubmit="return cekform();">
      <div class="input-group">
        <input type="email" class="form-control" placeholder="Email" id="username" name="email">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
  </div>
  <div class="help-block text-center">
    Belum punya akun? <a href="<?php echo base_url()?>login/registrasi"> Daftar disini </a>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>