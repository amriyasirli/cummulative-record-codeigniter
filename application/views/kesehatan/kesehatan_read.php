 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Kesehatan Detail</h2>
        <table class="table">
	    <tr><td>Nama Siswa</td><td><?php echo $siswa_nama; ?></td></tr>
	    <tr><td>Golongan Darah</td><td><?php echo $kesehatan_darah; ?></td></tr>
	    <tr><td>Penyakit Yang Pernah Diderita</td><td><?php echo $kesehatan_penyakit; ?></td></tr>
	    <tr><td>Kelainan Jasmani</td><td><?php echo $kesehatan_kelainan_jasmani; ?></td></tr>
	    <tr><td>Tinggi Badan</td><td><?php echo $kesehatan_tinggi; ?></td></tr>
	    <tr><td>Berat Badan</td><td><?php echo $kesehatan_berat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kesehatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

<?php $this->load->view('template/footer');?>