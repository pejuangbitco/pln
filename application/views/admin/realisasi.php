<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $title ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pelanggan</th>
                                                <th>Tanggal</th>
                                                <th>Rincian</th>
                                                <?php if ($this->uri->segment(2) == 'realisasi_pending'): ?>
                                                    
                                                <th>Status</th>

                                                <?php endif ?>
                                                <th>Pegawai</th>                                                                 
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($realisasi as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->id_pelanggan .' - '. $this->data_pelanggan_m->get_row(['idpel' => $row->id_pelanggan])->nama ?></td>                                                
                                                <td><?= $row->tanggal ?></td>
                                                <td><?= $row->rincian ?></td>
                                                    <?php 
                                                        if ($row->status == 0) : ?>
                                                        <td><button class="btn btn-xs btn-success" onclick="konfirm('.$row->id_realisasi.')">Konfirmasi</button></td>
                                                    <?php endif
                                                    ?>      
                                                <td>
                                                    <?php 
                                                        $id = $this->target_operasional_m->get_row(['id_to' => $row->id_to])->pegawai;
                                                        echo $this->pegawai_m->get_row(['username' => $id])->nama;
                                                    ?>
                                                </td>                                     
                                                <td align="center">
                                                
                                                <!-- <a href="<?= base_url( 'admin/edit_realisasi/'.$row->id_realisasi ) ?>" class="btn btn-xs btn-warning">Update</i></a> -->
                                                <a href="<?= base_url('admin/map-geotag/' . $row->id_pelanggan) ?>" class="btn btn-xs btn-info" <?php if(empty($this->geotag_m->get_row(['idpel' => $row->id_pelanggan]))) {echo "disabled";} ?>><i class="fa fa-map"></i></a> 
                                                <a href="<?= base_url( 'admin/detail_realisasi/'.$row->id_realisasi ) ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a> 
                                                <a href="<?= base_url( 'admin/realisasi/delete/'.$row->id_realisasi ) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>

                                                <?php if ($row->status == 1): ?>

                                                   <!-- <a href="<?= base_url( 'admin/laporan/'.$row->id_realisasi ) ?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i></a> -->
                                                   <a href="<?= base_url( 'laporan/realisasi/'.$row->id_realisasi ) ?>" class="btn btn-primary btn-xs"><i class="fa fa-print"></i></a> 
                                                <?php endif ?>
                                                
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>


            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    //Exportable table
                    // $('.js-exportable').DataTable({
                    //     dom: 'Bfrtip',
                    //     responsive: true,
                    //     buttons: [
                    //         'copy', 'csv', 'excel', 'pdf', 'print'
                    //     ]
                    // });sponsi
                    $('#dataTables-example').DataTable({
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
                function konfirm(id) {
                        $.ajax({
                            url: '<?= base_url('admin/realisasi_pending/') ?>',
                            type: 'POST',
                            data: {
                                konfirm: true,
                                id: id
                            },
                            success: function() {
                                // alert(data);
                                window.location = '<?= base_url('admin/realisasi_aktif/') ?>';
                            }
                        });
                }
            </script>