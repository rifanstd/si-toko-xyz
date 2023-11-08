<?php $no = 1; ?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    <?= $num_of_products; ?>
                </h3>
                <p>Jumlah Produk</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/products" class="small-box-footer">Info Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    <?= $num_of_transactions; ?>
                </h3>
                <p>Jumlah Transaksi</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/transactions" class="small-box-footer">Info Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    <?= $num_of_employee; ?>
                </h3>
                <p>Jumlah Karyawan</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/users" class="small-box-footer">Info Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp
                    <?= $total_income; ?>
                </h3>
                <p>Pemasukan</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Info Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="card-title">Table Riwayat Transaksi</h3>
            </div>
            <div class="col">
                <?php if (session()->get('role') == '2'): ?>
                    <a href="/transactions/create" class="btn btn-sm btn-primary">Tambah Transaksi</a>
                <?php endif ?>
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
                <tr>
                    <td colspan="6" class="text-center">
                        <a href="/transactions">Lihat Semua</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<?= $this->endSection() ?>