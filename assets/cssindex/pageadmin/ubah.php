<?php 

$id_upload=$_GET['id_upload'];

$sql = $koneksi->query("select * from upload where id_upload='$id_upload' ");

$tampil = $sql->fetch_assoc();
 ?>
<section id="main-content">
          <section class="wrapper">
            
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Ubah Data</h4>
                   
                    <form enctype="multipart/form-data" method="POST" action=<?php echo "pageadmin/ubhstatus.php?id=$id_upload"?>>

                    

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Status</label>
                      <select name="status" class="form-control" id="exampleFormControlSelect1">
                          <option value="Menunggu">Menunggu</option>
                          <option value="ditolak" >Ditolak</option>
                          <option value="diterima">Diterima</option>
                       </select>
                    </div>

                      <input class="btn btn-warning btn-lg" type="submit" value="simpan">
                  </form>


                        </div>
                    </div>

            </div>
            <</section>
            
    </section>
<!-- /MAIN CONTENT -->




                  