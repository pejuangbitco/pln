<!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                <?php if ($this->session->userdata('role') == 1): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin/') ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/pelanggan') ?>" class=""><i class="lnr lnr-user"></i> <span>Data pelanggan</span></a></li>
                        <li><a href="<?= base_url('admin/pegawai') ?>" class=""><i class="fa fa-table"></i> <span>Data pegawai</span></a></li>
                        <li><a href="<?= base_url('admin/target_operasional') ?>" class=""><i class="fa fa-edit"></i> <span>target_operasional</span></a></li>
                        <li><a href="<?= base_url('admin/realisasi') ?>" class=""><i class="fa fa-edit"></i> <span>realisasi</span></a></li>                       
                    </ul>
                <?php elseif ($this->session->userdata('role') == 2): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('pegawai/') ?>" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('pegawai/realisasi') ?>"><i class="fa fa-file"></i> <span>Realisasi</span></a></li>                        
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