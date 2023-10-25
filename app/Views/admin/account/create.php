<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Akun</h3>
    </div>
    <form action="/users/store" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control" id="" name="full_name" placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" id="" name="username" placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="" name="password" placeholder="Masukkan password">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>