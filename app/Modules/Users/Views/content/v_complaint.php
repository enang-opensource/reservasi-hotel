<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<!-- ======= Contact Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Contact</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Contact</li>
      </ol>
    </div>

  </div>
</section><!-- End Contact Section -->

<!-- ======= Contact Section ======= -->
<section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
  <div class="container">

    <div class="row">

      <div class="col-lg-6">

        <div class="row">
          <div class="col-md-12">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Alamat Kami</h3>
              <p>Jl. Prawirotaman 1 No.32, Brontokusuman,
                Kec. Mergangsan, Kota Yogyakarta,
                Daerah Istimewa Yogyakarta 55153
                Indonesia
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>hotel@gmail.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Telephone</h3>
              <p>(0274) 375002</p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">
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
        <form action="<?= base_url('users/complaint/pengaduan'); ?>" method="post">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="nama_lengkap" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="d_pengaduan" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="form-group mt-3 text-center">
            <button class="btn btn-info text-white" type="submit">Kirim Pesan</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
<?= $this->endSection(); ?>
