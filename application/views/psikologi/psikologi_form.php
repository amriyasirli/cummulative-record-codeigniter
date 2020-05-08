 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Psikologi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <?php if($button == 'Create'){ ?>

        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="psikologi_siswa_id">
                <option value="">- Pilih Siswa -</option>
        <?php foreach ($data->result() as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nis?> || <?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>
        <?php } else { ?>
        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="psikologi_siswa_id">
                <option value="<?php echo $psikologi_siswa_id; ?>"><?php echo $siswa_nama; ?></option>
        <?php foreach ($data as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>

        <?php } ?>

	    <div class="form-group">
            <label for="varchar">Psikologi Bakat <?php echo form_error('psikologi_bakat') ?></label>
            <input type="text" class="form-control" name="psikologi_bakat" id="psikologi_bakat" placeholder="Psikologi Bakat" value="<?php echo $psikologi_bakat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Minat <?php echo form_error('psikologi_minat') ?></label>
            <input type="text" class="form-control" name="psikologi_minat" id="psikologi_minat" placeholder="Psikologi Minat" value="<?php echo $psikologi_minat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Hobi <?php echo form_error('psikologi_hobi') ?></label>
            <input type="text" class="form-control" name="psikologi_hobi" id="psikologi_hobi" placeholder="Psikologi Hobi" value="<?php echo $psikologi_hobi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Citacita <?php echo form_error('psikologi_citacita') ?></label>
            <input type="text" class="form-control" name="psikologi_citacita" id="psikologi_citacita" placeholder="Psikologi Citacita" value="<?php echo $psikologi_citacita; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Sekolah Impian <?php echo form_error('psikologi_sekolah_impian') ?></label>
            <input type="text" class="form-control" name="psikologi_sekolah_impian" id="psikologi_sekolah_impian" placeholder="Psikologi Sekolah Impian" value="<?php echo $psikologi_sekolah_impian; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Perguruan <?php echo form_error('psikologi_perguruan') ?></label>
            <input type="text" class="form-control" name="psikologi_perguruan" id="psikologi_perguruan" placeholder="Psikologi Perguruan" value="<?php echo $psikologi_perguruan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Dunia Kerja <?php echo form_error('psikologi_dunia_kerja') ?></label>
            <input type="text" class="form-control" name="psikologi_dunia_kerja" id="psikologi_dunia_kerja" placeholder="Psikologi Dunia Kerja" value="<?php echo $psikologi_dunia_kerja; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Ekskul <?php echo form_error('psikologi_ekskul') ?></label>
            <input type="text" class="form-control" name="psikologi_ekskul" id="psikologi_ekskul" placeholder="Psikologi Ekskul" value="<?php echo $psikologi_ekskul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Pelajaran Suka <?php echo form_error('psikologi_pelajaran_suka') ?></label>
            <input type="text" class="form-control" name="psikologi_pelajaran_suka" id="psikologi_pelajaran_suka" placeholder="Psikologi Pelajaran Suka" value="<?php echo $psikologi_pelajaran_suka; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Psikologi Pelajaran Sulit <?php echo form_error('psikologi_pelajaran_sulit') ?></label>
            <input type="text" class="form-control" name="psikologi_pelajaran_sulit" id="psikologi_pelajaran_sulit" placeholder="Psikologi Pelajaran Sulit" value="<?php echo $psikologi_pelajaran_sulit; ?>" />
        </div>
	    <input type="hidden" name="psikologi_id" value="<?php echo $psikologi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('psikologi') ?>" class="btn btn-default">Cancel</a>
	</form>

   <?php $this->load->view('template/footer');?>