
        <div class="main">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title ?>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                <?= form_open('admin/pelanggan'); ?>
                                    <h4>Data Pribadi</h4><hr>
                                    <div class="form-group">
                                        <label>UNITUPI</label>
                                        <select name='unitupi' id='unitupi' class="form-control">
                                            <?php foreach ($unitupi as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>UNITAP</label>
                                        <select name='unitap' id='unitap' class="form-control">
                                            <?php foreach ($unitap as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>UNITUP</label>
                                        <select name='unitup' id='unitup' class="form-control">
                                            <?php foreach ($unitup as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ID Pelanggan </label>
                                        <input type='text' pattern='[0-9]{12}' required name='idpel' id='idpel' maxlength="12" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pelanggan </label>
                                        <input required name='namapel' id='namapel' maxlength="20" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pelanggan</label>
                                        <textarea required name='alamatpel' id='alamatpel' class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif</label>
                                        <select name='tarif' id='tarif' class="form-control">
                                            <?php foreach ($tarif as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Daya</label>
                                        <select name='daya' id='daya' class="form-control">
                                            <?php foreach ($daya as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name='status' id='status' class="form-control">
                                            <?php foreach ($pelanggan_status as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <h4>Data Meteran</h4>
                                    <div class="form-group">
                                        <label>Nomor Meteran </label>
                                        <input type='text' pattern='[0-9]' required name='idmeter' id='idmeter' maxlength="13" class="form-control">
                                    </div>                          
                                    <div class="form-group">
                                        <label>Merk Meteran</label>
                                        <select required name='merkmeter' id='merkmeter' class="form-control" onChange="getMeterTipe(this);">
                                            <option> PILIH MERK METER </option>
                                            <?php foreach ($meter_merk as $x) { ?>
                                            <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Meteran</label>
                                        <select required name='tipemeter' id='tipemeter' class="form-control">
                                            <option> PILIH TIPE METER </option>
                                            <?php foreach ($meter_tipe as $x) { ?>
                                            <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas Meteran</label>
                                        <select required name='kelasmeter' id='kelasmeter' class="form-control">
                                            <option> PILIH KELAS METER </option>
                                            <?php foreach ($meter_kelas as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Pembuatan</label>
                                        <input type='text' pattern='[0-9]{4}' maxlength='4' required name='tahunbuat' id='tahunbuat' class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Arus</label>
                                        <select required name='arusmeter' id='arusmeter' class="form-control">
                                            <option>Pilih Salah Satu</option>
                                            <?php foreach ($meter_arus as $x) { ?>
                                            <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <h4>Data Modem</h4>
                                    <div class="form-group">
                                        <label>IMEI Modem </label>
                                        <input type='text' pattern='[0-9]' required name='imeimodem' id='imeimodem' maxlength="16" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Merk Modem</label>
                                        <select required name='merkmodem' id='merkmodem' class="form-control" onChange="getModemTipe(this);">
                                            <option> PILIH MERK MODEM </option>
                                            <?php foreach ($modem_merk as $x) { ?>
                                            <option id="<?php echo $x->id; ?>" value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Modem</label>
                                        <select required name='tipemodem' id='tipemodem' class="form-control">
                                            <option> PILIH TIPE MODEM </option>
                                            <?php foreach ($modem_tipe as $x) { ?>
                                            <option id="<?php echo $x->id; ?>" value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
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
                                        <select required name='provider' id='provider' class="form-control">
                                            <option value="">Pilih Salah Satu</option>
                                            <?php foreach ($simcard_provider as $x) { ?>
                                            <option value='<?php echo $x->id; ?>'><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <h4>Data Pembatas</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label>Merk Pembatas</label>                                
                                        <select required name='merkpembatas' id='merkpembatas' class="form-control">
                                            <option> PILIH MERK PEMBATAS </option>
                                            <?php foreach ($pembatas_merk as $x) { ?>
                                            <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Pembatas</label>                                
                                        <select required name='tipepembatas' id='tipepembatas' class="form-control">
                                            <option> PILIH TIPE PEMBATAS </option>
                                            <?php foreach ($pembatas_tipe as $x) { ?>
                                            <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Arus Pembatas</label>                                
                                        <select required name='aruspembatas' id='aruspembatas' class="form-control">
                                            <option> PILIH ARUS PEMBATAS </option>
                                            <?php foreach ($pembatas_arus as $x) { ?>
                                            <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select> 
                                    </div>
                                    <hr>
                                    <h4>Data CT</h4>
                                    <div class="form-group">
                                        <label>Jenis ct</label>                                
                                        <select required name='jenisct' id='jenisct' class="form-control">
                                            <option> PILIH JENIS CT </option>
                                            <?php foreach ($ct_jenis as $x) { ?>
                                            <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                            <?php } ?>
                                        </select>  
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