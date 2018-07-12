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
                                    
                                    
                                    Edit data
                                    <?= form_open( 'admin/edit_universitas/'. $universitas->id, [ 'class' => 'form-inline'] ) ?>
                                        <div class="form-group">
                                            <input type="text" value="<?= $universitas->nama_uni ?>" name="nama" placeholder="nama" class="form-control" required>   
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="<?= $universitas->link ?>" name="link" placeholder="link" class="form-control" required>   
                                        </div>
                                        
                                        
                                        <input type="submit" name="edit" value="simpan" class="btn btn-primary">
                                    <?= form_close() ?>
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