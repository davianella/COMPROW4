<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/header.jpg') ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?= lang('bahasa.product') ?></h1>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb justify-content-center text-uppercase">
                    <a href="<?= base_url() ?>" class="text-primary"><?= lang('bahasa.home') ?></a>
                    <span class="text-white mx-2">/</span>
                    <span class="text-white"><?= lang('bahasa.product') ?></span>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
 
<!-- Product Start -->
<div class="title-page">
    <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
</div>

<div class="container mb-5">
    <?php if (!empty($product) && is_array($product)) : ?>
        <?php foreach ($product as $index => $product) : ?>
            <div class="product-detail <?= ($index % 2 !== 0) ? 'reverse' : ''; ?> wow fadeIn">
            <div class="product-text">
                <h2><?= esc($product['nama_produk_' . $lang] ?? $product['nama_produk_id']) ?></h2>
                <?php
                // Ambil deskripsi sesuai bahasa yang dipilih, fallback ke bahasa default (ID)
                $deskripsi = strip_tags($product['deskripsi_produk_' . $lang] ?? $product['deskripsi_produk_id']);

                // Pecah deskripsi menjadi kalimat berdasarkan titik (.)
                $kalimat = explode('.', $deskripsi);

                // Ambil dua kalimat pertama
                $potongan = isset($kalimat[1]) ? $kalimat[0] . '.' . $kalimat[1] . '.' : $kalimat[0] . '.';
                ?>

                <p style="font-size: 20px"><?= esc($potongan, 'raw') ?></p>

                <a href="<?= base_url(trim($lang . '/' . $productLink . '/' . $product['slug_' . $lang], '/')) ?>" class="btn">
                    <?= lang('bahasa.buttonProduk') ?>
                </a>
            </div>

                <div class="product-img">
                    <img src="<?= base_url('assets/img/produk/' . esc($product['foto_produk'])) ?>" alt="<?= esc($product['nama_produk_id']) ?>">
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="text-center">Belum ada produk yang tersedia.</p>
    <?php endif; ?>
</div>
<!-- Product End -->


<?= $this->endSection(); ?>
