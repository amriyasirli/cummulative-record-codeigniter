 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Psikologi List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('psikologi/create'),'Tambah Psikologi', 'class="btn btn-primary"'); ?>
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
		<th>Bakat</th>
		<th>Minat</th>
		<th>Hobi</th>
		<th>Citacita</th>
		<th>Sekolah Impian</th>
		<th>Perguruan</th>
		<th>Dunia Kerja</th>
		<th>Ekskul</th>
		<th>Pelajaran Suka</th>
		<th>Pelajaran Sulit</th>
		<th>Action</th>
            </tr><?php
            foreach ($psikologi_data as $psikologi)
            {
                ?>
            <?php if($psikologi->psikologi_bakat == '-'){ ?>
                
            <?php } else{ ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $psikologi->siswa_nama ?></td>
			<td><?php echo $psikologi->psikologi_bakat ?></td>
			<td><?php echo $psikologi->psikologi_minat ?></td>
			<td><?php echo $psikologi->psikologi_hobi ?></td>
			<td><?php echo $psikologi->psikologi_citacita ?></td>
			<td><?php echo $psikologi->psikologi_sekolah_impian ?></td>
			<td><?php echo $psikologi->psikologi_perguruan ?></td>
			<td><?php echo $psikologi->psikologi_dunia_kerja ?></td>
			<td><?php echo $psikologi->psikologi_ekskul ?></td>
			<td><?php echo $psikologi->psikologi_pelajaran_suka ?></td>
			<td><?php echo $psikologi->psikologi_pelajaran_sulit ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('psikologi/read/'.$psikologi->psikologi_id),'Read', 'class="btn btn-sm btn-secondary"'); 
				echo anchor(site_url('psikologi/update/'.$psikologi->psikologi_id),'Update', 'class="btn btn-sm btn-info"'); 
				echo anchor(site_url('psikologi/delete/'.$psikologi->psikologi_id),'Delete', 'class="btn btn-sm btn-danger"', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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