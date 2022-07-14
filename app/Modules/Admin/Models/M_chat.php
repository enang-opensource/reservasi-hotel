<?php

namespace App\Modules\Admin\Models;

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

  #mengambil semua data room
  public function getRoom()
  {
    return $this->query('SELECT * FROM tb_room ORDER BY status ASC')->getResultArray();
  }

  #mengambil semua data chat
  public function getChat($id_room)
  {
    return $this->query("SELECT * FROM tb_chat WHERE id_room='$id_room'")->getResultArray();
  }

  #menambah data chat
  public function insert_chat($id_room, $id_user, $pesan)
  {
    return $this->query("INSERT INTO tb_chat(id_room, id_user, text_chat) VALUES('$id_room', '$id_user', '$pesan')");
  }

  #update data room
  public function update_room($id_room)
  {
    return $this->query("UPDATE tb_room SET status='0' WHERE id_room='$id_room'");
  }


}
