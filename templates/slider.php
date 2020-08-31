<div id="slidey" style="display:none;">
		<ul>
			<?php
			include('koneksi.php');
	        $data = mysqli_query($koneksi,"SELECT * FROM tb_film order by id desc limit 5");
	        while($row = mysqli_fetch_array($data)){ 
	        ?>
			<li><img src="assets/img/film/<?php echo $row['foto_thumbnail'] ?>" alt=" ">
				<p class='title'><?php echo $row['film'] ?></p>
				<p class='description'> <?php echo substr($row['sinopsis'], 0, 120) ?>...</p></li>
			<?php
			}
			?>
		</ul>   	
    </div>
    <script src="assets_user/js/jquery.slidey.js"></script>
    <script src="assets_user/js/jquery.dotdotdot.min.js"></script>
    <script type="text/javascript">
		$("#slidey").slidey({
			interval: 8000,
			listCount: 5,
			autoplay: false,
			showList: true
		});
		$(".slidey-list-description").dotdotdot();
	</script>