
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
                                <?= form_open('admin/pelanggan'); ?>
                                    <h4>Data Pribadi</h4><hr>
                                    <div class="form-group">
                                        <label>UNITUPI</label>
                                        
                                        <input type="text" name="unitupi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>UNITAP</label>
                                        
                                        <input type="text" name="unitap" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>UNITUP</label>
                                        
                                        <input type="text" name="unitup" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Pelanggan </label>
                                        <input type='text' pattern='[0-9]{12}' required name='idpel' id='idpel' maxlength="12" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelanggan </label>
                                        <input required name='nama' id='namapel' maxlength="20" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pelanggan</label>
                                        <textarea required name='alamatpel' id='alamatpel' class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif</label>

                                        <input type="text" name="tarif" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Daya</label>
                                        
                                        <input type="text" name="daya" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        
                                        <input type="text" name="status" class="form-control">
                                    </div>
                                    <hr>
                                    <h4>Data Meteran</h4>
                                    <div class="form-group">
                                        <label>Nomor Meteran </label>
                                        <input type='text' required name='idmeter' id='idmeter' maxlength="13" class="form-control">
                                    </div>                          
                                    <div class="form-group">
                                        <label>Merk Meteran</label>
                                        
                                        <input type="text" name="merkmeter" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Meteran</label>
                                        
                                        <input type="text" name="tipemeter" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas Meteran</label>
                                        
                                        <input type="text" name="kelasmeter" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Pembuatan</label>
                                        <input type='text' pattern='[0-9]{4}' maxlength='4' required name='tahunbuat' id='tahunbuat' class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Arus</label>
                                        
                                        <input type="text" name="arusmeter" class="form-control">
                                    </div>
                                    <hr>
                                    <h4>Data Modem</h4>
                                    <div class="form-group">
                                        <label>IMEI Modem </label>
                                        <input type='text' pattern='[0-9]' required name='imeimodem' id='imeimodem' maxlength="16" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Merk Modem</label>
                                        
                                        <input type="text" name="merkmodem" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Modem</label>
                                        
                                        <input type="text" name="tipemodem" class="form-control">
                                    </div>
                                    <hr>
                                    <h4>Data Sim Card</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label>Nomor</label>
                                        <input type='text' pattern='[0-9]' required name='nomortlp' id='nomortlp' maxlength="13" class="form-control">
                                    </div>                          
                                    <div class="form-group">
                                        <label>Provider</label>
                                        <input type="text" name="provider" class="form-control">
                                    </div>
                                    <hr>
                                    <h4>Data Pembatas</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label>Merk Pembatas</label>             
                                        <input type="text" name="merkpembatas" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Pembatas</label>                                
                                        
                                        <input type="text" name="tipepembatas" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Arus Pembatas</label>                                
                                        
                                        <input type="text" name="aruspembatas" class="form-control">
                                    </div>
                                    <hr>
                                    <h4>Data CT</h4>
                                    <div class="form-group">
                                        <label>Jenis ct</label>                                
                                        
                                        <input type="text" name="jenis_ct" class="form-control">
                                    </div>

                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                <?= form_close(); ?>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>