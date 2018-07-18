
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title ?>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                <?= form_open('admin/target_operasional'); ?>
                                    <div class="form-group">
                                        <label>ID Pelanggan </label>                                        
                                        <select id="ids" name="id_pelanggan" class="form-control">
                                            <option value="">-- ID Pelanggan --</option>
                                            <?php foreach ($pelanggan as $row) { ?>
                                                <option value="<?= $row->idpel ?>"><?= $row->idpel.' - '.$row->nama.' - '.$row->alamat ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>                               
                                    <div class="form-group">
                                        <label>Alasan</label>
                                        <textarea required name='alasan' id='alasanedit' class="form-control" rows="3"></textarea>
                                    </div>  
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea required name='keterangan' id='keteranganedit' class="form-control" rows="3"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Pegawai</label>                                        
                                        <select name="pegawai" class="form-control">
                                            <option value="">-- Pegawai --</option>
                                            <?php foreach ($pegawai as $row) { ?>
                                                <option value="<?= $row->username ?>"><?= $row->nama.'-'.$row->username ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                <?= form_close(); ?>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
