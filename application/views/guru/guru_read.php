 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Guru Read</h2>
        <table class="table">
	    <tr><td>Guru Nip</td><td><?php echo $guru_nip; ?></td></tr>
	    <tr><td>Guru Nama</td><td><?php echo $guru_nama; ?></td></tr>
	    <tr><td>Guru Golongan</td><td><?php echo $guru_golongan; ?></td></tr>
	    <tr><td>Guru Gender</td><td><?php echo $guru_gender; ?></td></tr>
	    <tr><td>Guru Jabatan</td><td><?php echo $guru_jabatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('guru') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

<?php $this->load->view('template/footer');?>