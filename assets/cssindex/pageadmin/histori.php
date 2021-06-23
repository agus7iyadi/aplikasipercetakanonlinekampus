<section id="main-content">
          <section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Tabel kelola Order</h3>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b>List </b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Berwarna</th>
                                            <th>Hitam Putih</th>
                                            <th>Harga</th>
                                            <th>Tanggal Upload</th>
                                            <th style="width: 100px;" >Deskripsi</th>
                                            <th>Status</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                             <?php 
                              $no = 1;
                              $sql = $koneksi->query("SELECT * FROM upload ");
                             while ($data=$sql->fetch_assoc()) {
                               
                             
                              ?>

                                      <tr>
                                              
                                              <td><?php echo $no++; ?></td>
                                              <td><?php echo $data['nama']; ?></td>
                                              <td><?php echo $data['berwarna']; ?></td>
                                              <td><?php echo $data['hitamputih']; ?></td>
                                              <td><?php echo $data['jumlahtotal']; ?></td>
                                              <td><?php echo $data['tgl_upload']; ?></td>
                                              <td><?php echo $data['deskripsi']; ?></td>
                                              <td><?php echo $data['status']; ?></td>
                                             
                                                  

                                              <td>

                                                  <a onclick="return confirm('anda yakin akan mengedit data ini..??')" href="?page=order&aksi=ubah&id_upload=<?php echo $data['id_upload'];?>" class="btn btn-success btn-sm">edit status</a>
                                                  
                                                  <a onclick="return confirm('anda yakin akan menghapus data ini..??')" href="?page=order&aksi=hapus2&id_upload=<?php echo $data['id_upload'];?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                      </tr>
                                    <?php }?>
                             
















    </section><! --/wrapper -->
  </section>




