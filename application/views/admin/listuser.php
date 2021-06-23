<!-- menu transaksi user -->



<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?=$title; ?></h1>
<br>
<div class="row">
        <div class="col-lg-12">
            <?=$this->session->flashdata('message'); ?>
        </div>
    </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
 
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Status</th>
            <th>aksi</th>
          </tr>
        </thead>
       
        <tbody>  
        <?php $i = 1; ?>
        <?php foreach ($listuser as $m) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?=$m['nama']; ?></td>
            <td><?=$m['email'];?></td>
            <td><?=$m['is_active'] == 1 ? "Aktif" : "Tidak Aktif"?></td>
            <td>
            <a href="<?=base_url();?>admin/editlistuser/<?=$m['id'];?>" class="badge badge-success" >Edit</a>
            <!-- <a href="<?=base_url();?>admin/hapuslistuser/<?=$m['id'];?>" class="badge badge-danger" onclick="return confirm('yakin?');" >Hapus</a> -->
            <a href="<?=base_url();?>admin/hapuslistuser/<?=$m['id'];?>" class="badge badge-danger tombol-hapus">Hapus</a>
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
