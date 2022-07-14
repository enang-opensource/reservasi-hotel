<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('admins/assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('admins/assets/img/favicon.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $title; ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url('admins/assets/css/material-dashboard.css?v=2.1.2'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('admins/assets/demo/demo.css'); ?>" rel="stylesheet" />
  <!-- dropify -->
  <link href="<?= base_url('admins/dropify/css/dropify.min.css'); ?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <!-- ########################################### -->
    <!-- sidebar -->
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <div class="logo"><a href="<?= base_url('admin/dashboard'); ?>" class="simple-text logo-normal">
        Admin resevasi
      </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($menu=='dashboard'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='room'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/room'); ?>">
              <i class="material-icons">meeting_room</i>
              <p>Master Kamar</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='transaction'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/transaction'); ?>">
              <i class="material-icons">date_range</i>
              <p>Pemesanan</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='chat'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/chat'); ?>">
              <i class="material-icons">chat</i>
              <p>Chat</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='payment'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/payment'); ?>">
              <i class="material-icons">payment</i>
              <p>Pembayaran</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='category'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/category'); ?>">
              <i class="material-icons">category</i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='report'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/report'); ?>">
              <i class="material-icons">book</i>
              <p>Laporan</p>
            </a>
          </li>
          <li class="nav-item <?php if($menu=='users'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?= base_url('admin/user'); ?>">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- sidebar end -->
    <!-- ########################################### -->
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?= $title; ?></a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- ########################################### -->
      <div class="content">
        <div class="container-fluid">
          <!-- start content -->
          <?= $this->renderSection('content'); ?>
          <!-- end content -->
        </div>
      </div>
      <!-- ########################################### -->
      <!-- footer -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
            document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">M Dhifta
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- ########################################### -->
    <!--   Core JS Files   -->
    <script src="<?= base_url('admins/assets/js/core/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('admins/assets/js/core/popper.min.js'); ?>"></script>
    <script src="<?= base_url('admins/assets/js/core/bootstrap-material-design.min.js'); ?>"></script>
    <script src="<?= base_url('admins/assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <!-- Plugin for the momentJs  -->
    <script src="<?= base_url('admins/assets/js/plugins/moment.min.js'); ?>"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="<?= base_url('admins/assets/js/plugins/sweetalert2.js'); ?>"></script>
    <!-- Forms Validations Plugin -->
    <script src="<?= base_url('admins/assets/js/plugins/jquery.validate.min.js'); ?>"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="<?= base_url('admins/assets/js/plugins/jquery.bootstrap-wizard.js'); ?>"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?= base_url('admins/assets/js/plugins/bootstrap-selectpicker.js'); ?>"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="<?= base_url('admins/assets/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="<?= base_url('admins/assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="<?= base_url('admins/assets/js/plugins/bootstrap-tagsinput.js'); ?>"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?= base_url('admins/assets/js/plugins/jasny-bootstrap.min.js'); ?>"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="<?= base_url('admins/assets/js/plugins/fullcalendar.min.js'); ?>"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="<?= base_url('admins/assets/js/plugins/jquery-jvectormap.js'); ?>"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?= base_url('admins/assets/js/plugins/nouislider.min.js'); ?>"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?= base_url('admins/assets/js/plugins/arrive.min.js'); ?>"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="<?= base_url('admins/assets/js/plugins/chartist.min.js'); ?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url('admins/assets/js/plugins/bootstrap-notify.js'); ?>"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('admins/assets/js/material-dashboard.js?v=2.1.2'); ?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?= base_url('admins/assets/demo/demo.js'); ?>"></script>
    <!-- dropify -->
    <script src="<?= base_url('admins/dropify/js/dropify.min.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.dropify').dropify({
        messages: {
          default: 'Drag atau drop untuk memilih gambar',
          replace: 'Ganti',
          remove:  'Hapus',
          error:   'error'
        }
      });
    });

  </script>
</body>

</html>
