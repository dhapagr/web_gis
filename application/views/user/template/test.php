<title>Leaflet Panel Layers</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/leaflets/src/leaflet-panel-layers.css" />
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/leaflets/examples/icons.css" />
<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/leaflets/examples/style.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/core/menu/menu-types/vertical-menu.css">

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
			<div style="height: 580px;" id="map" ></div>
		</div>
	</div>
</section>

<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/forms/select/form-select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<script src="<?php echo base_url("assets"); ?>/user/leaflets/src/leaflet-panel-layers.js"></script>
<!-- GEOJSON DATA -->
<!-- <script src="<?php echo base_url("assets"); ?>/user/leaflets/examples/data/bar.js"></script> -->
<script src="<?php echo base_url("assets"); ?>/user/leaflets/examples/data/fuel.js"></script>
<script src="<?php echo base_url("assets"); ?>/user/leaflets/examples/data/parking.js"></script>
<script src="<?php echo base_url("assets"); ?>/user/leaflets/examples/data/drinking_water.js"></script>

<script>

	<?php foreach ($data_lokasi as $key) : ?>
	var map = L.map('map', {
			zoom: 11,
			attributionControl: false,
			center: L.latLng([<?= $key['latitude'] ?>,<?= $key['longitude'] ?>]),
		}),
		osmLayer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

	map.addLayer(osmLayer);

	function iconByName(name) {
		return '<i class="icon icon-'+name+'"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '<?php echo base_url("assets"); ?>/user/leaflets/examples/images/markers/'+feature.properties.amenity+'.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}


	var baseLayers = [
		{
			name: "OpenStreetMap",
			layer: osmLayer
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('https://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
		},
		{
			name: "Google Map",
			layer: L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
				maxZoom: 20,
				subdomains:['mt0','mt1','mt2','mt3']
			})
		},
		{
			name: "Earth",
			layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
				maxZoom: 20,
				subdomains:['mt0','mt1','mt2','mt3']
			})
		},
		{
			name: "Hybrid",
			layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
				maxZoom: 20,
				subdomains:['mt0','mt1','mt2','mt3']
			})
		},
	];

	var overLayers = [
		{
			name: "Titik Rawan",
			icon: iconByName('bar'),
			layer: 
			(
				
				L.marker([-7.6121158749000495,111.50865030940624]).addTo(map)
				// L.marker([-7.641731656299006,111.4887508749962]).addTo(map)
				// L.marker([-7.6121158749000495,111.50865030940624]).addTo(map)
			)
		},
		{
			name: "Titik Waspada ",
			icon: iconByName('drinking_water'),
			layer: L.geoJson(Drinking_water, {pointToLayer: featureToMarker }).addTo(map)
		},
		{
			name: "Titik Kecelakaan",
			icon: iconByName('fuel'),
			layer: L.geoJson(Fuel, {pointToLayer: featureToMarker }).addTo(map)
		},
		// {
		// 	name: "Parking",
		// 	icon: iconByName('parking'),
		// 	layer: L.geoJson(Parking, {pointToLayer: featureToMarker }).addTo(map)
		// },
	];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

	map.addControl(panelLayers);
	<?php endforeach ;?>

</script>

<!-- <script type="text/javascript" src="/labs-common.js"></script> -->
