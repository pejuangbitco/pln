<!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                <?php if ($this->session->userdata('role') == 1): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin/') ?>" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/data_admin') ?>" class=""><i class="lnr lnr-user"></i> <span>Data Admin</span></a></li>
                        <li><a href="<?= base_url('admin/data_siswa') ?>" class=""><i class="fa fa-table"></i> <span>Data Siswa</span></a></li>
                        <li><a href="<?= base_url('admin/data_universitas') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar PTN</span></a></li>
                        <li><a href="<?= base_url('admin/data_program_studi') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Program Studi</span></a></li>
                        <li><a href="<?= base_url('admin/data_kuisioner') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Kuisioner</span></a></li>
                        <li><a href="<?= base_url('admin/data_bobot') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Bobot</span></a></li>
                        <li><a href="<?= base_url('admin/data_kelas') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Kelas</span></a></li>
                        <li><a href="<?= base_url('admin/data_mata_pelajaran') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Mata Pelajaran</span></a></li>
                        <li><a href="<?= base_url('admin/data_peringkat') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Peringkat Prestasi</span></a></li>
                        <li><a href="<?= base_url('admin/data_jenjang_prestasi') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Jenjang Prestasi</span></a></li>
                        <li><a href="<?= base_url('admin/data_mata_lomba') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Cabang Lomba</span></a></li>
                        <li><a href="<?= base_url('admin/data_jenis_lomba') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Jenis Lomba</span></a></li>
                    </ul>
                <?php elseif ($this->session->userdata('role') == 2): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('siswa/') ?>" ><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('siswa/profile') ?>"><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
                        <li><a href="#"><i class="fa fa-file"></i> <span>Data Nilai</span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url('siswa/nilai_jurusan') ?>" class=""><i class="fa fa-file"></i> <span>Nilai Jurusan</span></a>
                            <li><a href="<?= base_url('siswa/nilai_umum') ?>" class=""><i class="fa fa-file"></i> <span>Nilai Umum</span></a>
                        </ul></li>

                        <li><a href="<?= base_url('siswa/kuisioner') ?>" class=""><i class="fa fa-edit"></i> <span>Kuisioner</span></a></li>
                        <li><a href="<?= base_url('siswa/data_program_studi') ?>" class=""><i class="fa fa-edit"></i> <span>Daftar Program Studi</span></a></li>
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