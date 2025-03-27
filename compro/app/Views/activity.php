<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil data halaman dari database berdasarkan id_meta (contoh: halaman Contact)
$page_id = 4; // ID untuk halaman Contact
$lang = service('request')->getLocale(); // Ambil bahasa aktif, bisa 'id' atau 'en'

// Ambil query builder service
$db = \Config\Database::connect();

// Query untuk mendapatkan data halaman
$query = $db->query("SELECT * FROM tb_meta WHERE id_meta = ?", [$page_id]);
$page = $query->getRow(); // Ambil baris data halaman

// Set konten dinamis
$page_title = $lang === 'id' ? $page->nama_halaman_id : $page->nama_halaman_en;
$breadcrumb_title = $lang === 'id' ? $page->nama_halaman_id : $page->nama_halaman_en;
$meta_description = $lang === 'id' ? $page->meta_desc_id : $page->meta_desc_en;
$background_image = 'assets/img/header.jpeg'; // Sesuaikan jika perlu mengganti gambar berdasarkan halaman
?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url($background_image) ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
        <h2 class="display-3 text-white mb-3 animated slideInDown" style="font-size: 40px; font-weight: bold"><?= $page_title ?></h2>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb justify-content-center text-uppercase">
                    <a href="<?= base_url() ?>"><?= lang('bahasa.home') ?></a>
                    <span class="text-white mx-2">/</span>
                    <!-- Menambahkan breadcrumb dinamis lebih dari satu level -->
                    <span class="text-white"><?= $breadcrumb_title ?></span>
                    <!-- Cek apakah ada subkategori atau breadcrumb lebih lanjut -->
                    <?php if (isset($sub_category_title)): ?>
                        <span class="text-white mx-2">/</span>
                        <span class="text-white"><?= $sub_category_title ?></span>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

  <!-- Activity Section Start -->
  <div class="title-page">
    <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
  </div>

  <div class="activities-grid">
    <?php foreach ($allAktivitas as $p): ?>
      <div class="activity-card">
        <img src="<?= base_url('assets/img/aktivitas/' . $p["foto_aktivitas"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $p['alt_aktivitas_id'] : $p['alt_aktivitas_en']; ?>" style="border-bottom: 8px solid #7b7b1a;;">
        <div class="activity-info">
          <p class="activity-tag"><?= $lang == 'id' ? $p['nama_kategori'] : $p['nama_kategori']; ?></p>
        </div>
        <h5 class="activity-heading" style="min-height: 50px;"><?= $lang == 'id' ? $p['judul_aktivitas_id'] : $p['judul_aktivitas_en']; ?></h5>
        <div class="activity-info">
          <p class="activity-date"><?= date('d M Y', strtotime($p['updated_at'])); ?></p>
        </div>
        <a href=<?= base_url(
                  $lang === 'id'
                    ? 'id/aktivitas/' . ($p['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($p['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                    : 'en/activity/' . ($p['slug_kategori_en'] ?? 'category-not-found') . '/' . ($p['slug_aktivitas_en'] ?? 'activity-not-found')
                ); ?> class="article-btn w-100">
        <?= lang('bahasa.buttonArticle') ?> <i class="fa fa-arrow-right"></i></a>
      </div>
    <?php endforeach; ?>
  </div>

  
<?= $this->endSection(); ?>