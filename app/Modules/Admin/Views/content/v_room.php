<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title">List Chat Room</h4>
      </div>
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Pengirim</th>
              <th scope="col">Tanggal Buat</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0; ?>
            <?php foreach ($room as $value): ?>
              <tr>
                <th scope="row"><?= $no+=1; ?></th>
                <td><?= $value['nama_room']; ?></td>
                <td><?= date("d F Y", strtotime($value['tanggal_buat'])); ?></td>
                <td>
                  <?php if ($value['status']=='0'): ?>
                    <p class="text-success">Sudah dibaca</p>
                  <?php else: ?>
                    <p class="text-danger">Belum dibaca</p>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?= base_url('admin/chat/room/'.$value['id_room'].'/'.$value['nama_room']); ?>" class="text-white btn btn-info">Balas Chat</a>
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
