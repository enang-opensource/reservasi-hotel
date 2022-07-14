<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_payment;

class Payment extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->m_payment = new M_payment;
    }

    public function index()
    {
      $data = [
        'title' => 'Payment',
        'menu'  => 'payment',
        'payment' => $this->m_payment->getData(),
      ];

      echo view('\App\Modules\Admin\Views\content\v_payment', $data);
    }
}
