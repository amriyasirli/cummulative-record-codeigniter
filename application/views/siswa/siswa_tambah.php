<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-user-graduate"></i> Form Input Data Siswa
    </div>
    <?= form_open_multipart('/Siswa/tambah') ?>
        <div class="form-group">
            <label>Nis</label>
            <input type="text" name="nis" placeholder="Nomor Induk Siswa" class="form-control">
            <?= form_error('nis', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
            
        </div>
        <div class="form-group">
            <label>Nama Panggilan</label>
            <input type="text" name="panggilan" placeholder="Nama panggilan" class="form-control">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="gender" required>
                <option value="">- Pilih -</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" placeholder="Tanggal lahir" class="form-control">
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" placeholder="Tempat lahir" class="form-control">
        </div>
        <div class="form-group">
            <label>Nama Orangtua</label>
            <input type="text" name="ortu" placeholder="Nama Orang Tua Ayah/Ibu" class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat Saat Ini" class="form-control">
        </div>
        <div class="form-group">
            <label>No Hp</label>
            <input type="text" name="hp" placeholder="No Hp" class="form-control">
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select class="form-control" name="agama" required>
                <option value="">- Pilih -</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Khatolik</option>
                <option>Hindu</option>
                <option>Budha</option>
            </select>
        </div>
        <div class="form-group">
            <label>Bahasa</label>
            <input type="text" name="bahasa" placeholder="Bahasa Sehari-hari" class="form-control">
        </div>
        <div class="form-group">
            <label>Tinggal Dengan</label>
            <input type="text" name="tinggal" placeholder="Tinggal Bersama..." class="form-control">
        </div>
        <div class="form-group">
            <label>Anak Ke</label>
            <input type="text" name="anak_ke" placeholder="Contoh: 4" class="form-control">
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas" required>
            <option value="">- Pilih -</option>
            <?php foreach ($data as $kel) : ?>
                <option value="<?php echo $kel->kelas_id; ?>"><?php echo $kel->kelas_nama; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <input type="submit" name="simpan-siswa" class="btn btn-primary" value="Simpan">
    <?= form_close() ?>
</div>
