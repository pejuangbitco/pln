<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="panel panel-success">
                            <div class="panel-heading">
                              <h4>Tambah Data Geotag</h4>
                            </div>
                              <div class="panel-body">
                                <?= form_open_multipart('admin/geotag') ?>
                                <div class="form-group">
                                  <label for="">Foto</label>
                                  <input type="file" name="foto" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Pelanggan</label>
                                    <select name="idpel" class="form-control">
                                        <option value="">Pilih Pelanggan</option>
                                        <?php foreach ($this->Data_pelanggan_m->get() as $pel): ?>
                                            
                                            <option value="<?= $pel->idpel ?>"><?= $pel->idpel . ' - '. $pel->nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Koordinat</label>
                                    <div class="gmap" id="map-add" style="width: 100%; height: 500px;"></div>
                                    <p>Koordinat: <span id="map-add-latitude"></span>, <span id="map-add-longitude"></span></p>
                                    <input type="hidden" id="map-add-hidden_latitude" name="latitude" required>
                                    <input type="hidden" id="map-add-hidden_longitude" name="longitude" required>
                                </div>
                                <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
                                <?= form_close(); ?>
                              </div>
                           </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $title ?>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>                                    
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <!-- <th></th> -->
                                                <th>Koordinat</th>
                                                <th>Pelanggan</th>
                                                <th>Alamat</th>                
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($data as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                               <!--  <td>
                                                  <img src="<?= base_url('assets/img/geotag/' . $row->id .'.jpg') ?>" class="img img-thumbnail" width="200px">
                                                </td> -->
                                                <td><?= $row->lon .' , '. $row->lat ?></td>                                                
                                                <?php if (!empty($this->Data_pelanggan_m->get_row(['idpel' => $row->idpel]))): ?>
                                                    <td><?=  $row->idpel .' - ' .$this->Data_pelanggan_m->get_row(['idpel' => $row->idpel])->nama ?></td>
                                                  <td><?= $this->Data_pelanggan_m->get_row(['idpel' => $row->idpel])->alamat ?></td>   
                                                  <?php else : ?>
                                                  <td>-</td>
                                                  <td>-</td> 
                                                  <?php endif ?>                         
                                                <td align="center">
                                                    <button class="btn btn-primary" onclick="_edit(<?= $row->id ?>)" data-toggle="modal" data-target="#edit">Edit</button>
                                                    <button class="btn btn-danger" onclick="_hapus(<?= $row->id ?>)">Hapus</button>
                                                    <a href="<?= base_url('admin/detail-geotag/' . $row->id ) ?>" class="btn btn-xs btn-info">Detail</a>             
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>


<div class="modal fade" tabindex="-1" role="dialog" id="edit">
              <div class="modal-dialog" role="document">
                <?= form_open_multipart('admin/geotag') ?>
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Data Geotag</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <center>
                          <img class="img img-responsive" width="500px" id="img">
                        </center>
                        <div class="form-group">
                                  <label for="">Foto</label>
                                  <input type="file" name="foto" class="form-control">
                                </div>
                        <div class="form-group">
                          <label>Pilih Koordinat Jalan</label>
                          <div class="gmap" id="map-edit" style="width: 100%; height: 250px;"></div>
                          <p>Koordinat: <span id="map-edit-latitude"></span>, <span id="map-edit-longitude"></span></p>
                          <input type="hidden" id="map-edit-hidden_latitude" name="latitude" required>
                          <input type="hidden" id="map-edit-hidden_longitude" name="longitude" required>
                        </div>
                        <!-- <select name="idpel" class="form-control">
                                    <option value="">Pilih Pelanggan</option>
                                    <?php foreach ($this->Data_pelanggan_m->get() as $pel): ?>
                                        
                                        <option value="<?= $pel->id_pelanggan ?>"><?= $pel->idpel . ' - '. $pel->nama ?></option>
                                    <?php endforeach ?>
                                </select> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                  </div>
                  <?= form_close() ?>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    if ("geolocation" in navigator){ //check geolocation available 
                        //try to get user current location using getCurrentPosition() method
                        navigator.geolocation.getCurrentPosition(function(position){ 
                          $('#map-add-hidden_latitude').val(position.coords.latitude);
                          $('#map-add-hidden_longitude').val(position.coords.longitude);
                          $('#map-add-latitude').text(position.coords.latitude);
                          $('#map-add-longitude').text(position.coords.longitude);
                          console.log("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                        });
                    }
                    initMap('map-add');
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });

                });

                function _edit(id) {
                  $.ajax({
                    url: '<?= base_url('admin/geotag') ?>',
                    type: 'POST',
                    data: {
                      id: id,
                      get: true
                    },
                    success: function(response) {
                      var json = $.parseJSON(response);
                      $('#id').val(json.id);
                      $('#latitude').val(json.lat);
                      $('#longitude').val(json.lon);
                      console.log(json);
                      id = '<?= base_url("assets/img/geotag/") ?>' + json.id + '.jpg';
                      $("#img").attr('src' , id);
                      editMap('map-edit', json.lat, json.lon);
                    },
                    error: function(e) {
                      console.log(e.responseText);
                    }
                  });
                }

                function _hapus(id) {
                  $.ajax({
                    url: '<?= base_url('admin/geotag') ?>',
                    type: 'POST',
                    data: {
                      id: id,
                      hapus: true
                    },
                    success: function() {
                      window.location = '<?= base_url('admin/geotag/') ?>';
                    },
                    error: function(e) {
                      console.log(e.responseText);
                    }
                  });
                }
                function initMap(id) {
                  $('#' + id + '-latitude').text('');
                  $('#' + id + '-longitude').text('');

                    if ("geolocation" in navigator){ //check geolocation available 
                        //try to get user current location using getCurrentPosition() method
                        navigator.geolocation.getCurrentPosition(function(position){ 
                          $('#' + id + '-hidden_latitude').val(position.coords.latitude);
                          $('#' + id + '-hidden_longitude').val(position.coords.longitude);
                          console.log("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                        });
                    }else{
                        $('#' + id + '-hidden_latitude').val(null);
                        $('#' + id + '-hidden_longitude').val(null);
                        console.log("Browser doesn't support geolocation!");
                    }
                  
                  var coordinate = {lat: -6.121435, lng: 106.774124};
                  var map = new google.maps.Map(document.getElementById(id), {
                    zoom: 8,
                    center: coordinate
                  });
                  var marker = new google.maps.Marker({
                    position: coordinate,
                    map: map
                  });
                  google.maps.event.addListener(map, 'click', function(event){
                    var latLng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                    marker.setPosition(latLng);
                    $('#' + id + '-latitude').text(event.latLng.lat());
                    $('#' + id + '-longitude').text(event.latLng.lng());
                    $('#' + id + '-hidden_latitude').val(event.latLng.lat());
                    $('#' + id + '-hidden_longitude').val(event.latLng.lng());

                  });
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }
                function editMap(id, latitude, longitude) {
                  $('#' + id + '-latitude').text(latitude);
                  $('#' + id + '-longitude').text(longitude);
                  $('#' + id + '-hidden_latitude').val(latitude);
                  $('#' + id + '-hidden_longitude').val(longitude);
                  var coordinate = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
                  var map = new google.maps.Map(document.getElementById(id), {
                    zoom: 8,
                    center: coordinate
                  });
                  var marker = new google.maps.Marker({
                    position: coordinate,
                    map: map
                  });
                  google.maps.event.addListener(map, 'click', function(event){
                    var latLng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                    marker.setPosition(latLng);
                    $('#' + id + '-latitude').text(event.latLng.lat());
                    $('#' + id + '-longitude').text(event.latLng.lng());
                    $('#' + id + '-hidden_latitude').val(event.latLng.lat());
                    $('#' + id + '-hidden_longitude').val(event.latLng.lng());

                  });
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }
            </script>