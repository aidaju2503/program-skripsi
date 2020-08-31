 <?php

 	include('../../koneksi.php');

 	date_default_timezone_set('Asia/Jakarta');

 	$data_training  = $_POST['komentar'];
 	$id_film        = $_POST['id_film'];
 	$kategori       = $_POST['kategori'];

	$simpan = mysqli_query($koneksi, "INSERT INTO tb_data_training (data_training, id_film, kategori) VALUES('$data_training', '$id_film', '$kategori')")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../data_training.php?pesan=sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../data_training.php?pesan=gagal'; </script>";	
	}
?>