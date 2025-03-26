<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<?php
// Ambil ID halaman saat ini
$page_id = 7;
$parent_id = 3;

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
        <h2 class="display-3 text-white mb-3 animated slideInDown" style="font-size: 40px; font-weight: bold"><?= $page_title ?></h2>
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

<div class="title-page">
    <h6 class="sub-title">>><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?><<</h6>
    <h1><?= esc($product['nama_produk_' . $lang] ?? $product['nama_produk_id']) ?></h1>
</div>

<div class="detproduct-detail" style="background-color:white; border-radius:20px; padding:20px;">
    <div class="detproduct-img">
        <img src="<?= base_url('assets/img/produk/' . esc($product['foto_produk'])) ?>" alt="<?= esc($product['nama_produk_' . $lang] ?? $product['nama_produk_id']) ?>">
    </div>
    <div class="detproduct-info">
        <p class="detproduct-description">
            <?= esc($product['deskripsi_produk_' . $lang] ?? $product['deskripsi_produk_id'], 'raw') ?>
        </p>
    </div>
</div>
<div class="text-center mt-4 mb-5 ">
    <a href="<?= base_url($lang . '/' . ($productLink ?? 'produk')) ?>" class="btn btn-primary btn-lg"><?= ($lang === 'id') ? 'Kembali' : 'Back' ?> </a>
</div>


<?= $this->endSection(); ?>
