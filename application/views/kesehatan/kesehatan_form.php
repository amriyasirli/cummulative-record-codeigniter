 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Kesehatan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">

        <?php if($button == 'Create'){ ?>

        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="kesehatan_siswa_id" placeholder="masukan jenis kelamin">
                <option value="">- Pilih Siswa -</option>
        <?php foreach ($data->result() as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nis?> || <?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>
        <?php } else { ?>
        <div class="form-group">
            <label>Nama Siswa</label>
            <select class="form-control" name="kesehatan_siswa_id" placeholder="masukan jenis kelamin">
                <option value="<?php echo $kesehatan_siswa_id; ?>"><?php echo $siswa_nama; ?></option>
        <?php foreach ($data as $nama) : ?>
                <option value="<?= $nama->siswa_id?>"><?= $nama->siswa_nama?></option>
        <?php endforeach; ?>
            </select>
        </div>

        <?php } ?>

	    <div class="form-group">
            <label for="varchar">Kesehatan Darah <?php echo form_error('kesehatan_darah') ?></label>
            <input type="text" class="form-control" name="kesehatan_darah" id="kesehatan_darah" placeholder="Kesehatan Darah" value="<?php echo $kesehatan_darah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kesehatan Penyakit <?php echo form_error('kesehatan_penyakit') ?></label>
            <input type="text" class="form-control" name="kesehatan_penyakit" id="kesehatan_penyakit" placeholder="Kesehatan Penyakit" value="<?php echo $kesehatan_penyakit; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kesehatan Kelainan Jasmani <?php echo form_error('kesehatan_kelainan_jasmani') ?></label>
            <input type="text" class="form-control" name="kesehatan_kelainan_jasmani" id="kesehatan_kelainan_jasmani" placeholder="Kesehatan Kelainan Jasmani" value="<?php echo $kesehatan_kelainan_jasmani; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kesehatan Tinggi <?php echo form_error('kesehatan_tinggi') ?></label>
            <input type="text" class="form-control" name="kesehatan_tinggi" id="kesehatan_tinggi" placeholder="Kesehatan Tinggi" value="<?php echo $kesehatan_tinggi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kesehatan Berat <?php echo form_error('kesehatan_berat') ?></label>
            <input type="text" class="form-control" name="kesehatan_berat" id="kesehatan_berat" placeholder="Kesehatan Berat" value="<?php echo $kesehatan_berat; ?>" />
        </div>
	    <input type="hidden" name="kesehatan_id" value="<?php echo $kesehatan_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kesehatan') ?>" class="btn btn-default">Cancel</a>
	</form>

        

   <?php $this->load->view('template/footer');?>