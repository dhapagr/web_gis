
<html>
    <head>
	    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
		
		<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map/styledLayerControl.css" />
		<script src="<?php echo base_url("assets"); ?>/user/map/styledLayerControl.js"></script>
		
		<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyDeqZIQXFKMXqYccaxFFHtsxlhafvRFeQ4"></script>
        <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
		
		<script src="<?php echo base_url("assets"); ?>/user/map/Bing.js"></script>
		
		<style>
			#map {
				width:100%;
				height:100%;
		    }
			.leaflet-google-layer{
				z-index: 0;
			}
			.leaflet-map-pane{
				z-index: 100;
			}
			
        </style>
		
    </head>
    <body>
        <section id="cta" class="ctalogin"></section>
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Webgis</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
        </div>
	
        <section id="portfolio" class="portfolio">
            <div class="kontener" data-aos="fade-up">
                <div class="card-body">
                    <div style="height: 600px;" id="map" ></div>
                </div>
            </div>
        </section>
	    <!-- <div id="map"></div> -->
	
	    <script>
		<?php foreach ($data_lokasi as $key) : ?>
		    // Google layers
		    var g_roadmap   = new L.Google('ROADMAP');
			var g_satellite = new L.Google('SATELLITE');
			var g_terrain   = new L.Google('TERRAIN');
			
			// OSM layers
			var osmUrl='http://{s}.tile.osm.org/{z}/{x}/{y}.png';
			var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
			var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
			
			// Bing layers
			var bing1 = new L.BingLayer("AvZ2Z8Jve41V_bnPTe2mw4Xi8YWTyj2eT87tSGSsezrYWiyaj0ldMaVdkyf8aik6", {type: 'Aerial'});
			var bing2 = new L.BingLayer("AvZ2Z8Jve41V_bnPTe2mw4Xi8YWTyj2eT87tSGSsezrYWiyaj0ldMaVdkyf8aik6", {type: 'Road'});
			
            
            var map = L.map('map', {
                zoom: 11,
                attributionControl: false,
                center: L.latLng([<?= $key['latitude'] ?>,<?= $key['longitude'] ?>]),
            });
            
		
			// Sao Paulo Soybeans Plant
			var titik_kecelakaan = new L.LayerGroup();
            <?php foreach($data_kecelakaan as $key => $val) :?>
                L.marker([<?= $val['latitude'] ?>,<?= $val['longitude'] ?>]).addTo(titik_kecelakaan);
            <?php endforeach ;?>
			// L.marker([-22, -49.80]).addTo(soybeans_sp),
			
			// Sao Paulo Corn Plant corn_sp
			var titik_rawan = new L.LayerGroup();
            <?php foreach($data_rawan as $key => $rawan) :?>
                L.marker([<?= $rawan['latitude'] ?>,<?= $rawan['longitude'] ?>]).addTo(titik_rawan);
            <?php endforeach ;?>
			
			// Rio de Janeiro Bean Plant bean_rj
			var titik_sedang = new L.LayerGroup();
            <?php foreach($data_sedang as $key => $sedang) :?>
                L.marker([<?= $sedang['latitude'] ?>,<?= $sedang['longitude'] ?>]).addTo(titik_sedang);
            <?php endforeach ;?>

			// Rio de Janeiro Corn Plant corn_rj
			var titik_ringan = new L.LayerGroup();
            <?php foreach($data_ringan as $key => $ringan) :?>
                L.marker([<?= $ringan['latitude'] ?>,<?= $ringan['longitude'] ?>]).addTo(titik_ringan);
            <?php endforeach ;?>
			
			// Rio de Janeiro Rice Plant
			// var rice_rj = new L.LayerGroup();
            // // <?php foreach($data_kecelakaan as $key => $val) :?>
            // //     L.marker([<?= $val['latitude'] ?>,<?= $val['longitude'] ?>]).addTo(rice_rj);
            // // <?php endforeach ;?>
			
			// // Belo Horizonte Sugar Cane Plant
			// var sugar_bh = new L.LayerGroup();
            // <?php foreach($data_kecelakaan as $key => $val) :?>
            //     L.marker([<?= $val['latitude'] ?>,<?= $val['longitude'] ?>]).addTo(sugar_bh);
            // <?php endforeach ;?>
			// // Belo Horizonte Corn Plant
			// var corn_bh = new L.LayerGroup();
            // <?php foreach($data_kecelakaan as $key => $val) :?>
            //     L.marker([<?= $val['latitude'] ?>,<?= $val['longitude'] ?>]).addTo(corn_bh);
            // <?php endforeach ;?>

			
		    map.addLayer(bing2);
			
			var baseMaps = [
              
                { 
                    groupName : "Base Maps",
                    expanded : true,
                    layers    : 
                    {
                        "Google Earth"     :    L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                                                    maxZoom: 20,
                                                    subdomains:['mt0','mt1','mt2','mt3']
                                                }),
                        "OpenStreetMaps"    :   osm,
                        "Google Maps"       :   L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                                                    maxZoom: 20,
                                                    subdomains:['mt0','mt1','mt2','mt3']
                                                }),
                        "Hybrid"            :   L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                                    maxZoom: 20,
                                                    subdomains:['mt0','mt1','mt2','mt3']
                                                }),
                        
                    }
                }, 						
			];
					
			var overlays = [
							 {
								groupName : "Titik Rawan",
								expanded : true,
								layers    : { 
									"Titik Kecelakaan" 	: titik_kecelakaan,
									"Titik Rawan" 	 	: titik_rawan,
									"Titik Bahaya"     	: titik_sedang,
									"Titik Kecelakaan Ringan"	: titik_ringan,		
								}	
                             }, 
							//  {
							// 	groupName : "Rio de Janeiro",
							// 	expanded : true,
							// 	layers    : { 
									
							// 		"Corn Plant" 	 : corn_rj,
							// 		"Rice Plant"	 : rice_rj		
							// 	}	
                            //  }, 
							//  {
							// 	groupName : "Belo Horizonte",
							// 	layers    : { 
							// 		"Sugar Cane Plant"	: sugar_bh		
							// 	}	
                            //  }							 
			];
			
			// configure StyledLayerControl options for the layer soybeans_sp
			// soybeans_sp.StyledLayerControl = {
			// 	removable : true,
			// 	visible : false
			// }

			// configure the visible attribute with true to corn_bh
			// corn_bh.StyledLayerControl = {
			// 	removable : false,
			// 	visible : true
			// }
			
			var options = {
				container_width 	: "300px",
				// container_height 	: "300px",
				group_maxHeight     : "700px",
				container_maxHeight : "350px", 
				exclusive       	: false,
				collapsed : true, 
				position: 'topright'
			};
		
		    var control = L.Control.styledLayerControl(baseMaps, overlays, options);
			map.addControl(control);
			
			// test for adding new base layers dynamically
			// to create a new group simply add a layer with new group name
			control.addBaseLayer( bing1, "Bing Satellite", {groupName : "Bing Maps", expanded: true} );
			control.addBaseLayer( bing2, "Bing Road", {groupName : "Bing Maps"} );
			
			// test for adding new overlay layers dynamically
			// control.addOverlay( corn_bh, "Corn Plant", {groupName : "Belo Horizonte"} ); 
			
			//control.removeLayer( corn_sp );
			
			//control.removeGroup( "Rio de Janeiro");

			control.selectLayer(titik_kecelakaan); 
			//control.unSelectLayer(corn_sp); 

			// control.selectGroup("Rio de Janeiro");
			//control.unSelectGroup("Rio de Janeiro");
			
			// var popup = L.popup()
			// .setLatLng([-16, -54])
			// .setContent("The data that appears in this application are fictitious and do not represent actual data!")
			// .openOn(map);
			
			
        <?php endforeach ?>
		</script>  

	    
    </body>
	
</html>
