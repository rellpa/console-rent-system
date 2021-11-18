<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?= $title; ?></title>
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
	<!--CSS-->
	<link href="/css/styles.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
	<!--AOS_CSS-->
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="sb-nav-fixed">
	<!--Nav-->
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

		<a class="navbar-brand" href="/admin">
			<img src="/assets/img/nav_brand_logo.svg" width="30" height="24">
			~ <?= $namaresto; ?>
		</a>
		<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>

		<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
							<?php if(logged_in()) : ?>
							<p class="dropdown-item cursor-default">Logged in as : <b><i><?= user()->username?></i></b></p>
							<?php endif;?>
							<?php if(logged_in() && in_groups('user')) : ?>
							<a class="dropdown-item" href="#">Order List</a>
							<?php endif;?>
							<?php if(in_groups('admin')) :?>
							<a class="dropdown-item" href="/admin">Admin Panel</a>
							<?php endif;?>
							<div class="dropdown-divider"></div>
							<?php if(logged_in()) :?>
                    		<a class="dropdown-item log-out" href="/logout" onclick="return confirm('Anda Serius Ingin Log-out ?\n\n Pencet Ok Jika Iya....');">Logout</a>
                    		<?php else :?>
                    		<a class="dropdown-item log-in" href="/login">Login</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item log-in" href="/register">Register</a>
                    		<?php endif;?>
						</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">

						<div class="sb-sidenav-menu-heading">Core</div>
						<a class="nav-link" href="/admin">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<a class="nav-link" href="/">
							<div class="sb-nav-link-icon"><i class="fas fa-globe-americas"></i></div>
							Visit the Website
						</a>
						<div class="sb-sidenav-menu-heading">Data</div>
						<a class="nav-link collapsed cursor-pointer" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
							Tables
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="/admin/userlist">Users Data</a>
								<a class="nav-link" href="/admin/consoleTable">Console Data</a>
							</nav>
						</div>

					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as : <b><i><?= user()->username?></i></b></p><b><?= $namaresto; ?></b></div>
				</div>
			</nav>
			<!--Nav_end-->
		</div>

		<!--Content-->
		<?= $this->renderSection('content'); ?>

	</div>
</body>

<!--Footer-->
<div style="padding-top: 5rem;">
</div>
<footer class="py-4 bg-light mt-auto">
	<div class="container-fluid">
		<div class="d-flex justify-content-center small">
			<div class="text-muted">Copyright &copy; <?= $namaresto; ?> UMN 2021</div>
		</div>
	</div>
</footer>

<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="/js/datatables.js"></script>
<!--AOS_Scripts-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	AOS.init();
</script>
</html>