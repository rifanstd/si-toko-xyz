<?php $no = 1; ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="card-title">Table Kategori</h3>
            </div>
            <div class="col">
                <a href="/categories/create" class="btn btn-sm btn-primary">Tambah Kategori</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $category['name']; ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col"><a href="/categories/edit/<?= $category['id_category']; ?>"
                                        class="btn btn-sm btn-warning" style="width: 100%;">Edit</a></div>
                                <div class="col">
                                    <form action="/categories/delete" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_category" value="<?= $category['id_category'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?');"
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