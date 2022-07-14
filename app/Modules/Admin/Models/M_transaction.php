<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class M_transaction extends Model
{
  protected $table      = 'tb_transaksi';
  protected $primaryKey = 'id_transaksi';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_users', 'id_kamar', 'tanggal_masuk', 'tanggal_keluar', 'total_bayar', 'harga_kamar', 'tanggal_transaksi', 'status_checkout'];

  #mengambil semua data transaksi
  public function getData()
  {
    return $this->select('*')
    ->join('tb_pembayaran', 'tb_transaksi.id_transaksi = tb_pembayaran.id_transaksi')
    ->join('tb_kamar', 'tb_kamar.id_kamar = tb_transaksi.id_kamar')
    ->join('tb_users', 'tb_users.id_users = tb_transaksi.id_user')
    ->get()
    ->getResultArray();
  }

  #ubah data transaksi
  public function update_data($id_kategori, $jenis_kategori)
  {
    return $this->set(['jenis_kategori' => $jenis_kategori])->where('id_kategori', $id_kategori)->update();
  }

  public function getReport()
  {
    return $this->select('*')
    ->join('tb_pembayaran', 'tb_transaksi.id_transaksi = tb_pembayaran.id_transaksi')
    ->join('tb_kamar', 'tb_kamar.id_kamar = tb_transaksi.id_kamar')
    ->join('tb_users', 'tb_users.id_users = tb_transaksi.id_user')
    ->where(['tb_pembayaran.status' => '1'])
    ->get()
    ->getResultArray();
  }

  #get rows transaksi
  public function getRows()
  {
    return $this->select('COUNT(id_transaksi) as transaksi')
    ->first();
  }

  #ubah data transaksi
  public function updateTransaksi($id, $data)
  {
    return $this->set($data)->where('id_transaksi', $id)->update();
  }

}
