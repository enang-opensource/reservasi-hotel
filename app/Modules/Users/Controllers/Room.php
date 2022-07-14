<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\M_category;
use App\Modules\Users\Models\M_room;
use App\Modules\Users\Models\M_komentar;
use App\Modules\Users\Models\M_users;

class Room extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      $this->m_room = new M_room;
      $this->m_category = new M_category;
      $this->m_komentar = new M_komentar;
      $this->m_user = new M_users;
    }

    public function index()
    {
      $data = [
        'title' => 'Room',
        'menu'  => 'room',
      ];

      echo view('\App\Modules\Users\Views\content\v_select', $data);
    }

    public function a_room()
    {
      $data = [
        'title' => 'Room',
        'menu'  => 'room',
        'category' => $this->m_category->getData(),
        'tgl_msk' => $this->request->getVar('tgl_msk'),
        'tgl_klr' => $this->request->getVar('tgl_klr'),
        'room' => $this->m_room->getDataRoom($this->request->getVar('kapasitas'),$this->request->getVar('tgl_msk')),
      ];

      echo view('\App\Modules\Users\Views\content\v_room', $data);
    }

    public function detail($id_room, $tgl_msk, $tgl_klr)
    {
      $d_room = $this->m_room->getRoom($id_room);

      $data = [
        'title' => $d_room->nama_kamar,
        'menu'  => 'room',
        'room' => $d_room,
        'komentar' => $this->m_komentar->getData($id_room),
        'rows' => $this->m_komentar->getRows($id_room),
        'user' => $this->m_user->fillter(session()->get('id_user')),
        'tgl_msk' => $tgl_msk,
        'tgl_klr' => $tgl_klr,
      ];

      echo view('\App\Modules\Users\Views\content\v_detail', $data);
    }

}
