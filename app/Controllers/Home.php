<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$keyword = $this->request->getVar('searchbox');
		
		if ($keyword) 
		{
			$menu = $this->menuModel->searchMenu($keyword);
		}
		elseif (!$keyword) {
			$menu = $this->menuModel;
		}

		$users = new \Myth\Auth\Models\UserModel();
	

		$data = [
			'title' => 'Rental UAS IF430 | FADEW console',
			'namaresto' => $this->namaResto,
			'menu' => $menu->getMenu(),
			'category' => $this->categoryModel->getKategori(),
			'slug' => $this->menuModel->getSlug(),
			'users' => $users
		];

		if(empty($data['menu'])) 
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Menu with keywords '.'"'.$keyword.'"'.' not found!!');
		}
// dd($data);
		return view('home', $data);
	}

	public function about()
	{
	
		$users = new \Myth\Auth\Models\UserModel();
	

		$data = [
			'title' => 'FADEW console | About',
			'namaresto' => $this->namaResto,
			'users' => $users
		];

		return view('about', $data);
	}

	public function service()
	{
	
		$users = new \Myth\Auth\Models\UserModel();
	

		$data = [
			'title' => 'FADEW console | Services',
			'namaresto' => $this->namaResto,
			'users' => $users
		];

		return view('services', $data);
	}
}
