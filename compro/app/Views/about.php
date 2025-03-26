<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil data halaman dari database berdasarkan id_meta (contoh: halaman Contact)
$page_id = 2; // ID untuk halaman Contact
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

<div class="title-page">
    <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
    <h1><?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?></h1>
</div>


<!-- About Start -->
<div class="container-xxl py-5 mb-5 mt-5 wow fadeIn" style="border-radius: 20px;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <h6 class="text-primary text-uppercase text-center text-lg-start" style ="font-size: 20px";>
                    <?= lang('bahasa.titleAbout') ?>
                </h6>
                <h2 class="mb-4 text-center text-lg-start">
                    <?= esc($profil['nama_perusahaan'] ?? 'Perusahaan') ?>
                </h2>
                <p  style ="font-size: 20px"><?= isset($profil['deskripsi_perusahaan_' . $lang]) ? $profil['deskripsi_perusahaan_' . $lang] : 'Deskripsi tidak tersedia'; ?></p>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100 h-100" 
                         src="<?= base_url('assets/img/profil/' . ($profil['foto_perusahaan'] ?? 'default.jpg')) ?>" 
                         style="object-fit: cover; border-radius: 30px;" 
                         alt="<?= esc($profil['alt_foto_perusahaan_' . $lang] ?? 'Company Image') ?>">
                    <div class="position-absolute top-50 start-0 translate-middle-y ms-n4 py-4 px-5 bg-dark opacity-75 text-white" style="border-radius: 10px;">
                    <h2 class="display-4 mb-0">INDONESIAN</h2>
                    <h2 class="display-4 mb-0">EXPORTER</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<?= $this->endSection(); ?>