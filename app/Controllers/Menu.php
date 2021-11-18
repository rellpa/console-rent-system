<?php

namespace App\Controllers;

class Menu extends BaseController
{
	public function categoryMenu($kategori)
	{
		$cate = $this->categoryModel->getKategori($kategori);

		$data = [
			'title' => 'Warteg Bahari | '.$cate['CategoryName'],
			'namaresto' => $this->namaResto,
			'menu' => $this->menuModel->getMenu($kategori),
			'category' => $this->categoryModel->getKategori($kategori)
		];

		if(empty($data['menu'])) 
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('CategoryID : '.$kategori.' not found!!');
		}
	
		return view('/menu/byCategory', $data);
	}
}
