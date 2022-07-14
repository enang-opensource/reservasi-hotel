<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class M_payment extends Model
{
  protected $table      = 'tb_pembayaran';
  protected $primaryKey = 'id_pembayaran';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_transaksi', 'total_bayar', 'no_virtual', 'bank_transfer', 'tanggal_bayar', 'status'];

  #mengambil semua data kategori
  public function getData()
  {
    return $this->select('*')
    ->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_pembayaran.id_transaksi')
    ->join('tb_kamar', 'tb_kamar.id_kamar = tb_transaksi.id_kamar')
    ->join('tb_users', 'tb_users.id_users = tb_transaksi.id_user')
    ->get()
    ->getResultArray();
  }

}
