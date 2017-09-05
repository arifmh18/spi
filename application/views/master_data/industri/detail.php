      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Data industri</h3>
<!--               <div class="pull-right box-tools">
                <a href="<?php base_url()?>industri/cetak" class="btn btn-info pull-right" data-toggle="tooltip" title="Print Data industri"><span class="fa fa-print"></span> Print</a>
              </div>
 -->            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="tambah" class="form-horizontal" action="" method="post">
              <div class="box-body">
              
                <div class="form-group">
                  <label class="col-sm-3 control-label">NPWP</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->no_induk; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->username; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->nama_lengkap; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->email; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">No HP/Telp</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->hp; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Kota Domisili</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->domisili; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Lengkap</label>
                  <div class="col-sm-9">
                    <?php echo $detail[0]->alamat; ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan</label>
                  <div class="col-sm-9">
                  <?php 
                  foreach ($jurusan as $key => $value) {
                     if ($detail[0]->jurusan  == $value->kd_jurusan) {
                        echo $value->nama_jurusan;
                      }
                    }
                  ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Avatar</label>
                  <div class="col-sm-9">
                    <img src="<?php echo base_url()?>assets/img/avatar/<?php echo $detail[0]->avatar; ?>" width="25%"> 
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <input action="action" onclick="window.history.go(-1); return false;" type="button" value="Kembali" class="btn btn-default pull-right" />
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

      $.ajax({
        url   : url,
        type  : 'post',
        dataType: 'json',
        data  : data,
        success : function(data) {
          if(data.sts == 1) {
            $.notify({message: data.msg},{type: 'success'});
            setTimeout("location.href='<?php echo base_url() ?>industri'", 2000);
          } else {
            $.notify({message: data.msg},{type: 'danger'});
          }    console.log(data);
        },
        error   : function(data) {
          swal('Error', 'Internal Server Error !', 'error');
        }
      });

    });
  });  
</script>