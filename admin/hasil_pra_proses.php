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
                $hal = 'pre_proccessing';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="">Pra Proses</h3>
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
                                        <th>Id Data Training</th>
                                        <th>Kata</th>
                                        <th>Jumlah Kata</th>
                                        <th>TF IDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_tf_idf order by id asc");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['id_data_training'] ?></td>
                                        <td><?php echo $row['kata'] ?></td>
                                        <td><?php echo $row['jumlah'] ?></td>
                                        <td><?php echo $row['tf_idf'] ?></td>
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

