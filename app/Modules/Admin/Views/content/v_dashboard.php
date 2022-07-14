<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <!-- content starts -->
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-warning card-header-icon">
        <div class="card-icon">
          <i class="material-icons">perm_identity</i>
        </div>
        <p class="card-category">Pengguna</p>
        <h3 class="card-title"><?= $users->users; ?>
          <small>Orang</small>
        </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-warning">perm_identity</i>
          <a class="text-warning" href="<?= base_url('admin/user'); ?>">Pergi ke menu</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">task_alt</i>
        </div>
        <p class="card-category">Transaksi</p>
        <h3 class="card-title"><?= $transaksi->transaksi; ?></h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-success">task_alt</i>
          <a class="text-success" href="<?= base_url('admin/transaction'); ?>">Pergi ke menu</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i class="material-icons">meeting_room</i>
        </div>
        <p class="card-category">Kamar Tersedia</p>
        <h3 class="card-title"><?= $room->room; ?></h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">meeting_room</i>
          <a class="text-danger" href="<?= base_url('admin/room/list'); ?>">Pergi ke menu</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="fa fa-book"></i>
        </div>
        <p class="card-category">Laporan</p>
        <h3 class="card-title">Menu</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-info">book</i>
          <a class="text-info" href="<?= base_url('admin/report/'); ?>">Pergi ke menu</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
