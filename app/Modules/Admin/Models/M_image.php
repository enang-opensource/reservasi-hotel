<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class M_image extends Model
{
  protected $table      = 'tb_gambar';
  protected $primaryKey = 'id_gambar';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_kamar', 'path'];

  #mengambil semua data kategori
  public function getData($id_room)
  {
    return $this->where(['id_kamar' => $id_room])->get()->getResultArray();
  }
  #insert data kategori
  public function upload($data)
  {
    return $this->insert($data);
  }
  #hapus data kategori
  public function delete_data($id_image)
  {
    return $this->delete(['id_gambar' => $id_image]);
  }

  #mencari gambar berdasarkan id
  public function fillter($id_image)
  {
    return $this->where(['id_gambar' => $id_image])->first();
  }
}
