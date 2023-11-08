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
                <input type="text" class="form-control <?= ($validation->hasError('full_name')) ? 'is-invalid' : ''; ?>"
                    id="" name="full_name" placeholder="Masukkan nama baru"
                    value="<?= (old('full_name')) ? old('full_name') : $user['full_name'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('full_name') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                    id="" name="username" placeholder="Masukkan username baru"
                    value="<?= (old('username')) ? old('username') : $user['username'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('username') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password"
                    class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id=""
                    name="password" placeholder="Masukkan password baru" value="">
                <div class="invalid-feedback">
                    <?= $validation->getError('password') ?>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>