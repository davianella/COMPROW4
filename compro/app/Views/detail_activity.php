<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil ID halaman saat ini
$page_id = 8;
$parent_id = 4;

// Ambil bahasa aktif
$lang = service('request')->getLocale();

// Ambil query builder service
$db = \Config\Database::connect();

// Query untuk mendapatkan data halaman berdasarkan id_meta
$query = $db->query("SELECT * FROM tb_meta WHERE id_meta = ?", [$page_id]);
$page = $query->getRow(); // Ambil baris data halaman

// Set konten dinamis berdasarkan bahasa
$page_title = $lang === 'id' ? $page->nama_halaman_id : $page->nama_halaman_en;
$breadcrumb_title = $lang === 'id' ? $page->nama_halaman_id : $page->nama_halaman_en;
$meta_description = $lang === 'id' ? $page->meta_desc_id : $page->meta_desc_en;
$background_image = 'assets/img/header.jpeg'; 
?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url($background_image) ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?= $page_title ?></h1>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb justify-content-center text-uppercase">
                    <a href="<?= base_url() ?>"><?= lang('bahasa.home') ?></a>
                    <span class="text-white mx-2">/</span>
                    <?php
                    if (isset($parent_id) && $parent_id) {
                        $parent_query = $db->query("SELECT * FROM tb_meta WHERE id_meta = ?", [$parent_id]);
                        $parent_page = $parent_query->getRow();
                        if ($parent_page) {
                            $parent_title = $lang === 'id' ? $parent_page->nama_halaman_id : $parent_page->nama_halaman_en;
                            echo '<a href="' . base_url($lang . '/' . strtolower(str_replace(' ', '-', $parent_title))) . '">' . $parent_title . '</a>';
                            echo '<span class="text-white mx-2">/</span>';
                        }
                    }
                    echo '<span class="text-white">' . $breadcrumb_title . '</span>';
                    ?>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

  <div class="container">
    <div class="row">
      <!-- Konten utama -->
      <div class="col-md-8 col-sm-12">
        <div class="detactivity-detail">
          <h1 class="detactivity-title"><?= $lang == 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en']; ?></h1>
          <div class="detactivity-meta">
            <span class="badge"><?= $lang == 'id' ? $aktivitas['nama_kategori_id'] : $aktivitas['nama_kategori_en']; ?></span>
            <span class="detactivity-date">Tanggal: <?= date('d M Y', strtotime($aktivitas['updated_at'])); ?></span>
          </div>
          <div class="detactivity-header">
            <img src="<?= base_url('assets/img/aktivitas/' . $aktivitas["foto_aktivitas"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en']; ?>" class="detactivity-img">
          </div>
          <div class="detactivity-body">
            <p class="detactivity-description">
              <?= $lang == 'id' ? $aktivitas['deskripsi_aktivitas_id'] : $aktivitas['deskripsi_aktivitas_en']; ?>
            </p>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-md-4 col-sm-12">
        <div class="act-sidebar">
          <h3 class="mb-4">Aktivitas Lainnya</h3>
          <div class="activities-container">
            <?php foreach ($allAktivitas as $p): ?>
              <div class="single-act-item">
                <div class="single-act-item-img">
                  <img src="<?= base_url('assets/img/aktivitas/' . $p["foto_aktivitas"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $p['alt_aktivitas_id'] : $p['alt_aktivitas_en']; ?>">
                </div>
                <div class="single-act-item-txt">
                  <h4><a href="#"><?= $lang == 'id' ? $p['judul_aktivitas_id'] : $p['judul_aktivitas_en']; ?></a></h4>
                  <h6><?= date('d M Y', strtotime($p['updated_at'])); ?></h6>
                </div>
              </div>
            <?php endforeach; ?>
          </div>


        </div>
      </div>
    </div>
  </div>

  
<?= $this->endSection(); ?>