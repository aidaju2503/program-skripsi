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
                        <h3 class="">Hasil Sentimen Analisis</h3>
                        <a href="klasifikasi.php"><button class="btn btn-sm btn-primary">Sentimen Analisis Lagi</button></a>
                        <a href="proses/hapus_semua_klasifikasi.php" style="float: right;"><button class="btn btn-sm btn-danger">Hapus Semua</button></a>
                        <div style="height: 10px"></div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Data Uji</th>
                                        <th>Film</th>
                                        <th>Sentimen</th>
                                        <th>Nilai Cosine Similarity</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT tb_film.`film`, tb_data_uji.*, tb_data_training.`kategori`, tb_data_uji.`cosine_similarity` FROM tb_data_uji
                                      JOIN tb_film ON tb_data_uji.`id_film` = tb_film.`id`
                                      JOIN tb_data_training ON tb_data_uji.`id_data_training` = tb_data_training.`id` ORDER BY tb_data_uji.`id` DESC");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $no++;
                                    $id       = $row['id'];
                                    $kategori = $row['kategori'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['data_uji'] ?></td>
                                        <td><?php echo $row['film'] ?></td>
                                        <td>
                                        <?php 
                                            if($kategori == 'Positif'){
                                                ?><span class="label label-success">Positif</span><?php
                                            }else{
                                                ?><span class="label label-danger">Negatif</span><?php
                                            }
                                        ?>    
                                        <td style="text-align: right;"><?php echo $row['cosine_similarity'] ?></td>
                                        <td>
                                            <a href="edit_data_uji.php?id=<?php echo $id ?>" title="Edit"><span class="label label-info"><i class="fa fa-pencil"></i></span></a>
                                            <a href="proses/hapus_uji.php?id=<?php echo $id ?>" class="hapus" title="Hapus"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    } 
                                ?>
                                </tbody>
                            </table>
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
                    title: 'Klasifiksi Berhasil',
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

