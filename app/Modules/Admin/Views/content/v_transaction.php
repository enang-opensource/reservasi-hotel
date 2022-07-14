<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title">List Transaksi</h4>
      </div>
      <div class="card-body">

        <table class="table text-center">
          <thead>
            <tr>
              <th scope="row"><b>No</b></th>
              <th scope="row"><b>Nama Pemesan</b></th>
              <th scope="row"><b>Nama Kamar</b></th>
              <th scope="row"><b>Tanggal Pakai</b></th>
              <th scope="row"><b>Tanggal Keluar</b></th>
              <th scope="row"><b>Lama Menginap</b></th>
              <th scope="row"><b>Total Bayar</b></th>
              <th scope="row"><b>Tanggal Transaksi</b></th>
              <th scope="row"><b>Aksi</b></th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no = 0; ?>
            <?php foreach ($transaction as $value): ?>
              <?php $h_awal = date_create($value['tanggal_masuk']); ?>
              <?php $h_keluar = date_create($value['tanggal_keluar']); ?>

              <?php $days = date_diff($h_awal, $h_keluar); ?>

              <tr>
                <th scope="row"><?= $no+=1; ?></th>
                <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                <td><?= $value['nama_kamar']; ?></td>
                <td><?= date("d F Y", strtotime($value['tanggal_masuk'])); ?></td>
                <td><?= date("d F Y", strtotime($value['tanggal_keluar'])); ?></td>
                <td><?= $days->d ?>/Hari</td>
                <td>Rp.<?= number_format($value['total_bayar']); ?>;-</td>
                <td><?= date("d F Y", strtotime($value['tanggal_transaksi'])); ?></td>
                <td>
                  <?php if ($value['status']=='0'){ ?>
                    <h5><span class="badge badge-primary">Menunggu</span></h5>
                  <?php }elseif($value['status']=='2'){ ?>
                    <h5><span class="badge badge-danger">Batal</span></h5>
                  <?php } else{ ?>
                    <?php if ($value['status_checkout']=='1'){ ?>
                      <a href="<?= base_url('admin/checkin/'.$value['id_transaksi'].'/false'); ?>" class="btn btn-danger">Checkout</a>
                    <?php } elseif($value['status_checkout']=='0'){ ?>
                      <a href="<?= base_url('admin/checkin/'.$value['id_transaksi'].'/true'); ?>" class="btn btn-success">Checkin</a>
                    <?php } else { ?>
                      <h5><span class="badge badge-success">Telah Checkout</span></h5>
                    <?php  } ?>
                  <?php } ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>
