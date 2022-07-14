<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\M_komentar;

class Komentar extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_komentar = new M_komentar;
  }

  public function index()
  {
    #validation
    if (!$this->validate([
      'comment' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Komentar anda harus diisi!',
        ]
      ],
      ])) {
        session()->setFlashdata('error', 'Error, Komentar harus diisi!');
        return redirect()->back();
      }

      $data = [
        'id_user' => session()->get('id_user'),
        'id_kamar' => $this->request->getVar('id'),
        'text_komentar' => $this->request->getVar('comment'),
        'tanggal_komentar' => date("Y-m-d"),
      ];

      if ($this->m_komentar->insert($data)) {
        session()->setFlashdata('msg', 'Success, berhasil mengirim komentar!');
        return redirect()->back();
      } else {
        session()->setFlashdata('error', 'Error, gagal mengirim komentar!');
        return redirect()->back();
      }
    }
  }
