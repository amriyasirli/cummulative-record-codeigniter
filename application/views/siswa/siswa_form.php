 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Siswa <?php echo $button ?></h2>
        <?= form_open_multipart('/Siswa/update_action') ?>
        <div class="form-group">
            <img src="<?= base_url('assets/img/img-siswa/'.$siswa_foto)?>" class="img-profile rounded-circle" width="100" alt="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('siswa_foto') ?></label>
            <input type="file" class="form-control" name="siswa_foto" id="siswa_foto" />
        </div>
	    <div class="form-group">
            <input type="hidden" class="form-control" name="fotolama" id="fotolama" value="<?php echo $siswa_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nis <?php echo form_error('siswa_nis') ?></label>
            <input type="text" class="form-control" name="siswa_nis" id="siswa_nis" placeholder="Nis" value="<?php echo $siswa_nis; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('siswa_nama') ?></label>
            <input type="text" class="form-control" name="siswa_nama" id="siswa_nama" placeholder="Nama" value="<?php echo $siswa_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Panggilan <?php echo form_error('siswa_panggilan') ?></label>
            <input type="text" class="form-control" name="siswa_panggilan" id="siswa_panggilan" placeholder="Panggilan" value="<?php echo $siswa_panggilan; ?>" />
        </div>
        <div class="form-group">
            <label>Jenis Kelamin<?php echo form_error('siswa_gender') ?></label>
            <select class="form-control" name="siswa_gender">
            <option value="<?php echo $siswa_gender; ?>"><?php echo $siswa_gender; ?></option>
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="date">Tgl Lahir <?php echo form_error('siswa_tgl_lahir') ?></label>
            <input type="date" class="form-control" name="siswa_tgl_lahir" id="siswa_tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $siswa_tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('siswa_tempat_lahir') ?></label>
            <input type="text" class="form-control" name="siswa_tempat_lahir" id="siswa_tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $siswa_tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ortu <?php echo form_error('siswa_ortu') ?></label>
            <input type="text" class="form-control" name="siswa_ortu" id="siswa_ortu" placeholder="Ortu" value="<?php echo $siswa_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="siswa_alamat">Alamat <?php echo form_error('siswa_alamat') ?></label>
            <textarea class="form-control" rows="3" name="siswa_alamat" id="siswa_alamat" placeholder="Alamat"><?php echo $siswa_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('siswa_hp') ?></label>
            <input type="text" class="form-control" name="siswa_hp" id="siswa_hp" placeholder="Hp" value="<?php echo $siswa_hp; ?>" />
        </div>
        <div class="form-group">
            <label>Agama<?php echo form_error('siswa_agama') ?></label>
            <select class="form-control" name="siswa_agama">
            <option value="<?php echo $siswa_agama; ?>"><?php echo $siswa_agama; ?></option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Khatolik">Khatolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Bahasa <?php echo form_error('siswa_bahasa') ?></label>
            <input type="text" class="form-control" name="siswa_bahasa" id="siswa_bahasa" placeholder="Bahasa Sehari-hari" value="<?php echo $siswa_bahasa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tinggal <?php echo form_error('siswa_tinggal') ?></label>
            <input type="text" class="form-control" name="siswa_tinggal" id="siswa_tinggal" placeholder="Tinggal Bersama" value="<?php echo $siswa_tinggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Anak Ke <?php echo form_error('siswa_anak_ke') ?></label>
            <input type="text" class="form-control" name="siswa_anak_ke" id="siswa_anak_ke" placeholder="Anak Ke" value="<?php echo $siswa_anak_ke; ?>" />
        </div>
	    
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="siswa_kelas_id" required>
            <option value="<?php echo $siswa_kelas_id; ?>">- Default -</option>
            <?php foreach ($data as $kel) : ?>
                <option value="<?php echo $kel->kelas_id; ?>"><?php echo $kel->kelas_nama; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
	    <div class="form-group">
            
            <input type="hidden" class="form-control" name="siswa_kesehatan_id" id="siswa_kesehatan_id" placeholder="Kesehatan Id" value="1" />
        </div>
	    <div class="form-group">
            
            <input type="hidden" class="form-control" name="siswa_permasalahan_id" id="siswa_permasalahan_id" placeholder="Permasalahan Id" value="1" />
        </div>
	    <div class="form-group">
            
            <input type="hidden" class="form-control" name="siswa_psikologi_id" id="siswa_psikologi_id" placeholder="Psikologi Id" value="1" />
        </div>
	    <div class="form-group">
            
            <input type="hidden" class="form-control" name="siswa_sosial_id" id="siswa_sosial_id" placeholder="Sosial Id" value="1" />
        </div>
	    <input type="hidden" name="siswa_id" value="<?php echo $siswa_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a>
    <?= form_close() ?>

   <?php $this->load->view('template/footer');?>