<?php $no = 1; ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with minimal features & hover style</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $user['full_name']; ?>
                        </td>
                        <td>
                            <?= $user['username']; ?>
                        </td>
                        <td>
                            <?= ($user['role'] == '1') ? 'Admin' : 'Karyawan'; ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col"><a href="/users/edit/<?= $user['id_user']; ?>"
                                        class="btn btn-sm btn-warning" style="width: 100%;">Edit</a></div>
                                <div class="col">
                                    <form action="/users/delete" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus akun ini?');"
                                            style="width: 100%;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<?= $this->endSection() ?>