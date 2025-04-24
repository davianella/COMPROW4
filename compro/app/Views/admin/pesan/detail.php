<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Detail Semua Pesan</h1>

    <!-- Tabel Pesan -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Negara</th>
                <th>Kategori</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesans as $pesan): ?>
            <tr>
                <td><?= $pesan['id_pesan'] ?></td>
                <td><?= $pesan['nama'] ?></td>
                <td><?= $pesan['negara'] ?></td>
                <td><?= $pesan['kategori'] ?></td>
                <td><?= $pesan['pesan']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('admin/pesan') ?>" class="btn btn-secondary mt-3">Kembali</a>
</div>
<?= $this->endSection() ?>
