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
                <h3 class="card-title">Table Produk</h3>
            </div>
            <div class="col">
                <a href="/products/create" class="btn btn-sm btn-primary">Tambah Produk</a>
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
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $product['product_name']; ?>
                        </td>
                        <td>
                            <?= $product['price']; ?>
                        </td>
                        <td>
                            <?= $product['stock']; ?>
                        </td>
                        <td>
                            <?= $product['category_name']; ?>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col"><a href="/products/edit/<?= $product['id_product']; ?>"
                                        class="btn btn-sm btn-warning" style="width: 100%;">Edit</a></div>
                                <div class="col">
                                    <form action="/products/delete" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?');"
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