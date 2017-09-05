      <div class="box">
        <div class="box-header with-border">
        <i class="fa fa-lightbulb-o"></i>
          <h3 class="box-title">Data Guru Belum Aktif</h3>
            <div class="pull-right box-tools">
        </div></div>
        <div class="box-body">
      <div class="row">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>Nomor Induk Pegawai</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th width="150px" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;
                  foreach ($guru as $key => $value){ 
                ?>
                <tr>
                  <td class="text-center"><?php echo $i ?></td>
                  <td><a href="<?php echo base_url()?>guru/detail/<?php echo strEncrypt($value->id); ?>"><?php echo $value->no_induk ?></a></td>
                  <td><?php echo $value->nama_lengkap ?></td>
                  <td><?php echo $value->nama_jurusan ?>
                  </td>
                  <td class="text-right">
                    <button type="button" value="<?php echo $value->id ?>" class="btn btn-success aktif">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>Aktifkan
                    </button>
                    <button type="button" value="<?php echo $value->id ?>" class="btn btn-danger confirm">
                        <i class="fa fa-trash" aria-hidden="true"></i>Hapus
                    </button>
                  </td>
                </tr>
                <?php $i++;} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
        <!-- /.box-body -->
      <!-- /.box -->
<script type="text/javascript" src="<?php echo base_url()?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).on("click",".confirm",function(){
      var id=$(this).attr("value");
      swal({
          title:"Hapus",
          text:"Yakin akan menghapus data ini?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Hapus",
          closeOnConfirm: true,
      }).then(function(){
           $.ajax({
              url:"<?php echo base_url()?>guru/hapus",
              type: "POST",
              data:{id:id},
              success: function(data){
                  swal("Sukses!",data.msg,"success");
                  setTimeout("location.href='<?php echo base_url() ?>guru/noaktif'", 1500);
                  // $('.wadah').load('<?php echo base_url()?>guru');
                console.log(id);
              }
           });
      });
  });

  $(document).on("click",".aktif",function(){
      var id=$(this).attr("value");
      swal({
          title:"Rubah Status",
          text:"Yakin akan mengaktifkan data ini?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Aktifkan",
          closeOnConfirm: true,
      }).then(function(){
           $.ajax({
              url:"<?php echo base_url()?>guru/aktif",
              type: "POST",
              data:{id:id},
              success: function(data){
                  swal("Sukses!",data.msg,"success");
                  setTimeout("location.href='<?php echo base_url() ?>guru/noaktif'", 1500);
                  // $('.wadah').load('<?php echo base_url()?>guru');
                console.log(id);
              }
           });
      });
  });
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

</script>
