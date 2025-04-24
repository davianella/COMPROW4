<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesanModel;

class MessagesController extends BaseController
{
    public function index()
    {
        return view('popup_pesan');
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required',
            'negara' => 'required',
            'no_hp' => 'required',
            'email' => 'required|valid_email',
            'kategori' => 'required',
            'pesan' => 'required',
            'g-recaptcha-response' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Memverifikasi reCAPTCHA
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6LfUTiMrAAAAAI5ENbQnaVlqUsfsokQZ9pyIE-uQ'; 
        $response = \Config\Services::curlrequest()->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $secretKey,
                'response' => $recaptchaResponse
            ]
        ]);

        $recaptcha = json_decode($response->getBody());

        if (!$recaptcha->success) {
            return redirect()->back()->with('error', 'reCAPTCHA verification failed');
        }

        // Lanjutkan penyimpanan data ke database
        $model = new PesanModel();
        $model->insert($this->request->getPost());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

}
