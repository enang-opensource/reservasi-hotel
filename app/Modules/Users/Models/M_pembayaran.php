<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class M_pembayaran extends Model
{
  protected $table      = 'tb_pembayaran';
  protected $primaryKey = 'id_pembayaran';

  protected $returnType     = 'object';

  // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
  // protected $useSoftDeletes = true;

  // set untuk kolom yang dapat di insert atau diupdate
  protected $allowedFields = ['id_transaksi', 'order_id', 'total_bayar', 'no_virtual', 'bank_transfer', 'tanggal_bayar', 'status'];

  #insert data pembayaran
  public function insert_data($data)
  {
    return $this->insert($data);
  }

  #update data pembayaran
  public function update_data($id, $data)
  {
    return $this->set($data)->where('order_id', $id)->update();
  }

}
