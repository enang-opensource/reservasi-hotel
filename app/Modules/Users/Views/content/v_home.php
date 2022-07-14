<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Hotel Guest House</span></h2>
        <p class="animate__animated animate__fadeInUp">Permudah pemesanan penginapan anda secara online dimanapun kamu berada melalui website resmi Hotel Guest House.</p>
        <a href="<?= base_url('users/room'); ?>" class="btn-get-started animate__animated animate__fadeInUp">Cari Kamar</a>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">Tentang Kami</h2>
        <p class="animate__animated animate__fadeInUp">Hotel Guest House adalah sebuah penginapan yang berada di yogyakarta, tempat singgah sementara yang sangat nyaman.</p>
        <a href="<?= base_url('users/about'); ?>" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">Tata Cara Pemesanan</h2>
        <p class="animate__animated animate__fadeInUp">Daftarkan diri anda lalu masuk sebagai users di website Hotel Guest House dan pilih waktu juga kamar yang anda inginkan, kemudian bayarkan pemesanan anda melalui bank.</p>
        <a data-toggle="modal" data-target="#register" class="btn-get-started animate__animated animate__fadeInUp">Daftar</a>
      </div>
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

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

<!-- ======= Why Us Section ======= -->
<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
  <div class="container">

    <div class="row">
      <div class="col-lg-6 video-box">
        <img src="assets/img/why-us.jpeg" class="img-fluid" alt="">
        <a href="https://www.youtube.com/watch?v=KrK0_Hd2nKI" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

        <div class="icon-box">
          <div class="icon"><i class="fa fa-star"></i></div>
          <h4 class="title"><a href="">Terpercaya</a></h4>
          <p class="description">Hotel Guest House telah dipercaya banyak orang atas pelayananya.</p>
        </div>

        <div class="icon-box">
          <div class="icon"><i class="fa fa-gift"></i></div>
          <h4 class="title"><a href="">Termurah</a></h4>
          <p class="description">Harga yang terjangkau dengan pelayanan yang istimewa.</p>
        </div>

      </div>
    </div>

  </div>
</section><!-- End Why Us Section -->

<!-- ======= Features Section ======= -->
<section class="features">
  <div class="container">

    <div class="section-title">
      <h2>Wisata Kaliurang</h2>
      <p>Jelajahi wisata kaliurang dimulai dari Hotel Guest House</p>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5">
        <img src="assets/img/museum.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-md-7 pt-4">
        <h3>Ullen Sentalu Museum</h3>
        <p class="fst-italic">
          Salah satu museum terbaik yang ada di Indonesia adalah Ullen Sentalu Museum. Museum ini tepatnya berlokasi di daerah Kaliurang, provinsi Yogyakarta. Uniknya, museum ini tidak terletak di tengah-tengah kota, melainkan di lereng Gunung Merapi.
          Tempatnya pun tergolong tersembunyi dari hiruk pikuk peradaban.
        </p>
        <p>Museum Ullen Sentalu ini merupakan museum di Jogja yang dikelola oleh Yayasan Ulating Blencong. Ullen Sentalu Museum memiliki bernama panjang museum ulating blencong sejatine tataraning lumaku.
          Artinya adalah lampu blencong yang cahayanya menjadi sebuah penerangan bagi manusia dalam meniti langkah kehidupan masing-masing.
        </p>
        <p>Wisatawan domestik usia dewasa dikenai tarif tiket masuk seharga 40 ribu rupiah/orang, sementara anak-anak berusia 5 - 12 tahun cukup membayar 20 ribu rupiah/orang.
          Sedangkan, setiap orang wisatawan mancanegara membayar 100 ribu rupiah, sementara usia anak-anak 60 ribu rupiah.</p>
      </div>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5 order-1 order-md-2">
        <img src="assets/img/castel.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-md-7 pt-5 order-2 order-md-1">
        <h3>The Lost World Castle</h3>
        <p class="fst-italic">
          Sekilas nama The Lost World Castle terkesan menyeramkan, namun nama ini dipilih memang bukan tanpa alasan.
          Kata Castle diambil karena arsitektur bangunan yang unik menyerupai bentuk bangunan Benteng Takeshi di salah satu variety show Jepang yang pernah terkenal di Indonesia.
          Sedangkan kata Lost World dipilih karena tempat wisata ini dibangun di atas lokasi sebuah desa yang sudah hilang tersapu lahar letusan Gunung Merapi. Desa tersebut bernama Desa Kuharjo.
        </p>
        <p>
          Tepatnya berlokasi di Dusun Petung, Kepuharjo, Cangkringan, Sleman , Yogyakarta berjarak kurang lebih 29 km dari pusat kota. Dari pusat kota kamu bisa berjalan menuju ke arah Jalan Kaliurang,
          ikuti terus jalan ke arah Gunung Merapi hingga menemukan petunjuk arah untuk menuju Kaliadem.
        </p>
      </div>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5">
        <img src="assets/img/tebing.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-md-7 pt-5">
        <h3>Stonehenge Cangkringan</h3>
        <p>Mendengar nama Stonehenge tentu pikiran Teman Traveler langsung tertuju ke tempat wisata bersejarah kebanggaan Inggris dan Britania Raya.
          Nah, Stonehenge Cangkringan sendiri memang sengaja mengadopsi struktur unik yang ada di Negeri Ratu Elizabeth tersebut.
        </p>
        <p>Dari segi bentuk terlihat sangat mirip. Sulit dibedakan dengan aslinya, kecuali oleh mereka yang sudah ahli.
          Bedanya, Stonehenge Inggris berada di sekitar padang rumput luas, sementara Stonehenge Cangkringan terletak di kaki Gunung Merapi.
        </p>
      </div>
    </div>

    <div class="row" data-aos="fade-up">
      <div class="col-md-5 order-1 order-md-2">
        <img src="assets/img/telaga.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-md-7 pt-5 order-2 order-md-1">
        <h3>TLOGO PUTRI</h3>
        <p class="fst-italic">
          Tlogo Putri merupakan objek wisata yang terletak di kawasan Kalurang, Kabupaten Sleman, Yogyakarta.
          Tlogo Putri menawarkan pesona pemandangan alam di ketinggian kurang lebih 900 mdpl.
        </p>
        <p>
          Disini juga terdapat embung yang menjadikannya spot utama dan juga dilengkapi dengan pepohonan yang rimbun sehingga menghasilkan kesan yang adem dan asri.
        </p>
        <p>Kalian bisa menikmati wahana air di embung tersebut seperti kano dan bebek sepeda kayuh. Di tepian embungnya bisa menjadi tempat duduk-duduk santai.
        </p>
      </div>
    </div>

  </div>
</section><!-- End Features Section -->
  <?= $this->endSection(); ?>
