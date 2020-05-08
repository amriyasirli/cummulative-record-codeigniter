 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Kelas Read</h2>
        <table class="table">
	    <tr><td>Kelas Nama</td><td><?php echo $kelas_nama; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

<?php $this->load->view('template/footer');?>