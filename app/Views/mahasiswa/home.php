<?= $this->extend('Layout/app') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<h1 class="h3 mb-0 text-gray-800">DATA MASTER MAHASISWA</h1>

<!-- Tombol Tambah Data -->
<div class="mb-3">
    <a href="<?= base_url('data-master-mahasiswa/create'); ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Data
    </a>

</div>

<!-- Table Section -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Mahasiswa</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($mahasiswa)) : ?>
                    <?php $no = 1; foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($mhs['id_mhs']); ?></td>
                        <td><?= esc($mhs['nim']); ?></td>
                        <td><?= esc($mhs['nama_mhs']); ?></td>
                        <td><?= esc($mhs['fakultas']); ?></td>
                        <td><?= esc($mhs['prodi']); ?></td>
                        <td><?= esc($mhs['alamat']); ?></td>
                        <td><?= esc($mhs['tanggal_lahir']); ?></td>
                        <td><?= esc($mhs['jenis_kelamin']); ?></td>
                        <td>
                            <img src="<?= base_url('uploads/foto/' . $mhs['foto']); ?>" alt="Foto Mahasiswa"
                                class="img-thumbnail" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <a href="<?= base_url('data-master-mahasiswa/edit/' . $mhs['id_mhs']); ?>"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('data-master-mahasiswa/hapus/' . $mhs['id_mhs']); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>