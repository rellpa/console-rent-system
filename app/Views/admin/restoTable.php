<?= $this->extend('/layouts/admin_template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Hello <b class="text-lowercase"><?= user()->firstname?></b>!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Console Data</li>
            </ol>

            <?php if (session()->getFlashdata('berhasilTambah')) : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Goodd!!</h4>
                    <p>
                        Kalo notifikasi ini muncul, artinya menu yang tadi kamu input sudah berhasil
                        ditambahkan ke <i>database</i> restoran. Silahkan cek pada tabel menu restoran
                        di bawah ini untuk melihat menu yang baru kamu input. Terimakasihh..
                    </p>
                    <hr>
                    <p class="mb-0"><i>Notifikasi ini akan hilang ketika kamu merefresh halaman ini.</i></p>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('berhasilHapus')) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">why mee :'(</h4>
                    <p>
                        Kalo notifikasi ini muncul, artinya menu yang kamu pilih untuk dihapus tadi
                        sudah berhasil dihapus dari <i>database</i> restoran. Terimakasihh..
                    </p>
                    <hr>
                    <p class="mb-0"><i>Notifikasi ini akan hilang ketika kamu merefresh halaman ini.</i></p>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('berhasilUpdate')) : ?>
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Yeyy!!</h4>
                    <p>
                        Kalo notifikasi ini muncul, artinya menu yang kamu pilih untuk diedit tadi
                        sudah berhasil diedit dan telah diupdate ke <i>database</i> restoran. Terimakasihh..
                    </p>
                    <hr>
                    <p class="mb-0"><i>Notifikasi ini akan hilang ketika kamu merefresh halaman ini.</i></p>
                </div>
            <?php endif; ?>

            <div class="card" style="margin-bottom:8rem;">
                <div class="card-header d-flex justify-content-between">

                    <div>
                        <i class="fas fa-table mr-1"></i>
                        DataTable
                    </div>

                    <div>
                        <a href="/admin/newMenu" class="nounderline">
                            <i class="fa fa-plus mr-1"></i>
                            Add New
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="restoDataTable" class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stok</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menu as $row) : ?>
                                    <tr>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"><?= $row['MenuName']; ?></td>
                                        <td class="align-middle">IDR<?= $row['Price']; ?></td>
                                        <td class="align-middle"><?= $row['Stok']; ?></td> 
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetails<?= $row['MenuID']; ?>">Details</button>
                                        </td>
                                        <td class="align-middle">

                                            <form action="/admin/deleteMenu/<?= $row['MenuID']; ?>" class="d-inline" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-link" onclick="return confirm('ALL DATA FROM THE SELECTED MENU WILL BE DELETED!!\n\n hit the ok button to confirm...');">
                                                <i class="fas fa-trash text-dark"></i></button>
                                            </form>

                                            <a href="/admin/editMenu/<?= $row['MenuID']; ?>" class="btn btn-link"><i class="fas fa-edit"></i></a>

                                        </td>
                                    </tr>

                                    <!--MENU_MODAL-->
                                    <?php $w = 'width="450px"';
                                    $h = 'height="350px"'; ?>
                                    <div class="modal" id="modalDetails<?= $row['MenuID']; ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content border-warning">
                                                <div class="modal-header bg-light">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-link">
                                                    <div id="modalDetailsCarousel<?= $row['MenuID']; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                                                        <div class="carousel-inner" role="listbox">
                                                            <?php for ($i = 1; $i <= $row['FilesUploaded']; $i++) : ?>
                                                                <div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
                                                                    <a>
                                                                        <img class="card-img-top" src="/assets/img/konsol/<?= $row['Slug'] . '_' . $i ?>.png" <?= $w . $h; ?>>
                                                                    </a>
                                                                </div>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#modalDetailsCarousel<?= $row['MenuID']; ?>" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#modalDetailsCarousel<?= $row['MenuID']; ?>" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="modal-footer px-4 pb-5 pt-4 bg-light">
                                                    <div class="mr-auto">
                                                        <h5 class="card-title"><?= $row['MenuName']; ?></h5>
                                                        <p class="card-text mb-2"><small class="text-warning font-italic"><?= $category[$row['CategoryID'] - 1]['CategoryName']; ?></small></p>
                                                        <p class="card-text"><?= $row['Description']; ?></p>
                                                        <p class="card-text text-primary">
                                                            <?php for ($i = 1; $i <= $row['Rating']; $i++) : ?>
                                                                <small>&#9733;</small>
                                                            <?php endfor; ?>
                                                            <?php for ($i = 1; $i <= 5 - $row['Rating']; $i++) : ?>
                                                                <small>&#9734;</small>
                                                            <?php endfor; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection('content'); ?>