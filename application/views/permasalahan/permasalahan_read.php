 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Permasalahan Detail</h2>
        <table class="table">
	    <tr><td>Nama Siswa</td><td><?php echo $siswa_nama; ?></td></tr>
	    <tr><td>Permasalahan Sekolah</td><td><?php echo $permasalahan_sekolah; ?></td></tr>
	    <tr><td>Permasalahan Keluarga</td><td><?php echo $permasalahan_keluarga; ?></td></tr>
	    <tr><td>Permasalahan Masyarakat</td><td><?php echo $permasalahan_masyarakat; ?></td></tr>
	    <tr><td>Permasalahan Teman</td><td><?php echo $permasalahan_teman; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('permasalahan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

<?php $this->load->view('template/footer');?>