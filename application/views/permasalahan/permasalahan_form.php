 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Permasalahan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <?php if($button == 'Create'){ ?>

        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="permasalahan_siswa_id">
                <option value="">- Pilih Siswa -</option>
        <?php foreach ($data->result() as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nis?> || <?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>
        <?php } else { ?>
        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="permasalahan_siswa_id">
                <option value="<?php echo $permasalahan_siswa_id; ?>"><?php echo $siswa_nama; ?></option>
        <?php foreach ($data as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>

        <?php } ?>

	    <div class="form-group">
            <label for="varchar">Permasalahan Sekolah <?php echo form_error('permasalahan_sekolah') ?></label>
            <input type="text" class="form-control" name="permasalahan_sekolah" id="permasalahan_sekolah" placeholder="Permasalahan Sekolah" value="<?php echo $permasalahan_sekolah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Permasalahan Keluarga <?php echo form_error('permasalahan_keluarga') ?></label>
            <input type="text" class="form-control" name="permasalahan_keluarga" id="permasalahan_keluarga" placeholder="Permasalahan Keluarga" value="<?php echo $permasalahan_keluarga; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Permasalahan Masyarakat <?php echo form_error('permasalahan_masyarakat') ?></label>
            <input type="text" class="form-control" name="permasalahan_masyarakat" id="permasalahan_masyarakat" placeholder="Permasalahan Masyarakat" value="<?php echo $permasalahan_masyarakat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Permasalahan Teman <?php echo form_error('permasalahan_teman') ?></label>
            <input type="text" class="form-control" name="permasalahan_teman" id="permasalahan_teman" placeholder="Permasalahan Teman" value="<?php echo $permasalahan_teman; ?>" />
        </div>
	    <input type="hidden" name="permasalahan_id" value="<?php echo $permasalahan_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('permasalahan') ?>" class="btn btn-default">Cancel</a>
	</form>

   <?php $this->load->view('template/footer');?>