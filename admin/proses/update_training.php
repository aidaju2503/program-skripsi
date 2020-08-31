 <?php

 	include('../../koneksi.php');

 	date_default_timezone_set('Asia/Jakarta');

 	$id  			= $_POST['id'];
 	$data_training  = $_POST['komentar'];
 	$id_film        = $_POST['id_film'];
 	$kategori       = $_POST['kategori'];

	$update = mysqli_query($koneksi, "UPDATE tb_data_training SET data_training = '$data_training', id_film = '$id_film', kategori = '$kategori' WHERE id = '$id' ")or die (mysqli_error($koneksi)); 

	if($update){
		echo "<script> document.location.href='../data_training.php?pesan=edit_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../data_training.php?pesan=edit_gagal'; </script>";	
	}
?>