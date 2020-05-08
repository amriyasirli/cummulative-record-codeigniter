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
        <h2>Guru List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Guru Nip</th>
		<th>Guru Nama</th>
		<th>Guru Golongan</th>
		<th>Guru Gender</th>
		<th>Guru Jabatan</th>
		
            </tr><?php
            foreach ($guru_data as $guru)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $guru->guru_nip ?></td>
		      <td><?php echo $guru->guru_nama ?></td>
		      <td><?php echo $guru->guru_golongan ?></td>
		      <td><?php echo $guru->guru_gender ?></td>
		      <td><?php echo $guru->guru_jabatan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>