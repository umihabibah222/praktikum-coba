<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\I18n\Time;

class DataMahasiswa extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll(); // Mengambil semua data mahasiswa
        
        return view('mahasiswa/index', $data); // Mengirim data ke view
    }

    // Method untuk menampilkan form tambah data mahasiswa
    public function create()
    {
        $validation = \Config\Services::validation(); // Mendapatkan layanan validasi
        return view('mahasiswa/data_mahasiswa/create', ['validation' => $validation]); // Mengirimkan validasi ke view
    }

    // Method untuk mengedit data mahasiswa
    public function edit($id)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->find($id); // Mengambil data berdasarkan ID
        
        return view('mahasiswa/data_mahasiswa/edit', $data); // Menampilkan halaman edit
    }

    // Method untuk menyimpan data mahasiswa
    public function save()
{
    $model = new MahasiswaModel();

    // Validasi input
    $validation = \Config\Services::validation();
    if (!$this->validate([
        'nim' => 'required|is_unique[mahasiswa.nim]',
        'nama_mhs' => 'required',
        'fakultas' => 'required',
        'prodi' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required|valid_date',
        'jenis_kelamin' => 'required',
        'foto' => 'uploaded[foto]|max_size[foto,20000]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
    ])) {
        // Jika validasi gagal, kembali ke halaman form tambah
        return redirect()->to('/data-master-mahasiswa/create')->withInput();
    }

    // Ambil data input
    $data = [
        'nim' => $this->request->getPost('nim'),
        'nama_mhs' => $this->request->getPost('nama_mhs'),
        'fakultas' => $this->request->getPost('fakultas'),
        'prodi' => $this->request->getPost('prodi'),
        'alamat' => $this->request->getPost('alamat'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
    ];

    // Proses upload foto jika ada
    if ($this->request->getFile('foto')->isValid()) {
        $foto = $this->request->getFile('foto');
        $newName = $foto->getRandomName();
        $foto->move(FCPATH . 'uploads/foto', $newName);  // Simpan file di folder uploads/foto
        $data['foto'] = $newName;  // Simpan nama file yang baru saja di-upload
    }

    // Simpan data mahasiswa ke database
    $model->save($data);

    // Redirect ke halaman utama setelah sukses
    return redirect()->to('/data-master-mahasiswa');
}

public function update($id)
{
    $model = new MahasiswaModel();

    // Validasi input
    if (!$this->validate([
        'nim' => 'required',
        'nama_mhs' => 'required',
        'fakultas' => 'required',
        'prodi' => 'required',
        'alamat' => 'required',
        'tanggal_lahir' => 'required|valid_date',
        'jenis_kelamin' => 'required',
        'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil data input
    $data = [
        'nim' => $this->request->getPost('nim'),
        'nama_mhs' => $this->request->getPost('nama_mhs'),
        'fakultas' => $this->request->getPost('fakultas'),
        'prodi' => $this->request->getPost('prodi'),
        'alamat' => $this->request->getPost('alamat'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
    ];

    // Proses tampil foto jika ada
    $foto = $this->request->getFile('foto');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $newName = $foto->getRandomName();
        $foto->move(FCPATH . 'uploads/foto', $newName);
        $data['foto'] = $newName;
    }

    // Update data mahasiswa di database
    $model->update($id, $data);

    // Redirect ke halaman utama dengan pesan sukses
    return redirect()->to('/data-master-mahasiswa')->with('message', 'Data mahasiswa berhasil diperbarui');
}


    

    // Method untuk menghapus data mahasiswa
    public function hapus($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id); // Menghapus data berdasarkan ID
        
        return redirect()->to('/data-master-mahasiswa'); // Redirect setelah hapus
    }
}