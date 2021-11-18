<?= $this->extend('/layouts/admin_template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Hello <b class="text-lowercase"><?= user()->firstname?></b>!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/userlist" class="text-success">Users Data</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>

            <!--GABUNGAN--> 
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">

                    <div>
                        <i class="fas fa-shopping-basket mr-1"></i>
                        <?= $users[0]['username']; ?>'s orders
                    </div>

                </div>

                <div class="card-body">
                    
                    <?php if (empty($order)) : ?>
                        <h4>No orders!</h4>

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
                                            <td class="align-middle">
                                                <u style="color:#FF6D22;"><?= $row['StatusName']; ?></u>
                                                <br>
                                                <form action="/admin/updateOrderstats/<?= $row['OrderID']; ?>">
                                                    <input type="checkbox" id="stats" name="stats" value="2" required>
                                                    <label for="stats"> <i>*check the box if the item has been sent</i></label>
                                                    <br>
                                                    <input type="submit" value="Submit">
                                                </form>
                                            </td>
                                        <?php elseif (($row['StatusID']) == 2) : ?>
                                            <td class="align-middle"><u style="color:#DB22FF;"><?= $row['StatusName']; ?></u></td>
                                        <?php elseif (($row['StatusID']) == 3) : ?>
                                            <td class="align-middle">
                                                <u style="color:#22B4FF;"><?= $row['StatusName']; ?></u>
                                                <br>
                                                <form action="/admin/updateOrderstats/<?= $row['OrderID']; ?>">
                                                    <input type="hidden" id="idMenu" name="idMenu" value="<?= $row['MenuID']; ?>">
                                                    <input type="hidden" id="stok" name="stok" value="<?= $row['Stok']+1 ?>">
                                                    <input type="checkbox" id="stats" name="stats" value="4" required>
                                                    <label for="stats"> <i>*check the box if the item has been picked-up by </i></label>
                                                    <br>
                                                    <input type="submit" value="Submit">
                                                </form>
                                            </td>
                                        <?php elseif (($row['StatusID']) == 4) : ?>
                                            <td class="align-middle"><u style="color:#1DF013;"><?= $row['StatusName']; ?></u></td>
                                            
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
        </div>
    </main>
</div>
<?= $this->endSection('content'); ?>