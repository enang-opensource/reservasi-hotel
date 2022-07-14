<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_transaction;

class Report extends BaseController
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
        'title' => 'Report',
        'menu'  => 'report',
        'report'  => $this->m_transaction->getReport(),
      ];

      echo view('\App\Modules\Admin\Views\content\v_report', $data);
    }
}
