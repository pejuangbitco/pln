
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
                                <?= form_open('admin/edit_target_operasional/'. $target_operasional->id_to); ?>
                                    <div class="form-group">
                                        <label>ID Pelanggan </label>                                        
                                        <select name="id_pelanggan" class="form-control">
                                            <option value="<?= $target_operasional->id_pelanggan ?>"><?= $target_operasional->id_pelanggan.' - '.$this_pelanggan->nama.' - '.$this_pelanggan->alamat ?></option>
                                            <?php foreach ($pelanggan as $row) { ?>
                                                <option value="<?= $row->idpel ?>"><?= $row->idpel.' - '.$row->nama.' - '.$row->alamat ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alasan</label>
                                        <textarea value="<?= $target_operasional->alasan ?>" required name='alasan' id='alasanedit' class="form-control" rows="3"><?= $target_operasional->alasan ?></textarea>
                                    </div>  
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea value="<?= $target_operasional->keterangan ?>" required name='keterangan' id='keteranganedit' class="form-control" rows="3"><?= $target_operasional->keterangan ?></textarea>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="">Pegawai</label>                                        
                                        <select name="pegawai" class="form-control">
                                            <option value="<?= $target_operasional->pegawai ?>"><?= $target_operasional->pegawai ?></option>
                                            <?php foreach ($pegawai as $row) { ?>
                                                <option value="<?= $row->username ?>"><?= $row->nama.'-'.$row->username ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" value="<?= $target_operasional->status ?>" name="status" class="form-control">
                                    </div> -->

                                    <input type="submit" name="edit" value="Submit" class="btn btn-primary">
                                <?= form_close(); ?>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>