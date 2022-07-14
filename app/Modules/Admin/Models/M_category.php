<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class M_category extends Model
{
  protected $table      = 'tb_kategori';
  protected $primaryKey = 'id_kategori';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['jenis_kategori'];

  #mengambil semua data kategori
  public function getData()
  {
    return $this->select(['id_kategori', 'jenis_kategori'])->get()->getResultArray();
  }
  #insert data kategori
  public function insert_data($j_kategori)
  {
    return $this->insert(['jenis_kategori' => $j_kategori]);
  }
  #hapus data kategori
  public function delete_data($id_kategori)
  {
    return $this->delete(['id_kategori' => $id_kategori]);
  }
  #ubah data kategori
  public function update_data($id_kategori, $jenis_kategori)
  {
    return $this->set(['jenis_kategori' => $jenis_kategori])->where('id_kategori', $id_kategori)->update();
  }
  #mencari kategori berdasarkan id
  public function fillter($id_kategori)
  {
    return $this->where(['id_kategori' => $id_kategori])->first();
  }

}
