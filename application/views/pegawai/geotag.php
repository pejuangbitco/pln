<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <?= form_open('pegawai/geotag'); ?>
                            <div class="form-group">
                                <label for="">Pelanggan</label>
                                <select name="idpel" class="form-control">
                                    <option value="">Pilih Pelanggan</option>
                                    <?php foreach ($this->Data_pelanggan_m->get() as $pel): ?>
                                        
                                        <option value="<?= $pel->id_pelanggan ?>"><?= $pel->id_pelanggan . ' - '. $pel->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Koordinat</label>
                                <div class="gmap" id="map-add" style="width: 100%; height: 250px;"></div>
                                <p>Koordinat: <span id="map-add-latitude"></span>, <span id="map-add-longitude"></span></p>
                                <input type="hidden" id="map-add-hidden_latitude" name="latitude" required>
                                <input type="hidden" id="map-add-hidden_longitude" name="longitude" required>
                            </div>
                            <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
                           <?= form_close(); ?>
                        </div>
                    </div>
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
                                                <th>Longitude</th>
                                                <th>Latitude</th>
                                                <th>Pelanggan</th>                
                                                <th>Aksi</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($data as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->lon ?></td>                                                
                                                <td><?= $row->lat ?></td>
                                                <td><?= $this->Data_pelanggan_m->get_row(['id_pelanggan' => $row->idpel])->nama ?></td>                            
                                                <td align="center">
                                                    <button class="btn btn-primary" onclick="_edit(<?= $row->id ?>)">Edit</button>
                                                    <button class="btn btn-danger" onclick="_hapus(<?= $row->id ?>)">Hapus</button>                                               
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
                <?= form_open_multipart('pegawai/geotag') ?>
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Data Geotag</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label>Pilih Koordinat Jalan</label>
                          <div class="gmap" id="map-edit" style="width: 100%; height: 250px;"></div>
                          <p>Koordinat: <span id="map-edit-latitude"></span>, <span id="map-edit-longitude"></span></p>
                          <input type="hidden" id="map-edit-hidden_latitude" name="latitude" required>
                          <input type="hidden" id="map-edit-hidden_longitude" name="longitude" required>
                        </div>
                        <select name="idpel" class="form-control">
                                    <option value="">Pilih Pelanggan</option>
                                    <?php foreach ($this->Data_pelanggan_m->get() as $pel): ?>
                                        
                                        <option value="<?= $pel->id_pelanggan ?>"><?= $pel->idpel . ' - '. $pel->nama ?></option>
                                    <?php endforeach ?>
                                </select>
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
                    initMap('map-add');
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function _edit(id) {
                  $.ajax({
                    url: '<?= base_url('pegawia/geotag') ?>',
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
                      editMap('map-edit', json.lat, json.lonW);
                    },
                    error: function(e) {
                      console.log(e.responseText);
                    }
                  });
                }
                function initMap(id) {
                  $('#' + id + '-latitude').text('');
                  $('#' + id + '-longitude').text('');
                  $('#' + id + '-hidden_latitude').val(null);
                  $('#' + id + '-hidden_longitude').val(null);
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