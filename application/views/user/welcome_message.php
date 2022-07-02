
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css">
<link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>
<script type="text/javascript" src="https://tiles.unwiredlabs.com/js/leaflet-unwired.js?v=1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-hash/0.2.1/leaflet-hash.min.js"></script>
<script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>    

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/forms/select/select2.min.css">

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/colors.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/components.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/themes/semi-dark-layout.css"> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/css/core/menu/menu-types/vertical-menu.css">
<body>
  <section id="cta" class="cta">
    <div class="container" >
      <div id="hero" class="d-flex align-items-center">
        <div id="cta" class="ctawelcome">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <div class="d-flex justify-content-center">
                <img style="width:150px; height:150px;" src="<?php echo base_url("assets"); ?>/user/img/Logo-DIR-Lantas-Polri.png" class="img-fluid" alt="">
              </div><br>
              <div class="section-title">
                <h2>SISTEM INFORMASI GEOGRAFIS</h2>
              </div>
              <div style="text-align: center;">
                <h1>Pemetaan Titik Rawan Kecelakaan Kota Madiun</h1>
              </div><br>
              <div class="d-flex justify-content-center">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
                <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
              <img src="<?php echo base_url("assets"); ?>/user/img/why-us.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <main id="main">

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>SISTEM INFORMASI GEOGRAFIS</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>
    </section>

    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>MAP</h2>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-6">
                  <h3>FILTER KECAMATAN</h3>
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
                  <h3>FILTER KELURAHAN</h3>
                  <fieldset class="form-group">
                      <div class="input-group">
                          <select id='kelurahan' name="kelurahan" class="custom-select" required>
                              <option value="" disabled selected hidden>Pilih Kelurahan</option>
                          </select>
                      </div>
                  </fieldset>
              </div>
             
          </div>
          <hr>
        </div>
        <div id="map" style="height: 400px;"></div>
        <!-- <script>

          var map = L.map('map').setView([51.505, -0.09], 13);

          var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
              'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
          }).addTo(map);

        </script> -->
      </div>
    </section>
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>DEtail</h2>
        </div>
        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">

            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
  
            <form action="<?php echo base_url('user/Feedback/add'); ?>" enctype="multipart/form-data" role="form" method="post" class="php-email-form" id="form_feedback">
              <div>
                <div class="section-title">
                  <h4>FEEDBACK</h4>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text"  name="name" class="form-control" id="name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="button" id="formfedback">Kirim Feedback</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>
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
  // Add the 'scale' control

  <?php endforeach ;?>
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
          url: "<?php echo base_url('user/Webgis/getKel') ?>",
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
                url: "<?php echo base_url('user/Webgis/filter_kecamatan/') ?>"+data,
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
                url: "<?php echo base_url('user/Webgis/filter_kelurahan/') ?>"+data,
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
