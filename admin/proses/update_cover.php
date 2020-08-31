 <?php

 	include('../../koneksi.php');

 	date_default_timezone_set('Asia/Jakarta');

 	$id  		= $_POST['id'];

 	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$foto = $_FILES['foto']['name'];
	$x = explode('.', $foto);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['foto']['size'];
	$file_tmp = $_FILES['foto']['tmp_name'];	

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 544070){			
			move_uploaded_file($file_tmp, '../../assets/img/film/'.$foto);

			$simpan = mysqli_query($koneksi, "UPDATE tb_film SET foto = '$foto' WHERE id = $id")or die (mysqli_error($koneksi)); 
			if($simpan){
				echo "<script> document.location.href='../detail_film.php?id=$id&pesan=sukses'; </script>";
			}else{
				echo "<script> document.location.href='../detail_film.php?id=$id&pesan=update_gagal'; </script>";
			}
		}else{
			echo "<script> document.location.href='../edit_cover.php?id=$id&pesan=file_besar'; </script>";	
		}
	}else{
		echo "<script> document.location.href='../edit_cover.php?id=$id&pesan=ekstensi'; </script>";	
	}
?>