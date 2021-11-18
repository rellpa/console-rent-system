<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'category';
    protected $primaryKey = 'CategoryID';

    public function getKategori($kategori=false) 
    {
        if ($kategori==false)
        {
            return $this->findAll();
        }

		return $this->where(['CategoryID'=>$kategori])->first();
    }
}