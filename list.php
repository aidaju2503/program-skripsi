<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('templates/css.php'); ?>
	<link href="assets_user/css/medile.css" rel='stylesheet' type='text/css' />
	<link href="assets_user/css/single.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="assets_user/list-css/list.css" type="text/css" media="all" />

	<script type="text/javascript" src="assets_user/js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="assets_user/js/move-top.js"></script>
	<script type="text/javascript" src="assets_user/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

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
			$hal = 'list';
			include('templates/menu.php'); 
		?>
	</div>
<!-- //nav -->
	
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">LIST OF TRAILER FILMS</h4>
			<div class="container">
				
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<table  id="myTable" class="table table-striped">
										<thead>
										  <tr>
											<th style="background-color: #ff8219; color: black">No.</th>
											<th style="background-color: #ff8219; color: black" width="200">Movie Name</th>
											
											<th style="background-color: #ff8219; color: black">Synopsisi</th>
											
											<th style="background-color: #ff8219; color: black" width="100">Sentimen</th>
										  </tr>
										</thead>
										<tbody>
										<?php
										include('koneksi.php');
			                            $data = mysqli_query($koneksi,"SELECT * From tb_film order by id asc");
			                            $no = 1;
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
										  <tr>
											<td><?php echo $no++; ?></td>
											<td class="w3-list-img"><a href="detail_film.php?id=<?php echo $row['id'] ?>"><img src="assets/img/film/<?php echo $row['foto'] ?>" alt="" /> <span> <?php echo $row['film'] ?></span></a></td>
											
											<td class="w3-list-info"><?php echo substr($row['sinopsis'], 0, 200) ?>...<a href="detail_film.php?id=<?php echo $row['id'] ?>">Lihat Detail</a></td>
											
											<td><?php 
												if($jumlah_positif > $jumlah_negatif and $jumlah_negatif < $jumlah_positif){
													?> <p><i class="fa fa-thumbs-up fa-2x"></i></p> <?php
												}else if($jumlah_positif < $jumlah_negatif and $jumlah_negatif > $jumlah_positif){
													?> <p><i class="fa fa-thumbs-down fa-2x"></i></p> <?php
												}else{
													?> <p>No Sentimen </p><?php
												}
												?>
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
				</div>
			</div>
	</div>


<!-- footer -->
	<div class="footer">
		<?php include('templates/footer.php'); ?>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->

<?php include('templates/js.php'); ?>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

</body>
</html>