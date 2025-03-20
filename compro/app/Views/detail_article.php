<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0 " style="background-image: url(assets/img/header.jpg);">
    <div class="container-fluid page-header-inner py-5">
      <div class="container text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Artikel</h1>
        <nav aria-label="breadcrumb">
          <div class="breadcrumb justify-content-center text-uppercase">
            <a href="/index.html">Beranda</a>
            <span class="text-white mx-2">/</span>
            <span class="text-white">Artikel</span>
            <span class="text-white mx-2">/</span>
            <span class="text-white">Detail Artikel</span>
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
          <span class="badge"><?= $lang == 'id' ? esc($artikel['nama_kategori_id']) : esc($artikel['nama_kategori_en']); ?></span>
          <span class="meta-title">Kontributor: Admin</span>
          <span class="meta-title">Tanggal Publish: <?= date('d M Y', strtotime($artikel['updated_at'])); ?></span>
        </div>
      </aside>

      <div class="article-content">
        <p><?= $lang == 'id' ? esc($artikel['deskripsi_artikel_id']) : esc($artikel['deskripsi_artikel_en']); ?></p>
      </div>

      <!-- Kolom Kanan: Artikel Sidebar -->
      <aside class="article-sidebar right-sidebar">
        <h3 class="mb-4" style="border-bottom: 2px solid #ff214f;">Artikel Terkait</h3>

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