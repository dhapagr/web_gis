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
                            <li class="breadcrumb-item active">Data Kecelakaan
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
           <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card" >
                            <div class="card-header">
                                <h5 class="card-title" >Peta Digital | Ambil Koordinat Lokasi</h5>
                            </div>
                            <div class="card-body">
                                <div class="leaflet-map" id="map"></div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title" >Data Kecalakaan | Form Tambah Data</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('admin/data_kecelakaan/tambah_data') ?>" enctype="multipart/form-data" id="test"> 
                                    <div class="row">
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Nama Jalan</label>
                                                <input type="text" name="jalan" class="form-control" id="jalan" placeholder="Masukkan Nama Jalan" required/>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label for="basicInput">Longitude</label>
                                                <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Atur Marker Pada Peta..." required/>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label for="basicInput">Latitude</label>
                                                <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Atur Marker Pada Peta..." required/>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Kecamatan</label>
                                                <div class="input-group">
                                                    <select class="custom-select" id='kecamatan' name="kecamatan" required>
                                                    <?php foreach ($data_kecamatan as $k) :?>
                                                            <option value="" disabled selected hidden>Pilih Kecamatan</option>
                                                            <option value="<?php echo $k['id_kecamatan'] ?>"><?php echo$k['nama_kecamatan'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label for="basicInput">Kelurahan</label>
                                                <div class="input-group">
                                                                    
                                                    <select id='kelurahan' name="kelurahan" class="custom-select" required>
                                                        <option value="" disabled selected hidden>Pilih Kelurahan</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                                        </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label for="basicInput">Kerugian Materi</label>
                                                <input type="number" name="kermat" class="form-control" id="kermat"  placeholder="ex: 50000" required/>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Meniggal Dunia</label>
                                                <input type="text" name="md" class="form-control" id="md"  placeholder="Meniggal Dunia.." required/>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label for="basicInput">Luka Berat</label>
                                                <input type="text" name="lb" class="form-control" id="lb"  placeholder="Luka Berat.." required/>
                                            </fieldset>
                                                                
                                            <fieldset class="form-group">
                                                <label for="basicInput">Luka Ringan</label>
                                                <input type="text" name="lr" class="form-control" id="lr"  placeholder="Luka Ringan.." required/>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <button type="button" onclick="tutup()" class="btn btn-danger glow mr-1 mb-1"><i class="bx bxs-x-square"></i>
                                                    <span class="align-middle ml-25">Clear Data</span> 
                                                </button>
                                                <button type="submit" class="btn btn-success glow mr-1 mb-1"><i class="bx bxs-add-to-queue"></i>
                                                    <span class="align-middle ml-25">Tambah Data</span>
                                                </button>
                                            </fieldset>
                                        </div>
                                    </div>
                                                        
                                </form>
                            </div>
                                                
                        </div>
                    </div>
                </div>
            </section> 
        </div>
    </div>
</div>
<!-- <script>
    var mark;
    var map = L.map('map').setView([-7.6389753, 111.5288506], 13);
     var gl_aceh = L.mapboxGL({
         attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
         accessToken: 'not-needed',
         style: 'https://api.maptiler.com/maps/streets/style.json?key=1h7e1Z9S76PGy92uF3c5'
     }).addTo(map);

    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");

    function onMapClicktambah(e) {
		var lat = e.latlng.lat;
		var lng = e.latlng.lng;
		if(!mark){
			mark = L.marker(e.latlng).addTo(map);
		} else{
			mark.setLatLng(e.latlng);
		}
        console.log(e.latlng);

		latInput.value = lat;
		lngInput.value = lng;
    }
    map.on('click', onMapClicktambah);

    
</script> -->

<!-- <script>
    <?php foreach ($data_lokasi as $key) : ?>

        var myIcon = new L.Icon({
            iconUrl: 'assets/admin/icon/marker-icon-black.png',
        // iconSize: [40, 45], // size of the icon
        });
        var key = 'pk.87f2d9fcb4fdd8da1d647b46a997c727';

        var mark;
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

            // L.control.zoom({
            //     position:'topright'
            // }).addTo(map);

            // Add the 'layers' control
        L.control.layers({
            "Streets": streets,
            "Earth": earth,
            "Hybrid": hybrid,
        }, null, {
            position: "topright"
        }).addTo(map);
            // Add the 'scale' control
        L.control.scale().addTo(map);

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

            // Focus to geocoder input
        geocoder.focus();

            // Adding a script block to post message to the parent container (think iframed demos)
        window.addEventListener('hashchange', function () {
            parent.postMessage(window.location.hash, '*')
        });

        var latInput = document.querySelector("[name=latitude]");
        var lngInput = document.querySelector("[name=longitude]");

        var myIcon = new L.Icon({
            iconUrl: '<?php echo base_url("assets"); ?>/admin/icon/marker-icon-red.png',
            shadowUrl: '<?php echo base_url("assets"); ?>/admin/icon/marker-shadow.png',
            // iconSize: [40, 45], // size of the icon
        });

        var curLocation = [<?= $key['latitude'] ?>,<?= $key['longitude'] ?>];

            // map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, 
        {
            icon: myIcon ,
            // draggable: 'true',
        });

        function onMapClicktambah(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if(!mark){
                mark = L.marker(e.latlng,
                {
                    icon: myIcon, 
                }).addTo(map);
            } else{
                mark.setLatLng(e.latlng);
            }
            console.log(e.latlng);

            latInput.value = lat;
            lngInput.value = lng;
        }
    map.on('click', onMapClicktambah);

        // marker.on('dragend', function(event)
        // {
        //     var position = marker.getLatLng();
        //     marker.setLatLng(position, {
        //         draggable: 'true',
        //     }).bindPopup(position).update();
        //     $("#longitude").val(position.lng);
        //     $("#latitude").val(position.lat);
        // });

        // map.addLayer(marker);

    <?php endforeach ;?>
</script> -->
<script type="text/javascript">
    <?php foreach ($data_lokasi as $key) : ?>
      // Maps access token goes here
      var key = 'pk.87f2d9fcb4fdd8da1d647b46a997c727';

      var mark;
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

    //   L.control.zoom({
    //       position:'topright'
    //   }).addTo(map);

      // Add the 'layers' control
      L.control.layers({
          "Streets": streets,
          "Earth": earth,
          "Hybrid": hybrid,
      }, null, {
          position: "topright"
      }).addTo(map);
      // Add the 'scale' control
      L.control.scale().addTo(map);

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

      // Focus to geocoder input
      geocoder.focus();

      var latInput = document.querySelector("[name=latitude]");
      var lngInput = document.querySelector("[name=longitude]");

      function onMapClicktambah(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if(!mark){
                mark = L.marker(e.latlng).addTo(map);
            } else{
                mark.setLatLng(e.latlng);
            }
            console.log(e.latlng);

            latInput.value = lat;
            lngInput.value = lng;
        }
        map.on('click', onMapClicktambah);

      // Adding a script block to post message to the parent container (think iframed demos)
      window.addEventListener('hashchange', function () {
        parent.postMessage(window.location.hash, '*')
      });
    <?php endforeach ;?>
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#kecamatan').change(function() {
			var kec = $('#kecamatan').val();			
            if (kec != '') {
				$.ajax({
					url: "<?php echo base_url('admin/data_kecelakaan/getKel') ?>",
					type: "POST",
					data: {
						kecamatan: kec
					},
					success: function(response) {
						console.log(response);
						$('#kelurahan').html(response);
					}
				})
			}
		})
	})
</script>
<script>
    function tutup()  
    {
        $('input[name="jalan"]').val('');
        $('input[name="longitude"]').val('');
        $('input[name="latitude"]').val('');
        $('input[name="md"]').val('');
        $('input[name="lb"]').val('');
        $('input[name="lr"]').val('');
        $('input[name="kermat"]').val('');
        $('input[name="kecamatan"]').val('');
        swal({
            title: "Cancel Edit Data?",
            text: "Data Akan Direset Ulang !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "<?php echo base_url('admin/data_kecelakaan') ?>" ;
            } else {
            // swal("Data Tidak Terhapus !");
            }
        });
    }
</script>

