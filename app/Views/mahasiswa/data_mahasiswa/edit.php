<?= $this->extend('Layout/app') ?>

<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('data-master-mahasiswa/update/' . $mahasiswa['id_mhs']); ?>" method="post"
            enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim"
                    value="<?= old('nim', $mahasiswa['nim']); ?>" required>
            </div>

            <div class="form-group">
                <label for="nama_mhs">Nama</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs"
                    value="<?= old('nama_mhs', $mahasiswa['nama_mhs']); ?>" required>
            </div>

            <div class="form-group">
                <label for="fakultas">Fakultas</label>
                <input type="text" class="form-control" id="fakultas" name="fakultas"
                    value="<?= old('fakultas', $mahasiswa['fakultas']); ?>" required>
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" class="form-control" id="prodi" name="prodi"
                    value="<?= old('prodi', $mahasiswa['prodi']); ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat"
                    required><?= old('alamat', $mahasiswa['alamat']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="<?= old('tanggal_lahir', $mahasiswa['tanggal_lahir']); ?>" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki"
                        <?= old('jenis_kelamin', $mahasiswa['jenis_kelamin']) == 'Laki-laki' ? 'selected' : ''; ?>>
                        Laki-laki</option>
                    <option value="Perempuan"
                        <?= old('jenis_kelamin', $mahasiswa['jenis_kelamin']) == 'Perempuan' ? 'selected' : ''; ?>>
                        Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
                <small>Biarkan kosong jika tidak ingin mengubah foto</small>
                <div class="mt-2">
                    <img src="<?= base_url('uploads/foto/' . $mahasiswa['foto']); ?>" alt="Foto Mahasiswa"
                        class="img-thumbnail" style="width: 100px; height: auto;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('data-master-mahasiswa'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>