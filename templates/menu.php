<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li class="<?php if($hal == 'beranda'){ echo 'active'; } ?>"><a href="index.php">Home</a></li>
							
							<!-- <li class="dropdown <?php if($hal == 'country'){ echo 'active'; } ?>">
								<a href="assets_user/#" class="dropdown-toggle" data-toggle="dropdown">Country <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="country.php?country=Indonesia&halaman=1">Indonesia</a></li>
												<li><a href="country.php?country=France&halaman=1">France</a></li>
												<li><a href="country.php?country=Taiwan&halaman=1">Taiwan</a></li>
												<li><a href="country.php?country=United States&halaman=1">United States</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="country.php?country=China&halaman=1">China</a></li>
												<li><a href="country.php?country=HongCong&halaman=1">HongCong</a></li>
												<li><a href="country.php?country=Japan&halaman=1">Japan</a></li>
												<li><a href="country.php?country=Thailand&halaman=1">Thailand</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="country.php?country=Euro&halaman=1">Euro</a></li>
												<li><a href="country.php?country=India&halaman=1">India</a></li>
												<li><a href="country.php?country=Korea&halaman=1">Korea</a></li>
												<li><a href="country.php?country=United Kingdom&halaman=1">United Kingdom</a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</li>
								</ul>
							</li> -->
							<li class="<?php if($hal == 'list'){ echo 'active'; } ?>"><a href="list.php">list</a></li>

							<li><a href="login.php" target="_blank">Master</a></li>
						</ul>
					</nav>
				</div>
			</nav>	
		</div>