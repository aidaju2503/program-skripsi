<?php 

include('../../koneksi.php');

// menghubungkan dengan library excel reader
include ('library/excel_reader2.php');
?>

<?php
// upload file xls
$target = basename($_FILES['data_training']['name']) ;
move_uploaded_file($_FILES['data_training']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['data_training']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_training']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$data_training   = $data->val($i, 1);
	$id_film         = $data->val($i, 2);
	$kategori        = $data->val($i, 3);

	if($data_training != "" && $id_film != "" && $kategori != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into tb_data_training values('','$data_training','$id_film','$kategori')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['data_training']['name']);

// alihkan halaman ke index.php
echo "<script> document.location.href='../data_training.php?pesan=import_sukses'; </script>";	
?>