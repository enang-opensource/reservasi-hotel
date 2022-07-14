<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Models\M_chat;

class Chat extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_chat = new M_chat;
  }

  #menu index
  public function index()
  {
    $data = [
      'title'     => 'Chat',
      'menu'      => 'chat',
      'room'  => $this->m_chat->getRoom(),
    ];

    echo view('\App\Modules\Admin\Views\content\v_room', $data);
  }

  #menu room chat
  public function room_chat($id_room, $nama_room)
  {
    $data = [
      'title' => 'Chat',
      'menu'  => 'chat',
      'users' => session()->get('id_user'),
      'nama'  => $nama_room,
      'room'  => $id_room,
      'chat'  => $this->m_chat->getChat($id_room),
    ];

    echo view('\App\Modules\Admin\Views\content\v_chat', $data);
  }

  #menambah data chat
  public function add()
  {
    $nama = $this->request->getVar('nama');
    $id_room = $this->request->getVar('id_room');

    $query = $this->m_chat->insert_chat($id_room, session()->get('id_user'), $this->request->getVar('pesan'));

    if ($query) {
      if ($this->m_chat->update_room($id_room)) {
        return redirect()->to('admin/chat/room/'.$id_room.'/'.$nama);
      }
    } else {
      echo "Gagal Mengirim pesan";
    }
  }


}
