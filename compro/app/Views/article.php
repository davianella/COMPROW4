<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0 " style="background-image: url(assets/img/header.jpg);">
    <div class="container-fluid page-header-inner py-5">
      <div class="container text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Artikel</h1>
        <nav aria-label="breadcrumb">
          <div class="breadcrumb justify-content-center text-uppercase">
            <a href="/index.html" class="text-primary">Beranda</a>
            <span class="text-white mx-2">/</span>
            <span class="text-white">Artikel</span>
            <span class="text-white mx-2">/</span>
            <span class="text-white">Semua Artikel</span>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <!-- Article Start -->
  <div id="blog" class="blog wow fadeIn">
    <div class="container">
    <div class="title-page">
      <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
      <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
    </div>
      <div class="blog-content">
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <?php foreach ($allArticle as $article): ?>
              <div class="single-blog-item">
                <div class="single-blog-item-img">
                  <img src="<?= base_url('assets/img/artikel/' . $article["foto_artikel"]) ?>" class="card-img-top" alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>">
                </div>
                <div class="single-blog-item-txt">
                  <h2><a href="#"><?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?></a></h2>
                  <h4>Diposting oleh Admin <span>||</span> <?= date('d M Y', strtotime($article['updated_at'])); ?></h4>
                  <h5><span class="badge"><?= $lang == 'id' ? $article['nama_kategori'] : $article['nama_kategori']; ?></span></h5>
                  <p><?= $lang == 'id' ? $article['snippet_id'] : $article['snippet_en']; ?></p>
                  <a href="<?= base_url(
                              $lang === 'id'
                                ? 'id/artikel/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                : 'en/article/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                            ); ?>" class="activity-btn">Baca Selengkapnya <i class="fa fa-arrow-right ms-3"></i></a>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="pagination-container">
              <nav>
                <ul class="pagination">
                  <li><a href="#" class="pagination-btn">1</a></li>
                  <li><a href="#" class="pagination-btn">2</a></li>
                  <li><a href="#" class="pagination-btn">3</a></li>
                  <li><a href="#" class="pagination-btn">&raquo;</a></li>
                  <li><a href="#" class="pagination-btn">Terakhir</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <aside class="article-sidebar right-sidebar">
              <h3 class="mb-4" style="border-bottom: 2px solid #ff214f;">Artikel Terkait</h3>

              <?php foreach ($sideArticle as $p): ?>
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
      </div>
    </div>
  </div>

  <!-- Article End -->

  <?= $this->endSection(); ?>