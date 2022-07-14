<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_transaksi extends Model
{
  protected $table      = 'tb_transaksi';
  protected $primaryKey = 'id_transaksi';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_user', 'id_kamar', 'tanggal_masuk', 'tanggal_keluar', 'total_bayar', 'harga_kamar','tanggal_transaksi'];

  #insert data transaksi
  public function getData($id_user)
  {
    return $this->select('*')
    ->where(['tb_transaksi.id_user' => $id_user])
    ->join('tb_pembayaran', 'tb_transaksi.id_transaksi = tb_pembayaran.id_transaksi')
    ->join('tb_kamar', 'tb_kamar.id_kamar = tb_transaksi.id_kamar')
    ->join('tb_users', 'tb_users.id_users = tb_transaksi.id_user')
    ->get()
    ->getResultArray();
  }

  #insert data transaksi
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  #insert data transaksi
  public function getInvoice($id)
  {
    return $this->select('*')
    ->where(['tb_transaksi.id_transaksi' => $id])
    ->join('tb_pembayaran', 'tb_transaksi.id_transaksi = tb_pembayaran.id_transaksi')
    ->join('tb_kamar', 'tb_kamar.id_kamar = tb_transaksi.id_kamar')
    ->join('tb_users', 'tb_users.id_users = tb_transaksi.id_user')
    ->get()
    ->getRowArray();
  }

}
