 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Sosial Detail</h2>
        <table class="table">
	    <tr><td>Nama Siswa</td><td><?php echo $siswa_nama; ?></td></tr>
	    <tr><td>Sifat Suka</td><td><?php echo $sosial_sifat_suka; ?></td></tr>
	    <tr><td>Sifat Tdksuka</td><td><?php echo $sosial_sifat_tdksuka; ?></td></tr>
	    <tr><td>Motif Rumah</td><td><?php echo $sosial_motif_rumah; ?></td></tr>
	    <tr><td>Motif Sekolah</td><td><?php echo $sosial_motif_sekolah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sosial') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

<?php $this->load->view('template/footer');?>