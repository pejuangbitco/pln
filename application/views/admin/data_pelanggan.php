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
                                                <th>Aksi</th>
                                                <th>ID Pelanggan</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Tarif</th>
                                                <th>Daya</th>
                                                <th>Unitupi</th>
                                                <th>Unitap</th>
                                                <th>Unitup</th>
                                                <th>Imei Modem</th>
                                                <th>Merk Modem</th>
                                                <th>Tipe Modem</th>
                                                <th>Nomor Simcard</th>
                                                <th>Provider Simcard</th>
                                                <th>Merk Pembatas</th>
                                                <th>Tipe Pembatas</th>
                                                <th>Arus Pembatas</th>
                                                <th>ID Meter</th>
                                                <th>Merk Meter</th>
                                                <th>Tipe Meter</th>
                                                <th>Arus Meter</th>
                                                <th>Kelas Meter</th>
                                                <th>Tahun Meter</th>
                                                <th>Jenis CT</th>
                                                <th>Status</th>                                                                                    
                                                
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($pelanggan as $row): ?>

                                            <tr>
                                                <?php 
                                                    $modem = $this->modem_m->get_last_row([ 'id_pelanggan' => $row->idpel ]);
                                                    $simcard = $this->sim_card_m->get_last_row([ 'id_pelanggan' => $row->idpel ]);
                                                    $pembatas = $this->pembatas_arus_m->get_last_row([ 'id_pelanggan' => $row->idpel ]);
                                                    $meter = $this->meter_m->get_last_row([ 'idpel' => $row->idpel ]);
                                                    $ct = $this->ct_m->get_last_row([ 'id_pelanggan' => $row->idpel ]);
                                                 ?>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td align="center">
                                                
                                                <a href="<?= base_url( 'admin/edit_pelanggan/'.$row->idpel ) ?>" class="btn btn-xs btn-warning">Edit</a>
                                                
                                                </td>
                                                <td><?= $row->idpel ?></td>
                                                <td class="col-md-4"><?= $row->nama ?></td>
                                                <td><?= $row->alamat ?></td>
                                                <td><?= $row->tarif ?></td>
                                                <td><?= $row->daya ?></td>
                                                <td><?= $row->unitupi ?></td>
                                                <td><?= $row->unitap ?></td>
                                                <td><?= $row->unitup ?></td>                                                
                                                <td><?= $modem->imei ?></td>
                                                <td><?= $modem->merk ?></td>
                                                <td><?= $modem->tipe ?></td>
                                                <td><?= $simcard->nomor ?></td>
                                                <td><?= $simcard->provider ?></td>
                                                <td><?= $pembatas->merk ?></td>
                                                <td><?= $pembatas->tipe ?></td>
                                                <td><?= $pembatas->arus ?></td>
                                                <td><?= $meter->id_meter ?></td>
                                                <td><?= $meter->merk ?></td>
                                                <td><?= $meter->tipe ?></td>
                                                <td><?= $meter->arus ?></td>
                                                <td><?= $meter->kelas ?></td>
                                                <td><?= $meter->tahun_buat ?></td>
                                                <td><?= $ct->jenis ?></td>
                                                <td><?= $row->status ?></td>                                                
                                                
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