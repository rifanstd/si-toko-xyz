<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Edit Akun</h3>
    </div>
    <form action="/users/update" method="post">
        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control" id="" name="full_name" placeholder="Masukkan nama baru"
                    value="<?= $user['full_name']; ?>">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" id="" name="username" placeholder="Masukkan username baru"
                    value="<?= $user['username']; ?>">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="" name="password" placeholder="Masukkan password baru"
                    value="<?= $user['password']; ?>">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>