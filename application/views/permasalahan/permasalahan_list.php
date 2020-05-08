 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Permasalahan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('permasalahan/create'),'Tambah Permasalahan', 'class="btn btn-primary"'); ?>
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
		<th>Permasalahan Sekolah</th>
		<th>Permasalahan Keluarga</th>
		<th>Permasalahan Masyarakat</th>
		<th>Permasalahan Teman</th>
		<th>Action</th>
            </tr><?php
            foreach ($permasalahan_data as $permasalahan)
            {
                ?>
            <?php if($permasalahan->permasalahan_sekolah == '-'){ ?>
                
           <?php } else{ ?>

             
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $permasalahan->siswa_nama ?></td>
			<td><?php echo $permasalahan->permasalahan_sekolah ?></td>
			<td><?php echo $permasalahan->permasalahan_keluarga ?></td>
			<td><?php echo $permasalahan->permasalahan_masyarakat ?></td>
			<td><?php echo $permasalahan->permasalahan_teman ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('permasalahan/read/'.$permasalahan->permasalahan_id),'Read', 'class="btn btn-sm btn-secondary"'); 
				echo anchor(site_url('permasalahan/update/'.$permasalahan->permasalahan_id),'Update', 'class="btn btn-sm btn-info"'); 
				echo anchor(site_url('permasalahan/delete/'.$permasalahan->permasalahan_id),'Delete', 'class="btn btn-sm btn-danger"', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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