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
        <h2>Psikologi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Psikologi Siswa Id</th>
		<th>Psikologi Bakat</th>
		<th>Psikologi Minat</th>
		<th>Psikologi Hobi</th>
		<th>Psikologi Citacita</th>
		<th>Psikologi Sekolah Impian</th>
		<th>Psikologi Perguruan</th>
		<th>Psikologi Dunia Kerja</th>
		<th>Psikologi Ekskul</th>
		<th>Psikologi Pelajaran Suka</th>
		<th>Psikologi Pelajaran Sulit</th>
		
            </tr><?php
            foreach ($psikologi_data as $psikologi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $psikologi->psikologi_siswa_id ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>