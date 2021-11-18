<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'MenuID';
    protected $allowedFields = ['MenuName',
                               'CategoryID',
                               'Price',
                               'Description',
                               'Rating',
                               'Slug',
                               'FilesUploaded',
                               'Stok',
                               ];

    public function getMenu($kategori=false) 
    {
        if ($kategori==false)
        {
            return $this->findAll();
        }

		return $this->where(['CategoryID'=>$kategori])->findAll();
    }

    public function getMenuByID($id=false) 
    {
        if ($id==false)
        {
            return $this->findAll();
        }

		return $this->where(['MenuID'=>$id])->first();
    }

    public function getSlug() 
    {
		return $this->findColumn('Slug');
    }

    public function searchMenu($keyword) 
    {
        if ($this->table('menu')->like('MenuName', $keyword)==true) {
            return $this->table('menu')->like('MenuName', $keyword);
        }
    }
}