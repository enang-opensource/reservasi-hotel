<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-info">
          <h4 class="card-title">List Users</h4>
        </div>
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th scope="row"><b>No</b></th>
                <th scope="row"><b>Nama User</b></th>
                <th scope="row"><b>Email</b></th>
                <th scope="row"><b>Nomor</b></th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0; ?>
              <?php foreach ($users as $value): ?>
                <tr>
                  <th scope="row"><?= $no+=1; ?></th>
                  <td><?= $value['fname']; ?> <?= $value['lname']; ?></td>
                  <td><?= $value['email_user']; ?></td>
                  <td><?= $value['nomor_hp']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>

  </div>
  <?= $this->endSection(); ?>
