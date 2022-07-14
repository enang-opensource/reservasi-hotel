<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?= base_url('assets/vendor/animate.css/animate.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

  <!-- midtrans -->
  <script type="text/javascript"
  src="https://app.midtrans.com/snap/snap.js"
  data-client-key="Mid-client-qFxq1TJut4y6_LWL"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- =======================================================
  * Template Name: Moderna - v4.5.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- starts content navbar -->
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="<?= base_url('users'); ?>"><span>Hotel Guest House</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if (session()->get('id_user')===null): ?>
            <li><a class="<?php if($menu=='home'){ echo 'active'; } ?>" href="<?= base_url('/'); ?>">Home</a></li>
          <?php endif; ?>
          <li><a class="<?php if($menu=='room'){ echo 'active'; } ?>" href="<?= base_url('users/room'); ?>">Kamar</a></li>
          <?php if (session()->get('id_user')===null): ?>
            <li><a class="<?php if($menu=='about'){ echo 'active'; } ?>" href="<?= base_url('users/about'); ?>">Tentang</a></li>
          <?php else: ?>
            <li><a class="<?php if($menu=='transaction'){ echo 'active'; } ?>" href="<?= base_url('users/transaction'); ?>">Transaksi</a></li>
            <li><a class="<?php if($menu=='payment'){ echo 'active'; } ?>" href="<?= base_url('users/payment'); ?>">Pembayaran</a></li>
            <li><a class="<?php if($menu=='chat'){ echo 'active'; } ?>" href="<?= base_url('users/chat'); ?>">Chat</a></li>
          <?php endif; ?>
          <?php if (session()->get('id_user')!==null): ?>
            <li><a class="text-white <?php if($menu=='login'){ echo 'active'; } ?>" data-toggle="modal" data-target="#logout">Logout</a></li>
          <?php else: ?>
            <li><a class="<?php if($menu=='fasilitas'){ echo 'active'; } ?>" href="<?= base_url('users/fasilitas'); ?>">Fasilitas</a></li>
            <li><a class="<?php if($menu=='report'){ echo 'active'; } ?>" href="<?= base_url('users/complaint'); ?>">Pengaduan</a></li>
            <li><a class="text-white <?php if($menu=='login'){ echo 'active'; } ?>" data-toggle="modal" data-target="#login">Login</a></li>
            <li><a class="text-white <?php if($menu=='register'){ echo 'active'; } ?>" data-toggle="modal" data-target="#register">Register</a></li>
          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- end content navbar -->

  <!-- content -->
  <main id="main">

    <?= $this->renderSection('content'); ?>

    <!-- mymodal -->
    <!-- Modal Register-->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('users/register'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Depan</label>
                <input type="text" class="form-control" name="fname" placeholder="Nama Depan" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Belakang</label>
                <input type="text" class="form-control" name="lname" placeholder="Nama Belakang">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nomor Hp</label>
                <input type="number" class="form-control" min="0" name="nohp" placeholder="Nomor Hp" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal register -->

    <!-- Modal Login-->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('users/login'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal login -->

    <!-- Modal Login-->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('users/logout'); ?>" method="post">
            <div class="modal-body">
              <h4>Apakah anda yakin ingin logout?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-success">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal login -->
    <!-- end mymodal -->
  </main>
  <!-- End content #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('/'); ?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('users/room'); ?>">Kamar</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('users/fasilitas'); ?>">Fasilitas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('users/about'); ?>">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('users/complaint'); ?>">Pengaduan</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Air hangat</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Makan pagi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Makan siang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Makan malam</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Spot Foto</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. Prawirotaman 1 No.32, Brontokusuman, <br>Kec. Mergangsan, Kota Yogyakarta,
              <br>Daerah Istimewa Yogyakarta 55153<br>
              Indonesia<br><br>
              <strong>Phone:</strong> (0274) 375002<br>
              <strong>Email:</strong> penginapan@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Penginapan Guest House</h3>
            <p>Penginapan Guest House adalah sebuah badan usaha dibidang akomodasi yang berada di Jl. Prawirotaman 1 No.32, Brontokusuman,
              Kec. Mergangsan, Kota Yogyakarta. Sampai saat ini penginapan Penginapan Guest House Homestay ini berkembang sangat pesat banyak pariwisatawan dari luar daerah hingga mancanegara yang berlibur ke Yogyakarta dan menginap di homestay tersebut.</p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Penginapan Hotel</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
      </div>
    </footer>

    <!-- End Footer -->
    <?php if (!empty(session()->getFlashdata('auth-success'))) : ?>
      <script type="text/javascript">
      alert('<?= session()->getFlashdata('auth-success'); ?>');
      </script>
    <?php endif; ?>

    <?php if (!empty(session()->getFlashdata('auth-failed'))) : ?>
      <script type="text/javascript">
      alert('<?= session()->getFlashdata('auth-failed'); ?>');
      </script>
    <?php endif; ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- midtrans -->
    <script type="text/javascript">
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      // data transaksi
      var id_kamar = $("#id_kamar").val();
      var id_user = $("#id_user").val();
      var harga = $("#harga").val();
      var tanggal_awal = $("#tanggal_awal").val()
      var tanggal_akhir = $("#tanggal_akhir").val();
      var nama_kamar = $("#nama_kamar").val();

      // data pembeli
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var email = $("#email").val();
      var telephone = $("#telp").val();

      $.ajax({
        url: '<?=site_url()?>users/midtrans',
        data:{
          nama_kamar:nama_kamar,
          id_kamar:id_kamar,
          id_user:id_user,
          harga:harga,
          tanggal_awal:tanggal_awal,
          tanggal_akhir:tanggal_akhir,
          fname:fname,
          lname:lname,
          email:email,
          telephone:telephone
        },
        cache: false,

        success: function(data) {
          //location = data;

          console.log('token = '+data);

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }

          snap.pay(data, {

            onSuccess: function(result){
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function(result){
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function(result){
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
    });
    </script>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/vendor/aos/aos.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/purecounter/purecounter.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/waypoints/noframework.waypoints.js'); ?>"></script>
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

  </body>

  </html>
