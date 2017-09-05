      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Silahkan Perbarui Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="tambah" class="form-horizontal" action="<?php echo base_url() ?>guru/act_edit/<?php echo strEncrypt($detail[0]->id); ?>" method="post">
              <div class="box-body">
              
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nomor Induk Pegawai <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nomor Induk" name="induk" value="<?php echo $detail[0]->no_induk; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Username <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $detail[0]->username; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <small style="color: red"><i>*kosongi apabila tidak ingin merubah password</i></small>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Ulangi Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Retype Password" name="repass">
                    <small style="color: red"><i>*kosongi apabila tidak ingin merubah password</i></small>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo $detail[0]->nama_lengkap; ?>">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Email <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control"  placeholder="Email" name="email" value="<?php echo $detail[0]->email; ?>">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">No HP/Telp <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="No HP/Telp" name="no" value="<?php echo $detail[0]->hp; ?>">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Kota Domisili <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Kota/Kabupaten Domisili" name="domisili" value="<?php echo $detail[0]->domisili; ?>">
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Alamat Lengkap <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="2" placeholder="Enter ..." name="alamat"><?php echo $detail[0]->alamat; ?></textarea>
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jurusan <span style="color: red">*</span></label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="jurusan">
                      <option value="">- Pilih Jurusan -</option>
                      <?php 
                          foreach ($jurusan as $key => $value) {
                            echo "<option ".($value->kd_jurusan == $detail[0]->jurusan ? 'selected' : '')." value='".$value->kd_jurusan."'>".$value->nama_jurusan."</option>";
                          }

                        ?>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"> Perbarui</button>
                <a href="<?php echo base_url()?>guru" class="btn btn-default pull-right">Kembali</a>
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
            swal("Sukses!",data.msg,"success");
            // $.notify({message: data.msg},{type: 'success'});
            setTimeout("location.href='<?php echo base_url() ?>guru'", 1500);
          } else {
            $.notify({message: data.msg},{type: 'danger'});
          }    console.log(data);
        },
        error   : function(data) {
          swal('Error', 'Terdapat Kesamaan Data <br>, <b>Nomor Induk</b> dan <b>Email</b> TIDAK BOLEH SAMA!', 'error');
        }
      });
    });
  });  

</script>