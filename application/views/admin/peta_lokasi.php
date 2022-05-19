    <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/maps/geojson_madiun_kota.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/maps/geojson_kecamatan_indonesia.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/leaflet_search.js"></script> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css">
    <link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
    <script type="text/javascript" src="https://tiles.unwiredlabs.com/js/leaflet-unwired.js?v=1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
    <script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>    
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/sweetalert2.min.css">
    <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/polyfill.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/sweet-alerts.js"></script>

    <!-- BEGIN: Content  -->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Admin</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a>Peta Digital</a>
                                </li>
                                <li class="breadcrumb-item active">Peta Kota
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('success');?>
            <div class="content-body">
                <section id="maps-leaflet">
                    <div class="row">
                        <!-- Basic Map starts -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Peta Kota Madiun</h4>
                                </div>
                                <div class="card-body"> 
                                    <?php foreach ($data_lokasi as $key) : ?>
                                    <form method="post" action="<?php echo base_url('admin/peta_lokasi/update_lokasi') ?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-3 col-sm-12 form-group"> 
                                                <label for="validationTooltip01">Longitude</label> 
                                                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" value="<?= $key['longitude'] ?>" required />
                                            </div> 
                                            <div class="col-md-3 col-sm-12 form-group"> 
                                                <label for="validationTooltip02">Latitude</label> 
                                                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" value="<?= $key['latitude'] ?>" required /> 
                                            </div> 
                                            <div class="col-md-3 col-sm-12 form-group"> 
                                                <label for="validationTooltip02">Ketinggian</label> 
                                                <input type="text" class="form-control" id="height" name="height" placeholder="Ketinggian" value="<?= $key['ketinggian'] ?>" required /> 
                                            </div> 
                                            <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                                                <button type="submit" class="btn btn-primary glow w-100 position-relative" >Edit Lokasi<i class="bx bx-check"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endforeach ;?>
                                </div>
                                <div class="card-body">
                                    <div class="leaflet-map" id="map"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Map ends -->
                        <!-- Marker Circle & Polygon starts 
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Marker Circle & Polygon</h4>
                                </div>
                                <div class="card-body">
                                    <div class="leaflet-map" id="map_kecamatan"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script>
        <?php foreach ($data_lokasi as $key) : ?>
            var key = 'pk.87f2d9fcb4fdd8da1d647b46a997c727';

            // Initial map view
            var INITIAL_LNG = <?= $key['longitude'] ?>;
            var INITIAL_LAT = <?= $key['latitude'] ?>;

            // Change the initial view if there is a GeoIP lookup
            if (typeof Geo === 'object') {
                INITIAL_LNG = Geo.lon;
                INITIAL_LAT = Geo.lat;
            }
            // Add layers that we need to the map
            var streets = L.tileLayer.Unwired({key: key, scheme: "streets"});
            var earth = L.tileLayer.Unwired({key: key, scheme: "earth"});
            var hybrid = L.tileLayer.Unwired({key: key, scheme: "hybrid"});

            var map = L.map('map', {
                scrollWheelZoom: (window.self === window.top) ? true : false,
                dragging: (window.self !== window.top && L.Browser.touch) ? false : true,
                layers: [streets],
                tap: (window.self !== window.top && L.Browser.touch) ? false : true,
            }).setView({ lng: INITIAL_LNG, lat: INITIAL_LAT }, 12);
            var hash = new L.Hash(map);
            
            var simpan_geojson_provinsi_indonesia = L.geoJson(geojson_madiun_kota)
            simpan_geojson_provinsi_indonesia.addTo(map);
            var latInput = document.querySelector("[name=latitude]");
            var lngInput = document.querySelector("[name=longitude]");

            var myIcon = new L.Icon({
                iconUrl: '<?php echo base_url("assets"); ?>/admin/icon/marker-icon-red.png',
                shadowUrl: '<?php echo base_url("assets"); ?>/admin/icon/marker-shadow.png',
                // iconSize: [40, 45], // size of the icon
            });

            var curLocation = [<?= $key['latitude'] ?>,<?= $key['longitude'] ?>];

            map.attributionControl.setPrefix(false);

            var marker = new L.marker(curLocation, 
            {
                icon: myIcon ,
                draggable: 'true',
            });

            marker.on('dragend', function(event)
            {
                var position = marker.getLatLng();
                marker.setLatLng(position, {
                    draggable: 'true',
                }).bindPopup(position).update();
                $("#longitude").val(position.lng);
                $("#latitude").val(position.lat);
            });

            map.addLayer(marker);
        <?php endforeach ;?>
    </script>
        