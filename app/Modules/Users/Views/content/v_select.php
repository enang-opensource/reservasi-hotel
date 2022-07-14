<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>

<section id="hero-kamar" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    <div class="container">
      <div class="row" >
        <div class="col-6">
          <!-- Slide 3 -->
          <div class="carousel-item active">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">Tata Cara Pemesanan</h2>
              <p class="animate__animated animate__fadeInUp">Daftarkan diri anda lalu masuk sebagai users di website Hotel Guest House dan pilih waktu juga kamar yang anda inginkan, kemudian bayarkan pemesanan anda melalui bank.</p>
              <a data-toggle="modal" data-target="#register" class="btn-get-started animate__animated animate__fadeInUp">Daftar</a>
            </div>
          </div>

        </div>

        <div class="col-6">

          <div class="carousel-item active">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">Pesan Kamar anda!</h2>
              <form action="<?= base_url('users/room/list'); ?>" method="post">
                <p class="animate__animated animate__fadeInUp">
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime(date('Y-m-d') . "+29 days")); ?>" name="tgl_msk">
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="date" class="form-control" min="<?= date('Y-m-d', strtotime(date('Y-m-d') . "+1 days")); ?>" max="<?= date('Y-m-d', strtotime(date('Y-m-d') . "+30 days")); ?>" value="<?= date('Y-m-d', strtotime(date('Y-m-d') . "+1 days")); ?>" name="tgl_klr">
                  </div>
                  <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" name="kapasitas">
                      <option value="1">1 orang</option>
                      <option value="2" selected>2 orang</option>
                      <option value="3">3 orang</option>
                      <option value="4">4 orang</option>
                      <option value="5">5 orang</option>
                      <option value="6">6 orang</option>
                      <option value="7">7 orang</option>
                      <option value="8">8 orang</option>
                    </select>
                  </div>
                </p>
                <button type="submit" class="btn btn-primary-outline btn-get-started animate__animated animate__fadeInUp">Cari Kamar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<?= $this->endSection(); ?>
