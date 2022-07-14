<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_payment;
use App\Modules\Admin\Models\M_users;
use App\Modules\Admin\Models\M_transaction;
use App\Modules\Admin\Models\M_room;

class Home extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->m_users = new M_users;
      $this->m_transaksi = new M_transaction;
      $this->m_room = new M_room;
    }

    public function index()
    {
      $data = [
        'title' => 'Dashboard',
        'menu'  => 'dashboard',
        'users' => $this->m_users->getRows(),
        'transaksi' => $this->m_transaksi->getRows(),
        'room' => $this->m_room->getRows(),
      ];

      echo view('\App\Modules\Admin\Views\content\v_dashboard', $data);
    }
}
