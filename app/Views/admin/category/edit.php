<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<?php if ($data_already_exist != null): ?>
    <div class="alert alert-warning">
        <?= $data_already_exist ?>
    </div>
<?php endif; ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Ubah Kategori</h3>
    </div>
    <form action="/categories/update" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="hidden" name="id_category" value="<?= $category['id_category']; ?>">
                <input type="text"
                    class="form-control <?= ($validation->hasError('category_name')) ? 'is-invalid' : ''; ?>" id=""
                    name="category_name" placeholder="Masukkan nama kategori"
                    value="<?= $category['category_name']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('category_name') ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>