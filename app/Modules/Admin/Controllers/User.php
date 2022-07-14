<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_users;

class User extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->m_user = new M_users;
    }

    public function index()
    {
      $data = [
        'title' => 'User',
        'menu'  => 'users',
        'users' => $this->m_user->getData(),
      ];

      echo view('\App\Modules\Admin\Views\content\v_user', $data);
    }
}
