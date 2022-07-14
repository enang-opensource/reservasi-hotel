<?php

namespace App\Modules\Users\Controllers;

class About extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {

    }

    public function index()
    {
      $data = [
        'title' => 'About',
        'menu'  => 'about',
      ];

      echo view('\App\Modules\Users\Views\content\v_about', $data);
    }

}
