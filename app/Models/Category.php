<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'categories';
    protected $primaryKey = 'id_category';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['category_name', 'slug'];
}
