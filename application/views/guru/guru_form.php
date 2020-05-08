 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Guru <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Guru Nip <?php echo form_error('guru_nip') ?></label>
            <input type="text" class="form-control" name="guru_nip" id="guru_nip" placeholder="Guru Nip" value="<?php echo $guru_nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Guru Nama <?php echo form_error('guru_nama') ?></label>
         <input type="text" class="form-control" name="guru_nama" id="guru_nama" placeholder="Guru Nama" value="<?php echo $guru_nama; ?>" />
        </div>
        <div class="form-group">
            <label>Golongan <?php echo form_error('guru_golongan') ?></label>
            <select class="form-control" name="guru_golongan">
                <option value="I/A">I/A</option>
                <option value="I/B">I/B</option>
                <option value="I/C">I/C</option>
                <option value="I/D">I/D</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin <?php echo form_error('guru_gender') ?></label>
            <select class="form-control" name="guru_gender">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jabatan <?php echo form_error('guru_jabatan') ?></label>
            <select class="form-control" name="guru_jabatan">
                <option value="Kepala Sekolah">Kepala Sekolah</option>
                <option value="Wakil Kurikulum">Wakil Kurikulum</option>
                <option value="Wakil Kesiswaan">Wakil Kesiswaan</option>
                <option value="Wakil Sarana">Wakil Sarana</option>
                <option value="Guru">Guru</option>
                <option value="Staf Tata Usaha">Staf Tata Usaha</option>
                <option value="Lainnya..">Lainnya..</option>
            </select>
        </div>
	    <input type="hidden" name="guru_id" value="<?php echo $guru_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('guru') ?>" class="btn btn-default">Cancel</a>
	</form>

   <?php $this->load->view('template/footer');?>