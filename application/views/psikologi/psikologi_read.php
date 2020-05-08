 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Psikologi Detail</h2>
        <table class="table">
	    <tr><td>Nama Siswa</td><td><?php echo $siswa_nama; ?></td></tr>
	    <tr><td>Bakat</td><td><?php echo $psikologi_bakat; ?></td></tr>
	    <tr><td>Minat</td><td><?php echo $psikologi_minat; ?></td></tr>
	    <tr><td>Hobi</td><td><?php echo $psikologi_hobi; ?></td></tr>
	    <tr><td>Citacita</td><td><?php echo $psikologi_citacita; ?></td></tr>
	    <tr><td>Sekolah Impian</td><td><?php echo $psikologi_sekolah_impian; ?></td></tr>
	    <tr><td>Perguruan</td><td><?php echo $psikologi_perguruan; ?></td></tr>
	    <tr><td>Dunia Kerja</td><td><?php echo $psikologi_dunia_kerja; ?></td></tr>
	    <tr><td>Ekskul</td><td><?php echo $psikologi_ekskul; ?></td></tr>
	    <tr><td>Pelajaran Suka</td><td><?php echo $psikologi_pelajaran_suka; ?></td></tr>
	    <tr><td>Pelajaran Sulit</td><td><?php echo $psikologi_pelajaran_sulit; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('psikologi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

<?php $this->load->view('template/footer');?>