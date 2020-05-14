 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            <?php echo $this->session->flashdata('akses')?>

        <h2 style="margin-top:0px">Siswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            
                <?php if ($this->session->userdata('role_id') == 1){
                    echo anchor(site_url('siswa/tambah'),'Tambah Siswa', 'class="btn btn-primary"');
                    echo anchor(site_url('laporan/excel_siswa'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-sm btn-success ml-1 mt-1"');
		            echo anchor(site_url('siswa/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-sm btn-primary ml-1 mt-1"');
                }else{} ?>

            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nis</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Tgl Lahir</th>
		<th>Alamat</th>
		<th>Foto</th>
		<th>Kelas</th>
		<th>Action</th>
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php $no=1; echo $no++ ?></td>
			<td><?php echo $siswa->siswa_nis ?></td>
			<td><?php echo $siswa->siswa_nama ?></td>
			<td><?php echo $siswa->siswa_gender ?></td>
			<td><?php echo $siswa->siswa_tgl_lahir ?></td>
			<td><?php echo $siswa->siswa_alamat ?></td>
			<td><img src="<?= base_url('assets/img/img-siswa/'.$siswa->siswa_foto)?>" class="img-profile rounded-circle" width="50"></td>
			<td><?php echo $siswa->kelas_nama ?></td>
			<td style="text-align:center" width="200px">
				<?php 
                echo anchor(site_url('siswa/read/'.$siswa->siswa_id),'Lihat', 'class="btn btn-sm btn-secondary" '); ?>
                <?php if ($this->session->userdata('role_id') == 1){
				echo anchor(site_url('siswa/update/'.$siswa->siswa_id),'Update', 'class="btn btn-sm btn-info" '); 
				echo anchor(site_url('siswa/delete/'.$siswa->siswa_id),'Delete', 'class="btn btn-sm btn-danger" ','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				}?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
    </div>
		
        <div class="row">
            <div class="col mt-1 mb-1">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
            </div>
        </div>
	    
        </div>
        
        </div>
        </div>

        <?php $this->load->view('template/footer');?>
