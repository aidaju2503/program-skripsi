<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('templates/css.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">

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
			$hal = 'beranda';
			include('templates/menu.php'); 
		?>
	</div>
<!-- //nav -->

	<div class="single-page-agile-main">
	<div class="container">
		<?php
		include('koneksi.php');
		$id = $_GET['id'];
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


        $data    = mysqli_query($koneksi,"SELECT * From tb_film where id = $id order by id asc");
        $no = 1;
        while($row = mysqli_fetch_array($data)){ 
        ?>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="">
							<h2><?php echo $row['film'] ?></h2>	
							<!-- <h5><?php echo $row['genre'] ?> - <?php echo $row['tahun'] ?></h5> -->
						</div>
						<div class="video-grid-single-page-agileits">
							<div data-video="dLmKio67pVQ" id="video"> <img src="assets/img/film/<?php echo $row['foto_thumbnail'] ?>" alt="" class="img-responsive" /> </div>
						</div>
					</div>
					<div class="clearfix"> </div>

					<?php 
					if($jumlah_positif > $jumlah_negatif and $jumlah_negatif < $jumlah_positif){
						?> <h3>Comment Rating <i class="fa fa-thumbs-up"></i></h3> <?php
					}else if($jumlah_positif < $jumlah_negatif and $jumlah_negatif > $jumlah_positif){
						?> <h3>Comment Rating <i class="fa fa-thumbs-down"></i></h3> <?php
					}else{
						?> <h3>Comment Rating : No Sentimen </h3><?php
					}
					?>

					<div style="height: 10px"></div>
					<span><?php echo $row['sinopsis'] ?></span>
					<div style="height: 20px"></div>
					<table id="myTable" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Comment</th>
                                    <th>Sentimen</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=0;
                                $data = mysqli_query($koneksi,"SELECT tb_film.`film`, tb_data_uji.*, tb_data_training.`kategori`, tb_data_uji.`cosine_similarity` FROM tb_data_uji
                                      JOIN tb_film ON tb_data_uji.`id_film` = tb_film.`id`
                                      JOIN tb_data_training ON tb_data_uji.`id_data_training` = tb_data_training.`id` where tb_film.`id` = $id  ORDER BY tb_data_uji.`id` DESC");
                                while($row = mysqli_fetch_array($data)){ 
                                $no++;
                                $id       = $row['id'];
                                $kategori = $row['kategori'];
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['data_uji'] ?></td>
                                    <td>
                                    <?php 
                                        if($kategori == 'Positif'){
                                            ?><span class="label label-success">Positive</span><?php
                                        }else{
                                            ?><span class="label label-danger">Negative</span><?php
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
				<div class="col-md-4 single-right">
					<h3>New Movie</h3>
					<div class="single-grid-right">

						<?php
						include('koneksi.php');
				        $data = mysqli_query($koneksi,"SELECT * FROM tb_film order by id desc limit 5");
				        while($row = mysqli_fetch_array($data)){ 
				        ?>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="detail_film.php?id=<?php echo $row['id'] ?>"><img src="assets/img/film/<?php echo $row['foto'] ?>" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="detail_film.php?id=<?php echo $row['id'] ?>" class="title"> <?php echo $row['film'] ?></a>
								<!-- <p class="author"><a href="genre.php?genre=<?php echo $row['genre'] ?>&halaman=1" class="author"><?php echo $row['genre'] ?></a></p> -->
								<p class="views"><?php echo substr($row['sinopsis'], 0, 130) ?>...<a href="detail_film.php?id=<?php echo $row['id'] ?>">Lihat Detail</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php
						}
						?>

					</div>
				</div>
				

				
				<div class="clearfix"> </div>
			</div>
				
		</div>
		<?php
		}
		?>
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