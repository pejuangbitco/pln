
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
                                <?= form_open('pegawai/edit_realisasi/'.$realisasi->id_to); ?>
                                    <div class="form-group ">
                                        <label class="control-label">Ganti modem</label>
                                        <input type="text" name="ganti_modem" class="form-control" required>    
                                    </div>      
                                    <div class="form-group ">
                                        <label class="control-label">Ganti meter</label>
                                        <input type="text" name="ganti_meter" class="form-control" required>    
                                    </div>      
                                    <div class="form-group ">
                                        <label class="control-label">Ganti pembatas</label>
                                        <input type="text" name="ganti_pembatas" class="form-control" required>    
                                    </div>      
                                    <div class="form-group ">
                                        <label class="control-label">Ganti sim</label>
                                        <input type="text" name="ganti_sim" class="form-control" required>    
                                    </div>      
                                    <div class="form-group ">
                                        <label class="control-label">Ganti ct</label>
                                        <input type="text" name="ganti_ct" class="form-control" required>    
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