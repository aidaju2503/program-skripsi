 <?php

 	include('../../koneksi.php');

	$update = mysqli_query($koneksi, "TRUNCATE tb_data_training")or die (mysqli_error($koneksi)); 

	if($update){
		echo "<script> document.location.href='../data_training.php?pesan=hapus_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../data_training.php?pesan=hapus_gagal'; </script>";	
	}
?>