<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_room extends Model
{
  protected $table      = 'tb_kamar';
  protected $primaryKey = 'id_kamar';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_kategori', 'nama_kamar', 'kapasitas', 'harga', 'detail_kamar', 'status'];

  #mengambil semua data kamar
  public function getData()
  {
    return $this->select(['GROUP_CONCAT(tb_gambar.path) image', 'tb_kamar.nama_kamar', 'tb_kamar.detail_kamar', 'tb_kamar.id_kategori', 'tb_kamar.id_kamar'])->join('tb_gambar', 'tb_gambar.id_kamar = tb_kamar.id_kamar')->groupBy('tb_gambar.id_kamar')->get()->getResultArray();
  }

  #mengambil data kamar
  public function getDataRoom($kapasitas, $tanggal)
  {
    return $this->query('
    SELECT GROUP_CONCAT(img.path) image, kmr.nama_kamar, kmr.detail_kamar, kmr.id_kategori, kmr.id_kamar
    FROM tb_kamar as kmr
    JOIN tb_gambar as img
    ON img.id_kamar=kmr.id_kamar
    WHERE kmr.kapasitas >= "'.$kapasitas.'" AND kmr.id_kamar
    NOT IN (SELECT trn.id_kamar FROM tb_transaksi as trn WHERE DATE(trn.tanggal_masuk)="'.$tanggal.'")
    GROUP BY kmr.id_kamar')->getResultArray();

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
  public function getRoom($id_kamar)
  {
    return $this->select(['GROUP_CONCAT(tb_gambar.path) image', 'tb_kamar.kapasitas', 'tb_kamar.harga', 'tb_kamar.nama_kamar', 'tb_kamar.detail_kamar', 'tb_kamar.id_kategori', 'tb_kamar.id_kamar', 'tb_kategori.jenis_kategori'])
    ->join('tb_gambar', 'tb_gambar.id_kamar = tb_kamar.id_kamar')
    ->join('tb_kategori', 'tb_kategori.id_kategori = tb_kamar.id_kategori')
    ->groupBy('tb_gambar.id_kamar')
    ->where(['tb_kamar.id_kamar' => $id_kamar])
    ->first();
  }

}
