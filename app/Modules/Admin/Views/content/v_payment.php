<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title">Laporan Pembayaran</h4>
      </div>
      <div class="card-body">

        <table class="table text-center">
          <thead>
            <tr>
              <th scope="row"><b>No</b></th>
              <th scope="row"><b>Nama User</b></th>
              <th scope="row"><b>Nama Kamar</b></th>
              <th scope="row"><b>Tanggal Transaksi</b></th>
              <th scope="row"><b>Tanggal Bayar</b></th>
              <th scope="row"><b>Bank Transfer</b></th>
              <th scope="row"><b>Total Bayar</b></th>
              <th scope="row"><b>Status</b></th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no = 0; ?>
            <?php foreach ($payment as $value): ?>
              <tr>
                <th scope="row"><?= $no+=1; ?></th>
                <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                <td><?= $value['nama_kamar']; ?></td>
                <td><?= date("d F Y", strtotime( $value['tanggal_transaksi'])); ?></td>
                <td><?= date("d F Y", strtotime($value['tanggal_bayar'])); ?></td>
                <td>Rp.<?= number_format($value['total_bayar']); ?>;-</td>
                <td><?= $value['bank_transfer']; ?></td>
                <td>
                  <?php if ($value['status']=='0'){ ?>
                    <h5><span class="badge badge-primary">Menunggu</span></h5>
                  <?php }elseif($value['status']=='2'){ ?>
                    <h5><span class="badge badge-danger">Batal</span></h5>
                  <?php } else{ ?>
                    <h5><span class="badge badge-success">Terbayar</span></h5>
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
