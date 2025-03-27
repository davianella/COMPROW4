<?php
// Ambil bahasa yang disimpan di session
$lang = session()->get('lang') ?? 'id'; // Default ke 'en' jika tidak ada di session

$current_url = uri_string();

// Ambil query string (misalnya ?keyword=sukses)
$query_string = $_SERVER['QUERY_STRING']; // Mengambil query string dari URL

// Simpan segmen bahasa saat ini
$lang_segment = substr($current_url, 0, strpos($current_url, '/') + 1); // Menyimpan 'id/' atau 'en/'

// Definisikan tautan untuk setiap halaman berdasarkan bahasa
$homeLink = ($lang_segment === 'en/') ? '/' : '/';
$aboutLink = ($lang_segment === 'en/') ? 'about' : 'tentang';
$contactLink = ($lang_segment === 'en/') ? 'contact' : 'kontak';
$articleLink = ($lang_segment === 'en/') ? 'article' : 'artikel';
$productLink = ($lang_segment === 'en/') ? 'product' : 'produk';
$detailProduct = ($lang_segment === 'en/') ? 'product-detail' : 'produk-detail';

// Buat array untuk menggantikan segmen berdasarkan bahasa
$replace_map = [
    'kontak' => 'contact',
    'tentang' => 'about',
    'artikel' => 'article',
    'produk' => 'product',
    'produk-detail' => 'product-detail',
];

// Ambil bagian dari URL tanpa segmen bahasa
$url_without_lang = substr($current_url, strlen($lang_segment));

// Tentukan bahasa yang ingin digunakan
$new_lang_segment = ($lang_segment === 'en/') ? 'id/' : 'en/';

// Gantikan setiap segmen dalam URL berdasarkan bahasa yang aktif
foreach ($replace_map as $indonesian_segment => $english_segment) {
    if ($lang_segment === 'en/') {
        // Jika bahasa yang dipilih adalah 'en', maka ganti segmen ID ke EN
        $url_without_lang = str_replace($english_segment, $indonesian_segment, $url_without_lang);
    } else {
        // Jika bahasa yang dipilih adalah 'id', maka ganti segmen EN ke ID
        $url_without_lang = str_replace($indonesian_segment, $english_segment, $url_without_lang);
    }
}

// Tautan dengan bahasa yang baru
$clean_url = $new_lang_segment . ltrim($url_without_lang, '/');

// Gabungkan query string jika ada
if (!empty($query_string)) {
    $clean_url .= '?' . $query_string;
}


// Tautan Bahasa Inggris
$english_url = base_url($clean_url);

// Tautan Bahasa Indonesia
$indonesia_url = base_url($clean_url);
?>

<div class="fixed-buttons">
    <a href="<?= esc($kontak['link_wa']) ?>" class="call-button" target="_blank">
    <i class="fa fa-phone"></i>
    </a>
    <button id="scroll-up-btn" class="scroll-up-button">^</button>
</div>

<!-- Footer Start -->
<footer id="footer" class="footer">
    <div class="container-fluid">
        <div class="footer-menu">
            <div class="row">
                <div class="footer-col footer-brand">
                    <a href="<?= base_url('/') ?>" class="footer-logo">
                        <img src="<?= base_url('assets/img/logo/' . $profil['logo_perusahaan']); ?>" 
                             alt="<?= $lang == 'id' ? $profil['alt_logo_perusahaan_id'] : $profil['alt_logo_perusahaan_en']; ?>" 
                             class="footer-logo-img">
                    </a>
                </div>
                
                <div class="col-md-4 footer-col">
                    <h5><?= lang('bahasa.headerLink'); ?></h5>
                    <ul>
                        <li><a href="<?= base_url($lang . '/home') ?>"><?= lang('bahasa.home'); ?></a></li>
                        <li><a href="<?= base_url($lang . '/about') ?>"><?= lang('bahasa.about'); ?></a></li>
                        <li><a href="<?= base_url($lang . '/article') ?>"><?= lang('bahasa.article'); ?></a></li>
                        <li><a href="<?= base_url($lang . '/product') ?>"><?= lang('bahasa.product'); ?></a></li>
                        <li><a href="<?= base_url($lang . '/contact') ?>"><?= lang('bahasa.contact'); ?></a></li>
                    </ul>
                </div>

                <div class="col-md-4 footer-col">
                    <h5><?= lang('bahasa.footerArticle'); ?></h5>
                    <ul>
                        <?php if (!empty($kategori_teratas) && is_array($kategori_teratas)): ?>
                            <?php foreach ($kategori_teratas as $kategori): ?>
                                <?php 
                                    $slug = ($lang === 'id') ? $kategori['slug_kategori_id'] : $kategori['slug_kategori_en'];
                                    $name = ($lang === 'id') ? $kategori['nama_kategori_id'] : $kategori['nama_kategori_en'];
                                ?>
                                <li>
                                    <a href="<?= base_url("$lang/artikel/$slug") ?>">
                                        <?= $name; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><?= ($lang === 'id') ? "Tidak ada kategori tersedia" : "No categories available"; ?></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-md-4 footer-col">
                    <h5><?= lang('bahasa.sosmedLink'); ?></h5>
                    <ul>
                        <?php if (!empty($sosmed) && is_array($sosmed)): ?>
                            <?php foreach ($sosmed as $s): ?>
                                <li>
                                    <a href="<?= $s['link_sosmed']; ?>" target="_blank">
                                        <img src="<?= base_url('assets/img/logo/' . $s['logo_sosmed']); ?>" 
                                             alt="<?= $s['nama_sosmed']; ?>" 
                                             style="height: 20px; margin-right: 5px;">
                                        <?= $s['nama_sosmed']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><?= ($lang === 'id') ? "Tidak ada sosial media" : "No social media available"; ?></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-md-4 footer-col">
                    <h5><?= lang('bahasa.marketplaceLink'); ?></h5>
                    <ul>
                        <?php if (!empty($marketplace) && is_array($marketplace)): ?>
                            <?php foreach ($marketplace as $s): ?>
                                <li>
                                    <a href="<?= $s['link_marketplace']; ?>" target="_blank">
                                        <img src="<?= base_url('assets/img/logo/' . $s['logo_marketplace']); ?>" 
                                             alt="<?= $s['nama_marketplace']; ?>" 
                                             style="height: 20px; margin-right: 5px;">
                                        <?= $s['nama_marketplace']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li><?= ($lang === 'id') ? "Tidak ada toko" : "No marketplace available"; ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p style="text-align: center; padding: 10px 0; background-color: #0a1928; color: white; font-size: 14px;">Copyright &copy; 2025. All Rights Reserved. Designed with love by Me</p>
        </div>
    </div>
</footer>
<!-- Footer End -->

