<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil data halaman dari database berdasarkan id_meta (contoh: halaman Contact)
$page_id = 3; // ID untuk halaman Contact
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
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?= $page_title ?></h1>
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
 
<!-- Product Start -->
<div class="title-page">
    <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
</div>

<div class="container mb-5" style="padding: 20px;background-color: white; border-radius:20px;">
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
