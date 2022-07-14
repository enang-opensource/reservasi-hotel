<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_users extends Model
{
  protected $table      = 'tb_users';
  protected $primaryKey = 'id_users';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['fname', 'lname', 'email_user', 'password_user', 'nomor_hp', 'roles', 'image_user'];


  #mengambil semua data users
  public function getData($id = null)
  {
    if ($id == null) {
      return $this->select('*')->get()->getResultArray();
    } else {
      return $this->select('*')->where(['id_users' => $id])->get()->getRowArray();
    }
  }

  #melakukan verifikasi login
  public function verifikasi($email, $password)
  {
    return $this->where(['email_user' => $email, 'password_user' => $password])->first();
  }

  #mengambil semua data users
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  public function fillter($id_user)
  {
    return $this->select('*')->where(['id_users' => $id_user])->first();
  }


}
