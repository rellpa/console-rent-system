<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Order extends BaseController
{

	public function index($id)
	{
		$users = new \Myth\Auth\Models\UserModel();

        $db      = \Config\Database::connect();
        $builder = $db->table('order');
        $builder->select('OrderID, MenuName, total_order, total_price, order_date, order_status.StatusID, order_status.StatusName');
        $builder->join('users', 'users.id = order.id');
        $builder->join('menu', 'menu.MenuID = order.MenuID');
        $builder->join('order_status', 'order_status.StatusID = order.StatusID');
        $builder->where('order.id',$id);
        $query = $builder->get();

		$order = $query->getResultArray();

        $sum = $db->table('order');
        $sum->selectSum('total_price');
        $sum->where('id', $id);
		$query2 = $sum->get();
		$sums = $query2->getResultArray();


        $data = [
			'title' => 'FADEW console | My Order',
			'namaresto' => $this->namaResto,
			'menu' => $this->menuModel->getMenu(),
			'users' => $users,
            'order' => $order,
            'sums' => $sums
		];

        return view('orderList', $data);
	}

    public function addOrder()
	{
        $orderQty = $this->request->getVar('orderQty');
        $totalPrice = $this->request->getVar('price')*$orderQty;

        $this->orderListModel->save([
            'id' => $this->request->getVar('idUser'),
            'MenuID' => $this->request->getVar('menu'),
            'total_order' => $this->request->getVar('orderQty'),
            'total_price' =>  $totalPrice,
		    'StatusID' => $this->request->getVar('stats'),
            'order_date' => Time::now()
		]);

        $this->menuModel->save([
            'MenuID' => $this->request->getVar('menu'),
            'Stok' => $this->request->getVar('stok')
        ]);
		session()->setFlashdata('berhasilOrder', '...');

		return redirect()->to('/');
    }

    public function updateOrderstats($OrderID)
    {
        $this->orderListModel->save([
            'OrderID' => $OrderID,
            'StatusID' => $this->request->getVar('stats')
        ]);

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}