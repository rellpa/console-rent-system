<?= $this->extend('/layouts/admin_template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Hello <b class="text-lowercase"><?= user()->firstname?></b>!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Users Data</li>
            </ol>

            <!--GABUNGAN--> 
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">

                    <div>
                        <i class="fas fa-users mr-1"></i>
                        User List
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersDataTable" class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                <?php foreach ($users as $row) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $i++?></td>
                                        <td class="align-middle text-capitalize"><?= $row->fullname ?></td>
                                        <td class="align-middle"><?= $row->username; ?></td>
                                        <td class="align-middle text-capitalize"><?= $row->name; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/userlist/' . $row->userid)?>" class="btn btn-primary mr-3">Details</a>
                                            <a href="<?= base_url('admin/order/' . $row->userid)?>" class="btn btn-warning">Orders</a>
                                        </td>
                                    </tr>
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