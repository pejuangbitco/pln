<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="panel panel-success">
                            <div class="panel-heading">
                              <h4>Detail Data Geotag</h4>
                            </div>
                              <div class="panel-body">
                                
                                <div class="form-group">

                                    <div class="gmap" id="map-add" style="width: 100%; height: 500px;"></div>
                                    <p>Koordinat: <?= $data->lat ?>, <?= $data->lon ?></p>
                                    <input type="hidden" id="map-add-hidden_latitude" name="latitude" required>
                                    <input type="hidden" id="map-add-hidden_longitude" name="longitude" required>
                                </div>
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Nama Pelanggan</th>
                                      <th>Alamat</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><?= (!empty($this->data_pelanggan_m->get_row(['idpel' => $data->idpel]))) ? $this->data_pelanggan_m->get_row(['idpel' => $data->idpel])->nama : '-' ?></td>
                                      <td><?= (!empty($this->data_pelanggan_m->get_row(['idpel' => $data->idpel]))) ? $this->data_pelanggan_m->get_row(['idpel' => $data->idpel])->alamat : '-' ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                           </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>

            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    initMap('map-add');
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });

                });
                function initMap(id) {
                  var coordinate = {lat: <?= $data->lat ?>, lng: <?= $data->lon ?>};
                  var map = new google.maps.Map(document.getElementById(id), {
                    zoom: 11,
                    center: coordinate
                  });
                  var marker = new google.maps.Marker({
                    position: coordinate,
                    map: map
                  });
                  var html = '<img src="<?= base_url('assets/img/geotag/' . $data->id .'.jpg') ?>" class="img img-thumbnail" width="250px"><br>';
                  var infoWindow = new google.maps.InfoWindow({
                      content: html + "Nama Pelanggan : <?=  $this->data_pelanggan_m->get_row(['idpel' => $data->idpel])->nama ?><br> Alamat : <?=  $this->data_pelanggan_m->get_row(['idpel' => $data->idpel])->alamat ?>"
                    });
                    infoWindow.open(map, marker);
                  // google.maps.event.addListener(map, 'click', function(event){
                  //   var latLng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                  //   marker.setPosition(latLng);
                  //   $('#' + id + '-latitude').text(event.latLng.lat());
                  //   $('#' + id + '-longitude').text(event.latLng.lng());
                  //   $('#' + id + '-hidden_latitude').val(event.latLng.lat());
                  //   $('#' + id + '-hidden_longitude').val(event.latLng.lng());

                  // });
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }
            </script>