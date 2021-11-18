<?= $this->extend('layouts/base_template'); ?>

<?= $this->section('content'); ?>

<body style="padding-top: 56px;">
	<!--Nav-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

		<div class="container">

			<a class="navbar-brand" href="/">
				<img src="/assets/img/nav_brand_logo.svg" width="30" height="24">
				~ <?= $namaresto; ?>
			</a>
			<button class="btn btn-sm navbar-toggler-bar" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<hr class="divider-white">
					<li class="nav-item active">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/services">Service</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
							<?php if (logged_in()) : ?>
								<p class="dropdown-item cursor-default">Logged in as : <b><i><?= user()->username ?></i></b></p>
							<?php endif; ?>
							<?php if (logged_in() && in_groups('user')) : ?>
								<a class="dropdown-item" href="<?= base_url('/order/index/' . user()->id) ?>">Order List</a>
							<?php endif; ?>
							<?php if (in_groups('admin')) : ?>
								<a class="dropdown-item" href="/admin">Admin Panel</a>
							<?php endif; ?>
							<div class="dropdown-divider"></div>
							<?php if (logged_in()) : ?>
								<a class="dropdown-item log-out" href="/logout" onclick="return confirm('Anda Serius Ingin Log-out ?\n\n Pencet Ok Jika Iya....');">Logout</a>
							<?php else : ?>
								<a class="dropdown-item log-in" href="/login">Login</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item log-in" href="/register">Register</a>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</nav>
	<!--Nav_end-->
	<!--Page-->
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h2 class="mt-5 mb-4">&nbsp;Kategori : </h2>
				<div class="list-group mb-4">
					<a href="/<?= $category['CategoryID']; ?>" class="list-group-item">>> <?= $category['CategoryName']; ?></a>
				</div>
				<a href="/" class="text-secondary ml-4">
					<i class="fas fa-arrow-left mr-1"></i>
					<i>go back</i>
				</a>
				<div class="card shadow mt-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Welcome!!!</h6>
					</div>
					<div class="card-body">
						<p>
							Kami menyediakan berbagai macam pilihan konsol yang dapat kalian sewa,
							mulai dari <i>Playstation</i>, <i>XBOX</i>
							hingga <i>SEGA</i> pun tersedia di sini.
							<i style="color:#FF1E7D;">&#9829;<i class="fa fa-heart" aria-hidden="true"></i></i>
						</p>
						<P class="text-muted">
							<i> with &#9829; Kelompok 2</i>
						</P>
						<p class="blockquote-footer"><i>Enjoyy dan selamat bermainnn!!</i></p>
					</div>
				</div>
			</div>

			<div class="col-lg-9">
				<?php if (session()->getFlashdata('berhasilOrder')) : ?>
					<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
						<strong>Yayyy!!</strong> Order berhasil ditambahkan!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>

				<div id="carouselStarMenu" class="carousel slide shadow my-5" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselStarMenu" data-slide-to="0" class="active"></li>
						<li data-target="#carouselStarMenu" data-slide-to="1"></li>
						<li data-target="#carouselStarMenu" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner center bg-light" role="listbox">
						
							<div class="carousel-item active">
								<img class="d-block" src="/assets/img/banner/banner_konsol1.png" alt="First slide">
							</div>

						<?php for ($i = 2; $i <= 3; $i++) : ?>
							<div class="carousel-item">
								<img class="d-block" src="/assets/img/banner/banner_konsol<?= $i; ?>.png" alt="<?= $i == 2 ? 'Second' : 'Third'; ?> slide">
							</div>
						<?php endfor; ?>

					</div>
					<a class="carousel-control-prev" href="#carouselStarMenu" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselStarMenu" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

				<!--menu_card-->
				<div class="row">
					<?php
					$cID = "menuCarousel";
					$mID = "menuModal";
					$mcID = "menuCarouselModal";
					$omID = "menuOrderModal";
					$aos = [
						"zoom-in-right",
						"fade-left",
						"flip-right",
						"zoom-in-up",
					];
					?>
					<?php foreach ($menu as $row) : ?>
						<div class="col-lg-4 col-md-6 mb-4" data-aos="<?= $aos[$row['CategoryID'] - 1]; ?>" data-aos-duration="1200" data-aos-easing="ease-in-out">
							<div class="card h-100 shadow">
								<div id="<?= $cID . $row['MenuID']; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
									<div class="carousel-inner" role="listbox">
										<?php for ($i = 1; $i <= $row['FilesUploaded']; $i++) : ?>
											<div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
												<a class="cursor-pointer" data-toggle="modal" data-target="#<?= $mID . $row['MenuID']; ?>">
													<img class="card-img-top" src="/assets/img/konsol/<?= $row['Slug'] . '_' . $i ?>.png">
												</a>
											</div>
										<?php endfor; ?>
									</div>
									<a class="carousel-control-prev" href="#<?= $cID . $row['MenuID']; ?>" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#<?= $cID . $row['MenuID']; ?>" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>

								<div class="card-body">
									<h4 class="card-title">
										<a href="" data-toggle="modal" data-target="#<?= $mID . $row['MenuID']; ?>"><?= $row['MenuName']; ?></a>
									</h4>
									<p class="card-text text-muted"><i><?= $category['CategoryName']; ?></i></p>
									<h5>IDR<?= $row['Price']; ?></h5>
									<p class="card-text"><?= $row['Description']; ?></p>
									<button class="btn btn-outline-warning px-4" data-toggle="modal" data-target="#<?= $omID . $row['MenuID']; ?>">Beli</button>
								</div>

								<div class="card-footer">
									<?php for ($i = 1; $i <= $row['Rating']; $i++) : ?>
										<small class="text-muted">&#9733;</small>
									<?php endfor; ?>
									<?php for ($i = 1; $i <= 5 - $row['Rating']; $i++) : ?>
										<small class="text-muted">&#9734;</small>
									<?php endfor; ?>
								</div>
							</div>
						</div>

						<!-- MODALs -->
						<!--MENU_MODAL-->
						<?php $w = 'width="1900px"';
						$h = 'height="700px"'; ?>
						<div class="modal" id="<?= $mID . $row['MenuID']; ?>">
							<div class="modal-dialog modal-dialog-centered modal-xl">
								<div class="modal-content">
									<div class="modal-header bg-light">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<div id="<?= $mcID . $row['MenuID']; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
											<div class="carousel-inner" role="listbox">
												<?php for ($i = 1; $i <= $row['FilesUploaded']; $i++) : ?>
													<div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
														<a>
															<img class="card-img-top" src="/assets/img/konsol/<?= $row['Slug'] . '_' . $i ?>.png" <?= $w . $h; ?>>
														</a>
													</div>
												<?php endfor; ?>
											</div>
											<a class="carousel-control-prev" href="#<?= $mcID . $row['MenuID']; ?>" role="button" data-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</a>
											<a class="carousel-control-next" href="#<?= $mcID . $row['MenuID']; ?>" role="button" data-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--ORDER_MODAL-->
						<div class="modal" id="<?= $omID . $row['MenuID']; ?>">
							<div class="modal-dialog modal-dialog-centered modal-md">
								<div class="modal-content border-primary">
									<div class="modal-header bg-light">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<form action="/order/addOrder" autocomplete="off" method="post">

											<?php if (in_groups('admin')) : ?>
												<h4><i class="text-warning">ATTENTION !!!</i></h4>
												<p>Nama admin : <b><i><?= user()->username ?></i></b><br>anda tidak bisa pesan
													karena anda adalah seorang admin
												<p>
												<?php else : ?>
												<div class="form-group">
													<h4>Menu : <i class="text-warning"><?= $row['MenuName']; ?></i></h4>
													<hr>
													<label for="orderQty">Jumlah</label>
													<input type="hidden" name="menu" value="<?= $row['MenuID']; ?>">
													<input type="hidden" name="price" value="<?= $row['Price']; ?>">
													<?php if (logged_in() && in_groups('user')) : ?>
														<input type="hidden" name="idUser" value="<?= user()->id ?>">
													<?php endif; ?>
													<input type="number" id="orderQty" name="orderQty" class="form-control" min="1" max="50" placeholder="Masukkan Jumlah">
												</div>
											<?php endif; ?>

											<?php if (logged_in() && in_groups('user')) : ?>
												<button type="submit" class="btn btn-outline-primary">Pesan</button>
											<?php elseif (in_groups('admin')) : ?>
												<p>
												<p>
												<?php else : ?>
													<a class="btn btn-primary" href="/login" role="button">Sign-In</a>
												<?php endif; ?>
										</form>
									</div>
									<div class="modal-footer">
										<?php if (in_groups('admin')) : ?>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
										<?php else : ?>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<!--Page_end-->
</body>
<?= $this->endSection('content'); ?>