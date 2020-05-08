<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Permasalahan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Permasalahan Siswa Id</th>
		<th>Permasalahan Sekolah</th>
		<th>Permasalahan Keluarga</th>
		<th>Permasalahan Masyarakat</th>
		<th>Permasalahan Teman</th>
		
            </tr><?php
            foreach ($permasalahan_data as $permasalahan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $permasalahan->permasalahan_siswa_id ?></td>
		      <td><?php echo $permasalahan->permasalahan_sekolah ?></td>
		      <td><?php echo $permasalahan->permasalahan_keluarga ?></td>
		      <td><?php echo $permasalahan->permasalahan_masyarakat ?></td>
		      <td><?php echo $permasalahan->permasalahan_teman ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>