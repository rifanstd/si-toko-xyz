<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_category', 'product_name', 'price', 'stock'];

    public function getAllProducts()
    {
        $product_model = new Product();

        $products = $product_model->join('categories', 'categories.id_category = products.id_category')->findAll();

        return $products;
    }
}
