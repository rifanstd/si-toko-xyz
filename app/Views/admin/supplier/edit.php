<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Edit Supplier</h3>
    </div>
    <form action="/suppliers/update" method="post">
        <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier']; ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="">Email</label>
                <input required type="email"
                    class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="" name="email"
                    placeholder="Masukkan Email Supplier" value="<?= $supplier['email']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Nama Supplier</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('supplier_name')) ? 'is-invalid' : ''; ?>" id=""
                    name="supplier_name" placeholder="Masukkan nama Supplier"
                    value="<?= $supplier['supplier_name']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('supplier_name') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : ''; ?>" id=""
                    name="description" placeholder="Masukkan deskripsi Supplier"
                    value="<?= $supplier['description']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('description') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id=""
                    name="address" placeholder="Masukkan alamat Supplier" value="<?= $supplier['address']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('address') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Telepon</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('phone_number')) ? 'is-invalid' : ''; ?>" id=""
                    name="phone_number" placeholder="Masukkan nomor telepon Supplier"
                    value="<?= $supplier['phone_number']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('phone_number') ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>