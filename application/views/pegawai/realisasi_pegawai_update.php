
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
                        <?= form_open('pegawai/input_realisasi/'.$realisasi->id_to); ?>
                            <div class="form-group ">
                                <label>ID Pelanggan </label>
                                        <input type='text' value="<?= $realisasi->id_pelanggan ?>" pattern='[0-9]{12}' required name='idpel' id='idpel' maxlength="12" class="form-control" readonly>    
                            </div> <hr>
                            <div class="form-group ">
                                <label class="control-label">Tanggal</label>
                                <input type="date" name="tanggal"  class="form-control" required>     
                            </div> <hr>
                            <div class="form-group ">
                                <label class="control-label">Ganti modem: </label>                                
                                <input type="radio" name="ganti_modem" value="0" required>Tidak
                                <input type="radio" name="ganti_modem" value="1" required>Ya <br>
                                <div class="ganti" style="display: none;">
                                    <label>IMEI Modem </label>
                                            <input type='text' name='imeimodem' id='imeimodem' maxlength="16" class="form-control"> 
                                    <label>Merk Modem</label>
                                            
                                            <input type="text" name="merkmodem" class="form-control">
                                    <label>Tipe Modem</label>
                                            
                                            <input type="text" name="tipemodem" class="form-control">    
                                </div>
                                
                            </div>    <hr>  
                            <div class="form-group ">
                                <label class="control-label">Ganti meter: </label>
                                <input type="radio" value="0" name="ganti_meter" required>Tidak    
                                <input type="radio" value="1" name="ganti_meter" required>Ya <br>
                                <div class="ganti" style="display: none;">
                                    <label>Nomor Meteran </label>
                                            <input type='text' required name='idmeter' id='idmeter' maxlength="13" class="form-control">
                                    <label>Merk Meteran</label>
                                            
                                            <input type="text" name="merkmeter" class="form-control">
                                    <label>Tipe Meteran</label>
                                            
                                            <input type="text" name="tipemeter" class="form-control">
                                    <label>Kelas Meteran</label>
                                    <input type="text" name="kelasmeter" class="form-control">
                                     <label>Tahun Pembuatan</label>
                                    <input type='text' pattern='[0-9]{4}' maxlength='4' required name='tahunbuat' id='tahunbuat' class="form-control">
                                    <label>Arus</label>
                                    <label>Arus</label>
                                            
                                            <input type="text" name="arusmeter" class="form-control">
                                </div>
                            </div>  <hr>    
                            <div class="form-group ">
                                <label class="control-label">Ganti pembatas: </label>
                                <input type="radio" value="0" name="ganti_pembatas" required>Tidak    
                                <input type="radio" value="1" name="ganti_pembatas" required>Ya <br>
                                <div class="ganti" style="display: none;">
                                    <label>Merk Pembatas</label>                                
                                    <input type="text" name="merkpembatas" class="form-control">
                                    <label>Tipe Pembatas</label>                                
                                    <input type="text" name="tipepembatas" class="form-control">
                                    <label>Arus Pembatas</label>                                
                                            
                                            <input type="text" name="aruspembatas" class="form-control">
                                </div>
                            </div>   <hr>   
                            <div class="form-group ">
                                <label class="control-label">Ganti sim: </label>
                                <input type="radio" value="0" name="ganti_sim" required>Tidak    
                                <input type="radio" value="1" name="ganti_sim" required>Ya <br>
                                <div class="ganti" style="display: none;">
                                    <label>Nomor</label>
                                    <input type='text' pattern='[0-9]' required name='nomortlp' id='nomortlp' maxlength="13" class="form-control">
                                    <label>Provider</label>
                                    <input type="text" name="provider" class="form-control">  
                                </div>    
                            </div>   <hr>   
                            <div class="form-group ">
                                <label class="control-label">Ganti ct: </label>
                                <input type="radio" value="0" name="ganti_ct" required>Tidak    
                                <input type="radio" value="1" name="ganti_ct" required>Ya <br>
                                <div class="ganti" style="display: none;">
                                    <label>Jenis ct</label>                                
                                    <input type="text" name="jenis_ct" class="form-control"> 
                                </div>   
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

<script type="text/javascript">
    $(document).ready(function() {
        $("radio,[value='0']").click(function(){
            $(this).siblings(".ganti").hide();
            $(this).siblings(".ganti").children("input").attr("required",false);
        });
        $("radio,[value='1']").click(function(){
            $(this).siblings(".ganti").show();
            $(this).siblings(".ganti").children("input").attr("required",true);
        });
    });
</script>

