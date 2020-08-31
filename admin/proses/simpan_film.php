 <?php

 	include('../../koneksi.php');

 	date_default_timezone_set('Asia/Jakarta');

 	$film        = $_POST['film'];
 	// $genre       = $_POST['genre'];
 	// $tahun       = $_POST['tahun'];
 	// $negara       = $_POST['negara'];
 	$sinopsis   = $_POST['sinopsis'];


 	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$foto = $_FILES['foto']['name'];
	$x = explode('.', $foto);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['foto']['size'];
	$file_tmp = $_FILES['foto']['tmp_name'];

	$foto2 = $_FILES['foto2']['name'];
	$x2 = explode('.', $foto2);
	$ekstensi2 = strtolower(end($x2));
	$ukuran2	= $_FILES['foto2']['size'];
	$file_tmp2 = $_FILES['foto2']['tmp_name'];	

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true and in_array($ekstensi2, $ekstensi_diperbolehkan) === true){
		if($ukuran < 544070){			
			move_uploaded_file($file_tmp, '../../assets/img/film/'.$foto);
			move_uploaded_file($file_tmp2, '../../assets/img/film/'.$foto2);

			$simpan = mysqli_query($koneksi, "INSERT INTO tb_film (film, sinopsis, foto, foto_thumbnail) VALUES('$film', '$sinopsis', '$foto', '$foto2') ")or die (mysqli_error($koneksi)); 
			if($simpan){
				echo "<script> document.location.href='../film.php?halaman=1&pesan=sukses'; </script>";
			}else{
				echo "<script> document.location.href='../tambah_film.php?pesan=gagal'; </script>";
			}
		}else{
			echo "<script> document.location.href='../tambah_film.php?pesan=file_besar'; </script>";	
		}
	}else{
		echo "<script> document.location.href='../tambah_film.php?pesan=ekstensi'; </script>";	
	}
?>