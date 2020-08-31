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
                $hal = 'film';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="">Tambah Film</h3>
                        <a href="film.php?halaman=1"><button class="btn btn-sm btn-warning">Kembali</button></a>
                        <div style="height: 10px"></div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Tambah
                            </div>
                            <div class="panel-body">
                                <form role="form" action="proses/simpan_film.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Nama Film</label>
                                        <input type="text" name="film" class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Genre</label>
                                        <select class="form-control" name="genre">
                                            <option>Pilih Genre</option>
                                            <option value="Action">1. Action</option>
                                            <option value="Biography">2. Biography</option>
                                            <option value="Crime">3. Crime</option>
                                            <option value="Family">4. Family</option>
                                            <option value="Horror">5. Horror</option>
                                            <option value="Romance">5. Romance</option>
                                            <option value="Sports">6. Sports</option>
                                            <option value="War">7. War</option>
                                            <option value="Adventure">8. Adventure</option>
                                            <option value="Comedy">9. Comedy</option>
                                            <option value="Documentary">10. Documentary</option>
                                            <option value="Fantasy">11. Fantasy</option>
                                            <option value="Thriller">12. Thriller</option>
                                            <option value="Animation">13. Animation</option>
                                            <option value="Costume">14. Costume</option>
                                            <option value="Drama">15. Drama</option>
                                            <option value="History">16. History</option>
                                            <option value="Musical">17. Musical</option>
                                            <option value="Psychological">18. Psychological</option>

                                        </select>
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label>Tahun</label>
                                        <select class="form-control" name="tahun">
                                            <option>Pilih Tahun</option>
                                            <?php
                                                for($i=2010; $i<=2020; $i++){
                                                $jumlah = strlen($i);
                                                ?>
                                                <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label>Negara</label>
                                        <select class="form-control" name="Negara">
                                            <option>Pilih Negara</option>
                                            <option value="Indonesia">1. Indonesia</option>
                                            <option value="France">2. France</option>
                                            <option value="Taiwan">3. Taiwan</option>
                                            <option value="United States">4. United States</option>
                                            <option value="China">5. China</option>
                                            <option value="HongCong">5. HongCong</option>
                                            <option value="Japan">6. Japan</option>
                                            <option value="Thailand">7. Thailand</option>
                                            <option value="Euro">8. Euro</option>
                                            <option value="India">9. India</option>
                                            <option value="Korea">10. Korea</option>
                                            <option value="United Kingdom">11. United Kingdom</option>

                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <label>Sinopsis Film</label>
                                        <textarea name="sinopsis" class="form-control" id="ckeditor"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Cover Film</label>
                                        <div class="">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-sm btn-file btn-primary"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ubah</span><input type="file" name="foto"></span>
                                                    <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Gambar Thumbnail Film</label>
                                        <div class="">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-sm btn-file btn-primary"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ubah</span><input type="file" name="foto2"></span>
                                                    <a href="#" class="btn btn-sm btn-danger fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info">Tambah </button>
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
<script src="../assets/js/ckeditor/ckeditor.js"></script>
<script src="../assets/js/forms/editors.js"></script>

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