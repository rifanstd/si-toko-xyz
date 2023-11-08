<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaction extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_product',
        'product_name',
        'num_of_products',
        'total_price',
        'date',
    ];

}
