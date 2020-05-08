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
        <h2>Sosial List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Sosial Siswa Id</th>
		<th>Sosial Sifat Suka</th>
		<th>Sosial Sifat Tdksuka</th>
		<th>Sosial Motif Rumah</th>
		<th>Sosial Motif Sekolah</th>
		
            </tr><?php
            foreach ($sosial_data as $sosial)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sosial->sosial_siswa_id ?></td>
		      <td><?php echo $sosial->sosial_sifat_suka ?></td>
		      <td><?php echo $sosial->sosial_sifat_tdksuka ?></td>
		      <td><?php echo $sosial->sosial_motif_rumah ?></td>
		      <td><?php echo $sosial->sosial_motif_sekolah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>