 
            <?php $this->load->view('template/header');?>
            <?php $this->load->view('template/sidebar');?>
            <div class="container-fluid">
            
        <h2 style="margin-top:0px">Detail Siswa</h2>
		<div class="row">
			<div class="col-md-7">
 					<div class="table-responsive">
					<table class="table col-md-12">
						<tr><td><img src="<?= base_url('assets/img/img-siswa/'.$siswa_foto)?>" class="img-profile rounded-circle" width="150" alt="" /></td><td></td></tr>
						<tr><td> Nis</td><td><?php echo $siswa_nis; ?></td></tr>
						<tr><td> Nama Lengkap</td><td><?php echo $siswa_nama; ?></td></tr>
						<tr><td> Nama Panggilan</td><td><?php echo $siswa_panggilan; ?></td></tr>
						<tr><td> Jenis Kelamin</td><td><?php echo $siswa_gender; ?></td></tr>
						<tr><td> Tanggal Lahir</td><td><?php echo $siswa_tgl_lahir; ?></td></tr>
						<tr><td> Tempat Lahir</td><td><?php echo $siswa_tempat_lahir; ?></td></tr>
						<tr><td> Nama Orang Tua</td><td><?php echo $siswa_ortu; ?></td></tr>
						<tr><td> Alamat</td><td><?php echo $siswa_alamat; ?></td></tr>
						<tr><td> Hp</td><td><?php echo $siswa_hp; ?></td></tr>
						<tr><td> Agama</td><td><?php echo $siswa_agama; ?></td></tr>
						<tr><td> Bahasa Sehari-hari</td><td><?php echo $siswa_bahasa; ?></td></tr>
						<tr><td> Tinggal Bersama</td><td><?php echo $siswa_tinggal; ?></td></tr>
						<tr><td> Anak Ke</td><td><?php echo $siswa_anak_ke; ?></td></tr>
						<tr><td> Kelas</td><td><?php echo $kelas_nama; ?></td></tr>
						
						<tr><td><strong>Kesehatan</strong></td></tr>
						<tr><td> Golongan Darah</td><td><?php echo $kesehatan_darah; ?></td></tr>
						<tr><td> Penyakit Yang Pernah Derita</td><td><?php echo $kesehatan_penyakit; ?></td></tr>
						<tr><td> Kelainan Jasmani</td><td><?php echo $kesehatan_kelainan_jasmani; ?></td></tr>
						<tr><td> Tinggi Badan</td><td><?php echo $kesehatan_tinggi; ?></td></tr>
						<tr><td> Berat Badan</td><td><?php echo $kesehatan_berat; ?></td></tr>
					
						<tr><td><strong>Permasalahan</strong></td></tr>
						<tr><td> Permasalahan Di Sekolah</td><td><?php echo $permasalahan_sekolah; ?></td></tr>
						<tr><td> Permasalahan Dengan Keluarga</td><td><?php echo $permasalahan_keluarga; ?></td></tr>
						<tr><td> Permasalahan Di Masyarakat</td><td><?php echo $permasalahan_masyarakat; ?></td></tr>
						<tr><td> Permasalahan Dengan Teman</td><td><?php echo $permasalahan_teman; ?></td></tr>
					
						<tr><td><strong>Psikologi</strong></td></tr>
						<tr><td> Bakat</td><td><?php echo $psikologi_bakat; ?></td></tr>
						<tr><td> Minat</td><td><?php echo $psikologi_minat; ?></td></tr>
						<tr><td> Hobi</td><td><?php echo $psikologi_hobi; ?></td></tr>
						<tr><td> Cita-Cita</td><td><?php echo $psikologi_citacita; ?></td></tr>
						<tr><td> Sekolah Impian Setelah Lulus</td><td><?php echo $psikologi_sekolah_impian; ?></td></tr>
						<tr><td> Perguruan Tinggi Impian</td><td><?php echo $psikologi_perguruan; ?></td></tr>
						<tr><td> Tempat Kerja Impian</td><td><?php echo $psikologi_dunia_kerja; ?></td></tr>
						<tr><td> Ekstrakulikuler</td><td><?php echo $psikologi_ekskul; ?></td></tr>
						<tr><td> Pelajaran Yang Disuka</td><td><?php echo $psikologi_pelajaran_suka; ?></td></tr>
						<tr><td> Pelajaran Yang Kurang Diminati</td><td><?php echo $psikologi_pelajaran_sulit; ?></td></tr>
					
						<tr><td><strong>Sosial</strong></td></tr>
						<tr><td> Sifat Dari Diri Yang Disuaki</td><td><?php echo $sosial_sifat_suka; ?></td></tr>
						<tr><td> Sifat Dari Diri Tidak Disukai</td><td><?php echo $sosial_sifat_tdksuka; ?></td></tr>
						<tr><td> Motivasi Di Rumah</td><td><?php echo $sosial_motif_rumah; ?></td></tr>
						<tr><td> Motivasi Di Sekolah</td><td><?php echo $sosial_motif_sekolah; ?></td></tr>
					</table>
					</div>
				</div>
		</div>
	    <tr><td></td><td><a href="<?php echo site_url('siswa') ?>" class="btn btn-secondary">Cancel</a></td></tr>
	</div>

<?php $this->load->view('template/footer');?>