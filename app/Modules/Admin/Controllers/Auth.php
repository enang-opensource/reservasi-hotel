<?php
namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_users;

class Auth extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->model = new M_users;
  }

  public function index()
  {
    $data = [
      'title' => 'Login',
    ];

    echo view('\App\Modules\Admin\Views\auth\v_login', $data);
  }

  public function verifikasi()
  {
    if (!$this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email harus diisi',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password harus diisi',
        ]
      ],
      ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back();
      }

      #get data input login
      $username = $this->request->getVar('email');
      $password = $this->request->getVar('password');

      if ($validation = $this->model->verifikasi($username, $password)) {
        session()->set([
                    'id_user'   => $validation->id_users,
                    'roles'     => $validation->roles,
                    'logged_in' => TRUE,
                ]);

        if ($validation->roles==0) {
          return redirect()->to('/admin/dashboard');
        } else {
          return redirect()->to('/users');
        }
      } else {
        session()->setFlashdata('error', 'password atau email salah!');
        return redirect()->back();
      }
    }

    public function logout()
    {
      session()->destroy();
      session()->setFlashdata('msg', 'Berhasil logout');
      return redirect()->to('/admin');
    }
  }
