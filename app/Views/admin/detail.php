<?= $this->extend('/layouts/admin_template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Hello <b class="text-lowercase"><?= user()->firstname?></b>!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/userlist" class="text-success">Users Data</a></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>

            <!--GABUNGAN--> 
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">

                    <div>
                        <i class="fas fa-users mr-1"></i>
                        User Details
                    </div>

                </div>

                <div class="card-body">
                    <div class="col-lg-8">
                        <div class="card mb-3" style="max-width: 580px;">
                            <div class="row no-gutters">
                                <div class="col-md-5 d-flex align-items-center">
                                    <img src="/assets/img/admin/<?=$user->name?>.png" class="card-img" style="height:15rem; width:100%; padding-top:0.4rem; padding-bottom:0.4rem;">
                                </div>
                                <div class="col-md-7">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h4><?= $user->username?></h4>
                                    </li>
                                    <li class="list-group-item">
                                        <?= $user->alamat?>
                                    </li>
                                    <li class="list-group-item">
                                        <?php $date=strtotime($user->birthdate); ?>
                                        <?= $user->gender?> |  <?= date('d M Y', $date) ?>
                                    </li>
                                    <li class="list-group-item">
                                        <?= $user->email ?> |  <?= $user->no_telp ?>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-<?= ($user->name == 'admin') ? 'success' : 'warning';?>"><?= $user->name?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <small>
                                            <a href="/admin/userlist"><< Back to User List</a>
                                        </small>
                                    </li>
                                </ul>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection('content'); ?>