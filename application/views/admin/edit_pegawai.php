
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
                                <?= form_open('admin/edit_pegawai/'.$pegawai->username); ?>
                                    <div class="form-group ">
                                        <label class="control-label">Username</label>
                                        <input type="text" value="<?= $pegawai->username ?>" name="username" placeholder="username" class="form-control" required>    
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" value="<?= $pegawai->nama ?>" name="nama" placeholder="nama" class="form-control" required>    
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label">Nama Team</label>
                                        <input type="text" value="<?= $pegawai->nama_team ?>" name="nama_team" placeholder="nama_team" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="text" name="password" placeholder="******" class="form-control">
                                    </div>
                                    <input type="submit" name="edit" value="Submit" class="btn btn-primary">
                                <?= form_close(); ?>    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>