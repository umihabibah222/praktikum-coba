<?= $this->extend('Layout/app') ?>

<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('data-master-mahasiswa/simpan'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim'); ?>" required>
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nim') : ''; ?>
                </div>
            </div>


            <div class="form-group">
                <label for="nama_mhs">Nama</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= old('nama_mhs'); ?>"
                    required>
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_mhs'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="fakultas">Fakultas</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= old('fakultas'); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" value="<?= old('prodi'); ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?= old('alamat'); ?></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="<?= old('tanggal_lahir'); ?>" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki
                    </option>
                    <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : ''; ?>>Perempuan
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('data-master-mahasiswa'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?= \Config\Services::validation()->listErrors(); ?>

<?= $this->endSection() ?>