<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">Laporan Transaksi</h4>
        </div>
        <div class="card-body">

          <table class="table text-center">
            <thead>
              <tr>
                <th scope="row"><b>No</b></th>
                <th scope="row"><b>Nama User</b></th>
                <th scope="row"><b>Nama Kamar</b></th>
                <th scope="row"><b>Tanggal Pakai</b></th>
                <th scope="row"><b>Tanggal Keluar</b></th>
                <th scope="row"><b>Lama Menginap</b></th>
                <th scope="row"><b>Total Bayar</b></th>
                <th scope="row"><b>Tanggal Bayar</b></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php $no = 0; ?>
              <?php foreach ($report as $value): ?>
                <?php $h_awal = date_create($value['tanggal_masuk']); ?>
                <?php $h_keluar = date_create($value['tanggal_keluar']); ?>

                <?php $days = date_diff($h_awal, $h_keluar); ?>

                <tr>
                  <th scope="row"><?= $no+=1; ?></th>
                  <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                  <td><?= $value['nama_kamar']; ?></td>
                  <td><?= date('d F Y', strtotime($value['tanggal_masuk'])); ?></td>
                  <td><?= date('d F Y', strtotime($value['tanggal_keluar'])); ?></td>
                  <td><?= $days->d; ?>/Hari</td>
                  <td>Rp. <?= number_format($value['total_bayar']); ?>;-</td>
                  <td><?= date('d F Y', strtotime($value['tanggal_transaksi'])); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>

  </div>
  <?= $this->endSection(); ?>
