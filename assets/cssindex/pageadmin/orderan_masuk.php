<section id="main-content">
          <section class="wrapper">
<h3><i class="fa fa-angle-right"></i> Tabel Orderan Masuk</h3>

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
                                            <th>Nama</th>
                                            <th>Berwarna</th>
                                            <th>Hitam Putih</th>
                                            <th>Harga</th>
                                            <th>Tanggal Upload</th>
                                            <th>Pengambilan</th>
                                            <th>Status</th>
                                            <th>FILE</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
  $konek = mysqli_connect("localhost","root","","mager1");
  $no = 0;
  $query = "SELECT * FROM upload ORDER BY id_upload DESC";
  $hasil = mysqli_query($konek, $query);
   

  while ($r = mysqli_fetch_array($hasil)){
$no++;
echo "<tr>
   <td>$no</td>
   <td>".$r['nama']."</td>
   <td>".$r['berwarna']."</td>
   <td>".$r['hitamputih']."</td>
   <td>".$r['jumlahtotal']."</td>
   <td>".$r['tgl_upload']."</td>
   <td>".$r['cara']."</td>
   <td>".$r['status']."</td>
   <td> <a  href=\"simpan.php?file=$r[nama_file]\">Download File</a></td>

  </tr>";

  }
?>
















    </section><! --/wrapper -->
  </section>




