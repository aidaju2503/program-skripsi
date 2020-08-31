<?php include('templates/session.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('templates/css.php'); ?>
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/sweet.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <?php include('templates/navbar.php'); ?>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <?php
                $hal = 'bantuan';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="">Bantuan</h3>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="panel panel-success">
                            <div class="panel-heading">
                               Cara Melakukan Pre Processing Pada Data Training
                            </div>
                            <div class="panel-body">
                                <ul>
                                  <li>Klik menu <b>Data Training</b></li>
                                  <li>Tambahkan Komentar / Import Komentar yang sudah ditentukan Sentimennya</li>
                                  <li>Jika ada kesalahan Data, Silahkan <b>Edit</b> kembali Data tersebut atau <b>Hapus</b> Data tersebut</li>
                                  <li>Setelah semua Data Training masuk, Klik Tombol <b>Pre Processing</b> pada bagian atas</li>
                                  <li>Tunggu bebera saat hingga proses selesai</li>
                                </ul>
                            </div>  
                        </div>

                    </div>

                    <div class="col-md-6">
                        
                        <div class="panel panel-success">
                            <div class="panel-heading">
                               Cara Melakukan Klasifikasi Pada Komentar Baru
                            </div>
                            <div class="panel-body">
                                <ul>
                                  <li>Klik Menu <b>Klasifikasi</b></li>
                                  <li>Pilih Menu <b>Klasifikasi Komentar</b></li>
                                  <li>Masukkan Komentar baru dan pilih Film, kemudian klik <b>Proses</b></li>
                                  <li>Tunggu beberapa saat hingga keluar hasil <b>Sentimen</b> pada Komentar tersebut</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        <?php include('templates/footer.php') ?>
    </div>

    <?php include('templates/js.php') ?>

</body>
</html>

<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

<script src="../assets/js/sweetalert.min.js"></script>
<script src="../assets/js/sweet.js"></script>
    
    <?php 
      if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Tambah Data Berhasil',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Tambah Data Gagal',
                    text: 'Cek Kembali Data Anda',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "edit_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Edit Data Berhasil',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "hapus_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Hapus Data Berhasil',
                  })
              </script>
          <?php
          }
      }
    ?>

    <script>
        $(document).ready(function(){
             $('.hapus').on('click',function(){
                var getLink = $(this).attr('href');
                    swal({
                            title: 'Hapus!',
                            text: 'Apakah Anda Yakin Ingin Menghapus?',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                            cancelButtonText: "Batal",
                            },function(){
                            window.location.href = getLink
                        });
                    return false;
            });
        });
    </script>

