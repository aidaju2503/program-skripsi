<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="../assets/img/user.jpg" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $_SESSION['nama_lengkap']; ?>
                            <br />
                                <small><?php echo $_SESSION['username']; ?></small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="<?php if($hal == 'beranda'){ echo 'active-menu'; } ?>" href="beranda.php"><i class="fa fa-home "></i>Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="film.php?halaman=1" class="<?php if($hal == 'film'){ echo 'active-menu'; } ?>"><i class="fa fa-photo "></i>Film</a>
                    </li>

                    <li>
                        <a href="data_training.php" class="<?php if($hal == 'data_training'){ echo 'active-menu'; } ?>"><i class="fa fa-database "></i>Data Training </a>
                    </li>

                    <li>
                        <a href="hasil_pra_proses.php" class="<?php if($hal == 'pre_proccessing'){ echo 'active-menu'; } ?>"><i class="fa fa-cogs "></i>Pre Processing</a>
                    </li>

                    <li>
                        <a href="#" class="<?php if($hal == 'klasifikasi'){ echo 'active-menu'; } ?>"><i class="fa fa-list-alt "></i>Sentimen Analisis <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="klasifikasi.php"><i class="fa fa-dot-circle-o "></i>Sentimen Analisis Komentar </a>
                            </li>
                             <li>
                                <a href="hasil_klasifikasi.php"><i class="fa fa-dot-circle-o "></i>Hasil Sentimen Analisis</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="bantuan.php" class="<?php if($hal == 'bantuan'){ echo 'active-menu'; } ?>"><i class="fa fa-question-circle "></i>Bantuan</a>
                    </li>
                      
                     
                </ul>

            </div>
