<?= $this->extend('/layouts/base_template'); ?>

<?= $this->section('content'); ?>
<body class="sb-nav-fixed">
    <!--Nav-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand" href="#">
            <img src="/assets/img/nav_brand_logo.svg" width="30" height="24">
            ~ <?= $namaresto; ?>
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
							<?php if(logged_in()) : ?>
							<p class="dropdown-item cursor-default">Logged in as : <b><i><?= user()->username?></i></b></p>
							<?php endif;?>
							<?php if(logged_in() && in_groups('customer')) : ?>
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
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Hello <b class="text-lowercase"><?= user()->firstname?></b>!</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body shadow">
                            Di sini, sebagai <i>admin</i> kamu bisa ngelihat semua data dari database
                            mulai dari data customer dan admin yang terdaftar hingga seluruh data untuk tabel konsol yang disewakan.
                            Selain itu kamu juga bisa <u class="text-success">nambahin</u> data,
                            <u class="text-info">ngedit</u> dan juga bisa <u class="text-danger">menghapus</u>
                            data dari tabel sewa konsol. 
                            <br><br><i class="text-primary">Selamat bekerjaa...</i>
							<i class="text-primary">&#9829;<i class="fa fa-heart" aria-hidden="true"></i></i>
                            <br>  
                            <br>  
                            <br>  
                            <br>  
                            <i class="fa fa-fire text-danger mt-4"></i> &nbsp;
                            <i class="fa fa-fire text-warning"></i> &nbsp;
                            <i class="fa fa-fire text-success"></i> &nbsp;
                            <i class="fa fa-fire text-primary"></i> &nbsp;
                            <i class="fa fa-fire text-info"></i> &nbsp;
                            <i class="fa fa-fire text-secondary"></i> &nbsp;
                            <i class="fa fa-fire text-link"></i> &nbsp;
                            <i class="fa fa-fire text-danger"></i> &nbsp;
                            <i class="fa fa-fire text-warning"></i> &nbsp;
                            <i class="fa fa-fire text-success"></i> &nbsp;
                            <i class="fa fa-fire text-primary"></i> &nbsp;
                            <i class="fa fa-fire text-info"></i> &nbsp;
                            <i class="fa fa-fire text-secondary"></i> &nbsp;
                            <i class="fa fa-fire text-link"></i> &nbsp;
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
</body>
<?= $this->endSection('content'); ?>