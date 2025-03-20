<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>


  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0" style="background-image: url('<?= base_url('assets/img/header.jpg'); ?>');">
    <div class="container-fluid page-header-inner py-5">
      <div class="container text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Aktivitas</h1>
        <nav aria-label="breadcrumb">
          <div class="breadcrumb justify-content-center text-uppercase">
            <a href="/index.html" style="color: #ff214f;">Beranda</a>
            <span class="text-white mx-2">/</span>
            <span class="text-white">Aktivitas</span>
            <span class="text-white mx-2">/</span>
            <span class="text-white">Semua Aktivitas</span>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Activity Section Start -->
  <div id="recent-activities" class="text-center wow fadeIn">
    <h6 class="section-subtitle"> >> Aktivitas Kami << </h6>
        <h1 class="section-title">Kegiatan yang Baru Saja Kami Lakukan</h1>
  </div>

  <div class="activities-grid">
    <?php foreach ($allAktivitas as $p): ?>
      <div class="activity-card">
        <img src="<?= base_url('assets/img/aktivitas/' . $p["foto_aktivitas"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $p['alt_aktivitas_id'] : $p['alt_aktivitas_en']; ?>">
        <h5 class="activity-heading"><?= $lang == 'id' ? $p['judul_aktivitas_id'] : $p['judul_aktivitas_en']; ?></h5>
        <div class="activity-info">
          <p class="activity-date"><?= date('d M Y', strtotime($p['updated_at'])); ?></p>
          <p class="activity-tag"><?= $lang == 'id' ? $p['nama_kategori'] : $p['nama_kategori']; ?></p>
        </div>
        <a href=<?= base_url(
                  $lang === 'id'
                    ? 'id/aktivitas/' . ($p['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($p['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                    : 'en/activity/' . ($p['slug_kategori_en'] ?? 'category-not-found') . '/' . ($p['slug_aktivitas_en'] ?? 'activity-not-found')
                ); ?>>Selengkapnya <i class="fa fa-arrow-right"></i></a>
      </div>
    <?php endforeach; ?>
  </div>

  
<?= $this->endSection(); ?>