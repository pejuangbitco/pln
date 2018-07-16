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
                                                <th>ID Pelanggan</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Tarif</th>
                                                <th>Daya</th>
                                                <th>Unitupi</th>
                                                <th>Unitap</th>
                                                <th>Unitup</th>
                                                <th>Status</th>                                                                                    
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($pelanggan as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->idpel ?></td>
                                                <td class="col-md-4"><?= $row->nama ?></td>
                                                <td><?= $row->alamat ?></td>
                                                <td><?= $row->tarif ?></td>
                                                <td><?= $row->daya ?></td>
                                                <td><?= $row->unitupi ?></td>
                                                <td><?= $row->unitap ?></td>
                                                <td><?= $row->unitup ?></td>
                                                <td><?= $row->status ?></td>                                                
                                                <td align="center">
                                                
                                                <a href="<?= base_url( 'admin/edit_pelanggan/'.$row->idpel ) ?>" class="btn btn-xs btn-warning">Edit</a>
                                                
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