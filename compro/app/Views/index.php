<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Carousel Start -->
<div class="container-fluid p-0">
    <?php if (!empty($slider) && is_array($slider)) : ?>
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <?php if (count($slider) > 1) : ?>
                <div class="carousel-indicators">
                    <?php foreach ($slider as $key => $slide) : ?>
                        <button type="button" data-bs-target="#header-carousel" 
                            data-bs-slide-to="<?= $key ?>" 
                            class="<?= $key === 0 ? 'active' : '' ?>" 
                            aria-label="Slide <?= $key + 1 ?>"></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <?php foreach ($slider as $key => $slide) : ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <img class="w-100" src="<?= base_url('assets/img/slider/' . esc($slide['foto_slider'])) ?>" 
                            alt="<?= esc($slide['alt_foto_slider_' . ($lang ?? 'id')]) ?>">
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div class="container text-center">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-5 col-md-6 col-sm-12 d-flex justify-content-center">                                            
                                        <img class="img-fluid animate__animated animate__zoomIn" 
                                        src="<?= base_url('assets/img/produk/pro' . ($key + 1) . '.png') ?>" 
                                        alt="<?= $lang === 'id' ? 'Gambar Produk ' . ($key + 1) : 'Product Image ' . ($key + 1) ?>">
                                    </div>
                                    <div class="col-lg-7">
                                        <h1 class="display-3 text-white animate__animated animate__slideInDown">
                                            <?= esc($slide['caption_slider_' . ($lang ?? 'id')]) ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    <?php else : ?>
        <!-- Jika Tidak Ada Slider, Tampilkan Gambar Default -->
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?= base_url('assets/img/slider/default.jpg') ?>" alt="Default Slider">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="container text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 col-md-6 col-sm-12 d-flex justify-content-center">
                                    <img class="img-fluid animate__animated animate__zoomIn" 
                                        src="<?= base_url('assets/img/pro1.png') ?>" 
                                        alt="Gambar Default">
                                </div>
                                <div class="col-10 col-lg-7 mt-4">
                                    <h1 class="display-3 text-white mb-4 pb-3 animate__animated animate__slideInDown">
                                    <?= $lang === 'id' ? 'Selamat Datang di Website Kami' : 'Welcome to Our Website' ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5 mb-5 wow fadeIn">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Kolom Teks di Sebelah Kiri -->
            <div class="col-lg-6 order-lg-1 order-2">
                <h6 class="text-primary text-uppercase text-center text-lg-start">
                    >> <?= ($lang === 'id') ? 'Tentang Kami' : 'About Us' ?> <<
                </h6>
                <h2 class="mb-4 text-center text-lg-start">
                    <?= esc($profil['nama_perusahaan'] ?? 'Perusahaan') ?>
                </h2>
                <?php
                $deskripsi = isset($profil['deskripsi_perusahaan_' . $lang]) ? $profil['deskripsi_perusahaan_' . $lang] : 'Deskripsi tidak tersedia';
                $kalimat = preg_split('/(?<=[.!?])\s+/', $deskripsi, 4, PREG_SPLIT_NO_EMPTY);
                $deskripsi_pendek = implode(' ', array_slice($kalimat, 0, 2)) . (count($kalimat) > 2 ? '..' : '');
                ?>

                <p class="text-justify" style="text-align: justify;">
                    <?= $deskripsi_pendek ?>...
                </p>
                <div class="btn-wrapper">
                    <a href="<?= base_url($lang . '/about') ?>" class="btn-about text-center">
                        <?= ($lang === 'id') ? 'Info Selengkapnya' : 'More Info' ?> 
                        <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom Gambar di Sebelah Kanan -->
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100 h-100" 
                        src="<?= base_url('assets/img/profil/' . ($profil['foto_perusahaan'] ?? 'sample1.jpeg')) ?>" 
                        style="object-fit: cover; border-radius: 30px;" 
                        alt="<?= esc($profil['alt_foto_perusahaan_' . $lang] ?? 'Company Image') ?>">
                    <div class="position-absolute top-50 start-0 translate-middle-y ms-n4 py-4 px-5 bg-dark opacity-75 text-white"
                        style="border-radius: 10px;">
                        <h2 class="display-4 mb-0">INDONESIAN</h2>
                        <h2 class="display-4 mb-0">EXPORTER</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Product Start -->
<div class="container-fluid py-5 px-4 px-lg-0 mb-5 wow fadeIn">
    <div class="row g-0">
        <div class="col-lg-3 d-none d-lg-flex">
            <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                <h2 class="display-4 text-white m-0" style="transform: rotate(-90deg);">
                <?= lang('bahasa.headerProduk') ?>
                </h2>
            </div>
        </div>

        <!-- Kolom Kanan: Produk -->
        <div class="col-md-12 col-lg-9">
            <div class="ms-lg-5 ps-lg-5 pe-lg-5">
                <!-- Header -->
                <div class="text-center text-lg-start mt-2">
                    <h6 class="text-primary text-uppercase"style="text-align: left;">>><?= lang('bahasa.headerProduk') ?><<</h6>
                    <h2 class="mb-4" style="text-align: left;"><?= lang('bahasa.captionProduk') ?></h2>
                </div>

                <div class="row g-4">
                    <?php if (!empty($product) && is_array($product)) : ?>
                        <?php $count = 0; ?>
                        <?php foreach ($product as $item) : ?>
                            <?php if ($count >= 4) break; ?>
                            <div class="col-md-6">
                                <div class="product-item">
                                    <div class="product-img-home">
                                        <img src="<?= base_url('assets/img/produk/' . esc($item['foto_produk'])) ?>" 
                                            alt="<?= esc($item['alt_produk_' . $lang] ?? $item['alt_produk_id']) ?>">
                                    </div>
                                    <div class="product-content">
                                        <h5><?= esc($item['nama_produk_' . $lang] ?? $item['nama_produk_id']) ?></h5>
                                        <a href="<?= base_url(trim($lang . '/' . ($productLink ?? 'produk') . '/' . $item['slug_' . $lang], '/')) ?>" class="btn btn-product">
                                        <?= ($lang === 'id') ? 'Info Lengkap' : 'More Info' ?>  <i class="fa fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="text-center mt-2">
                <a href="<?= base_url($lang . '/' . ($productLink ?? 'produk')) ?>" class="btn btn-primary btn-lg w-100"><?= ($lang === 'id') ? 'Produk Lainnya →' : 'Other Products →' ?> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product End -->

<!-- Activity Start -->
<div id="activity" class="text-center">
    <h6 class="text-primary text-uppercase"> >><?= lang('bahasa.headerActivity') ?><< </h6>
    <h2 class="mb-2" style="color: #61610b;"><?= lang('bahasa.captionActivity') ?></h2>
</div>

<div class="activity">
    <?php
    $totalAktivitas = count($aktivitas);
    if ($totalAktivitas > 0) {
        if ($totalAktivitas < 3) {
            $limit = $totalAktivitas;
        } elseif ($totalAktivitas < 6) {
            $limit = 3;
        } elseif ($totalAktivitas < 9) {
            $limit = 6;
        } else {
            $limit = 9;
        }

        for ($i = 0; $i < $limit; $i++) :
            $item = $aktivitas[$i];
    ?>
            <div class="activity-item">
                <img src="<?= base_url('assets/img/aktivitas/' . esc($item['foto_aktivitas'])) ?>" 
                     alt="<?= esc($item['judul_aktivitas_id']) ?>" class="activity-img">
                     <a href="<?= base_url(
                        $lang === 'id'
                        ? 'id/aktivitas/' . ($item['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($item['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                        : 'en/activity/' . ($item['slug_kategori_en'] ?? 'category-not-found') . '/' . ($item['slug_aktivitas_en'] ?? 'activity-not-found')
                    ); ?>" class="activity-overlay">
                        <h5><?= esc($item['judul_aktivitas_' . $lang] ?? 'Judul tidak tersedia') ?></h5>
                    </a>
            </div>
    <?php
        endfor;
    }
    ?>
    <div></div>
    <div class="activity-container text-center mt-1">
    <a href="<?= base_url(trim($lang . '/' . ($lang === 'id' ? 'aktivitas' : 'activity'), '/')) ?>" class="activity-button">
        <?= ($lang === 'id') ? 'Semua Aktivitas →' : 'All Activities →' ?>
    </a>

</div>
</div>
<!-- Activity End -->

<!-- Artikel Start -->
<div id="blog" class="blog wow fadeIn" style="margin-top: 40px;">
    <div class="container">
        <div class="section-header text-center">
            <h6 class="text-primary text-uppercase"> >><?= lang('bahasa.headerArticle') ?><<</h6>
            <h2 class="mb-4"><?= lang('bahasa.captionArticle') ?></h2>
        </div>
        <div class="blog-content">
            <div class="row">
                <!-- Artikel Utama -->
                <div class="col-md-8 col-sm-12">
                    <?php if (!empty($article)) : ?>
                        <?php foreach ($article as $index => $item) : ?>
                            <?php if ($index == 0) : ?> <!-- Artikel utama hanya satu -->
                                <div class="single-blog-item">
                                    <div class="single-blog-item-img">
                                        <img src="<?= base_url('assets/img/artikel/' . esc($item['foto_artikel'])) ?>" alt="<?= esc($lang === 'id' ? $item['alt_artikel_id'] : $item['alt_artikel_en']) ?>"
                                        style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                                    </div>
                                    <div class="single-blog-item-txt">
                                            <div>
                                                <h4><span class="badge">
                                                    <?= $lang == 'id' ? $item['nama_kategori'] : $item['nama_kategori']; ?>
                                                </span> - </span> <?= date('F Y', strtotime($item['created_at'])) ?></h4>
                                            </div>
                                        <h2>
                                            <a href="<?= base_url(
                                                $lang === 'id'
                                                    ? 'id/artikel/' . ($item['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($item['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                                    : 'en/article/' . ($item['slug_kategori_en'] ?? 'category-not-found') . '/' . ($item['slug_artikel_en'] ?? 'article-not-found')
                                                ); ?>">
                                                <?= esc($item['judul_artikel_' . $lang] ?? $item['judul_artikel_id']) ?>
                                            </a>
                                        </h2>
                                            
                                        <p><?= esc($item['snippet_' . $lang] ?? $item['snippet_id']) ?></p>
                                        <a href="<?= base_url(
                                                $lang === 'id'
                                                    ? 'id/artikel/' . ($item['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($item['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                                    : 'en/article/' . ($item['slug_kategori_en'] ?? 'category-not-found') . '/' . ($item['slug_artikel_en'] ?? 'article-not-found')
                                                ); ?>" class="article-btn">
                                            <?= lang('bahasa.buttonArticle') ?><i class="fa fa-arrow-right ms-3"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center"><?= lang('bahasa.zeroArticle') ?></p>
                    <?php endif; ?>
                </div>

                <!-- Sidebar Artikel Terkait -->
                <div class="col-md-4 col-sm-12">
                    <aside class="article-sidebar">
                        <h3 class="mb-4" style="border-bottom: 2px solid #0a1928;"><?= lang('bahasa.sideArticle') ?></h3>
                        <?php if (!empty($sideArtikel) && count($sideArtikel) > 1) : ?>
                            <?php foreach (array_slice($sideArtikel, 1) as $item) : ?>
                                <div class="blog-sidebar d-flex align-items-center mb-3">
                                    <div class="single-blog-item-img" style="width: 80px; height: 80px; overflow: hidden; border-radius: 5px;">
                                        <img src="<?= base_url('assets/img/artikel/' . esc($item['foto_artikel'])) ?>" class="img-fluid" alt="<?= esc($item['alt_artikel_' . $lang] ?? 'Gambar tidak tersedia') ?>">
                                    </div>
                                    <div class="single-blog-item-txt ms-3">
                                        <h4><a href="<?= base_url(
                                                $lang === 'id'
                                                    ? 'id/artikel/' . ($item['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($item['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                                    : 'en/article/' . ($item['slug_kategori_en'] ?? 'category-not-found') . '/' . ($item['slug_artikel_en'] ?? 'article-not-found')
                                                ); ?>">
                                            <?= esc($item['judul_artikel_' . $lang] ?? 'Judul tidak tersedia') ?>
                                        </a></h4>
                                        <h6 class="text-muted"><?= date('F Y', strtotime($item['created_at'])) ?></h6>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center"><?= lang('bahasa.zeroArticle') ?></p>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Artikel End -->


<!-- Contact Start  -->
<div id="contact" class="container-fluid wow fadeIn">
    <div class="row">
        <!-- Google Maps -->
        <div class="col-md-6 px-0">
            <div id="map">
                <iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.134021418479!2d112.621391!3d-7.983908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6299e0f5b5bff%3A0x86b4eb82a3e5b9f1!2sMalang%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1700000000000">
                </iframe>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="col-md-6 px-5 has-height-lg middle-items">
            <h6 class="text-primary text-uppercase"> >> <?= lang('bahasa.headerKontak') ?> << </h6>
            <h3><?= lang('bahasa.deskripsiKontak') ?></h3>
            <p><?= isset($kontak['deskripsi_kontak_' . $lang]) ? $kontak['deskripsi_kontak_' . $lang] : 'Deskripsi tidak tersedia.' ?></p>
        </div>
    </div>
</div>
<!-- Contact End  -->

<?= $this->endSection(); ?>
