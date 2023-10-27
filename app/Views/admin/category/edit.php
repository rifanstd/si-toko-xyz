<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Ubah Kategori</h3>
    </div>
    <form action="/categories/update" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="hidden" name="id_category" value="<?= $category['id_category']; ?>">
                <input type="text" class="form-control" id="" name="name" placeholder="Masukkan nama kategori"
                    value="<?= $category['name']; ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>