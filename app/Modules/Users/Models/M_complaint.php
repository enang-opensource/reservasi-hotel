<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_complaint extends Model
{
  protected $table      = 'tb_pengaduan';
  protected $primaryKey = 'id_pengaduan';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['nama_lengkap', 'subject', 'email', 'detail_pengaduan'];

  #insert data kategori
  public function insert_data($data)
  {
    return $this->insert($data);
  }

}
