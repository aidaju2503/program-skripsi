<?php include('templates/session.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('templates/css.php'); ?>

    <!-- PAGE LEVEL STYLES -->
    <link href="../assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <?php include('templates/navbar.php'); ?>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <?php
                $hal = 'data_training';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="">Import Data Training</h3>
                        <a href="data_training.php"><button class="btn btn-sm btn-warning">Kembali</button></a>
                        <div style="height: 10px"></div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Import
                            </div>
                            <div class="panel-body">
                                <form role="form" action="proses/proses_import.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Input File .xls</label>
                                        <!-- <input type="file" name="data_training" class="form-control"> -->
                                        <div class="">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <span class="btn btn-file btn-default">
                                                    <span class="fileupload-new">Pilih file</span>
                                                    <span class="fileupload-exists">Ubah</span>
                                                    <input type="file" name="data_training">
                                                </span>
                                                <span class="fileupload-preview"></span>
                                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info">Import </button>
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

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="../assets/js/bootstrap-fileupload.js"></script>

</body>
</html>


<script src="../assets/js/sweetalert.min.js"></script>
<script src="../assets/js/sweet.js"></script>
    
    <?php 
      if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Tambah Data Gagal',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "file_besar"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Ukuran Gambar Terlalu Besar',
                    text: 'Maksimal 10 mb',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "ekstensi"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Format Gambar Tidak Didukung',
                    text: 'Ekstensi yang diperbolehkan .jpg .jpeg .png',
                  })
              </script>
          <?php
          }
      }
    ?>