<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\M_complaint;

class Complaint extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_complaint = new M_complaint;
  }

  public function index()
  {
    $data = [
      'title' => 'Complaint',
      'menu'  => 'report',
    ];

    echo view('\App\Modules\Users\Views\content\v_complaint', $data);
  }
  #mengirim complaint
  public function send_complaint()
  {
    #validation
    if (!$this->validate([
      'nama_lengkap' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama anda harus diisi!',
        ]
      ],
      'subject' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'subject tidak boleh kosong!',
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email tidak boleng kosong!',
        ]
      ],
      'd_pengaduan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tulis pengaduan anda!',
        ]
      ],
      ])) {
        session()->setFlashdata('error', 'Error, jenis kategori harus diisi!');
        return redirect()->back();
      }

      $data = [
        'nama_lengkap' => $this->request->getVar('nama_lengkap'),
        'subject' => $this->request->getVar('subject'),
        'email' => $this->request->getVar('email'),
        'detail_pengaduan' => $this->request->getVar('d_pengaduan')
      ];

      if ($this->m_complaint->insert($data)) {
          session()->setFlashdata('msg', 'Success, berhasil mengirim pengaduan!');
        return redirect()->back();
      } else {
          session()->setFlashdata('error', 'Error, gagal mengirim pengaduan!');
        return redirect()->back();
      }
    }
  }
