<div class="leaflet-map" id="map"></div>

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

    <?php foreach($data_kecelakaan as $dt_kec) :?>
        L.marker([<?= $dt_kec['latitude'] ?>,<?= $dt_kec['longitude'] ?>]).bindPopup("data").addTo(map);
    <?php endforeach ;?>
</script>