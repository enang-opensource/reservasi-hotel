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
    <section class="services">

      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
              <h4 class="title"><a href="">Pelayanan</a></h4>
              <p class="description">Nikmati akses 24 Jam dan pelayanan ekstra non-stop untuk anda yang sedang berpergian di yogyakarta.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="fa fa-wifi"></i></div>
              <h4 class="title"><a href="">Wifi</a></h4>
              <p class="description">Akses internet cepat untuk mengabadikan moment wisata anda di sosial media.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="fa fa-shower"></i></div>
              <h4 class="title"><a href="">Air Hangat</a></h4>
              <p class="description">Segarkan tubuh anda yang lelah dengan air hangat yang menyegarkan.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="fa fa-users"></i></div>
              <h4 class="title"><a href="">Ruang Keluarga</a></h4>
              <p class="description">Nikmati satu ruangan dengan semua keluarga anda dengan fasilitas seperti dirumah.</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Services Section -->
  </section><!-- End Team Section -->
  <?= $this->endSection(); ?>
