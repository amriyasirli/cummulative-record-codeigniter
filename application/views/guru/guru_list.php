 <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">

        <h2 style="margin-top:0px">Guru List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('guru/create'),'Tambah Guru', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('guru/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('guru'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nip</th>
		<th>Nama</th>
		<th>Golongan</th>
		<th>Gender</th>
		<th>Jabatan</th>
		<th>Action</th>
            </tr><?php
            foreach ($guru_data as $guru)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $guru->guru_nip ?></td>
			<td><?php echo $guru->guru_nama ?></td>
			<td><?php echo $guru->guru_golongan ?></td>
			<td><?php echo $guru->guru_gender ?></td>
			<td><?php echo $guru->guru_jabatan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('guru/read/'.$guru->guru_id),'Read','class="btn btn-sm btn-secondary"'); 
				echo anchor(site_url('guru/update/'.$guru->guru_id),'Update', 'class="btn btn-sm btn-info"'); 
				echo anchor(site_url('guru/delete/'.$guru->guru_id),'Delete', 'class="btn btn-sm btn-danger"', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
    </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('guru/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('guru/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>

        <?php $this->load->view('template/footer');?>