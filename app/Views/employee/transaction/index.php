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
                <h3 class="card-title">Table Riwayat Transaksi</h3>
            </div>
            <div class="col">
                <a href="/transactions/create" class="btn btn-sm btn-primary">Tambah Transaksi</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <?php if (session()->get('role') == '1'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $transaction['product_name']; ?>
                        </td>
                        <td>
                            <?= $transaction['num_of_products']; ?>
                        </td>
                        <td>
                            <?= $transaction['total_price']; ?>
                        </td>
                        <td>
                            <?= $transaction['date']; ?>
                        </td>
                        <?php if (session()->get('role') == '1'): ?>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <form action="/transactions/delete" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id_transaction"
                                                value="<?= $transaction['id_transaction'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?');"
                                                style="width: 100%;">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<?= $this->endSection() ?>