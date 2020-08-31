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
                $hal = 'beranda';
                include('templates/menu.php'); 
            ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                        <h1 class="page-subhead-line">Selamat Datang <b><?php echo $_SESSION['nama_lengkap'] ?></b> </h1>

                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-back noti-box">
                            <div class="text-box">
                                <p class="main-text">Aplikasi Sentimen Analisis Komentar Trailer Film</p>
                                <p>Silahkan gunakan menu-menu disamping untuk mulai menggunakan aplikasi </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <i class="fa fa-photo fa-5x"></i>
                                <?php
                                $data   = mysqli_query($koneksi,"SELECT * FROM tb_film"); 
                                $jumlah = mysqli_num_rows($data);
                                ?>
                                <h5><?php echo $jumlah ?> Film</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <i class="fa fa-database fa-5x"></i>
                                <?php
                                $data   = mysqli_query($koneksi,"SELECT * FROM tb_data_training"); 
                                $jumlah = mysqli_num_rows($data);
                                ?>
                                <h5><?php echo $jumlah ?> Data Training</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <i class="fa fa-list-alt fa-5x"></i>
                                <?php
                                $data   = mysqli_query($koneksi,"SELECT * FROM tb_data_uji"); 
                                $jumlah = mysqli_num_rows($data);
                                ?>
                                <h5><?php echo $jumlah ?> Hasil Sentimen Analisis</h5>
                            </a>
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
