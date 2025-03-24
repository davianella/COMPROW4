<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil ID halaman saat ini
$page_id = 7;
$parent_id = 5;

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

  <div class="article-container">
    <h1 class="article-title"><?= $lang == 'id' ? $artikel['judul_artikel_id'] : $artikel['judul_artikel_en']; ?></h1>
    <div class="article-header">
      <img src="<?= base_url('assets/img/artikel/' . $artikel["foto_artikel"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $artikel['alt_artikel_id'] : $artikel['alt_artikel_en']; ?>">
    </div>
    <div class="article-body">
      <!-- Kolom Kiri: Metadata -->
      <aside class="article-sidebar left-sidebar">
        <div class="article-meta">
          <span class="meta-badge"><?= $lang == 'id' ? esc($artikel['nama_kategori_id']) : esc($artikel['nama_kategori_en']); ?></span>
          <span class="meta-title"><?= lang('bahasa.postedBy') ?>:</span> <span> Admin</span>
          <span class="meta-title"><?= lang('bahasa.publish_date') ?>:</span> <span> <?= date('d M Y', strtotime($artikel['updated_at'])); ?></span>
        </div>
      </aside>

      <div class="article-content">
        <p><?= $lang == 'id' ? $artikel['deskripsi_artikel_id'] : $artikel['deskripsi_artikel_en']; ?></p>
      </div>

      <!-- Kolom Kanan: Artikel Sidebar -->
      <aside class="article-sidebar right-sidebar">
        <h3 class="mb-4" style="border-bottom: 2px solid #0a1928;">Artikel Terkait</h3>

        <?php foreach ($allArticle as $p): ?>
          <div class="blog-sidebar">
            <div class="single-blog-item-img">
              <img src="<?= base_url('assets/img/artikel/' . $p["foto_artikel"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $p['alt_artikel_id'] : $p['alt_artikel_en']; ?>" alt="blog image">
            </div>
            <div class="single-blog-item-txt">
              <h4><?= $lang == 'id' ? $p['judul_artikel_id'] : $p['judul_artikel_en']; ?></h4>
              <h6><?= date('d M Y', strtotime($p['updated_at'])); ?></h6>
            </div>
          </div>
        <?php endforeach; ?>
      </aside>
    </div>
  </div>

  <?= $this->endSection(); ?>