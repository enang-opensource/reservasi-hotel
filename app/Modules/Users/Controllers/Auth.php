<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\M_users;

class Auth extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_users = new M_users;
  }

  public function register()
  {
    #validation
    if (!$this->validate([
      'fname' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama anda harus diisi!',
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'email tidak boleh kosong!',
        ]
      ],
      'nohp' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor tidak boleng kosong!',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password tidak boleh kosong!',
        ]
      ],
      ])) {
        session()->setFlashdata('error', 'Error, gagal mendaftarkan akun!');
        return redirect()->back();
      }

      $data = [
        'fname' => $this->request->getVar('fname'),
        'lname' => $this->request->getVar('lname'),
        'email_user' => $this->request->getVar('email'),
        'password_user' => $this->request->getVar('password'),
        'nomor_hp' => $this->request->getVar('nohp'),
        'roles' => 1,
        'image_user' => 'user.jpg'
      ];

      if ($this->m_users->insert_data($data)) {
        session()->setFlashdata('auth-success', 'Success, berhasil mendaftarkan akun!');
      } else {
        session()->setFlashdata('auth-failed', 'Gagal, gagal mendaftarkan akun!');
      }

      return redirect()->back();
    }

    public function login()
    {
      #validation
      if (!$this->validate([
        'email' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'email tidak boleh kosong!',
          ]
        ],
        'password' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Password tidak boleh kosong!',
          ]
        ],
        ])) {
          session()->setFlashdata('error', 'Error, gagal login akun!');
          return redirect()->back();
        }

        #get data input login
        $username = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if ($validation = $this->m_users->verifikasi($username, $password)) {
          session()->set([
            'id_user'   => $validation->id_users,
            'roles'     => $validation->roles,
            'logged_in' => TRUE,
          ]);

          if ($validation->roles==0) {
            return redirect()->to('/admin/dashboard');
          } else {
            session()->setFlashdata('auth-success', 'berhasil melakukan login!');
            return redirect()->back();
          }
        } else {
          session()->setFlashdata('auth-failed', 'password atau email salah!');
          return redirect()->back();
        }
      }

      public function logout()
      {
        session()->destroy();
        session()->setFlashdata('auth-success', 'Berhasil logout');
        return redirect()->back();
      }
    }
