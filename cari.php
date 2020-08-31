<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('templates/css.php'); ?>
</head>
	
<body>
<!-- header -->
	<div class="header">
		<?php include('templates/header.php'); ?>
	</div>
<!-- //header -->

<!-- nav -->
	<div class="movies_nav">
		<?php 
			$hal = 'cari';
			include('templates/menu.php'); 
		?>
	</div>
<!-- //nav -->


	<div class="general-agileits-w3l">
		<div class="w3l-medile-movies-grids">

				<!-- /movie-browse-agile -->
				
				      <div class="movie-browse-agile">
					     <!--/browse-agile-w3ls -->
						<div class="browse-agile-w3ls general-w3ls">
								<div class="tittle-head">
									<h4 class="latest-text">Cari - <small><?php echo $_POST['cari'] ?></small></h4>
									<div class="container">
										<div class="agileits-single-top">
											</ol>
										</div>
									</div>
								</div>
								     <div class="container">
							<div class="browse-inner">
								<?php
								include('koneksi.php');
								$cari   = $_POST['cari'];
                                $data = mysqli_query($koneksi,"SELECT * FROM tb_film WHERE film LIKE '%$cari%' order by id asc");

	                            // $data = mysqli_query($koneksi,"SELECT * From tb_film order by id asc");
	                            while($row = mysqli_fetch_array($data)){ 
	                            	$id = $row['id'];

	                            	$positif = mysqli_query($koneksi,"SELECT tb_film.`film`, tb_data_uji.*, tb_data_training.`kategori`, tb_data_uji.`cosine_similarity` FROM tb_data_uji
                                      JOIN tb_film ON tb_data_uji.`id_film` = tb_film.`id`
                                      JOIN tb_data_training ON tb_data_uji.`id_data_training` = tb_data_training.`id` 
                                      WHERE tb_film.`id` = $id  AND tb_data_training.`kategori` = 'Positif'
                                      ORDER BY tb_data_uji.`id` DESC");
									$jumlah_positif = mysqli_num_rows($positif);

									$negatif = mysqli_query($koneksi,"SELECT tb_film.`film`, tb_data_uji.*, tb_data_training.`kategori`, tb_data_uji.`cosine_similarity` FROM tb_data_uji
							                                      JOIN tb_film ON tb_data_uji.`id_film` = tb_film.`id`
							                                      JOIN tb_data_training ON tb_data_uji.`id_data_training` = tb_data_training.`id` 
							                                      WHERE tb_film.`id` = $id  AND tb_data_training.`kategori` = 'Negatif'
							                                      ORDER BY tb_data_uji.`id` DESC");
									$jumlah_negatif = mysqli_num_rows($negatif);
	                            ?>

							    <div class="col-md-2 w3l-movie-gride-agile">
									<a href="detail_film.php?id=<?php echo $row['id'] ?>" class="hvr-shutter-out-horizontal"><img src="assets/img/film/<?php echo $row['foto'] ?>" title="album-name" alt=" " style="height: 250px; width: 170px">
									     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1">
										<div class="w3l-movie-text">
											<h4><a href="detail_film.php?id=<?php echo $row['id'] ?>" style="text-decoration: none; color: #3d3d3b"><?php echo $row['film'] ?></a></h4>	

											<ul class="w3l-ratings">
											     <li>
											     	<?php 
													if($jumlah_positif > $jumlah_negatif and $jumlah_negatif < $jumlah_positif){
														?> <p>Sentimen <i class="fa fa-thumbs-up "></i></p> <?php
													}else if($jumlah_positif < $jumlah_negatif and $jumlah_negatif > $jumlah_positif){
														?> <p>Sentimen <i class="fa fa-thumbs-down"></i></p> <?php
													}else{
														?> <p>No Sentimen </p><?php
													}
													?>
											     </li>
											</ul>						
										</div>
									</div>
								</div>
								<?php
								}
								?>

							
								<div class="clearfix"> </div>
								</div>
								</div>
						</div>
						
						

					</div>
				    <!-- //movie-browse-agile -->
				   <!--body wrapper start-->
				<!--body wrapper start-->
					
				</div>
			</div>
						<!--body wrapper end-->
					</div>	
			</div>	
		</div>
	<!-- //w3l-medile-movies-grids -->
	</div>
	

<!-- footer -->
	<div class="footer">
		<?php include('templates/footer.php'); ?>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->

<?php include('templates/js.php'); ?>

</body>
</html>