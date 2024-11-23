<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mhs' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_mhs' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'fakultas' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'prodi' => [
                'type' => 'VARCHAR',
                'constraint' => '25',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '90',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
        ]);
        $this->forge->addKey('id_mhs', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}