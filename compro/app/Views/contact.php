<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>


<!-- Page Header Start -->
<div class="container-fluid page-header p-0" style="background-image: url(<?= base_url('assets/img/header.jpg') ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?= lang('bahasa.contact') ?></h1>
            <nav aria-label="breadcrumb">
                <div class="breadcrumb justify-content-center text-uppercase">
                    <a href="<?= base_url() ?>" class="text-primary"><?= lang('bahasa.home') ?></a>
                    <span class="text-white mx-2">/</span>
                    <span class="text-white"><?= lang('bahasa.contact') ?></span>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->
 
<!-- Contact Start  -->
<div id="contact" class="container-fluid border-top wow fadeIn">
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