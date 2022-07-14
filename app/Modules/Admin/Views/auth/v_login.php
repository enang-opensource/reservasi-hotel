<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
</head>

<body>

  <div class="row justify-content-center">
    <div style="margin-top:150px;">

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
        <div class="card-header card-header-info text-center">
          <h4 class="card-title">Login Admin</h4>
          <p class="card-category">Silakan lengkapi data dibawah ini</p>
        </div>
        <div class="card-body">
          <!-- form login -->
          <form action="<?= base_url('admin/login/verifikasi'); ?>" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Email</b></label>
                  <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating"><b>Password</b></label>
                  <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
              </div>
            </div>
            <!-- end form -->
          </div>
          <div class="row justify-content-center">
            <button type="submit" class="btn btn-info">Login</button>
          </div>
        </form>
      </div>

    </div>
  </div>

</body>

</html>
