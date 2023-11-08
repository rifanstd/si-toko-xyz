<?php

namespace App\Models;

use CodeIgniter\Model;

class Supplier extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'suppliers';
    protected $primaryKey = 'id_supplier';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'email',
        'supplier_name',
        'description',
        'address',
        'phone_number'
    ];
}
