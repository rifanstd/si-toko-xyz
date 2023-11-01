<?php $no = 1; ?>

<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('success_msg')): ?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('success_msg') ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="card-title">Table Supplier</h3>
            </div>
            <div class="col">
                <a href="/suppliers/create" class="btn btn-sm btn-primary">Tambah Supplier</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $supplier['email']; ?>
                        </td>
                        <td>
                            <?= $supplier['supplier_name']; ?>
                        </td>
                        <td>
                            <?= $supplier['description']; ?>
                        </td>
                        <td>
                            <?= $supplier['address']; ?>
                        </td>
                        <td>
                            <?= $supplier['phone_number']; ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col"><a href="/suppliers/edit/<?= $supplier['id_supplier']; ?>"
                                        class="btn btn-sm btn-warning" style="width: 100%;">Edit</a></div>
                                <div class="col">
                                    <form action="/suppliers/delete" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus supplier ini?');"
                                            style="width: 100%;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<?= $this->endSection() ?>