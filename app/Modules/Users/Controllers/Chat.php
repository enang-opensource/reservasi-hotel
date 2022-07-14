<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Models\M_users;
use App\Modules\Users\Models\M_chat;

class Chat extends BaseController
{
  /**
  * Constructor.
  */
  public function __construct()
  {
    $this->m_chat = new M_chat;
    $this->m_user = new M_users;
  }

  public function index()
  {
    $id_user = $this->m_chat->getUser(session()->get('id_user'));

    if ($id_user==0) {
      $roles = 0;
      $room = 0;
      $chat = null;
    } else {
      $roles = 1;
      #get data room
      $getRoom = $this->m_chat->getRoom(session()->get('id_user'));
      #set data Room
      $room = $getRoom['id_room'];

      $chat = $this->m_chat->getChat($getRoom['id_room']);
    }

    $data = [
      'title' => 'Chat',
      'menu'  => 'chat',
      'roles' => $roles,
      'room'  => $room,
      'users' => session()->get('id_user'),
      'chat'  => $chat,
    ];

    // echo print_r($chat);
    echo view('\App\Modules\Users\Views\content\v_chat', $data);
  }

  #add chat
  public function add()
  {
    $name_user = $this->m_user->fillter(session()->get('id_user'));

    #mendapatkan nama room
    $name_room = $name_user->fname.' '.$name_user->lname;
    $pesan = $this->request->getVar('pesan');


    if ($this->request->getVar('roles')==0) {
      #verification
      if ($this->m_chat->insert_room($name_room)) {
        if ($this->m_chat->insert_chat($this->m_chat->insertID(), session()->get('id_user'), $pesan)) {
          return redirect()->to('users/chat');
        }
      } else {
        echo "Gagal!";
      }
    } else {
      if ($this->m_chat->insert_chat($this->request->getVar('id_room'), session()->get('id_user'), $pesan)) {
        if ($this->m_chat->update_room($this->request->getVar('id_room'))) {
          return redirect()->to('users/chat');
        }
      }
    }
  }

}
