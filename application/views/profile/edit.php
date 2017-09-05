    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active">
              <h3 class="widget-user-username"><?php echo $profile[0]->nama_lengkap ?></h3>
              <h5 class="widget-user-desc">Level: <i><?php echo $profile[0]->level ?></i></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url() ?>assets/img/avatar/<?php echo $profile[0]->avatar ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                  </div>
                </div>
              <form action="<?php echo base_url() ?>profile/ubah_avatar/<?php echo $profile[0]->id; ?>" method="post" enctype="multipart/form-data">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
            <?php echo $this->session->flashdata('pesan'); ?>
                    <button type="button" class="btn btn-default" id="ava">Ubah Avatar</button>
                      <input type="file" name="avatar" class="btn-block" id="upload">
                      <small style="color: red;" id="label"><i>*ukuran maksimal 2mb dan panjang lebar maksimal 1024x1024 pixel</i></small><br>
                      <button type="submit" class="btn btn-primary" id="ava_aksi">Ubah Avatar</button>
                  </div>
                </div>
              </form>
                <div class="col-sm-3">
                  <div class="description-block">
                  </div>
                </div>
              </div>
            <form id="tambah" class="form-horizontal" action="<?php echo base_url() ?>profile/act_edit/<?php echo $profile[0]->id; ?>" method="post">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">No Induk<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Nomor Induk" name="induk" value="<?php echo $profile[0]->no_induk?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Username<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $profile[0]->username?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Password<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Password" name="password" value="">
                      <small style="color: red;"><i>*Kosongi apabila tidak ingin merubah password</i></small>
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Ulangi Password<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Retype Password" name="repass" value="">
                      <small style="color: red;"><i>*Kosongi apabila tidak ingin merubah password</i></small>
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Username" name="nama_lengkap" value="<?php echo $profile[0]->nama_lengkap?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $profile[0]->email?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">No HP/Telp<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Nomor HP/Telp" name="no" value="<?php echo $profile[0]->hp?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Kota Domisili<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Kota Domisili" name="domisili" value="<?php echo $profile[0]->domisili?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Alamat<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Alamat Lengkap" name="alamat" value="<?php echo $profile[0]->alamat?>">
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Jurusan<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <select class="form-control select2" style="width: 100%;" name="jurusan">
                        <option value="">- Pilih Jurusan -</option>
                        <?php 
                          if ($profile[0]->level == 'admin') {
                            echo "<option value='admin' selected >Administrator</option>";
                          }
                          else{
                            foreach ($jurusan as $key => $value) {
                              echo "<option ".($value->kd_jurusan == $profile[0]->jurusan ? 'selected' : '')." value='".$value->kd_jurusan."'>".$value->nama_jurusan."</option>";
                            }
                          }
                          ?>
                      </select>
                    </div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Status<span style="color: red">*</span></label>
                    <div class="col-sm-8">
                      <input type="radio" name="status" value="1" class="flat-red" <?php if ($profile[0]->status == '1') {echo "checked";} else{}?>>&nbsp; Aktif &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="status" value="0" class="flat-red" <?php if ($profile[0]->status == '0') {echo "checked";} else{}?>> &nbsp;Tidak Aktif 
                    </div>
                  </div>
                </li>

              </ul>
              <button type="submit" class="btn btn-primary btn-block"><b>Perbarui</b></button>
            </div>
          </div>
          </form>
          <!-- /.widget-user -->
        </div>
      </div>

<script type="text/javascript">
  $(document).ready(function(){
    document.getElementById("upload").style.display="none";
    document.getElementById("ava_aksi").style.display="none";
    document.getElementById("label").style.display="none";

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
            // console.log(data);
            setTimeout("location.href='<?php echo base_url() ?>profile/edit/<?php echo $profile[0]->id; ?>'", 1500);
          } else {
            $.notify({message: data.msg},{type: 'danger'});
          }   
        },
        error   : function(data) {
          swal('Error', 'Terdapat Kesamaan Data <br>, <b>Nomor Induk</b> dan <b>Email</b> TIDAK BOLEH SAMA!', 'error');
        }
      });
      console.log(data);
    });

    $("#ava").click(function() {
       $("#ava").fadeOut("slow");
       $("#upload").fadeIn ("fast");
       $("#ava_aksi").fadeIn ("fast");
       $("#label").fadeIn ("fast");
     })

  });  

  $(function () {
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
});
</script>