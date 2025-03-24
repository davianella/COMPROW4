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
                    <span class="text-white mx-2">/</span>
                    <span class="text-white"><?= ($lang === 'id') ? 'Detail Produk' : 'Product Details' ?></span>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="title-page">
    <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
</div>

<div class="detproduct-detail">
    <div class="detproduct-img">
        <img src="<?= base_url('assets/img/produk/' . esc($product['foto_produk'])) ?>" alt="<?= esc($product['nama_produk_' . $lang] ?? $product['nama_produk_id']) ?>">
    </div>
    <div class="detproduct-info">
        <p class="detproduct-description">
            <?= esc($product['deskripsi_produk_' . $lang] ?? $product['deskripsi_produk_id'], 'raw') ?>
        </p>
    </div>
</div>
<div class="text-center mt-4 mb-5">
    <a href="<?= base_url($lang . '/' . ($productLink ?? 'produk')) ?>" class="btn btn-primary btn-lg"><?= ($lang === 'id') ? 'Kembali' : 'Back' ?> </a>
</div>


<?= $this->endSection(); ?>
