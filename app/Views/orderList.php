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
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Service</a>
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
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg mt-5">
                            <div class="card">
                                <div class="card-header text-center">
                                    <div>
                                        <i class="fa fa-shopping-basket"></i>
                                        &nbsp;Your Orders
                                    </div>
                                </div>

                                <div class="card-body">
                    
                                    <?php if (empty($order)) : ?>
                                        <h4 class="text-center">You don't have any orders yet!</h4>

                                    <?php else : ?>

                                    <div class="table-responsive">
                                        <table class="table table-striped" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>OrderID</th>
                                                    <th>Nama Konsol</th>
                                                    <th>Lama Sewa</th>
                                                    <th>Total Harga</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($order as $row) : ?>
                                                    <?php $date = strtotime($row['order_date']); ?>
                                                    <tr>
                                                        <td class="align-middle"><?= $i++ ?></td>
                                                        <td class="align-middle"><?= $row['OrderID'] ?></td>
                                                        <td class="align-middle"><?= $row['MenuName']; ?></td>
                                                        <td class="align-middle"><?= $row['total_order']; ?> hari</td>
                                                        <td class="align-middle">IDR<?= $row['total_price']; ?></td>
                                                        <?php if (($row['StatusID']) == 1) : ?>
                                                            <td class="align-middle"><u style="color:#FF6D22;"><?= $row['StatusName']; ?></u></td>
                                                        <?php elseif (($row['StatusID']) == 2) : ?>
                                                            <td class="align-middle">
                                                                <u style="color:#DB22FF;"><?= $row['StatusName']; ?></u>
                                                                <br>
                                                                <form action="/order/updateOrderstats/<?= $row['OrderID']; ?>">
                                                                    <input type="checkbox" id="stats" name="stats" value="3" required>
                                                                    <label for="stats"> <i>*check the box if the item is ready to be picked-up</i></label>
                                                                    <br>
                                                                    <input type="submit" value="Submit">
                                                                </form>
                                                            </td>
                                                        <?php elseif (($row['StatusID']) == 3) : ?>
                                                            <td class="align-middle"><u style="color:#22B4FF;"><?= $row['StatusName']; ?></u></td>
                                                        <?php elseif (($row['StatusID']) == 4) : ?>
                                                            <td class="align-middle"> <u style="color:#1DF013;"><?= $row['StatusName']; ?></u></td>

                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                                    <tr class="text-center table-primary">
                                                        <td class="p-5" colspan="6">IDR<?= $sums[0]['total_price'] ?></td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php endif; ?>

                                </div>
                            </div>
                            <br>
                            <a href="/" class="text-secondary ml-4">
                                <i class="fas fa-arrow-left mr-1"></i>
                                <i>go back</i>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
<?= $this->endSection('content'); ?>