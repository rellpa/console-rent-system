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
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item active">
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
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <section id="about" style="padding:10rem;" class="bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2>About us</h2>
                                <p class="lead">
                                    FADEW console merupakan layanan penyewaan konsol yang sudah
                                    didirikan dan berjalan sejak tahun 2001. Kami menyediakan
                                    berbagai macam pilihan konsol yang dapat anda sewa, dan
                                    tentunya dengan harga sewa yang sangat bersahabat dengan 
                                    kantong mahasiswa. Layanan kami juga tersedia secara offline,
                                    tepatnya kalian dapat mengunjungi kami pada alamat berikut ini :
                                    <br>
                                    <br>
                                    <i>Jl. Scientia Boulevard, Gading Serpong, Tangerang, Banten 15811</i>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="contact" style="padding:10rem;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <h2>Contact us</h2>
                                <p class="lead">
                                    Untuk pertanyaan lebih lanjut anda dapat menghubungi :
                                </p>
                                <ul>
                                    <li>
                                        Phone
                                        (099) 9999 0808 ext.9999
                                    </li>
                                    <li>
                                        Email
                                        cs@fadewconsole.com
                                    </li>
                                    <li>
                                        Whatsapp(Message Only)
                                        0899-9999-9999
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
<?= $this->endSection('content'); ?>