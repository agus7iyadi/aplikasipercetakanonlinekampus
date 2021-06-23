<?php  
include '../config.php';
$status =$_POST['status'];
$id_upload=$_GET['id'];
               	$sql = $koneksi -> query("update upload set status='$status' where id_upload='$id_upload'");

                    	if ($sql) {
                    		?>
                    		<script type="text/javascript">
                    			alert("ubah berhasil disimpan")
                    			window.location.href="../timeline.php?page=histori";
                    		</script>
<?php                    		
                    	}

?>