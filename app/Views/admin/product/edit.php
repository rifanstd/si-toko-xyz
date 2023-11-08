<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Edit Produk</h3>
    </div>
    <form action="/products/update" method="post">
        <div class="card-body">
            <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>">
            <div class="form-group">
                <label for="">Nama Produk</label>
                <input required type="text"
                    class="form-control <?= ($validation->hasError('product_name')) ? 'is-invalid' : ''; ?>" id=""
                    name="product_name" placeholder="Masukkan nama produk" value="<?= $product['product_name']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('product_name') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input required type="number" min="1"
                    class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="" name="price"
                    placeholder="Masukkan harga produk" value="<?= $product['price']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('price') ?>
                </div>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input required type="number" min="1"
                    class="form-control <?= ($validation->hasError('stock')) ? 'is-invalid' : ''; ?>" id="" name="stock"
                    placeholder="Masukkan jumlah produk" value="<?= $product['stock']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stock') ?>
                </div>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select required class="form-control" name="id_category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id_category']; ?>"
                            <?= ($product['id_category'] == $category['id_category']) ? 'selected' : ''; ?>>
                            <?= $category['category_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>