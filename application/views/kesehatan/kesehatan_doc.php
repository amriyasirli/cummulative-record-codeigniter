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
        <h2>Kesehatan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kesehatan Siswa Id</th>
		<th>Kesehatan Darah</th>
		<th>Kesehatan Penyakit</th>
		<th>Kesehatan Kelainan Jasmani</th>
		<th>Kesehatan Tinggi</th>
		<th>Kesehatan Berat</th>
		
            </tr><?php
            foreach ($kesehatan_data as $kesehatan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kesehatan->kesehatan_siswa_id ?></td>
		      <td><?php echo $kesehatan->kesehatan_darah ?></td>
		      <td><?php echo $kesehatan->kesehatan_penyakit ?></td>
		      <td><?php echo $kesehatan->kesehatan_kelainan_jasmani ?></td>
		      <td><?php echo $kesehatan->kesehatan_tinggi ?></td>
		      <td><?php echo $kesehatan->kesehatan_berat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>