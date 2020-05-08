 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Kesehatan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kesehatan/create'),'Tambah Kesehatan', 'class="btn btn-primary"'); ?>
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
		<th>Darah</th>
		<th>Penyakit</th>
		<th>Kelainan Jasmani</th>
		<th>Tinggi</th>
		<th>Berat</th>
		<th>Action</th>
            </tr><?php
            foreach ($kesehatan_data as $kesehatan)
            {
                ?>
            <?php if($kesehatan->kesehatan_darah == '-'){ ?>
            
            <?php } else{ ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kesehatan->siswa_nama ?></td>
			<td><?php echo $kesehatan->kesehatan_darah ?></td>
			<td><?php echo $kesehatan->kesehatan_penyakit ?></td>
			<td><?php echo $kesehatan->kesehatan_kelainan_jasmani ?></td>
			<td><?php echo $kesehatan->kesehatan_tinggi ?></td>
			<td><?php echo $kesehatan->kesehatan_berat ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kesehatan/read/'.$kesehatan->kesehatan_id),'Read', 'class="btn btn-sm btn-secondary"'); 
				echo anchor(site_url('kesehatan/update/'.$kesehatan->kesehatan_id),'Update', 'class="btn btn-sm btn-info"'); 
				echo anchor(site_url('kesehatan/delete/'.$kesehatan->kesehatan_id),'Delete', 'class="btn btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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