<?php 
	$id_upload = $_GET['id_upload'];

	$koneksi->query("delete from upload where id_upload = '$id_upload'");

 ?>

 <script type="text/javascript">
 	window.location.href="?page=order";
 </script>
