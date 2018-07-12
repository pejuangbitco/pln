<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><?= $title ?></h4>  
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <p>Selamat datang, <?= $siswa->nama ?></p>
                            <p>Sistem Pendukung Keputusan Pemilihan Jurusan Seleksi Nasional Masuk Perguruan Tinggi Negeri ini dilakukan dengan metode Simple Multi Attribute Rating Technique (SMART) berdasarkan dengan perhitungan nilai raport siswa, prestasi, minat bakat serta hasil tes psikologi yang telah dilaksanakan.</p>
                        </div>
                        <div class="panel-footer">
                            <p>Pengisian Data <input type="checkbox" name="nilai" <?php if(isset($siswa->psikotes)) echo "checked"; ?> disabled></p>
                            <p>Pengisian Kuisioner <input type="checkbox" <?php if(!empty($kuisioner)) echo "checked"; ?> name="nilai" disabled></p>
                            <p>Pengisian Hitung Nilai <input type="checkbox" <?php if(!empty($nilai)) echo "checked"; ?> name="nilai" disabled></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>