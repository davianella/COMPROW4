<!-- Modal Pop-Up -->
<div class="modal fade" id="popupFormModal" tabindex="-1" aria-labelledby="popupFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="popupFormLabel"><?= lang('bahasa.form_title'); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">

        <!-- Notifikasi Sukses -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2 fs-4 text-success"></i>
            <div>
              <strong><?= lang('bahasa.welcome'); ?></strong><br>
              <?= lang('bahasa.message_sent'); ?>
            </div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- Notifikasi Error -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul class="mb-0">
                  <?php foreach (session()->getFlashdata('errors') as $error): ?>
                      <li><?= $error; ?></li>
                  <?php endforeach; ?>
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- Notifikasi dari reCAPTCHA -->
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('error'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- Formulir Pengiriman Pesan -->
        <form action="<?= base_url('popup/simpan'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="nama" class="form-label"><?= lang('bahasa.name'); ?></label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="negara" class="form-label"><?= lang('bahasa.country'); ?></label>
                <select class="form-select js-country" id="negara" name="negara" required>
                  <option value=""><?= session()->get('lang') == 'en' ? 'Select Country' : 'Pilih Negara'; ?></option>
                </select>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label"><?= lang('bahasa.phone'); ?></label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><?= lang('bahasa.email'); ?></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="website" class="form-label">Website</label>
              <input type="text" class="form-control" id="website" name="website">
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label"><?= lang('bahasa.category'); ?></label>
                <select class="form-select" id="kategori" name="kategori" required>
                <option value="Importir"><?= lang('bahasa.importer'); ?></option>
                <option value="Eksportir"><?= lang('bahasa.exporter'); ?></option>
                <option value="Lainnya"><?= lang('bahasa.other'); ?></option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pesan" class="form-label"><?= lang('bahasa.submit'); ?></label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
            </div>

            <!-- Captcha (misalnya Google reCAPTCHA) -->
            <div class="g-recaptcha" data-sitekey="6LfUTiMrAAAAAGLv7scwfqSB2H_Ck7WsaF_YX0Rm"></div>

            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  // Tampilkan modal jika tidak ada success atau ada error
  <?php if (!session()->getFlashdata('success') || session()->getFlashdata('errors') || session()->getFlashdata('error')): ?>
    window.addEventListener('load', () => {
      const myModal = new bootstrap.Modal(document.getElementById('popupFormModal'));
      myModal.show();
    });
  <?php endif; ?>
</script>


