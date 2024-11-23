<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id_mhs';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nim', 'nama_mhs', 'fakultas', 'prodi', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'created_at', 'foto'
    ];

    // Nonaktifkan timestamps
    protected $useTimestamps = false;
}