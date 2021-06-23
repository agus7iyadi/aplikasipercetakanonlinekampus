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
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>        
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($tblfile as $m) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?=$m['email']; ?></td>
            <td><?=$m['namafiletampil']; ?></td>
            <td><?=$m['paket'] == 1 ?"Standar" : "Cepat" ?></td>
            <td><?=$m['create_at']; ?></td> 
            <td><?php $apa=$m['status'];
            if ($apa == 1) {
            $apa = "Menunggu";
            } elseif($apa == 2){
            $apa = '<span class="badge badge-warning">Diterima</span>';
            } 
            elseif($apa == 3) { 
              $apa = '<span class="badge badge-danger">Ditolak</span>';
            }elseif($apa == 4) { 
              $apa = '<span class="badge badge-success">Selesai</span>';
            }
            echo "$apa";
            ?>
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