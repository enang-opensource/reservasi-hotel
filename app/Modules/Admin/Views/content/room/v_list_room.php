<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
  <div class="col-lg-12 col-md-12">
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
      <div class="card-header card-header-tabs card-header-info">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <h4>List Kamar</h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active text-center justify-content-center" id="profile">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Kamar</th>
                  <th scope="col">Kapasitas (Orang)</th>
                  <th scope="col">Harga (Malam)</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0; ?>
                <?php foreach ($room as $value): ?>
                  <tr>
                    <td><?= $no+=1; ?></td>
                    <td><b><?= $value['nama_kamar']; ?></b></td>
                    <td><?= $value['kapasitas']; ?>/Orang</td>
                    <td>Rp. <?= number_format($value['harga']); ?>;-</td>
                    <td class="td-actions text-right">
                      <a href="<?= base_url('admin/room/edit/'.$value['id_kamar']); ?>" rel="tooltip" title="Edit" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="<?= base_url('admin/room/delete/'.$value['id_kamar']); ?>" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </a>
                      <a href="<?= base_url('admin/room/detail/'.$value['id_kamar']); ?>" rel="tooltip" title="Lihat" class="btn btn-info btn-link btn-sm">
                        <i class="material-icons">visibility</i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
