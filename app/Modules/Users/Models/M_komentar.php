<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_komentar extends Model
{
  protected $table      = 'tb_komentar';
  protected $primaryKey = 'id_komentar';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_user', 'id_kamar', 'text_komentar', 'tanggal_komentar'];


  #mengambil semua data komentar
  public function getData($id_room)
  {
    return $this->select(['tb_users.fname', 'tb_users.lname', 'tb_komentar.tanggal_komentar', 'tb_komentar.text_komentar'])
    ->join('tb_users', 'tb_users.id_users = tb_komentar.id_user')
    ->where(['tb_komentar.id_kamar' => $id_room])
    ->get()
    ->getResultArray();
  }

  public function getRows($id_room)
  {
    return $this->select('COUNT(tb_komentar.id_komentar) as total')
    ->join('tb_users', 'tb_users.id_users = tb_komentar.id_user')
    ->where(['tb_komentar.id_kamar' => $id_room])
    ->first();
  }


  #memasukan semua data komentar
  public function insert_data($data)
  {
    return $this->insert($data);
  }

}
