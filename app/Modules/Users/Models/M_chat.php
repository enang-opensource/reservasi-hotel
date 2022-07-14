<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_chat extends Model
{
  protected $table      = 'tb_chat';
  protected $primaryKey = 'id_chat';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_room', 'id_user', 'text_chat'];

  #menambah data room
  public function insert_room($name_room)
  {
    return $this->query("INSERT INTO tb_room(nama_room, tanggal_buat, status) VALUES('$name_room', NOW(), '1')");
  }

  #menambah data chat
  public function insert_chat($id_room, $id_user, $pesan)
  {
    return $this->query("INSERT INTO tb_chat(id_room, id_user, text_chat) VALUES('$id_room', '$id_user', '$pesan')");
  }

  #mengambil semua data chat
  public function getUser($id_user)
  {
    return $this->query("SELECT * FROM tb_chat WHERE id_user='$id_user'")->getNumRows();
  }

  #mengambil data room
  public function getRoom($id_user)
  {
    return $this->query("SELECT * FROM tb_chat WHERE id_user='$id_user'")->getRowArray();
  }

  #mengambil data room
  public function getChat($id_room)
  {
    return $this->query("SELECT * FROM tb_chat WHERE id_room='$id_room'")->getResultArray();
  }

  #mengambil data room
  public function update_room($id_room)
  {
    return $this->query("UPDATE tb_room SET status='1' WHERE id_room='$id_room'");
  }
}
