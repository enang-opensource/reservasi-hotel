<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<!-- ======= About Us Section ======= -->
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
</section><!-- End About Us Section -->

<!-- ======= About Section ======= -->
<section class="about" data-aos="fade-up">
  <div class="container">

    <div class="row">
      <div class="col-lg-6">
        <img src="<?= base_url('assets/img/why-us.jpeg'); ?>" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <h3>Hotel Guest Homestay</h3>
        <p class="fst-italic">
          Hotel Guest House adalah sebuah badan usaha dibidang akomodasi yang berada di Jl. Prawirotaman 1 No.32, Brontokusuman, Kec. Mergangsan, Kota Yogyakarta. Sampai saat ini penginapan Hotel Guest House Homestay ini berkembang sangat pesat banyak pariwisatawan dari luar daerah hingga mancanegara yang berlibur ke Yogyakarta dan menginap di homestay tersebut.
        </p>
        <ul>
          <li><i class="bi bi-check2-circle"></i> Pelayanan 24 Jam.</li>
          <li><i class="bi bi-check2-circle"></i> Kamar keluarga 5-7 orang.</li>
          <li><i class="bi bi-check2-circle"></i> Pemandian air hangat dan juga spot foto menarik.</li>
          <li><i class="bi bi-check2-circle"></i> Akses internet cepat di Yogyakarta.</li>
        </ul>
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= Tetstimonials Section ======= -->
<section class="testimonials" data-aos="fade-up">
  <div class="container">

    <div class="section-title">
      <h2>Alamat Hotel Guest House</h2>
      <p><b>Jl. Prawirotaman 1 No.32, Brontokusuman, Kec. Mergangsan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55153</b></p>
      <br>
      <div class="testimonials-carousel swiper">
        <div class="swiper-wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.720584358413!2d110.36950851477837!3d-7.819371694365468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57a3d03b8741%3A0x2c896c5bc9a418b2!2sParikesit%20Hotel!5e0!3m2!1sen!2sid!4v1636255998808!5m2!1sen!2sid" width="1500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Ttstimonials Section -->

  <?= $this->endSection(); ?>
