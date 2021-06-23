<?php 
	$id = $_GET['id'];

	$koneksi->query("delete from users where id ='$id'");
 ?>

 <script type="text/javascript">
 	window.location.href="?page=listuser";
 </script>