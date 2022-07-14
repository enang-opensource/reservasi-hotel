<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">

  <div class="col-md-3">
    <a href="<?= base_url('admin/room/list'); ?>" class="btn btn-info">Lihat list kamar</a>
  </div>

  <div class="col-md-12">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty(session()->getFlashdata('msg'))) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('msg'); ?>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title">Form Room</h4>
      </div>
      <div class="card-body">

        <?php if (isset($room_id)): ?> <!-- jika terisi maka edit -->
          <form action="<?= base_url('admin/room/edit_proses'); ?>" method="post" enctype="multipart/form-data">
          <?php else: ?> <!-- jika tidak maka insert -->
            <form action="<?= base_url('admin/room/insert'); ?>" method="post" enctype="multipart/form-data">
            <?php endif; ?>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Nama Kamar</b></label>
                  <?php if (isset($room_id)): ?>
                    <input type="text" class="form-control" value="<?= $room_id->nama_kamar; ?>" name="n_kamar">
                    <input type="hidden" name="id" value="<?= $room_id->id_kamar; ?>">
                  <?php else: ?>
                    <input type="text" class="form-control" name="n_kamar">
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Kategori Kamar</b></label>
                  <select class="form-control" name="category_id">
                    <?php foreach ($category as $value): ?>
                      <option value="<?= $value['id_kategori']; ?>"><?= $value['jenis_kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Kapasitas Kamar (Orang)</b></label>
                  <?php if (isset($room_id)): ?>
                    <input type="number" class="form-control" min="1" value="<?= $room_id->kapasitas; ?>" name="k_kamar">
                  <?php else: ?>
                    <input type="number" class="form-control" min="1" name="k_kamar">
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Harga Kamar (Malam)</b></label>
                  <?php if (isset($room_id)): ?>
                    <input type="number" class="form-control" min="1" value="<?= $room_id->harga; ?>" name="h_kamar">
                  <?php else: ?>
                    <input type="number" class="form-control" min="1" name="h_kamar">
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Detail Kamar</b></label>
                  <?php if (isset($room_id)): ?>
                    <textarea class="form-control" name="d_kamar" rows="4" cols="30" value="<?= $room_id->detail_kamar; ?>"><?= $room_id->detail_kamar; ?></textarea>
                  <?php else: ?>
                    <textarea class="form-control" name="d_kamar" rows="4" cols="30"></textarea>
                  <?php endif; ?>
                </div>
              </div>
            </div>


            <label class="bmd-label-floating"><b>Upload Gambar</b></label>
            <?php if (isset($room_id)): ?>
              <input type="file" class="form-control dropify" name="img_kamar[]" data-height="150" multiple><br>
            <?php else: ?>
              <input type="file" class="form-control dropify" name="img_kamar[]" data-height="150" required multiple><br>
            <?php endif; ?>

            <div class="row">
              <?php if (isset($img)): ?>
                <?php foreach ($img as $value): ?>
                  <div class="card col-2 ml-1">
                    <img src="<?= base_url('image/'.$value['path']); ?>" alt="">
                    <a href="<?= base_url('admin/room/image/'.$value['id_gambar'].'/'.$room_id->id_kamar) ?>" class="btn btn-danger">Delete</a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-info pull-right">Upload</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <?= $this->endSection(); ?>
