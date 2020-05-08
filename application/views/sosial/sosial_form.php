 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Sosial <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <?php if($button == 'Create'){ ?>

        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="sosial_siswa_id">
                <option value="">- Pilih Siswa -</option>
        <?php foreach ($data->result() as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nis?> || <?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>
        <?php } else { ?>
        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="sosial_siswa_id">
                <option value="<?php echo $sosial_siswa_id; ?>"><?php echo $siswa_nama; ?></option>
        <?php foreach ($data as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>

        <?php } ?>


	    <div class="form-group">
            <label for="varchar">Sifat Suka <?php echo form_error('sosial_sifat_suka') ?></label>
            <input type="text" class="form-control" name="sosial_sifat_suka" id="sosial_sifat_suka" placeholder="Sifat Dari Diri Yang DiSukai" value="<?php echo $sosial_sifat_suka; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sifat Tdksuka <?php echo form_error('sosial_sifat_tdksuka') ?></label>
            <input type="text" class="form-control" name="sosial_sifat_tdksuka" id="sosial_sifat_tdksuka" placeholder="Sifat Dari Diri Yang Tidak DiSukai" value="<?php echo $sosial_sifat_tdksuka; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Motivasi di Rumah <?php echo form_error('sosial_motif_rumah') ?></label>
            <input type="text" class="form-control" name="sosial_motif_rumah" id="sosial_motif_rumah" placeholder="Motivasi di Rumah" value="<?php echo $sosial_motif_rumah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Motivasi di Sekolah <?php echo form_error('sosial_motif_sekolah') ?></label>
            <input type="text" class="form-control" name="sosial_motif_sekolah" id="sosial_motif_sekolah" placeholder="Motivasi di Sekolah" value="<?php echo $sosial_motif_sekolah; ?>" />
        </div>
	    <input type="hidden" name="sosial_id" value="<?php echo $sosial_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sosial') ?>" class="btn btn-default">Cancel</a>
	</form>

   <?php $this->load->view('template/footer');?>