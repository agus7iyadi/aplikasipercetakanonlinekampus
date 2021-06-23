<section id="main-content">
          <section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Tabel List User</h3>

<div class="row">
                <div class="col-md-12"> 
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b>List User</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Kelas</th>
                                            <th>No Hp</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                             <?php 
                              $no = 1;
                              $sql = $koneksi->query("SELECT * FROM users where nim BETWEEN '1000' AND '30000' ");
                             while ($data=$sql->fetch_assoc()) {
                               
                             
                              ?>

                                      <tr>
                                              
                                              <td><?php echo $no++; ?></td>
                                              <td><?php echo $data['username']; ?></td>
                                              <td><?php echo $data['name']; ?></td>
                                              <td><?php echo $data['nim']; ?></td>
                                              <td><?php echo $data['kelas']; ?></td>
                                              <td><?php echo $data['nohp']; ?></td>

                                              <td>
                                                  <a onclick="return confirm('anda yakin akan menghapus data ini..??')" href="?page=listuser&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                      </tr>
                                    <?php }?>
                             
















    </section><! --/wrapper -->
  </section>