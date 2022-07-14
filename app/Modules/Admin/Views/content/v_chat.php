<?= $this->extend('\App\Modules\Admin\Views\templates\v_master'); ?>

<?= $this->section('content');  ?>
<title><?= $title; ?></title>

<!-- style start for chat room design -->
<style media="screen">
body{margin-top:20px;}

.chat-online {
  color: #34ce57
}

.chat-offline {
  color: #e4606d
}

.chat-messages {
  display: flex;
  flex-direction: column;
  max-height: 800px;
  overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
  display: flex;
  flex-shrink: 0
}

.chat-message-left {
  margin-right: auto
}

.chat-message-right {
  flex-direction: row-reverse;
  margin-left: auto
}
.py-3 {
  padding-top: 1rem!important;
  padding-bottom: 1rem!important;
}
.px-4 {
  padding-right: 1.5rem!important;
  padding-left: 1.5rem!important;
}
.flex-grow-0 {
  flex-grow: 0!important;
}
.border-top {
  border-top: 1px solid #dee2e6!important;
}
</style>
<!-- style end for chat room design -->

<!-- ======= Team Section ======= -->
<section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" style="padding:10px 0;">
  <!-- ======= Services Section ======= -->
  <section class="services">
    <div class="container">
      <div class="card">
        <div class="row g-0">
          <div class="col-12 col-lg-12 col-xl-12">
            <div class="position-relative">
              <div class="chat-messages p-4">
                <?php foreach ($chat as $value): ?>

                  <?php if ($value['id_user']==$users): ?>
                    <div class="chat-message-right pb-4">
                      <div>
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                        <div class="text-muted small text-nowrap mt-2"></div>
                      </div>
                      <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                        <div class="font-weight-bold mb-1">You</div>
                        <?= $value['text_chat']; ?>
                      </div>
                    </div>
                  <?php else: ?>
                    <div class="chat-message-left pb-4">
                      <div>
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                        <div class="text-muted small text-nowrap mt-2"></div>
                      </div>
                      <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                        <div class="font-weight-bold mb-1"><?= $nama; ?></div>
                        <?= $value['text_chat']; ?>
                      </div>
                    </div>

                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="flex-grow-0 py-3 px-4 border-top">
              <form action="<?= base_url('admin/chat/add'); ?>" method="post">
                <div class="input-group">
                  <input type="text" class="form-control" name="pesan" placeholder="Type your message" required>
                  <input type="hidden" name="id_room" value="<?= $room; ?>">
                  <input type="hidden" name="nama" value="<?= $nama; ?>">
                  <button class="btn btn-info">Send</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<?= $this->endSection(); ?>
