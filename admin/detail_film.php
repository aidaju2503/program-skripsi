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
                $hal = 'film';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <a href="film.php?halaman=1"><button class="btn btn-sm btn-warning">Kembali</button></a>
                        <div style="height: 10px"></div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            $id   = $_GET['id'];
                            $data = mysqli_query($koneksi,"SELECT * FROM tb_film where id = $id ");
                            while($row = mysqli_fetch_array($data)){ 
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="../assets/img/film/<?php echo $row['foto_thumbnail'] ?>" class="img-responsive">
                                    <a href="edit_thumbnail.php?id=<?php echo $row['id'] ?>" title="Ganti"><i class="fa fa-pencil"></i></a>
                                    <div style="height: 5px"></div>

                                    <span><h1><?php echo $row['film'] ?></h1></span>
                                    <div style="height: 10px"></div>

                                    <div style="border: 1px solid #b2cfcf; padding-left: 7px; padding-right: 7px">
                                        <a href="edit_film.php?id=<?php echo $row['id'] ?>" title="Edit" style="float: right;"><i class="fa fa-pencil"></i></a>
                                        <!-- <h3><b><?php echo $row['film'] ?> - </b><?php echo $row['tahun'] ?></h3>
                                        <h4><span class="label label-primary"><?php echo $row['genre'] ?></span></h4>
                                        <h6><?php echo $row['negara'] ?></h6>
                                        <div style="height: 10px"></div> -->

                                         <div style="height: 5px"></div>
                                        <b>Sinopsis</b>
                                        <p style="text-align: justify;"><?php echo $row['sinopsis'] ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <center><img src="../assets/img/film/<?php echo $row['foto'] ?>" class="img-responsive" ><a href="edit_cover.php?id=<?php echo $row['id'] ?>" title="Ganti"><i class="fa fa-pencil"></i></a></center>
                                </div>
                            </div>

                            <?php 
                            } 
                        ?>
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
                    title: 'Edit Data Berhasil',
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
          }else if($_GET['pesan'] == "pra_proses_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Pra Proses Berhasil',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "pra_proses_gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Pra Proses Gagal',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "update_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Update Data Berhasil',
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

