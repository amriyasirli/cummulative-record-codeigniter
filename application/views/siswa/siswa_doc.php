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
        <h2>Siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Siswa Nis</th>
		<th>Siswa Nama</th>
		<th>Siswa Panggilan</th>
		<th>Siswa Gender</th>
		<th>Siswa Tgl Lahir</th>
		<th>Siswa Tempat Lahir</th>
		<th>Siswa Ortu</th>
		<th>Siswa Alamat</th>
		<th>Siswa Hp</th>
		<th>Siswa Agama</th>
		<th>Siswa Bahasa</th>
		<th>Siswa Tinggal</th>
		<th>Siswa Anak Ke</th>
		<th>Siswa Foto</th>
		<th>Siswa Kelas Id</th>
		<th>Siswa Kesehatan Id</th>
		<th>Siswa Permasalahan Id</th>
		<th>Siswa Psikologi Id</th>
		<th>Siswa Sosial Id</th>
		
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $siswa->siswa_nis ?></td>
		      <td><?php echo $siswa->siswa_nama ?></td>
		      <td><?php echo $siswa->siswa_panggilan ?></td>
		      <td><?php echo $siswa->siswa_gender ?></td>
		      <td><?php echo $siswa->siswa_tgl_lahir ?></td>
		      <td><?php echo $siswa->siswa_tempat_lahir ?></td>
		      <td><?php echo $siswa->siswa_ortu ?></td>
		      <td><?php echo $siswa->siswa_alamat ?></td>
		      <td><?php echo $siswa->siswa_hp ?></td>
		      <td><?php echo $siswa->siswa_agama ?></td>
		      <td><?php echo $siswa->siswa_bahasa ?></td>
		      <td><?php echo $siswa->siswa_tinggal ?></td>
		      <td><?php echo $siswa->siswa_anak_ke ?></td>
		      <td><?php echo $siswa->siswa_foto ?></td>
		      <td><?php echo $siswa->siswa_kelas_id ?></td>
		      <td><?php echo $siswa->siswa_kesehatan_id ?></td>
		      <td><?php echo $siswa->siswa_permasalahan_id ?></td>
		      <td><?php echo $siswa->siswa_psikologi_id ?></td>
		      <td><?php echo $siswa->siswa_sosial_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>