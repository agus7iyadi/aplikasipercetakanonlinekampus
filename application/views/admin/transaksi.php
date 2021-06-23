<!-- menu transaksi user -->



<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$title; ?></h1>
<br>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Dokumen</th>
            <th>Paket</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>aksi</th>
          </tr>
        </thead>        
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($tblfile as $m) : 
          $id=$m['id'];
          ?>
          <tr>
          
            <td><?= $i; ?></td>
            <td><?=$m['email']; ?></td>
            <td><?=$m['namafiletampil']; ?></td>
            <td><?=$m['paket'] == 1 ?"Standar" : "Cepat" ?></td> 
            <td><?php $apa=$m['status'];
            if ($apa == 1) {
            $apa = '<span class="badge badge-info">Menunggu</span>'; 
            } elseif($apa == 2){
            $apa =  "Diterima";} 
            elseif($apa == 3) { 
              $apa = "Ditolak";
            }elseif($apa == 4) { 
              $apa = "selesai";
            }
            echo "$apa";
            ?>
            </td>
            <td><?=$m['create_at']; ?></td>

            <td>
              <a href="#" data-toggle="modal" data-target="#ModalDetail<?php echo $id;?>" class="badge badge-warning" >Detail</a>
              <a href="<?= base_url('assets/file_upload/').$m['filename']; ?>" class="badge badge-success" target="_blank">Print</a>
              <a href="<?=base_url();?>admin/edittransaksi/<?=$m['id'];?>" class="badge badge-success" >Edit</a>
              <a href="<?=base_url();?>admin/hapusdatatransaksi/<?=$m['id'];?>" class="badge badge-danger tombol-hapus">Hapus</a>
            </td>
          </tr>
          <?php $i++;?>
          <?php endforeach?>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- coba modal -->
<?php foreach ($tblfile as $m) : 
          $id=$m['id'];
          $nft=$m['namafiletampil'];
          $file=$m['filename'];
          ?>
	<!--Modal Edit Pengguna-->
  <div class="modal fade" id="ModalDetail<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Transaksi</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/files/update_file'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                             <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Id</label>
                                <div class="col-sm-12">
                                  <input type="text" readonly name="xjudul" class="form-control" value="<?php echo $id;?>" id="inputUserName" placeholder="Judul" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Judul Orderan</label>
                                <div class="col-sm-12">
                                  <input type="text" readonly name="xjudul" class="form-control" value="<?php echo $nft;?>" id="inputUserName" placeholder="Judul" required>
                                </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('assets/file_upload/').$m['filename']; ?>" class="btn btn-danger btn-flat" target="_blank">Cetak</a>
                        <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Tutup</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>