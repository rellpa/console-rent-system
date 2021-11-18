<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderListModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'OrderID';
    protected $allowedFields = ['id',
                               'MenuID',
                               'total_order',
                               'total_price',
                               'order_date',
                               'StatusID'
                               ];
}