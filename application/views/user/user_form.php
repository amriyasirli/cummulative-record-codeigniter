 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">User <?php echo $button ?></h2>
        <?= form_open_multipart('/User/update_action') ?>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="hidden" class="form-control" name="fotolama" id="foto" value="<?php echo $foto; ?>" />
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        
        <?php if($this->session->userdata('role_id') == 2){ ?>
        <div class="form-group">
         <input type="hidden" class="form-control" name="role_id" value="<?php echo $role_id; ?>" />
        </div>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" /> 
	        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <?php }else { ?>
            <div class="form-group">
            <label>Role Id</label>
            <select class="form-control" name="role_id" id="role_id">
                <option value="<?php echo $role_id; ?>">-Default-</option>
                <option value="1">Administrator</option>
                <option value="2">Member</option>
            </select>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
        <?php } ?>
    <?= form_close() ?>

   <?php $this->load->view('template/footer');?>