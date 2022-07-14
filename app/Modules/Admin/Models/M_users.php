<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class M_users extends Model
{
  protected $table      = 'tb_users';
  protected $primaryKey = 'id_user';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['fname', 'lname', 'email_user', 'password_user', 'nomor_hp', 'roles', 'image_user'];


  #mengambil semua data users
  public function getData()
  {
    return $this->select('*')->get()->getResultArray();
  }

  #melakukan verifikasi login
  public function verifikasi($email, $password)
  {
    return $this->where(['email_user' => $email, 'password_user' => $password])->first();
  }

  #get rows users
  public function getRows()
  {
    return $this->select('COUNT(id_users) as users')
    ->first();
  }
}
