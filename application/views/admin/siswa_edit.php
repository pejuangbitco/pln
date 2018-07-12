<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <?= $this->session->flashdata('msg') ?>
                            <h3 class="panel-title"><?= $title ?></h3>                            
                        </div>
                        <div class="panel-body">                            
                            <div class="col-lg-10">
                                <?= form_open('admin/edit_siswa/'.$siswa->nisn) ?>
                                
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" value="<?= $siswa->nisn ?>" name="nisn" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Siswa</label>
                                    <input type="text" value="<?= $siswa->nama ?>" name="nama" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                    <input type="radio" value="1" name="jenis_kelamin" required <?php if ($siswa->jenis_kelamin == 'L') echo 'checked'; ?>>L &nbsp &nbsp
                                    <input type="radio" value="2" name="jenis_kelamin" required <?php if ($siswa->jenis_kelamin == 'P') echo 'checked'; ?> >P
                                </div>   

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" value="<?= $siswa->tempat_lahir ?>" name="tempat_lahir" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" value="<?= $siswa->tanggal_lahir ?>" name="tanggal_lahir" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea value="<?= $siswa->alamat ?>" name="alamat" class="form-control" required><?= $siswa->alamat ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="Jurusan">Jurusan</label><br>
                                    <input type="radio" value="1" name="jurusan" required <?php if ($siswa->jurusan == 'IPA') echo 'checked'; ?>>IPA &nbsp &nbsp
                                    <input type="radio" value="2" name="jurusan" required <?php if ($siswa->jurusan == 'IPS') echo 'checked'; ?> >IPS
                                </div>                                

                                <div class="form-group">
                                    <label for="telepon">No. Telepon</label>
                                    <input type="text" value="<?= $siswa->telepon ?>" name="telepon" class="form-control"  required>
                                </div>

                                <div class="form-group">
                                    <label for="psikotes">Hasil Psikotes</label>
                                    <input type="number" value="<?= $siswa->psikotes ?>" name="psikotes" class="form-control" required>
                                </div>


                                <input type="submit" name="edit" value="Simpan" class="btn btn-primary">
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
