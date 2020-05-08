<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-user-graduate"></i> Form Input Data User
    </div>
    <?= form_open_multipart('/User/tambah') ?>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
	    <div class="form-group">
            <label for="varchar">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="form-group">
            <label>Role Id</label>
            <select class="form-control" name="role_id" id="role_id">
                <option value="1">Administrator</option>
                <option value="2">Member</option>
            </select>
        </div>
	    <input type="submit" name="tambah-user" class="btn btn-primary" value="Simpan"/> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
    <?= form_close() ?>
</div>