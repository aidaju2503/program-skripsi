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
                        <h3 class="">Data Film</h3>
                        <a href="tambah_film.php"><button class="btn btn-sm btn-primary">Tambah</button></a>
                        <a href="" style="float: right;"><button class="btn btn-sm btn-danger">Hapus Semua</button></a>
                        <div style="height: 10px"></div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                                $halaman = 18; /* page halaman*/
                                $page    =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                $mulai   =($page>1) ? ($page * $halaman) - $halaman : 0;
                                
                                $result  = mysqli_query($koneksi,"SELECT * FROM tb_film order by id asc");
                                $total   = mysqli_num_rows($result);
                                $pages   = ceil($total/$halaman);

                                $data = mysqli_query($koneksi,"SELECT * FROM tb_film order by id asc LIMIT $mulai, $halaman");
                                while($row = mysqli_fetch_array($data)){ 
                                ?>

                                <div class="col-md-2">
                                    <center>
                                    <a href="detail_film.php?id=<?php echo $row['id']?>" style="text-decoration: none; color: #3d3d3b">
                                      <img src="../assets/img/film/<?php echo $row['foto'] ?>" style="height: 220px; width: 150px">
                                      <h5><b><?php echo $row['film'] ?></b></h5>
                                      <!-- <div>
                                        <h6 style="float: left;"><?php echo $row['tahun'] ?></h6>
                                        <h6 style="float: right;"><span class="label label-primary"><?php echo $row['genre'] ?></span></h6>
                                      </div> -->
                                      <div style="height: 10px"></div>
                                    </a>
                                    </center>
                                </div>
                                <?php 
                                } 
                            ?>
                        </div>

                        <div style="height: 10px"></div>
                        <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                          <b>Halaman &nbsp;</b>
                          <?php
                              $halamannya = $_GET['halaman'];

                              for ($i=1; $i<=$pages ; $i++){
                              $aktif = $i;
                          ?>
                            <a href="film.php?halaman=<?php echo $i; ?>" style="text-decoration:none">
                              <button type="button" class="btn btn-sm <?php if($halamannya == $aktif){ echo"btn-primary"; }else{ echo"btn-default"; } ?>"><?php echo $i; ?></button>
                            </a>&nbsp;
                          <?php
                                }
                          ?>
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

