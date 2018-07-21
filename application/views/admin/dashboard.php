<script src="<?= base_url('') ?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?= base_url('') ?>assets/vendor/morrisjs/morris.min.js"></script>
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title ?>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <p>Selamat Datang, <?= $username ?></p>
                                <p></p>
                            </div>

                        </div>
                    </div>

                    <?php if ($role == 1): ?>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            DATA REALISASI
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <div id="char">
                                
                            </div>

                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <script>
            Morris.Bar({
              element: 'char',
              data: [
                { y: 'HAR', a: <?= $kesimpulan['HAR'] ?>},
                { y: 'INSPEKSI', a: <?= $kesimpulan['INSPEKSI'] ?>},
                { y: 'APP', a: <?= $kesimpulan['APP'] ?>},
                { y: 'AMR', a: <?= $kesimpulan['AMR'] ?>},
              ],
              xkey: 'y',
              ykeys: ['a'],
              labels: ['Data kesimpulan']
            });
        </script>