<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Supplier</h3>
    </div>
    <form action="/suppliers/store" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="">Email</label>
                <input required type="email"
                    class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="" name="email"
                    placeholder="Masukkan Email Supplier">
                <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Nama Supplier</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('supplier_name')) ? 'is-invalid' : ''; ?>" id=""
                    name="supplier_name" placeholder="Masukkan nama Supplier">
                <div class="invalid-feedback">
                    <?= $validation->getError('supplier_name') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" id=""
                    name="description" placeholder="Masukkan deskripsi Supplier">
                <div class="invalid-feedback">
                    <?= $validation->getError('description') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id=""
                    name="address" placeholder="Masukkan alamat Supplier">
                <div class="invalid-feedback">
                    <?= $validation->getError('address') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Telepon</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('phone_number')) ? 'is-invalid' : ''; ?>" id=""
                    name="phone_number" placeholder="Masukkan nomor telepon Supplier">
                <div class="invalid-feedback">
                    <?= $validation->getError('phone_number') ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>