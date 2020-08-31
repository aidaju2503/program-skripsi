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
                        <h3 class="">Edit Film</h3>
                        <a href="detail_film.php?id=<?php echo $_GET['id'] ?>"><button class="btn btn-sm btn-warning">Kembali</button></a>
                        <div style="height: 10px"></div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Edit
                            </div>
                            <div class="panel-body">
                                <form role="form" action="proses/update_film.php" method="post" enctype="multipart/form-data">
                                <?php
                                    $id   = $_GET['id'];
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_film WHERE id = '$id'");
                                    while($row = mysqli_fetch_array($data)){
                                    // $genre   = $row['genre']; 
                                    // $tahun   = $row['tahun']; 
                                    // $negara  = $row['negara']; 
                                    ?>
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <div class="form-group">
                                        <label>Nama Film</label>
                                        <input type="text" name="film" class="form-control" value="<?php echo $row['film'] ?>" >
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Genre</label>
                                        <select class="form-control" name="genre">
                                            <option>Pilih genre</option>
                                            
                                            <option value="Action" <?php if($genre == 'Action'){ echo "selected"; } ?>>1. Action</option>
                                            <option value="Biography" <?php if($genre == 'Biography'){ echo "selected"; } ?>>2. Biography</option>
                                            <option value="Crime" <?php if($genre == 'Crime'){ echo "selected"; } ?>>3. Crime</option>
                                            <option value="Family" <?php if($genre == 'Family'){ echo "selected"; } ?>>4. Family</option>
                                            <option value="Horror" <?php if($genre == 'Horror'){ echo "selected"; } ?>>5. Horror</option>
                                            <option value="Romance" <?php if($genre == 'Romance'){ echo "selected"; } ?>>5. Romance</option>
                                            <option value="Sports" <?php if($genre == 'Sports'){ echo "selected"; } ?>>6. Sports</option>
                                            <option value="War" <?php if($genre == 'War'){ echo "selected"; } ?>>7. War</option>
                                            <option value="Adventure" <?php if($genre == 'Adventure'){ echo "selected"; } ?>>8. Adventure</option>
                                            <option value="Comedy" <?php if($genre == 'Comedy'){ echo "selected"; } ?>>9. Comedy</option>
                                            <option value="Documentary" <?php if($genre == 'Documentary'){ echo "selected"; } ?>>10. Documentary</option>
                                            <option value="Fantasy" <?php if($genre == 'Fantasy'){ echo "selected"; } ?>>11. Fantasy</option>
                                            <option value="Thriller" <?php if($genre == 'Thriller'){ echo "selected"; } ?>>12. Thriller</option>
                                            <option value="Animation" <?php if($genre == 'Animation'){ echo "selected"; } ?>>13. Animation</option>
                                            <option value="Costume" <?php if($genre == 'Costume'){ echo "selected"; } ?>>14. Costume</option>
                                            <option value="Drama" <?php if($genre == 'Drama'){ echo "selected"; } ?>>15. Drama</option>
                                            <option value="History" <?php if($genre == 'History'){ echo "selected"; } ?>>16. History</option>
                                            <option value="Musical" <?php if($genre == 'Musical'){ echo "selected"; } ?> >17. Musical</option>
                                            <option value="Psychological" <?php if($genre == 'Psychological'){ echo "selected"; } ?>>18. Psychological</option>
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
                                                <option value="<?php echo $i ?>" <?php if($tahun == $i){ echo "selected"; } ?> ><?php echo $i ?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label>Negara</label>
                                        <select class="form-control" name="negara">
                                            <option>Pilih Negara</option>
                                            <option value="Indonesia" <?php if($negara == 'Indonesia'){ echo "selected"; } ?> >1. Indonesia</option>
                                            <option value="France" <?php if($negara == 'France'){ echo "selected"; } ?> >2. France</option>
                                            <option value="Taiwan" <?php if($negara == 'Taiwan'){ echo "selected"; } ?> >3. Taiwan</option>
                                            <option value="United States" <?php if($negara == 'United States'){ echo "selected"; } ?> >4. United States</option>
                                            <option value="China" <?php if($negara == 'China'){ echo "selected"; } ?> >5. China</option>
                                            <option value="HongCong" <?php if($negara == 'HongCong'){ echo "selected"; } ?> >5. HongCong</option>
                                            <option value="Japan" <?php if($negara == 'Japan'){ echo "selected"; } ?> >6. Japan</option>
                                            <option value="Thailand" <?php if($negara == 'Indonesia'){ echo "selected"; } ?> >7. Thailand</option>
                                            <option value="Euro" <?php if($negara == 'Euro'){ echo "selected"; } ?> >8. Euro</option>
                                            <option value="India" <?php if($negara == 'India'){ echo "selected"; } ?> >9. India</option>
                                            <option value="Korea" <?php if($negara == 'Korea'){ echo "selected"; } ?> >10. Korea</option>
                                            <option value="United Kingdom" <?php if($negara == 'United Kingdom'){ echo "selected"; } ?> >11. United Kingdom</option>

                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <label>Sinopsis Film</label>
                                        <textarea name="sinopsis" id="ckeditor" class="form-control" rows="10"><?php echo $row['sinopsis'] ?></textarea>
                                    </div>
                                    
                                <?php
                                    }
                                ?>
                                    <button type="submit" class="btn btn-info">Edit </button>
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
    <script src="../assets/js/ckeditor/ckeditor.js"></script>
    <script src="../assets/js/forms/editors.js"></script>

</body> 
</html>


<script src="../assets/js/sweetalert.min.js"></script>
<script src="../assets/js/sweet.js"></script>
    
    <?php 
      if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "update_gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Update Data Gagal',
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