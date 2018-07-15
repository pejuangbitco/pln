
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
                        <?= form_open('pegawai/input_realisasi/'.$realisasi); ?>
                            <div class="form-group ">
                                <label class="control-label">ID Pelanggan</label>
                                <input type="text" name="id_pelanggan" required>     
                            </div> <hr>
                            <div class="form-group ">
                                <label class="control-label">Tanggal</label>
                                <input type="date" name="tanggal" required>     
                            </div> <hr>
                            <div class="form-group ">
                                <label class="control-label">Ganti modem: </label>
                                <input type="radio" value="0" name="ganti_modem" required>Tidak    
                                <input type="radio" value="1" name="ganti_modem" required>Ya <br>
                                <label>IMEI Modem </label>
                                <input type='text' pattern='[0-9]' required name='imeimodem' id='imeimodem' maxlength="16" class="form-control"> 
                                <label>Merk Modem</label>  
                                <select required name='merkmodem' id='merkmodem' class="form-control" onChange="getModemTipe(this);">
                                    <option> PILIH MERK MODEM </option>
                                    <?php foreach ($modem_merk as $x) { ?>
                                    <option id="<?php echo $x->id; ?>" value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                                <label>Tipe Modem</label>
                                <select required name='tipemodem' id='tipemodem' class="form-control">
                                    <option> PILIH TIPE MODEM </option>
                                    <?php foreach ($modem_tipe as $x) { ?>
                                    <option id="<?php echo $x->id; ?>" value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>    <hr>  
                            <div class="form-group ">
                                <label class="control-label">Ganti meter: </label>
                                <input type="radio" value="0" name="ganti_meter" required>Tidak    
                                <input type="radio" value="1" name="ganti_meter" required>Ya <br>
                                <label>Nomor Meteran </label>
                                <input type='text' pattern='[0-9]' required name='idmeter' id='idmeter' maxlength="13" class="form-control">
                                <label>Merk Meteran</label>
                                <select required name='merkmeter' id='merkmeter' class="form-control" onChange="getMeterTipe(this);">
                                    <option> PILIH MERK METER </option>
                                    <?php foreach ($meter_merk as $x) { ?>
                                    <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                                <label>Tipe Meteran</label>
                                <select required name='tipemeter' id='tipemeter' class="form-control">
                                    <option> PILIH TIPE METER </option>
                                    <?php foreach ($meter_tipe as $x) { ?>
                                    <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                                <label>Kelas Meteran</label>
                                <select required name='kelasmeter' id='kelasmeter' class="form-control">
                                    <option> PILIH KELAS METER </option>
                                    <?php foreach ($meter_kelas as $x) { ?>
                                    <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                                 <label>Tahun Pembuatan</label>
                                <input type='text' pattern='[0-9]{4}' maxlength='4' required name='tahunbuat' id='tahunbuat' class="form-control">
                                <label>Arus</label>
                                <select required name='arusmeter' id='arusmeter' class="form-control">
                                    <option>Pilih Salah Satu</option>
                                    <?php foreach ($meter_arus as $x) { ?>
                                    <option value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>  
                            </div>  <hr>    
                            <div class="form-group ">
                                <label class="control-label">Ganti pembatas: </label>
                                <input type="radio" value="0" name="ganti_pembatas" required>Tidak    
                                <input type="radio" value="1" name="ganti_pembatas" required>Ya <br>
                                <label>Merk Pembatas</label>                                
                                <select required name='merkpembatas' id='merkpembatas' class="form-control">
                                    <option> PILIH MERK PEMBATAS </option>
                                    <?php foreach ($pembatas_merk as $x) { ?>
                                    <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                                <label>Tipe Pembatas</label>                                
                                <select required name='tipepembatas' id='tipepembatas' class="form-control">
                                    <option> PILIH TIPE PEMBATAS </option>
                                    <?php foreach ($pembatas_tipe as $x) { ?>
                                    <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>
                                <label>Arus Pembatas</label>                                
                                <select required name='aruspembatas' id='aruspembatas' class="form-control">
                                    <option> PILIH ARUS PEMBATAS </option>
                                    <?php foreach ($pembatas_arus as $x) { ?>
                                    <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>   <hr>   
                            <div class="form-group ">
                                <label class="control-label">Ganti sim: </label>
                                <input type="radio" value="0" name="ganti_sim" required>Tidak    
                                <input type="radio" value="1" name="ganti_sim" required>Ya <br>
                                <label>Nomor</label>
                                <input type='text' pattern='[0-9]' required name='nomortlp' id='nomortlp' maxlength="13" class="form-control">
                                <label>Provider</label>
                                <select name='provider' id='provider' class="form-control">
                                    <option value="">Pilih Salah Satu</option>
                                    <?php foreach ($simcard_provider as $x) { ?>
                                    <option value='<?php echo $x->id; ?>'><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>     
                            </div>   <hr>   
                            <div class="form-group ">
                                <label class="control-label">Ganti ct: </label>
                                <input type="radio" value="0" name="ganti_ct" required>Tidak    
                                <input type="radio" value="1" name="ganti_ct" required>Ya <br>
                                <label>Jenis ct</label>                                
                                <select required name='jenisct' id='jenisct' class="form-control">
                                    <option> PILIH JENIS CT </option>
                                    <?php foreach ($ct_jenis as $x) { ?>
                                    <option id='<?php echo $x->id; ?>' value="<?php echo $x->id; ?>"><?php echo $x->nama; ?></option>
                                    <?php } ?>
                                </select>    
                            </div> <hr>
                            <div class="form-group ">
                                <label class="control-label">Arus R</label>
                                <input type="text" name="arus_r">     
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Arus S</label>
                                <input type="text" name="arus_s">     
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Arus T</label>
                                <input type="text" name="arus_t">     
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Tegangan R</label>
                                <input type="text" name="tegangan_r">     
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Tegangan S</label>
                                <input type="text" name="tegangan_s">     
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Tegangan T</label>
                                <input type="text" name="tegangan_t">     
                            </div>
                            <div class="form-group ">
                                <label class="control-label">Stand Total</label>
                                <input type="text" name="stand_total">     
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