<?php
// Ambil bahasa yang disimpan di session
$lang = session()->get('lang') ?? 'id'; // Default ke 'id' jika tidak ada di session

$current_url = uri_string();

// Ambil query string (misalnya ?keyword=sukses)
$query_string = $_SERVER['QUERY_STRING'] ?? ''; // Pastikan tidak ada error jika query string kosong

// Simpan segmen bahasa saat ini
$segments = explode('/', $current_url);
$lang_segment = $segments[0] ?? ''; // Ambil segmen pertama dari URL

// Pastikan hanya 'en' atau 'id' yang dianggap sebagai segmen bahasa
if ($lang_segment !== 'en' && $lang_segment !== 'id') {
    $lang_segment = 'id'; // Default ke 'id' jika segmen bahasa tidak ada
}

// Definisikan tautan untuk setiap halaman berdasarkan bahasa
$homeLink    = ($lang_segment === 'en') ? '/' : '/';
$aboutLink   = ($lang_segment === 'en') ? 'about' : 'tentang';
$contactLink = ($lang_segment === 'en') ? 'contact' : 'kontak';
$articleLink = ($lang_segment === 'en') ? 'article' : 'artikel';
$activityLink = ($lang_segment === 'en') ? 'activity' : 'aktivitas';
$productLink = ($lang_segment === 'en') ? 'product' : 'produk';

// Ambil bagian dari URL tanpa segmen bahasa
array_shift($segments); // Hapus segmen bahasa dari array
$url_without_lang = implode('/', $segments); // Gabungkan kembali sisa URL

// Tentukan bahasa yang ingin digunakan
$new_lang = ($lang_segment === 'en') ? 'id' : 'en';

// Mapping penggantian segmen dalam URL berdasarkan bahasa yang aktif
$replace_map = [
    'tentang' => 'about',
    'kontak' => 'contact',
    'artikel' => 'article',
    'aktivitas' => 'activity',
    'produk' => 'product',
];

foreach ($replace_map as $id => $en) {
    if ($lang_segment === 'en') {
        // Jika bahasa saat ini 'en', ubah ke 'id'
        $url_without_lang = str_replace($en, $id, $url_without_lang);
    } else {
        // Jika bahasa saat ini 'id', ubah ke 'en'
        $url_without_lang = str_replace($id, $en, $url_without_lang);
    }
}

// Buat URL yang bersih
$clean_url = ($url_without_lang !== '') ? "$new_lang/$url_without_lang" : $new_lang;

// Gabungkan query string jika ada
if (!empty($query_string)) {
    $clean_url .= '?' . $query_string;
}

// Tautan Bahasa Inggris & Indonesia
$english_url = base_url($clean_url);
$indonesia_url = base_url($clean_url);

// Tautan Kategori Artikel untuk Navbar
$categoryLinks = [];
if (!empty($categories)) {
    foreach ($categories as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $categoryLinks[] = [
            'url' => base_url("$lang/$articleLink/$slug"),
            'name' => $name
        ];
    }
}

// Tautan Kategori Aktivitas untuk Navbar
$kategoriAktivitasLinks = [];
if (!empty($categoriesAktivitas)) {
    foreach ($categoriesAktivitas as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $kategoriAktivitasLinks[] = [
            'url' => base_url("$lang/$activityLink/$slug"),
            'name' => $name
        ];
    }
}
?>


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="#">BDICAM</a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BDICAM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 <?= isset($activeMenu) && $activeMenu === 'home' ? 'active' : '' ?>" 
                           href="<?= base_url($lang . '/') ?>">
                            <?= lang('bahasa.home'); ?>
                        </a>
                    </li>
                    <!-- About -->
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 <?= isset($activeMenu) && $activeMenu === 'about' ? 'active' : '' ?>" 
                           href="<?= base_url($lang . '/' . $aboutLink) ?>">
                            <?= lang('bahasa.about'); ?>
                        </a>
                    </li>
                    <!-- Produk -->
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 <?= isset($activeMenu) && $activeMenu === 'product' ? 'active' : '' ?>" 
                           href="<?= base_url($lang . '/' . $productLink) ?>">
                            <?= lang('bahasa.product'); ?>
                        </a>
                    </li>
                    <!-- Dropdown Aktivitas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mx-lg-2 <?= isset($activeMenu) && $activeMenu === 'activity' ? 'active' : '' ?>" href="#" id="activityDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= lang('bahasa.activity'); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="activityDropdown">
                            <li><a class="dropdown-item" href="<?= base_url($lang . '/' . $activityLink) ?>">
                                    <?= $lang == 'id' ? 'Semua Aktivitas' : 'All Activities'; ?>
                                </a>
                            </li>
                            <?php if (!empty($kategoriAktivitasLinks)): ?>
                                <?php foreach ($kategoriAktivitasLinks as $categoriAktivitasLink): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= $categoriAktivitasLink['url']; ?>">
                                            <?= $categoriAktivitasLink['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item"><?= $lang == 'id' ? 'Tidak ada kategori' : 'No Categories available'; ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <!-- Dropdown Artikel -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mx-lg-2 <?= isset($activeMenu) && $activeMenu === 'article' ? 'active' : '' ?>" href="#" id="articlesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= lang('bahasa.article'); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="articlesDropdown">
                            <li><a class="dropdown-item" href="<?= base_url($lang . '/' . $articleLink) ?>">
                                    <?= $lang == 'id' ? 'Semua Artikel' : 'All Articles'; ?>
                                </a>
                            </li>
                            <?php if (!empty($categoryLinks)): ?>
                                <?php foreach ($categoryLinks as $categoryLink): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= $categoryLink['url']; ?>">
                                            <?= $categoryLink['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item"><?= $lang == 'id' ? 'Tidak ada kategori' : 'No Categories available'; ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <!-- Kontak -->
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 <?= isset($activeMenu) && $activeMenu === 'contact' ? 'active' : '' ?>" 
                           href="<?= base_url($lang . '/' . $contactLink) ?>">
                            <?= lang('bahasa.contact'); ?>
                        </a>
                    </li>
                    <!-- Pilihan Bahasa -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mx-lg-2" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= ($lang === 'en') ? 'English' : 'Indonesia'; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item" href="<?= $indonesia_url; ?>">
                                    <img src="<?= base_url('assets/img/flags/id.png') ?>" style="width: 20px;"> Indonesia
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= $english_url; ?>">
                                    <img src="<?= base_url('assets/img/flags/en.png') ?>" style="width: 20px;"> English
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="calling-button">Hubungi Kami</a>
        <button class="navbar-toggler p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- Navbar End -->
