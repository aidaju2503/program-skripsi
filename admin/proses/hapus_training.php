 <?php

 	include('../../koneksi.php');

 	date_default_timezone_set('Asia/Jakarta');

 	$id = $_GET['id'];

	$update = mysqli_query($koneksi, "DELETE FROM tb_data_training WHERE id = '$id' ")or die (mysqli_error($koneksi)); 

	if($update){
		echo "<script> document.location.href='../data_training.php?pesan=hapus_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../data_training.php?pesan=hapus_gagal'; </script>";	
	}
?>