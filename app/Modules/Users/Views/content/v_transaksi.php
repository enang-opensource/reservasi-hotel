<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<!-- ======= Our Team Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2><?= $title; ?></h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li><?= $title; ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Our Team Section -->

<!-- ======= Team Section ======= -->
<section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <!-- ======= Services Section ======= -->

  <div class="container">
    <div class="row">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Kamar</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Tanggal Keluar</th>
            <th scope="col">Total Bayar</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          <?php foreach ($transaksi as $value): ?>
            <tr>
              <th scope="row"><?= $no+=1; ?></th>
              <td><?= $value['nama_kamar']; ?></td>
              <td><?= date('d F Y', strtotime($value['tanggal_masuk'])); ?></td>
              <td><?= date('d F Y', strtotime($value['tanggal_keluar'])); ?></td>
              <td>Rp. <?= number_format($value['total_bayar']); ?>;-</td>
              <td><?= date('d F Y', strtotime($value['tanggal_transaksi'])); ?></td>
              <?php if ($value['status']=='1'): ?>
                <td><a class="btn btn-info text-white" href="<?= base_url('users/invoice/'.$value['id_transaksi']) ?>" target="_blank">Cetak</a></td>
              <?php else: ?>
                <td><h5><span class="badge badge-danger">Belum Bayar</span></h5></td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>
</section><!-- End Team Section -->
<?= $this->endSection(); ?>
