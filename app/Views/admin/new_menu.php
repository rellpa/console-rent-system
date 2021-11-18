<?= $this->extend('/layouts/admin_template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Hello <b class="text-lowercase"><?= user()->firstname?></b>!</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/consoleTable" class="text-success">Console Data</a></li>
                <li class="breadcrumb-item active">New Console Form</li>
            </ol>
            <div class="card border-success" style="margin-bottom:8rem;">
                <div class="card-header text-light bg-success d-flex justify-content-between">
                    <div>
                        <i class="fas fa-align-left mr-1"></i>
                        Console Form
                    </div>
                </div>

                <div class="card-body">
                    <form action="/admin/saveNewMenu" autocomplete="off" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <i class="fa fa-gamepad text-warning"></i> &nbsp;
                            <label for="namaMenu">Console Name</label>
                            <input type="text" name="namaMenu" class="form-control 
                                <?= ($validation->hasError('namaMenu')) ? 'is-invalid' : ''; ?>" id="namaMenu" placeholder="Enter Console Name" value="<?= (old('namaMenu')) ? old('namaMenu') : ""; ?>" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('namaMenu'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-gamepad text-success"></i> &nbsp;
                            <label for="kategori">Category</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <?php
                                if (old('kategori')) {
                                    if (old('kategori') == 1) {
                                        echo "<option value='1'>PlayStation</option>
                                                  <option value='2'>Xbox</option>
                                                  <option value='3'>Nintendo</option>
                                                  <option value='4'>SEGA</option>";
                                    } elseif (old('kategori') == 2) {
                                        echo "<option value='2'>Xbox</option>
                                                  <option value='1'>PlayStation</option>
                                                  <option value='3'>Nintendo</option>
                                                  <option value='4'>SEGA</option>";
                                    } elseif (old('kategori') == 3) {
                                        echo "<option value='3'>Nintendo</option>
                                                 <option value='1'>PlayStation</option>
                                                 <option value='2'>Xbox</option>
                                                 <option value='4'>SEGA</option>";
                                    } elseif (old('kategori') == 4) {
                                        echo "<option value='4'>SEGA</option>
                                                  <option value='1'>PlayStation</option>
                                                  <option value='2'>Xbox</option>
                                                  <option value='3'>Nintendo</option>";
                                    }
                                } else {
                                    echo "<option value='1'>PlayStation</option>
                                              <option value='2'>Xbox</option>
                                              <option value='3'>Nintendo</option>
                                              <option value='4'>SEGA</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-gamepad text-primary"></i> &nbsp;
                            <label for="menuPrice">Price</label>
                            <input type="text" name="harga" class="form-control" id="menuPrice" placeholder="Console Price" pattern="[0-9]{4,}" maxlength="25" title="4 digits number or more" value="<?= old('harga'); ?>" required>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-gamepad text-info"></i> &nbsp;
                            <label for="menuDescription">Description</label>
                            <textarea class="form-control" name="desc" id="menuDescription" rows="4" placeholder="Console Description" required><?= old('desc'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-gamepad text-secondary"></i> &nbsp;
                            <label for="menuRating">Rating</label>
                            <input type="number" name="rating" class="form-control" id="menuRating" min="1" max="5" placeholder="Rating" title="1-5" value="<?= old('rating'); ?>" required>
                        </div>
                        <div class="form-group mb-5">
                            <i class="fa fa-gamepad text-danger"></i> &nbsp;
                            <label for="menuStok">Stok</label>
                            <input type="text" name="stok" class="form-control" id="menuStok" placeholder="Console Stock" pattern="[0-9]{1,}" maxlength="25" value="<?= old('stok'); ?>" required>
                        </div>
                        <hr>
                        <div class="form-group mb-5">
                            <i class="fa fa-gamepad text-link"></i> &nbsp;
                            <label class="mt-4">Input console images</label>
                            <input type="file" name="images[]" accept=".png" class="form-control pt-3 pb-5 <?= ($validation->hasError('images')) ? 'is-invalid' : ''; ?>" id="images" aria-describedby="fileInfo" multiple <?= ($validation->hasError('images')) ? 'autofocus' : ''; ?>>
                            <div class="invalid-feedback">
                                <?= $validation->getError('images'); ?>
                            </div>
                            <small id="fileInfo" class="form-text text-muted">
                                The image file type must be <b>".png"</b> and cannot larger than <b>500px</b> of height.
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5 mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection('content'); ?>