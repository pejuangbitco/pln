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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>                                                                            
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($realisasi as $row): ?>
                                            <?php 
                                                $cek = $this->realisasi_m->get_row([ 'id_to' => $row->id_to ]);
                                                if (isset($cek)) {
                                                    
                                                    if ($cek->status != 0) 
                                                    continue;
                                                }
                                                
                                            ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->id_pelanggan . ' - ' .$this->data_pelanggan_m->get_row(['idpel' => $row->id_pelanggan])->nama ?></td> 
                                                <td><?= $this->data_pelanggan_m->get_row(['idpel' => $row->id_pelanggan])->alamat ?></td>                                                         
                                                <td><?= $row->date ?></td>
                                                <td>
                                                    <?php  
                                                        
                                                        if(isset($cek)) {
                                                            echo "<b style='color: green;'>Sudah Input</b>";
                                                        } else {
                                                            echo "<b style='color: red;'>Pending</b>";
                                                        }
                                                    ?>
                                                </td>                                                
                                                <td>
                                                
                                                <a href="<?= base_url( 'pegawai/input_realisasi/'.$row->id_to ) ?>" class="btn btn-xs btn-primary" <?php if(isset($cek)) {echo "disabled";} ?> >Input</i></a>
                                                <a href="<?= base_url('pegawai/map-geotag/' . $row->id_pelanggan) ?>" class="btn btn-xs btn-info" <?php if(empty($this->geotag_m->get_row(['idpel' => $row->id_pelanggan]))) {echo "disabled";} ?>>Lokasi</a>                                        
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
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
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
            </script>