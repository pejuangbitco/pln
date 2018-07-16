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
                                                <th>Alasan</th>
                                                <th>Tanggal</th>
                                                <th>Pegawai</th>
                                                <!-- <th>Status</th> -->
                                                                                                                                    
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($target_operasional as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->id_pelanggan ?></td>
                                                <td class="col-md-4"><?= $row->alasan ?></td>
                                                <td><?= $row->date ?></td>
                                                <td><?= $row->pegawai ?></td>
                                                <!-- <td><?= $row->status ?></td> -->
                                                                                               
                                                <td align="center">
                                                                                             
                                                <a href="<?= base_url( 'admin/edit_target_operasional/'.$row->id_to ) ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="<?= base_url( 'admin/data_target_operasional/delete/'.$row->id_to ) ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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