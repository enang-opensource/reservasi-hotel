<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<!-- ======= Blog Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2><?= $title; ?></h2>

      <ol>
        <li><a href="index.html">Home</a></li>
        <li><a href="blog.html">Kamar</a></li>
        <li><?= $title; ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Blog Section -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-8 entries">
        <article class="entry entry-single">
          <div class="entry-img">
            <?php $path = explode(",", $room->image); ?>
            <a href="<?= base_url('image/'.$path[0]); ?>" class="portfolio-lightbox">
              <img src="<?= base_url('image/'.$path[0]); ?>">
            </a>
          </div>

          <h2 class="entry-title">
            <a href="#"><?= $room->nama_kamar; ?></a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-tags"></i> <a href="<?= base_url('users/room/'); ?>"><?= $room->jenis_kategori; ?></a></li>
              <li class="d-flex align-items-center"><i class="fa fa-money"></i> <a href="<?= base_url('users/room/'); ?>">Rp. <?= number_format($room->harga); ?>;-/malam</a></li>
              <li class="d-flex align-items-center"><i class="fa fa-users"></i> <a href="<?= base_url('users/room/'); ?>"><?= $room->kapasitas; ?>/orang</a></li>
            </ul>
          </div>

          <div class="entry-content">
            <p>
              <?= $room->detail_kamar; ?>
            </p>
          </div>

          <div class="col-lg-12 col-md-12 portfolio-wrap">
            <div class="portfolio-item">
              <div class="portfolio-info">
                <div>
                  <?php foreach ($path as $img): ?>
                    <a href="<?= base_url('image/'.$img); ?>" class="portfolio-lightbox"></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </article><!-- End blog entry -->

        <div class="blog-comments">

          <h4 class="comments-count"><?= $rows->total; ?> Comments</h4>
          <?php foreach ($komentar as $value): ?>
            <div id="<?= 'comment-'.$value['fname']; ?>" class="comment">
              <div class="d-flex">
                <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
                <div>
                  <h5><a href=""><?= $value['fname']; ?> <?= $value['lname']; ?></a></h5>
                  <time datetime="2020-01-01"><?= date('d/F/Y', strtotime($value['tanggal_komentar'])) ?></time>
                  <p>
                    <?= $value['text_komentar']; ?>
                  </p>
                </div>
              </div>
            </div><!-- End comment #4 -->
          <?php endforeach; ?>

          <div class="reply-form">
            <h4>Berikan Komentar</h4>
            <p>Tulis komentar anda, supaya kami bisa memberikan pelayanan lebih baik lagi!</p>
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
            <form action="<?= base_url('users/komentar'); ?>" method="post">
              <div class="row">
                <div class="col form-group">
                  <input type="hidden" name="id" value="<?= $room->id_kamar; ?>">
                  <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                </div>
              </div>
              <?php if (session()->get('id_user')!==null): ?>
                <button type="submit" class="btn btn-primary">Kirim</button>
              <?php else: ?>
                <a class="btn btn-primary text-white" name="komentar" data-toggle="modal" data-target="#login">Kirim</a>
              <?php endif; ?>
            </form>
          </div>

        </div><!-- End blog comments -->

      </div><!-- End blog entries list -->

      <div class="col-lg-4">

        <div class="sidebar">
          <h3 class="sidebar-title">Lakukan Pemesanan</h3>
          <form id="payment-form" method="post" action="<?=site_url()?>users/midtrans/finish">
            <input type="hidden" name="result_type" id="result-type" value="">
            <input type="hidden" name="result_data" id="result-data" value="">
            <div class="form-group">
              <label for="">Tanggal Masuk</label>
              <input type="date"  class="form-control" name="tanggal_awal" id="tanggal_awal" value="<?=  $tgl_msk; ?>" readonly required>
            </div>
            <div class="form-group">
              <label for="">Tanggal Keluar</label>
              <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="<?= $tgl_klr; ?>" readonly required>
            </div>

            <input type="hidden" id="nama_kamar" name="nama_kamar" value="<?= $room->nama_kamar; ?>">
            <input type="hidden" id="id_kamar" name="id_kamar" value="<?= $room->id_kamar; ?>">
            <input type="hidden" id="id_user" name="id_user" value="<?= session()->get('id_user'); ?>">
            <input type="hidden" id="harga" name="harga" value="<?= $room->harga; ?>">

            <?php if (isset($fname)): ?>
              <!-- data user -->
              <input type="hidden" name="fname" id="fname" value="<?= $user->fname; ?>">
              <input type="hidden" name="lname" id="lname" value="<?= $user->lname; ?>">
              <input type="hidden" name="email" id="email" value="<?= $user->email_user; ?>">
              <input type="hidden" name="telp" id="telp" value="<?= $user->nomor_hp; ?>">
            <?php endif; ?>

            <?php if (session()->get('id_user')!==null): ?>
              <button id="pay-button" class="btn btn-primary">Pesan</button>
            <?php else: ?>
              <a class="btn btn-primary text-white" name="komentar" data-toggle="modal" data-target="#login">Pesan</a>
            <?php endif; ?>
          </form>

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
<?= $this->endSection(); ?>
