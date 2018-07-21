        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <?=  $this->session->flashdata('msg'); ?>
                        <div class="row">
                            <div class="col-md-2" style="color: blue; border-right: 1px; border-style: solid; border-color: black; border-top: 0px; border-bottom: 0px; border-left: 1px; text-align: center;">
                                <a href="#" id="data-pribadi-link" class="active">Data Pribadi</a>
                            </div>
                            <div class="col-md-2" style="color: blue; border-right: 1px; border-style: solid; border-color: black; border-top: 0px; border-bottom: 0px; border-left: 1px; text-align: center;">
                                <a href="#" id="data-meter-link">Data Meteran</a>  
                            </div>
                            <div class="col-md-2" style="color: blue; border-right: 1px; border-style: solid; border-color: black; border-top: 0px; border-bottom: 0px; border-left: 1px; text-align: center;">
                                <a href="#" id="data-modem-link">Data Modem</a>  
                            </div>
                            <div class="col-md-2" style="color: blue; border-right: 1px; border-style: solid; border-color: black; border-top: 0px; border-bottom: 0px; border-left: 1px; text-align: center;">
                                <a href="#" id="data-sim-link">Data SIM</a>  
                            </div>
                            <div class="col-md-2" style="color: blue; border-right: 1px; border-style: solid; border-color: black; border-top: 0px; border-bottom: 0px; border-left: 1px; text-align: center;">
                                <a href="#" id="data-pembatas-link">Data Pembatas</a>  
                            </div>
                            <div class="col-md-2" style="color: blue; border-right: 0px; border-style: solid; border-color: black; border-top: 0px; border-bottom: 0px; border-left: 1px; text-align: center;">
                                <a href="#" id="data-ct-link">Data CT</a>  
                            </div>

                        </div>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel, ['id' => 'data-pribadi-form', 'style' => 'display: block;', 'role' => 'form']) ?>
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

                                    <div class="form-group">                                                      
                                        <input type="submit" value="Simpan Profil" name="edit" class="form-control btn btn-primary">
                                    </div>
                                    <hr>
                                    
                                    
                                    <?= form_close() ?>
                                    <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel, ['id' => 'data-meter-form', 'style' => 'display: none;', 'role' => 'form']) ?>                                        
                                        <h4>Data Meteran</h4>
                                        <input type="hidden" name="urut" value="<?= $meter->urut ?>">
                                        <hr>
                                        <div class="form-group">
                                            <label>Nomor Meteran </label>
                                            <input type='text' value="<?= $meter->id_meter ?>" required name='idmeter' id='idmeter' maxlength="13" class="form-control">
                                        </div>                          
                                        <div class="form-group">
                                            <label>Merk Meteran</label>
                                            
                                            <input type="text" value="<?= $meter->merk ?>" name="merkmeter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Meteran</label>
                                            
                                            <input type="text" value="<?= $meter->tipe ?>" name="tipemeter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas Meteran</label>
                                            
                                            <input type="text" value="<?= $meter->kelas ?>" name="kelasmeter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Pembuatan</label>
                                            <input type='text' value="<?= $meter->tahun_buat ?>" pattern='[0-9]{4}' maxlength='4' required name='tahunbuat' id='tahunbuat' class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Arus</label>
                                            
                                            <input type="text" value="<?= $meter->arus ?>" name="arusmeter" class="form-control">
                                        </div>
                                        <div class="form-group">                                                      
                                            <input type="submit" value="Simpan Meter" name="meter" class="form-control btn btn-primary">
                                        </div>
                                        <hr>
                                        
                                    

                                    <?= form_close() ?>
                                    <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel, ['id' => 'data-modem-form', 'style' => 'display: none;', 'role' => 'form']) ?>                                    
                                        
                                        <h4>Data Modem</h4>
                                        <input type="hidden" name="urut" value="<?= $modem->urut ?>">
                                        <hr>
                                        <div class="form-group">
                                            <label>IMEI Modem </label>
                                            <input value="<?= $modem->imei ?>" type='text' required name='imeimodem' id='imeimodem' maxlength="16" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Merk Modem</label>
                                            
                                            <input value="<?= $modem->merk ?>" type="text" name="merkmodem" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Modem</label>
                                            
                                            <input value="<?= $modem->tipe ?>" type="text" name="tipemodem" class="form-control">
                                        </div>
                                        <div class="form-group">                                                      
                                            <input type="submit" value="Simpan Modem" name="modem" class="form-control btn btn-primary">
                                        </div>
                                        <hr>
                                        
                                    

                                    <?= form_close() ?>
                                    <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel, ['id' => 'data-sim-form', 'style' => 'display: none;', 'role' => 'form']) ?>                                 
                                                                                                                    
                                        <h4>Data Sim Card</h4>
                                        <input type="hidden" name="urut" value="<?= $sim_card->urut ?>">
                                        <hr>
                                        <div class="form-group">
                                            <label>Nomor</label>
                                            <input value="<?= $sim_card->nomor ?>" type='text' required name='nomortlp' id='nomortlp' maxlength="13" class="form-control">
                                        </div>                          
                                        <div class="form-group">
                                            <label>Provider</label>
                                            <input value="<?= $sim_card->provider ?>" type="text" name="provider" class="form-control">
                                        </div>
                                        <div class="form-group">                                                      
                                            <input type="submit" value="Simpan SIM" name="sim" class="form-control btn btn-primary">
                                        </div>
                                        <hr>
                                        
                                    <?= form_close() ?>

                                    <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel, ['id' => 'data-pembatas-form', 'style' => 'display: none;', 'role' => 'form']) ?>

                                                                                                                                                  
                                        <h4>Data Pembatas</h4>
                                        <input type="hidden" name="urut" value="<?= $pembatas->id_pembatas ?>">
                                        <hr>
                                        <div class="form-group">
                                            <label>Merk Pembatas</label>             
                                            <input value="<?= $pembatas->merk ?>" type="text" name="merkpembatas" class="form-control"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Pembatas</label>                                
                                            
                                            <input value="<?= $pembatas->tipe ?>" type="text" name="tipepembatas" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Arus Pembatas</label>                                
                                            
                                            <input value="<?= $pembatas->arus ?>" type="text" name="aruspembatas" class="form-control">
                                        </div>
                                        <div class="form-group">                                                      
                                            <input type="submit" value="Simpan Pembatas" name="pembatas" class="form-control btn btn-primary">
                                        </div>
                                        <hr>                                        
                                    

                                    <?= form_close() ?>
                                    <?= form_open('admin/edit_pelanggan/'. $pelanggan->idpel, ['id' => 'data-ct-form', 'style' => 'display: none;', 'role' => 'form']) ?>                                                                                                                 
                                        <h4>Data CT</h4>
                                        <input type="hidden" name="urut" value="<?= $ct->id_ct ?>">
                                        <hr>
                                        <div class="form-group">
                                            <label>Jenis ct</label>                                
                                            
                                            <input value="<?= $ct->jenis ?>" type="text" name="jenis_ct" class="form-control">
                                        </div>
                                        <div class="form-group">                                                      
                                            <input type="submit" value="Simpan CT" name="ct" class="form-control btn btn-primary">
                                        </div>
                                        <hr>
                                        
                                    <?= form_close() ?>

                                    
                                   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript">
        $(function() {

            $('#data-pribadi-link').click(function(e) {
                $("#data-pribadi-form").delay(100).fadeIn(100);
                $("#data-meter-form").fadeOut(100);
                $("#data-modem-form").fadeOut(100);
                $("#data-sim-form").fadeOut(100);
                $("#data-pembatas-form").fadeOut(100);
                $("#data-ct-form").fadeOut(100);
                e.preventDefault();
            });

            $('#data-sim-link').click(function(e) {
                $("#data-sim-form").delay(100).fadeIn(100);
                $("#data-pribadi-form").fadeOut(100);
                $("#data-meter-form").fadeOut(100);
                $("#data-modem-form").fadeOut(100);                
                $("#data-pembatas-form").fadeOut(100);
                $("#data-ct-form").fadeOut(100);                            
                e.preventDefault();
            });

            $('#data-modem-link').click(function(e) {
                $("#data-modem-form").delay(100).fadeIn(100);
                $("#data-meter-form").fadeOut(100);
                $("#data-pribadi-form").fadeOut(100);
                $("#data-sim-form").fadeOut(100);
                $("#data-pembatas-form").fadeOut(100);
                $("#data-ct-form").fadeOut(100);
                e.preventDefault();
            });

            $('#data-meter-link').click(function(e) {
                $("#data-meter-form").delay(100).fadeIn(100);
                $("#data-pribadi-form").fadeOut(100);
                $("#data-modem-form").fadeOut(100);
                $("#data-sim-form").fadeOut(100);
                $("#data-pembatas-form").fadeOut(100);
                $("#data-ct-form").fadeOut(100);
                e.preventDefault();
            });

            $('#data-pembatas-link').click(function(e) {
                $("#data-pembatas-form").delay(100).fadeIn(100);
                $("#data-meter-form").fadeOut(100);
                $("#data-modem-form").fadeOut(100);
                $("#data-sim-form").fadeOut(100);
                $("#data-pribadi-form").fadeOut(100);
                $("#data-ct-form").fadeOut(100);
                e.preventDefault();
            });

            $('#data-ct-link').click(function(e) {
                $("#data-ct-form").delay(100).fadeIn(100);
                $("#data-meter-form").fadeOut(100);
                $("#data-modem-form").fadeOut(100);
                $("#data-sim-form").fadeOut(100);
                $("#data-pembatas-form").fadeOut(100);
                $("#data-pribadi-form").fadeOut(100);
                e.preventDefault();
            });
        });

    </script>