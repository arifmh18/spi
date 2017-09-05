      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Silahkan Isi Data Pendaftar</h3> <br>
              <i>Jurusan = <?php echo $daftar[0]->nama_jurusan; ?></i>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="tambah" class="form-horizontal" action="<?php echo base_url() ?>daftar/act_add" method="post" enctype="multipart/form-data">
              <div class="box-body">
              
                <div class="form-group" id="jurusan">
                  <label class="col-sm-3 control-label">Jurusan<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" value="<?php echo $daftar[0]->jurusan;?>" readonly>
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-3 control-label">No Induk Ketua<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No Induk Ketua" name="induk" value="<?php echo $daftar[0]->no_induk;?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">No Induk Anggota 1<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No Induk Anggota 1" name="anggota">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tempat Industri<span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="industri">
                      <option value="">- Pilih Tempat -</option>
                      <?php foreach ($industri as $key => $value) { ?>
                      <option value="<?php echo $value->id; ?>"><?php echo $value->domisili.' - '.$value->nama_lengkap; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tambah</button>
                <a href="<?php echo base_url() ?>guru" class="btn btn-default pull-right">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
<script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    document.getElementById("jurusan").style.display="none";

    $('#tambah').on('submit', function(e){
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
            // $.notify({message: data.msg},{type: 'success'});
            // $('.wadah').load('<?php echo base_url()?>guru');
            setTimeout("location.href='<?php echo base_url() ?>daftar'", 1500);
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
