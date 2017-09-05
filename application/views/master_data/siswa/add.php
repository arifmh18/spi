      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Silahkan Isi Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="tambah" class="form-horizontal" action="<?php echo base_url() ?>siswa/act_add" method="post" enctype="multipart/form-data">
              <div class="box-body">
              
                <div class="form-group">
                  <label class="col-sm-3 control-label">No Induk Siswa<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No Induk Siswa" name="induk">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Username<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Password<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Konfirmasi Password<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="repass">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Email<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control"  placeholder="Email" name="email">
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-3 control-label">No HP/Telp<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No HP/Telp" name="no">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Kota Domisili<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Kota/Kabupaten Domisili" name="domisili">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Lengkap<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="2" placeholder="Enter ..." name="alamat"></textarea>
                  </div>
                </div>

<!--                 <div class="form-group">
                  <label class="col-sm-2 control-label">Photo Profil</label>
                  <div class="col-sm-10">
                    <input type="file" name="avatar" class="form-control avatar">
                    <p><i>hanya file type jpg, png, gif</i></p>
                  </div>
                </div>
 -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="jurusan">
                      <option value="">- Pilih Jurusan -</option>
                      <?php foreach ($jurusan as $key => $value) { ?>
                      <option value="<?php echo $value->kd_jurusan; ?>"><?php echo $value->nama_jurusan; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tambah</button>
                <a href="<?php echo base_url() ?>siswa" class="btn btn-default pull-right">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
<script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tambah').on('submit', function(e){
      e.preventDefault();

      var $this   = $(this),
        url   = $this.attr('action'),
        data  = $this.serialize();
        img  = new FormData('.avatar')

      $.ajax({
        url   : url,
        type  : 'post',
        dataType: 'json',
        data  : data,
        success : function(data) {
          if(data.sts == 1) {
            swal("Sukses!",data.msg,"success");
            // $.notify({message: data.msg},{type: 'success'});
            // $('.wadah').load('<?php echo base_url()?>siswa');
            setTimeout("location.href='<?php echo base_url() ?>siswa'", 1500);
          } else {
            $.notify({message: data.msg},{type: 'danger'});
          }    console.log(data);
        },
        error   : function(data) {
          swal('Error', 'Terdapat Kesamaan Data <br>, <b>Nomor Induk</b> dan <b>Email</b> TIDAK BOLEH SAMA!', 'error');
          console.log(data);
        }
      });
        console.log(img);
    });
  });
</script>