<!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                <?php if ($this->session->userdata('role') == 1): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin/') ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/pelanggan') ?>" class=""><i class="lnr lnr-user"></i> <span>Input Pelanggan</span></a></li>
                        <li><a href="<?= base_url('admin/data_pelanggan') ?>" class=""><i class="lnr lnr-user"></i> <span>List Pelanggan</span></a></li>
                        <li><a href="<?= base_url('admin/pegawai') ?>" class=""><i class="fa fa-table"></i> <span>Data pegawai</span></a></li>
                        <li><a href="<?= base_url('admin/target_operasional') ?>" class=""><i class="fa fa-edit"></i> <span>Input Target Operasional</span></a></li>
                        <li><a href="<?= base_url('admin/data_target_operasional') ?>" class=""><i class="fa fa-edit"></i> <span>List Target Operasional</span></a></li>
                        <li><a href="<?= base_url('admin/realisasi_pending') ?>" class=""><i class="fa fa-edit"></i> <span>Realisasi Pending</span></a></li>    
                        <li><a href="<?= base_url('admin/realisasi_aktif') ?>" class=""><i class="fa fa-edit"></i> <span>Realisasi Aktif</span></a></li>            
                        <li><a href="<?= base_url('admin/geotag') ?>" class=""><i class="fa fa-globe"></i> <span>Data Geotag</span></a></li>             
                    </ul>
                <?php elseif ($this->session->userdata('role') == 2): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('pegawai/') ?>" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('pegawai/input_realisasi') ?>"><i class="fa fa-file"></i> <span>Input Realisasi</span></a></li>
                        <li><a href="<?= base_url('pegawai/realisasi') ?>"><i class="fa fa-file"></i> <span>List Realisasi</span></a></li>      
                        <li><a href="<?= base_url('pegawai/geotag') ?>"><i class="fa fa-file"></i> <span>Geotag</span></a></li>                        
                    </ul>
                <?php endif; ?>               
                </nav>
            </div>
        </div>
        <script>
            $(function(){
                  $('a[href]').each(function() {
                    if ($(this).attr('href') == window.location.pathname || $(this).attr('href') == window.location.href)
                      $(this).addClass('active');
                  });
            });
        </script>

        <!-- END LEFT SIDEBAR -->
        <div id="page-wrapper">