 <?php

 	include('../../koneksi.php');

 	date_default_timezone_set('Asia/Jakarta');

 	$id  		= $_POST['id'];
 	$film  		= $_POST['film'];
 	// $genre      = $_POST['genre'];
 	// $tahun      = $_POST['tahun'];
 	// $negara     = $_POST['negara'];
 	$sinopsis  = $_POST['sinopsis'];

 	$update = mysqli_query($koneksi, "UPDATE tb_film SET film = '$film', sinopsis = '$sinopsis' WHERE id = $id")or die (mysqli_error($koneksi)); 

	echo "<script> document.location.href='../detail_film.php?id=$id&pesan=sukses'; </script>";	
	

?>