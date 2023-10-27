<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Kategori</h3>
    </div>
    <form action="/categories/store" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>"
                    id="" name="name" placeholder="Masukkan nama kategori">
                <div class="invalid-feedback">
                    <?= $validation->getError('name') ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>