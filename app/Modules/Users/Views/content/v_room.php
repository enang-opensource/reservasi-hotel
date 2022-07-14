<?= $this->extend('\App\Modules\Users\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<!-- ======= Our Portfolio Section ======= -->
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
</section><!-- End Our Portfolio Section -->

<!-- ======= Portfolio Section ======= -->
<section class="portfolio">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <?php foreach ($category as $value): ?>
            <li data-filter="<?= '.slide'.$value['id_kategori']; ?>"><?= $value['jenis_kategori']; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

      <?php foreach ($room as $value): ?>
        <div class="col-lg-4 col-2 col-md-6 portfolio-wrap <?= "slide".$value['id_kategori']; ?>" style="margin-top:10px;">

          <div class="card" style="width: 18rem;">
            <?php $path = explode(",", $value['image']); ?>
            <img class="card-img-top" src="<?= base_url('image/'.$path[0]); ?>"height="150" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?= $value['nama_kamar']; ?></h5>
              <p class="card-text"><?= substr($value['detail_kamar'], 0, 70); ?>... <a href="<?= base_url('users/room/detail/'.$value['id_kamar'].'/'.$tgl_msk.'/'.$tgl_klr); ?>">Lihat</a></p>
              <a href="<?= base_url('users/room/detail/'.$value['id_kamar'].'/'.$tgl_msk.'/'.$tgl_klr); ?>" class="btn btn-primary">Pesan</a>
              <a href="<?= base_url('image/'.$path[0]); ?>" class="btn btn-warning text-white portfolio-lightbox">Lihat</a>
              <?php foreach ($path as $img): ?>
                <a href="<?= base_url('image/'.$img); ?>" class="portfolio-lightbox"></a>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section><!-- End Portfolio Section -->
<?= $this->endSection(); ?>
