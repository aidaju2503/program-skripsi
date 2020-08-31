 <?php

 	include('../../koneksi.php');

	$update = mysqli_query($koneksi, "TRUNCATE tb_data_uji")or die (mysqli_error($koneksi)); 

	if($update){
		echo "<script> document.location.href='../hasil_klasifikasi.php?pesan=hapus_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../hasil_klasifikasi.php?pesan=hapus_gagal'; </script>";	
	}
?>