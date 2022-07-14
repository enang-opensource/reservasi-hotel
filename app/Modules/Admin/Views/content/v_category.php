<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <div class="col-md-5">
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
        <h4 class="card-title">Form Category</h4>
      </div>
      <div class="card-body">

        <?php if (isset($category_id)): ?> <!-- jika terisi maka edit -->
          <form action="<?= base_url('admin/category/edit'); ?>" method="post">
          <?php else: ?> <!-- jika tidak maka insert -->
            <form action="<?= base_url('admin/category/insert'); ?>" method="post">
            <?php endif; ?>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Jenis Kategori</b></label>
                  <?php if (isset($category_id)): ?>
                    <input type="text" class="form-control" value="<?= $category_id->jenis_kategori; ?>" name="j_kategori">
                    <input type="hidden" name="id" value="<?= $category_id->id_kategori; ?>">
                  <?php else: ?>
                    <input type="text" class="form-control" name="j_kategori">
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-info pull-right">Upload</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">List Kategori</h4>
        </div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Kategori</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0; ?>
              <?php foreach ($category as $value): ?>
                <tr>
                  <th scope="row"><?= $no+=1; ?></th>
                  <td><?= $value['jenis_kategori']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/category/edit/'.$value['id_kategori']); ?>" class="text-white btn btn-info">Edit</a>
                    <a href="<?= base_url('admin/category/delete/'.$value['id_kategori']); ?>" class="text-white btn btn-danger">Hapus</a>
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
