 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

			<div class="row">

  <!-- Border Left Utilities -->
  

  <!-- Border Bottom Utilities -->
  <div class="col-lg-12">

    <div class="card mb-4 py-1 border-left-primary">
      <div class="card-body">
        <h2>Profil User</h2>
      </div>
    </div>
<!-- Circle Buttons -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        
        <div class="card-body">
            <!-- Circle Buttons (Default) -->
            <p><?= $this->session->flashdata('akses');?></p>
            <div class="table-responsive">
            <table class="table col-md-12">
                <tr><td><img src="<?= base_url('assets/img/img-user/'.$foto)?>" class="img-profile rounded-circle" width="150" alt="" /></td><td></td></tr>
                <tr><td> Nama</td><td><?php echo $nama; ?></td></tr>
                <tr><td> Username</td><td><?php echo $username; ?></td></tr>
                <tr><td> Password</td><td><?php echo $password; ?></td></tr>

				<?php if($role_id == 1){ ?>
					<tr><td> Role</td><td>Administrator</td></tr>
				<?php }else{ ?>
					<tr><td> Role</td><td>Member</td></tr>
				<?php } ?>

                <tr><td> Terdaftar</td><td><?= date('d F Y',  $data_created); ?></td></tr>
                <tr><td> Action</td><td><?php echo anchor(site_url('user/update/'. $user_id),'Update', 'class="btn btn-sm btn-info"');?></td></tr>
            </table>
            </div>
        </div>
    </div>
  </div>
</div>

<?php $this->load->view('template/footer');?>