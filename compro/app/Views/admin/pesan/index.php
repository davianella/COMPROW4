<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<!-- Tampilan: pesan_index.php -->
<div class="container mt-5">

    <!-- Total Pesan + Tombol Detail -->
    <div class="card shadow-sm p-4 mb-4">
        <h3 class="mb-3">📬 Jumlah Pesan Masuk</h3>
        <h1 class="text-primary"><?= $totalPesan; ?></h1>
        <a href="<?= base_url('admin/pesan/detail'); ?>" class="btn btn-outline-primary mt-3">Lihat Detail Pesan</a>
    </div>

    <!-- Grafik Negara Pengirim -->
    <div class="card shadow-sm p-4 mb-5">
        <h4 class="mb-4">🌍 Grafik Jumlah Pesan Berdasarkan Negara Pengirim</h4>
        <canvas id="negaraChart" width="400" height="200"></canvas>
    </div>

    <!-- Grafik Kategori -->
    <div class="card shadow-sm p-4 mb-5">
        <h4 class="mb-4">📊 Grafik Jumlah Pesan Berdasarkan Kategori</h4>
        <canvas id="kategoriChart" width="400" height="200"></canvas>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JavaScript Grafik -->
<script>
    const negaraData = <?= json_encode($negaraData); ?>;
    const kategoriData = <?= json_encode($kategoriData); ?>;

    // Grafik Lingkaran - Negara
    new Chart(document.getElementById('negaraChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: negaraData.labels,
            datasets: [{
                data: negaraData.values,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#FF9800', '#9C27B0'],
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Grafik Batang - Kategori
    new Chart(document.getElementById('kategoriChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: kategoriData.labels,
            datasets: [{
                label: 'Jumlah Pesan per Kategori',
                data: kategoriData.values,
                backgroundColor: '#4BC0C0',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

<?= $this->endSection(); ?>
