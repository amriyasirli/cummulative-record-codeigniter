<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-file"></i> Laporan
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Tersedia Export Laporan Dalam Bentuk Excel !</h4>
        
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-file-excel"></i> Export Laporan Excel
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-file-excel"></i> Export Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 text-info text-center">

                                <p class="nav-link small text-info">DATA SISWA</p>
                            <a href="<?php echo base_url('Laporan/excel_siswa') ?>">
                            <i class="fas fa-3x fa-user-graduate"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">KESEHATAN</p>
                            <a href="<?php echo base_url('Laporan/excel_kesehatan') ?>">
                            <i class="fas fa-3x fa-heart"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">PSIKOLOGIS</p>
                            <a href="<?php echo base_url('Laporan/excel_psikologi') ?>">
                            <i class="fas fa-3x fa-child"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">SOSIAL</p>
                            <a href="<?php echo base_url('Laporan/excel_sosial') ?>">
                            <i class="fas fa-3x fa-users"></i>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                                <p class="nav-link small text-info">PERMASALAHAN</p>
                            <a href="<?php echo base_url('Laporan/excel_permasalahan') ?>">
                            <i class="fas fa-3x fa-heart-broken"></i>
                            </a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>