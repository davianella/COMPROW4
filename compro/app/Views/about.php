<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/header.jpg') ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?= lang('bahasa.about') ?></h1>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb justify-content-center text-uppercase">
                    <a href="<?= base_url() ?>" class="text-primary"><?= lang('bahasa.home') ?></a>
                    <span class="text-white mx-2">/</span>
                    <span class="text-white"><?= lang('bahasa.about') ?></span>
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
<div class="container-xxl py-5 mb-5 wow fadeIn">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <h6 class="text-primary text-uppercase" style ="font-size: 25px";>
                    <?= lang('bahasa.deskripsiAbout') ?>
                </h6>
                <h1 class="mb-4" style ="font-size: 60px";><?= esc($profil['nama_perusahaan'] ?? 'Perusahaan') ?></h1>
                <p  style ="font-size: 20px"><?= esc($profil['deskripsi_perusahaan_' . $lang] ?? 'Deskripsi tidak tersedia') ?></p>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100 h-100" 
                         src="<?= base_url('assets/img/profil/' . ($profil['foto_perusahaan'] ?? 'default.jpg')) ?>" 
                         style="object-fit: cover; border-radius: 30px;" 
                         alt="<?= esc($profil['alt_foto_perusahaan_' . $lang] ?? 'Company Image') ?>">
                    <div class="position-absolute top-50 start-0 translate-middle-y ms-n4 py-4 px-5 bg-dark opacity-75 text-white" style="border-radius: 10px;">
                        <h1 class="display-4 mb-0">BDICAM</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<?= $this->endSection(); ?>