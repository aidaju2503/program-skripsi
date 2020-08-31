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
                $hal = 'klasifikasi';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="">Sentimen Analisis</h3>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               Tambah Komentar
                            </div>
                            <div class="panel-body">
                                <form role="form" action="proses/proses_klasifikasi.php" method="post">
                                    <div class="form-group">
                                        <label>Film</label>
                                        <select class="form-control" name="id_film" required>
                                            <option value="">Pilih Film</option>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($koneksi,"SELECT * FROM tb_film ORDER BY id DESC");
                                            while($row = mysqli_fetch_array($data)){
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $no++; ?>. <?php echo $row['film'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Masukkan Komentar</label>
                                        <textarea class="form-control" rows="3" name="komentar" required></textarea>
                                    </div>
                                        <button type="submit" class="btn btn-info">Proses </button>
                                    </div>
                                </form>
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

