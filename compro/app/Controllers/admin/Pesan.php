<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesanModel;

class Pesan extends BaseController
{
    public function index()
    {
        $pesanModel = new PesanModel();
        $pesans = $pesanModel->findAll();  // Mengambil semua data pesan

        // Data untuk grafik
        $negaraData = $pesanModel->getNegaraData();  // Ambil data negara
        $kategoriData = $pesanModel->getKategoriData();  // Ambil data kategori

        // Menghitung jumlah pesan
        $totalPesan = count($pesans);

        return view('admin/pesan/index', [
            'pesans' => $pesans,
            'negaraData' => $negaraData,
            'kategoriData' => $kategoriData,
            'totalPesan' => $totalPesan
        ]);
    }

    public function detail()
    {
        $pesanModel = new PesanModel();
        $pesans = $pesanModel->findAll();

        return view('admin/pesan/detail', [
            'pesans' => $pesans
        ]);
    }

    
}
