<!-- MAIN -->
<div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h4>Data Geotag</h4><hr>
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="map" style="width: 100%; height: 300px;"></div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
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
                                                <th></th>
                                                <th>Koordinat</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat</th>    
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($geotag as $row): ?>
                                            <?php $pelanggan = $this->data_pelanggan_m->get_row(['idpel' => $row->idpel]); ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td>
                                                  <img src="<?= base_url('assets/img/geotag/' . $row->id .'.jpg') ?>" class="img img-thumbnail" width="200px">
                                                </td>
                                                <td><?= $row->lon .' , '. $row->lat ?></td>     
                                                <td><?= $pelanggan->nama ?></td>
                                                <td class="col-md-4"><?= $pelanggan->alamat ?></td>
                                                                                                
                                                
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

            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    initMap();
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function initMap() {
                  var coordinate = {lat: -6.121435, lng: 106.774124};
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: coordinate
                  });

                  <?php foreach ($geotag as $row): ?>
                    var marker_<?= $row->id ?> = new google.maps.Marker({
                      position: {lat: <?= $row->lat ?>, lng: <?= $row->lon ?>},
                      map: map
                    });
                    var infoWindow_<?= $row->id ?> = new google.maps.InfoWindow({
                      content: '<?= $this->data_pelanggan_m->get_row(["idpel" => $row->idpel])->nama ?>'
                    });
                    infoWindow_<?= $row->id ?>.open(map, marker_<?= $row->id ?>);
                  <?php endforeach; ?>
                  
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }
            </script>