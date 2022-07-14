<?php

namespace App\Modules\Users\Controllers;

class Fasilitas extends BaseController
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
        'title' => 'Fasilitas',
        'menu'  => 'fasilitas',
      ];

      echo view('\App\Modules\Users\Views\content\v_fasilitas', $data);
    }

    public function getLong(){
      $h_awal = date_create('2021-11-08');
      $h_keluar = date_create('2021-12-07');

      $days = date_diff($h_awal, $h_keluar);

      echo $days->d;
    }

}
