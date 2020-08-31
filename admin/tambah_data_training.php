<?php include('templates/session.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include('templates/css.php'); ?>
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
                        <h3 class="">Tambah Data Training</h3>
                        <a href="data_training.php"><button class="btn btn-sm btn-warning">Kembali</button></a>
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
                                <form role="form" action="proses/simpan_training.php" method="post">
                                    <div class="form-group">
                                        <label>Masukkan Komentar</label>
                                        <textarea class="form-control" rows="3" name="komentar" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Film</label>
                                        <select class="form-control" name="id_film" required>
                                            <option>Pilih Film</option>
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
                                        <label>Sentimen</label>
                                        <select class="form-control" name="kategori" required>
                                            <option>Pilih Sentimen</option>
                                            <option value="Positif">1. Positif</option>
                                            <option value="Negatif">2. Negatif</option>
                                        </select>
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

</body>
</html>
