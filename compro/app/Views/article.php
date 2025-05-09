<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil data halaman dari database berdasarkan id_meta (contoh: halaman Contact)
$page_id = 5; // ID untuk halaman Contact
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
                    <?php if (!empty($allArticle)): ?>
                        <?php foreach ($allArticle as $article): ?>
                            <div class="single-blog-item">
                                <div class="single-blog-item-img">
                                    <img src="<?= base_url('assets/img/artikel/' . $article["foto_artikel"]) ?>"
                                        class="card-img-top"
                                        alt="<?= $lang == 'id' ? $article['alt_artikel_id'] : $article['alt_artikel_en']; ?>"
                                        style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                </div>
                                <div class="single-blog-item-txt">
                                    <h2>
                                        <a href="<?= base_url(
                                            $lang === 'id'
                                                ? 'id/artikel/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                                : 'en/article/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                                        ); ?>">
                                            <?= $lang == 'id' ? $article['judul_artikel_id'] : $article['judul_artikel_en']; ?>
                                        </a>
                                    </h2>
                                    <div>
                                        <h4>
                                            <span class="badge">
                                                <?= $article['nama_kategori']; ?>
                                            </span> - <?= date('d M Y', strtotime($article['updated_at'])); ?>
                                        </h4>
                                    </div>
                                    <p><?= $lang == 'id' ? $article['snippet_id'] : $article['snippet_en']; ?></p>
                                    <a href="<?= base_url(
                                        $lang === 'id'
                                            ? 'id/artikel/' . ($article['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($article['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                            : 'en/article/' . ($article['slug_kategori_en'] ?? 'category-not-found') . '/' . ($article['slug_artikel_en'] ?? 'article-not-found')
                                    ); ?>" class="article-btn">
                                        <?= lang('bahasa.buttonArticle') ?> <i class="fa fa-arrow-right ms-3"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- Pagination -->
                        <div class="pagination-container">
                            <?= $pager->links('default', 'bootstrap_pagination') ?>
                        </div>

                    <?php else: ?>
                        <div class="text-center">
                            <h3 class="text-muted"><?= $lang == 'id' ? 'Belum ada artikel yang tersedia.' : 'No articles available yet.' ?></h3>
                            <p style="text-align: center;"><?= $lang == 'id' ? 'Silakan kembali lagi nanti atau cek kategori lainnya.' : 'Please check back later or explore other categories.' ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 col-sm-12">
                    <aside class="article-sidebar right-sidebar">
                        <h3 class="mb-4" style="border-bottom: 2px solid #0a1928;"><?= lang('bahasa.sideArticle') ?></h3>
                        <?php foreach ($sideArticle as $p): ?>
                            <div class="blog-sidebar">
                                <div class="single-blog-item-img"
                                    style="width: 80px; height: 80px; overflow: hidden; border-radius: 5px;">
                                    <img src="<?= base_url('assets/img/artikel/' . esc($p['foto_artikel'])) ?>"
                                        class="img-fluid"
                                        alt="<?= esc($p['alt_artikel_' . $lang] ?? 'Gambar tidak tersedia') ?>">
                                </div>
                                <div class="single-blog-item-txt ms-3">
                                    <h4>
                                        <a href="<?= base_url($lang == 'id'
                                            ? 'id/artikel/' . $article['slug_kategori_id'] . '/' . $article['slug_artikel_id']
                                            : 'en/article/' . $article['slug_kategori_en'] . '/' . $article['slug_artikel_en']); ?>">
                                            <?= esc($p['judul_artikel_' . $lang] ?? 'Judul tidak tersedia') ?>
                                        </a>
                                    </h4>
                                    <h6 class="text-muted"><?= date('F Y', strtotime($p['created_at'])) ?></h6>
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