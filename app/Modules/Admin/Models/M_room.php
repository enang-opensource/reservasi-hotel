<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class M_room extends Model
{
  protected $table      = 'tb_kamar';
  protected $primaryKey = 'id_kamar';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_kategori', 'nama_kamar', 'kapasitas', 'harga', 'detail_kamar', 'status_kamar'];

  #mengambil semua data kamar
  public function getData()
  {
    return $this->select(['id_kamar','id_kategori', 'nama_kamar', 'kapasitas', 'harga', 'detail_kamar'])->get()->getResultArray();
  }
  #insert data kamar
  public function insert_data($data)
  {
    return $this->insert($data);
  }
  #hapus data kamar
  public function delete_data($id_kamar)
  {
    return $this->delete(['id_kamar' => $id_kamar]);
  }
  #ubah data kamar
  public function update_data($data, $id_room)
  {
    return $this->set($data)->where('id_kamar', $id_room)->update();
  }
  #mencari kamar berdasarkan id
  public function fillter($id_kamar)
  {
    return $this->where(['id_kamar' => $id_kamar])->join('tb_kategori', 'tb_kategori.id_kategori = tb_kamar.id_kategori')->first();
  }

  #get rows room
  public function getRows()
  {
    return $this->select('COUNT(id_kamar) as room')
    ->first();
  }

}
