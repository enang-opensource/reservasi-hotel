<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_room;
use App\Modules\Admin\Models\M_transaction;

class Transaction extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->m_transaction = new M_transaction;
    }

    public function index()
    {
      $data = [
        'title' => 'Transaction',
        'menu'  => 'transaction',
        'transaction' => $this->m_transaction->getData(),
      ];

      echo view('\App\Modules\Admin\Views\content\v_transaction', $data);
    }
}
