<?php

namespace App\Controllers\Mahasiswa; // Namespace yang sesuai dengan struktur folder

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        // Ambil data mahasiswa dari database
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $data['mahasiswa'] = $mahasiswaModel->findAll();
    
        // Panggil view dengan data mahasiswa
        return view('mahasiswa/home', $data);
    }
    
}