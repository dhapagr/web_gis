    <!-- <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/maps/geojson_madiun_kota.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/maps/geojson_kecamatan_indonesia.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/leaflet_search.js"></script>  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css">
    <link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
    <script type="text/javascript" src="https://tiles.unwiredlabs.com/js/leaflet-unwired.js?v=1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
    <script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>   

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Admin</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/Dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a>Peta Digital</a>
                                </li>
                                <li class="breadcrumb-item active">Peta Titik Rawan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->session->flashdata('success');?>
            <div class="content-body">
                <section>
                    <div class="row">
                        <!-- Basic Map starts -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Peta Titik Kecelakaan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>FILTER KECAMATAN</h6>
                                            <fieldset class="form-group">
                                                <div class="input-group">
                                                        <select class="custom-select" id='kecamatan' name="kecamatan" required>
                                                            <?php foreach ($data_kecamatan as $k) :?>
                                                                <option value="" disabled selected hidden>Pilih Kecamatan</option>
                                                                <option value="<?php echo $k['id_kecamatan'] ?>"><?php echo$k['nama_kecamatan'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    <!-- <div class="input-group-append">
                                                        <button type="button" onclick="filter_kec()" class="btn btn-warning glow mr-1 mb-1"><i class="bx bx-filter"></i>
                                                            <span class="align-middle ml-25">Filter</span>
                                                        </button>                                                    
                                                    </div> -->
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>FILTER KELURAHAN</h6>
                                            <fieldset class="form-group">
                                                <div class="input-group">
                                                    <select id='kelurahan' name="kelurahan" class="custom-select" required>
                                                        <option value="" disabled selected hidden>Pilih Kelurahan</option>
                                                    </select>
                                                    <!-- <div class="input-group-append">
                                                        <button type="button" onclick="filter_kel()" class="btn btn-warning glow mr-1 mb-1"><i class="bx bx-filter"></i>
                                                            <span class="align-middle ml-25">Filter</span>
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="leaflet-map" id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>/assets/admin/js/scripts/main/filter_wilayah.js"></script>  -->

    <script type="text/javascript">
		$(document).ready(function() {
			$('#kecamatan').change(function() {
				var kec = $('#kecamatan').val();			
                if (kec != '') {
					$.ajax({
						url: "<?php echo base_url('admin/Peta_kecelakaan/getKel') ?>",
						type: "POST",
						data: {
							kecamatan: kec
						},
						success: function(response) {
							// console.log(response);
							$('#kelurahan').html(response);
						}
                        
					})
				}
			})
		})
	</script>
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

        L.control.layers({
            "Streets": streets,
            "Earth": earth,
            "Hybrid": hybrid,
        }, null, {
            position: "topright"
        }).addTo(map);
        // Add the 'scale' control

        <?php endforeach ;?>

        <?php foreach($data_kecelakaan as $key => $val) :?>
            L.marker([<?= $val['latitude'] ?>,<?= $val['longitude'] ?>]).bindPopup("data").addTo(map);
        <?php endforeach ;?>

        // var marker = new Array();
        // var items =[<?php foreach($data_kecelakaan as $key => $val) :?>{"lat":"<?= $val['latitude'] ?>","lon":"<?= $val['longitude'] ?>"},<?php endforeach ;?>];
        
        //     for(i=0;i<items.length;i++){
        //         var LamMarker = new L.marker([items[i].lat, items[i].lon]);
        //         marker.push(LamMarker);
        //         map.addLayer(marker[i]);
        //         }

    </script>
    <script>
        $(document).ready(function() {
			$('#kecamatan').change(function() {
				var data = $('#kecamatan').val();
       
                if (data != '') {
                    $.ajax({
                        url: "<?php echo base_url('admin/Peta_kecelakaan/filter_kecamatan/') ?>"+data,
                        success: function (data) {
                                
                            $(".leaflet-marker-icon").remove();
                            $(".leaflet-popup").remove();
                            $(".leaflet-marker-shadow").remove();    
                            
                            var jsonData = JSON.parse(data);

                            var items2 = [];
                            
                            for (var i = 0; i < jsonData.data_kecelakaan.length; i++) {
                                var pecah = jsonData.data_kecelakaan[i];
                                var json = {
                                    "lat"   : pecah.latitude, 
                                    "lon"   : pecah.longitude,
                                };

                                items2.push(json);
                            }

                            var marker = new Array();

                            for(i=0;i<items2.length;i++){
                                var LamMarker = new L.marker([items2[i].lat, items2[i].lon]);
                                marker.push(LamMarker);
                                map.addLayer(marker[i]);
                            }
                        }
                    })            
                }else{
                    swal('Informasi','Kecamatan tidak ditemukan', 'info');
                }
            })
        })
       
    </script>
    <script>
        $(document).ready(function() {
			$('#kelurahan').change(function() {
				var data = $('#kelurahan').val();
                if (data != '') {
                    $.ajax({
                        url: "<?php echo base_url('admin/Peta_kecelakaan/filter_kelurahan/') ?>"+data,
                        success: function (data) {
                            $(".leaflet-marker-icon").remove();
                            $(".leaflet-popup").remove();
                            $(".leaflet-marker-shadow").remove();    
                            
                            var jsonData = JSON.parse(data);

                            var items2 = [];
                            
                            for (var i = 0; i < jsonData.data_kecelakaan.length; i++) {
                                var pecah = jsonData.data_kecelakaan[i];
                                var json = {
                                    "lat"   : pecah.latitude, 
                                    "lon"   : pecah.longitude,
                                };

                                items2.push(json);
                            }

                            var marker = new Array();

                            for(i=0;i<items2.length;i++){
                                var LamMarker = new L.marker([items2[i].lat, items2[i].lon]);
                                marker.push(LamMarker);
                                map.addLayer(marker[i]);
                            }
                        }
                    })
                }else{
                    swal('Informasi','Kelurahan tidak ditemukan', 'info');
                }
            })
        })
    </script>