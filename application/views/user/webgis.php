<!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

<link rel="stylesheet" href="<?php echo base_url("assets"); ?>/user/map_user/styledLayerControl.css" />
<script src="<?php echo base_url("assets"); ?>/user/map_user/styledLayerControl.js"></script>

<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyDeqZIQXFKMXqYccaxFFHtsxlhafvRFeQ4"></script>
<script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>

<script src="<?php echo base_url("assets"); ?>/user/map_user/Bing.js"></script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css">
<link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
<script type="text/javascript" src="https://tiles.unwiredlabs.com/js/leaflet-unwired.js?v=1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
<script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>    

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/forms/select/select2.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/core/menu/menu-types/vertical-menu.css">

<style>
    #map {
        width: 100%;
	      min-height: 690px;
    }
    .leaflet-google-layer{
        z-index: 0;
    }
    .leaflet-map-pane{
        z-index: 100;
    }
    
</style>
<section id="cta" class="ctalogin"></section>
<hr>
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Webgis</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
    </div>
</section>
<div class="card-body">
    <!-- <div class="row">
        <div class="col-md-6">
            <h4 class="d-flex justify-content-center">FILTER KECAMATAN</h4 class="d-flex justify-content-center">
            <fieldset class="form-group">
                <div class="input-group">
                    <select class="custom-select" id='kecamatan' name="kecamatan" required>
                        <?php foreach ($data_kecamatan as $k) :?>
                            <option value="" disabled selected hidden>Pilih Kecamatan</option>
                            <option value="<?php echo $k['id_kecamatan'] ?>"><?php echo$k['nama_kecamatan'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <h4 class="d-flex justify-content-center">FILTER KELURAHAN</h4 class="d-flex justify-content-center">
            <fieldset class="form-group">
                <div class="input-group">
                    <select id='kelurahan' name="kelurahan" class="custom-select" required>
                        <option value="" disabled selected hidden>Pilih Kelurahan</option>
                    </select>
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <h4 class="d-flex justify-content-center">FILTER KATEGORI</h4 class="d-flex justify-content-center">
            <fieldset class="form-group">
                <div class="input-group">
                    <select class="custom-select" id='status' name="status" required>
                        <?php foreach ($data_kecamatan as $k) :?>
                            <option value="" disabled selected hidden>Pilih Status</option>
                            <option value="<?php echo $k['id_kecamatan'] ?>"><?php echo$k['nama_kecamatan'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <h4 class="d-flex justify-content-center">FILTER TANGGAL</h4 class="d-flex justify-content-center">
            <fieldset class="form-group">
                <div class="input-group">
                    <select class="custom-select" id='tanggal' name="tanggal" required>
                        <?php foreach ($data_kecamatan as $k) :?>
                            <option value="" disabled selected hidden>Pilih tanggal</option>
                            <option value="<?php echo $k['id_kecamatan'] ?>"><?php echo$k['nama_kecamatan'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </fieldset>
        </div>
    </div> -->
    <hr>
    <div  id="map" ></div>
    <hr>
</div>


<script src="<?php echo base_url("assets"); ?>/admin/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/admin/js/scripts/forms/select/form-select2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script>
  $('#formfedback').click(function()
  {
    $('#form_feedback').submit();
    // var data = $('#form_feedback').serialize();
    // $.ajax({
    //   type: "POST",
    //   url: "<?php echo base_url('user/feedback/add'); ?>",
    //   data: data,
    //   success: function(response) {
    //     console.log(response);
    //   },
    //   error: function() {
    //       alert('error handing here');
    //   }
    // });
  })
</script> -->
<script type="text/javascript">
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
  var streets = L.tileLayer.Unwired({key: key, scheme: "hybrid"});
  var earth = L.tileLayer.Unwired({key: key, scheme: "earth"});
  var hybrid = L.tileLayer.Unwired({key: key, scheme: "streets"});

  var map = L.map('map', {
      scrollWheelZoom: (window.self === window.top) ? true : false,
      dragging: (window.self !== window.top && L.Browser.touch) ? false : true,
      layers: [streets],
      tap: (window.self !== window.top && L.Browser.touch) ? false : true,
  }).setView({ lng: INITIAL_LNG, lat: INITIAL_LAT }, 12);
  var hash = new L.Hash(map);

  googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
      maxZoom: 20,
      subdomains:['mt0','mt1','mt2','mt3']
  });
  googleStreets.addTo(map);

  L.control.layers({
      "Streets": streets,
      "Earth": earth,
      "Hybrid": hybrid,
      "Google Mapas": googleStreets,
      
  }, null, {
      position: "topright"
  }).addTo(map);
  L.control.scale().addTo(map);

  var groupedOverlays = {
    "Landmarks": {
      "Cities": ExampleData.LayerGroups.cities,
      "Restaurants": ExampleData.LayerGroups.restaurants
    },
    "Random": {
      "Dogs": ExampleData.LayerGroups.dogs,
      "Cats": ExampleData.LayerGroups.cats
    }
  };

  // Add geocoder
  var geocoder = L.control.geocoder(key, {
    fullWidth: 650,
    expanded: true,
    markers: true,
    url: 'https://api.locationiq.com/v1',
  }).addTo(map);

  // Re-sort control order so that geocoder is on top
  var geocoderEl = geocoder._container;
  geocoderEl.parentNode.insertBefore(geocoderEl, geocoderEl.parentNode.childNodes[0]);
  // Add the 'scale' control

  <?php endforeach ;?>
  
  <?php foreach($data_kecelakaan as $key => $val) :?>
      L.marker([<?= $val['latitude'] ?>,<?= $val['longitude'] ?>], {icon: redMarker}).bindPopup("data").addTo(map);
  <?php endforeach ;?>
</script>
<script>
  $('#formfedback').click(function()
  {
    var a=document.forms["form_feedback"]["name"].value;
    var b=document.forms["form_feedback"]["email"].value;
    var c=document.forms["form_feedback"]["subject"].value;
    var d=document.forms["form_feedback"]["message"].value;
    if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="")
    {
        alert("Please Fill All Required Field");
        return false;
    }
    else{

      // $.ajax({
      //   type: 'post',
      //   url: '<?php echo base_url('user/feedback/add'); ?>',
      //   data: $('form_feedback').serialize(),
      //   success: function () 
      //   {
      //     alert('Patient added');
          $('#form_feedback').submit();
      //     // document.getElementById("form_feedback").reset();
      //   }
      // });

    }
  })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#kecamatan').change(function() {
      var kec = $('#kecamatan').val();			
              if (kec != '') {
        $.ajax({
          url: "<?php echo base_url('user/webgis/getKel') ?>",
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
  $(document).ready(function() {
    $('#kecamatan').change(function() {
      var data = $('#kecamatan').val();
       
        if (data != '') {
            $.ajax({
                url: "<?php echo base_url('user/webgis/filter_kecamatan/') ?>"+data,
                success: function (data) {
                  var imgDir = '<?php echo base_url("assets"); ?>/user/img/'
                    var redMarker = L.icon({
                      iconUrl: imgDir + 'pothole.png',
                      iconRetinaUrl: imgDir + 'pothole.png',
                      iconSize: [30, 30],
                      iconAnchor: [12, 41],
                      popupAnchor: [-0, -31],
                      // shadowUrl: imgDir + 'marker-shadow.png',
                      shadowSize: [41, 41],
                      shadowAnchor: [14, 41]
                    })

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
                        var LamMarker = new L.marker([items2[i].lat, items2[i].lon], {icon: redMarker});
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
                url: "<?php echo base_url('user/webgis/filter_kelurahan/') ?>"+data,
                success: function (data) {
                  var imgDir = '<?php echo base_url("assets"); ?>/user/img/'
                    var redMarker = L.icon({
                      iconUrl: imgDir + 'pothole.png',
                      iconRetinaUrl: imgDir + 'pothole.png',
                      iconSize: [30, 30],
                      iconAnchor: [12, 41],
                      popupAnchor: [-0, -31],
                      // shadowUrl: imgDir + 'marker-shadow.png',
                      shadowSize: [41, 41],
                      shadowAnchor: [14, 41]
                    })

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
                        var LamMarker = new L.marker([items2[i].lat, items2[i].lon], {icon: redMarker});
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
