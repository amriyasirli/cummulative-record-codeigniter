<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar fa-sm text-white-50"></i> <?= date('l, d F Y')?></a>
</div>
<?php echo $this->session->flashdata('akses')?>
<h4><?php echo $this->session->flashdata('pesan') ?></h4>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siswa</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('siswa')->num_rows();?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Guru</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('guru')->num_rows();?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kelas</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                <?=$this->db->get('kelas')->num_rows();?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-home fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Users</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->get('user')->num_rows();?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-cogs fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Content Row -->
<div class="row">
  

  <!-- Content Column -->
  <div class="col-lg-12 mb-4">
  <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa Complete !</h6>
      </div>
      <div class="card-body">
        <h4 class="small font-weight-bold">Kesehatan <span class="float-right"><?= $kesehatan?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $kesehatan?>%" aria-valuenow="<?= $kesehatan?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Permasalahan <span class="float-right"><?= $permasalahan?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $permasalahan?>%" aria-valuenow="<?= $permasalahan?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Psikologi <span class="float-right"><?= $psikologi?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: <?= $psikologi?>%" aria-valuenow="<?= $psikologi?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Sosial <span class="float-right"><?= $sosial?>%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-info" role="progressbar" style="width: <?= $sosial?>%" aria-valuenow="<?= $sosial?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-cogs"></i> Control Panel
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 text-info text-center">

                                <p class="nav-link small text-info">DATA SISWA</p>
                            <a href="<?php echo base_url('siswa') ?>">
                            <i class="fas fa-3x fa-user-graduate"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">KESEHATAN</p>
                            <a href="<?php echo base_url('kesehatan') ?>">
                            <i class="fas fa-3x fa-heart"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">PSIKOLOGIS</p>
                            <a href="<?php echo base_url('psikologi') ?>">
                            <i class="fas fa-3x fa-child"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">SOSIAL</p>
                            <a href="<?php echo base_url('sosial') ?>">
                            <i class="fas fa-3x fa-users"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">PERMASALAHAN</p>
                            <a href="<?php echo base_url('permasalahan') ?>">
                            <i class="fas fa-3x fa-heart-broken"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-lg-12 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tentang Aplikasi</h6>
      </div>
      <div class="card-body">
        <div class="text-center">
        </div>
        <p>Cummulative Record merupakan aplikasi rekap data siswa yang dibuat menggunakan framework Codeigniter3 yang ditujukan untuk para guru terlebih khusus guru BK....</p>
        <a href="#" data-toggle="modal" data-target="#keterangan">Selengkapnya... &rarr;</a>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="keterangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-info"></i> Tentang Aplikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="card-body">
                          <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/undraw_posting_photo.svg')?>" alt="">
                          </div>
                          <p>Cummulative Record merupakan aplikasi rekap data siswa yang dibuat menggunakan framework Codeigniter3 yang ditujukan untuk
                           para guru terlebih khusus guru BK yang di harapkan agar lebih mudah dalam menghimpun data diri siswa secara terpadu !. 
                           Aplikasi ini masih dalam tahap pengembangan dan penyempurnaan, segera laporkan apabila anda menemukan bug 
                           maupun celah keamanan kepada administrator. Terimah Kasih !</p>
                           <br>
                           <p><span>Copyright &copy; Cumulative Record <?php echo date('Y'); ?></span> version.0.1</P
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




