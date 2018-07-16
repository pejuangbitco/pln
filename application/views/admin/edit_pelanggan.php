
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title ?>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                            <?=  $this->session->flashdata('msg'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel); ?>
                                    <h4>Data Pribadi</h4><hr>
                                    <div class="form-group">
                                        <label>ID Pelanggan </label>
                                        <input type='text' pattern='[0-9]{12}' value="<?= $pelanggan->idpel ?>" required name='idpel' id='idpel' maxlength="12" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>UNITUPI</label>
                                        
                                        <input type="text" value="<?= $pelanggan->unitupi ?>" name="unitupi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>UNITAP</label>
                                        
                                        <input type="text" value="<?= $pelanggan->unitap ?>" name="unitap" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>UNITUP</label>
                                        
                                        <input type="text" value="<?= $pelanggan->unitup ?>" name="unitup" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nama Pelanggan </label>
                                        <input required name='nama' value="<?= $pelanggan->nama ?>" id='namapel' maxlength="20" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pelanggan</label>
                                        <textarea required name='alamatpel' value="<?= $pelanggan->alamat ?>" id='alamatpel' class="form-control" rows="3"><?= $pelanggan->alamat ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif</label>

                                        <input type="text" value="<?= $pelanggan->tarif ?>" name="tarif" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Daya</label>
                                        
                                        <input type="text" value="<?= $pelanggan->daya ?>" name="daya" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        
                                        <input type="text" value="<?= $pelanggan->status ?>" name="status" class="form-control">
                                    </div>
                                    <hr>
                                    

                                    <input type="submit" name="edit" value="Submit" class="btn btn-primary">
                                <?= form_close(); ?>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>