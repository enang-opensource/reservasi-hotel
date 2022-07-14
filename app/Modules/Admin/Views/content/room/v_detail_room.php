<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-tabs card-header-info">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <h4><b><?= $room->nama_kamar; ?></b></h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active text-center" id="profile">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th><b>Nama Kamar</b></th>
                  <th><b>Kapasitas (Orang)</b></th>
                  <th><b>Harga (Malam)</b></th>
                  <th><b>Kategori</b></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td><b><?= $room->nama_kamar; ?></b></td>
                  <td><b><?= $room->kapasitas; ?>/Orang</b></td>
                  <td><b>Rp.<?= number_format($room->harga); ?>;-</b></td>
                  <td><b><?= $room->jenis_kategori; ?></b></td>
                </tr>
              </tbody>
            </table>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th><b>Detail Kamar</b></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $room->detail_kamar; ?></td>
                </tr>
              </tbody>
            </table>
            <?php foreach ($img as $value): ?>
              <td><img src="<?= base_url('image/'.$value['path']); ?>" alt="" width="250"></td>
            <?php endforeach; ?>

          </div>
          <a href="<?= base_url('admin/room/edit/'.$room->id_kamar); ?>" class="btn btn-info pull-right">Edit Kamar</a>
          <a href="<?= base_url('admin/room/delete/'.$room->id_kamar); ?>" class="btn btn-danger pull-right">Delete Kamar</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
