<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel Registrasi</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweet-alert/css/sweetalert2.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap-notify-master/bootstrap-notify.min.js"></script>
</head>
<body class="lockscreen">
    <section class="content">
      <div class="row"><br><br></div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Panel Registrasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url();?>login/act_registrasi" method="post" id="registrasi">
                <select class="form-control" id="level" name="level" style="width: 100%;margin-bottom: 5px;" >
                  <option value="">- Daftar sebagai -</option>
                  <option value="guru">Guru</option>
                  <option value="siswa">Siswa</option>
                  <option value="industri">Industri</option>
                </select>
                
                <div id="formulir">
                <div class="form-group"  id="guru">
                  <label class="col-sm-3 control-label">NIP<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No Induk Pegawai" name="nip" style="margin-bottom: 5px;">
                  </div>
                </div>
              
                <div class="form-group"  id="siswa">
                  <label class="col-sm-3 control-label">NIS<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No Induk SIswa" name="nis" style="margin-bottom: 5px;">
                  </div>
                </div>
              
                <div class="form-group"  id="industri">
                  <label class="col-sm-3 control-label">NPWP<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="NPWP" name="npwp" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Username<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Username" name="username" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group" >
                  <label class="col-sm-3 control-label">Password<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" id="pass" class="form-control" placeholder="Password" name="password" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group" id="repass">
                  <label class="col-sm-3 control-label">Ulangi Password<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Retype Password" name="repass" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Email<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control"  placeholder="Email" name="email" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">No HP/Telp<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No HP/Telp" name="no" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Kota<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Kota/Kabupaten Domisili" name="domisili" style="margin-bottom: 5px;">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="2" placeholder="Alamat Lengkap" name="alamat" style="margin-bottom: 5px;"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;margin-bottom: 5px;" name="jurusan">
                      <option value="">- Pilih Jurusan -</option>
                      <?php foreach ($jurusan as $key => $value) { ?>
                      <option value="<?php echo $value->kd_jurusan; ?>"><?php echo $value->nama_jurusan; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Daftar</button>
                <a href="<?php echo base_url() ?>login" class="btn btn-default pull-right">Kembali</a>
              </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    document.getElementById("formulir").style.display="none";

    $('#level').on('change',function(){
      document.getElementById("formulir").style.display="block";
      if ($('#level').val() == 'guru') {
          document.getElementById("guru").style.display="block";
          document.getElementById("siswa").style.display="none";
          document.getElementById("industri").style.display="none";
          return $("#siswa").defaultSelected;

      }
      else if ($('#level').val() == 'siswa') {
          document.getElementById("guru").style.display="none";
          document.getElementById("siswa").style.display="block";          
          document.getElementById("industri").style.display="none";
      }
      else if ($('#level').val() == 'industri') {
          document.getElementById("guru").style.display="none";
          document.getElementById("siswa").style.display="none";
          document.getElementById("industri").style.display="block";
      }
      else{
          document.getElementById("formulir").style.display="none";
      }

    });

    $('#registrasi').on('submit', function(e){
      e.preventDefault();

      var $this   = $(this),
        url   = $this.attr('action'),
        data  = $this.serialize();

      $.ajax({
        url   : url,
        type  : 'post',
        dataType: 'json',
        data  : data,
        success : function(data) {
          if(data.sts == 1) {
            swal("Sukses!",data.msg,"success");
            // $.notify({message: 'Silahkan tunggu konfirmasi dari admin '},{type: 'success'});
            // $('.wadah').load('<?php echo base_url()?>Industri');
            setTimeout("location.href='<?php echo base_url() ?>login'", 1500);
          } else {
            $.notify({message: data.msg},{type: 'danger'});
          }    console.log(data);
        },
        error   : function(data) {
          swal('Error', 'Terdapat Kesamaan Data <br>, <b>Nomor Induk</b> dan <b>Email</b> TIDAK BOLEH SAMA!', 'error');
          console.log(data);
        }
      });
    });

  });
</script>