 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Sosial List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sosial/create'),'Tambah Sosial', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Siswa</th>
		<th>Sifat Suka</th>
		<th>Sifat Tdksuka</th>
		<th>Motivasi di Rumah</th>
		<th>Motivasi di Sekolah</th>
		<th>Action</th>
            </tr><?php
            foreach ($sosial_data as $sosial)
            {
                ?>
            <?php if($sosial->sosial_sifat_suka == '-'){ ?>
            
            <?php } else{ ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sosial->siswa_nama ?></td>
			<td><?php echo $sosial->sosial_sifat_suka ?></td>
			<td><?php echo $sosial->sosial_sifat_tdksuka ?></td>
			<td><?php echo $sosial->sosial_motif_rumah ?></td>
			<td><?php echo $sosial->sosial_motif_sekolah ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('sosial/read/'.$sosial->sosial_id),'Read', 'class="btn btn-sm btn-secondary"');  
				echo anchor(site_url('sosial/update/'.$sosial->sosial_id),'Update', 'class="btn btn-sm btn-info"');  
				echo anchor(site_url('sosial/delete/'.$sosial->sosial_id),'Delete', 'class="btn btn-sm btn-danger"'); 
				?>
			</td>
		</tr>
                <?php
            }
        }
            ?>
        </table>
    </div>
        <div class="row">
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>

        <?php $this->load->view('template/footer');?>


        <!-- Hapus Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda Yakin Ingin Menghapus ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('Auth/logout')?>">Okay</a>
        </div>
      </div>
    </div>
</div>