<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\M_transaksi;
use App\Modules\Users\Models\M_users;

class Home extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_transaksi = new M_transaksi;
    $this->m_users = new M_users;
  }

  public function index()
  {
    $data = [
      'title' => 'Home',
      'menu'  => 'home'
    ];

    echo view('\App\Modules\Users\Views\content\v_home', $data);
  }

  public function transaksi()
  {
    $data = [
      'title' => 'Transaksi',
      'menu'  => 'transaction',
      'transaksi' => $this->m_transaksi->getData(session()->get('id_user'))
    ];

    echo view('\App\Modules\Users\Views\content\v_transaksi', $data);
  }

  public function payment()
  {
    $data = [
      'title' => 'Pembayaran',
      'menu'  => 'payment',
      'payment' => $this->m_transaksi->getData(session()->get('id_user'))
    ];

    echo view('\App\Modules\Users\Views\content\v_payment', $data);
  }

  public function invoice($id)
  {
    $id_user = session()->get('id_user');

    $data = [
      'transaksi' => $this->m_transaksi->getInvoice($id),
      'users' => $this->m_users->getData($id_user),
    ];

    echo view('\App\Modules\Users\Views\v_invoice', $data);
  }
}
