 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Tambah Kelas</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('kelas_nama') ?></label>
            <input type="text" class="form-control" name="kelas_nama" id="kelas_nama" placeholder="Nama Kelas" value="<?php echo $kelas_nama; ?>" />
        </div>
	    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a>
	</form>

   <?php $this->load->view('template/footer');?>