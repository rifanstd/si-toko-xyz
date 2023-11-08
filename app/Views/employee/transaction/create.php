<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Transaksi</h3>
    </div>
    <form action="/transactions/store" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Produk</label>
                <select required class="form-control" name="id_product">
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id_product']; ?>">
                            <?= $product['product_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input required type="number" min="1" class="form-control" id="" name="jumlah"
                    placeholder="Masukkan jumlah produk">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
</div>



<?= $this->endSection() ?>