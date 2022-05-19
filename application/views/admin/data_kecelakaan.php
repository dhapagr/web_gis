    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets"); ?>/admin/vendors/css/extensions/sweetalert2.min.css">
    <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/vendors/js/extensions/polyfill.min.js"></script>
    <script src="<?php echo base_url("assets"); ?>/admin/js/scripts/extensions/sweet-alerts.js"></script>

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
            <?= $this->session->flashdata('test');?>
            <div class="content-body">
                <div id="content">
                    <section>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Data Kecelakaan | Tabel Data Kecelakaan</h4>
                                    </div>
                                    <div class="ml-2">
                                        <a href="<?= base_url('admin/data_kecelakaan/add_view'); ?>">
                                            <button type="button" class="btn btn-success glow mr-1 mb-1">
                                                <i class="bx bxs-down-arrow-square"></i>
                                                <span class="align-middle ml-25">Tambah Data</span>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered complex-headers">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="align-top">No</th>
                                                        <th rowspan="2" class="align-top">Lokasi Jalan</th>
                                                        <th colspan="4">Data Korban</th>
                                                        <th rowspan="2" class="align-top">Prosentasi</th>
                                                        <th rowspan="2" class="align-top">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th>MD</th>
                                                        <th>LB</th>
                                                        <th>LR</th>
                                                        <th>KERMAT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data_wilayah as $data) :
                                                    ?>
                                                    <tr>
                                                        <form action="<?php echo base_url("admin/data_kecelakaan/edit/".$data['id_kecelakaan']);?>" method=POST enctype="multipart/form-data">

                                                            <td><?php echo $no++ ?></td>
                                                            <td><?= $data['nama_jalan'] ?></td>
                                                            <td><?= $data['meninggal_dunia'] ?></td>
                                                            <td><?= $data['luka_berat'] ?>
                                                            </td>
                                                            <td> <?= $data['luka_ringan'] ?></td>
                                                            <td>
                                                                <div class="row">
                                                                    <div >
                                                                        <span>Rp. </span>
                                                                    </div>
                                                                    <div>
                                                                        <?= number_format($data['kerugian_materi'], 0, '', '.') ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>test</td>
                                                            <td>
                                                                <div  class="form-row">
                                                                    <button type="button" class="btn btn-icon btn-info mr-1 mb-1" data-toggle="modal" data-target="#myModal<?= $data['id_kecelakaan']?>"><i class="bx bx-info-circle"></i></button>
                                                                    <button type="button" class="btn btn-icon btn-warning mr-1 mb-1" onclick="window.location.href='<?php echo base_url('admin/data_kecelakaan/edit/'.$data['id_kecelakaan']) ?>'"><i class="bx bx-edit" ></i></button>
                                                                    <button type="button" onclick="hapus(<?php echo $data['id_kecelakaan'] ?>)" class="btn btn-icon btn-danger mr-1 mb-1"><i class="bx bxs-trash"></i></button>
                                                                </div>                                       
                                                            </td> 
                                                        </form> 
                                                    </tr>
                                                    <?php endforeach; ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <!-- <div class="row">
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
                                        <form method="post" action="<?php echo base_url('admin/data_kecelakaan/tambah_data') ?>" enctype="multipart/form-data"> 
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
                        </div> -->
                    </section>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($data_kecelakaan as $data) :?>
        <div class="modal fade text-left w-100" id="myModal<?= $data['id_kecelakaan']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">Informasi Data Kecelakaan</h4>
                    </div>
                        <div class="modal-body">
                            <embed src="<?php echo base_url('admin/data_kecelakaan/export/'.$data['id_kecelakaan']) ?>" frameborder="0" width="100%" height="400px">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
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
    <!-- <script>
        <?php foreach ($data_lokasi as $key) : ?>

            var myIcon = new L.Icon({
                iconUrl: 'assets/admin/icon/marker-icon-black.png',
                // iconSize: [40, 45], // size of the icon
            });
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
            }).setView({ lng: INITIAL_LNG, lat: INITIAL_LAT },  <?= $key['ketinggian'] ?>);
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

    </script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
    <!-- <script>
        $(document).ready(function() {
            $('#content').load("<?php echo base_url('admin/data_kecelakaan/data_view') ?>");
        });
    </script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script type="text/javascript">
        function  addview() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML =
                this.responseText;
                }
            };
            xhttp.open("GET", "<?= base_url('admin/data_kecelakaan/add_view/'); ?>", true);
            xhttp.send();
            console.log(xhttp);
        }
        function dataview() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML =
                this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo base_url('admin/data_kecelakaan/data_view') ?>", true);
            xhttp.send();
        }
    </script> -->
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
        }
    </script>
    <script>
        function hapus(id_kecelakaan)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn btn-warning',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    window.location = "<?php echo base_url('admin/data_kecelakaan/hapus/') ?>" + id_kecelakaan;
                }
                else if (result.dismiss === Swal.DismissReason.cancel) {
                
                }
            })
            // swal({
            //     title: "Hapus Data?",
            //     text: "Once deleted, you will not be able to recover this imaginary file!",
            //     icon: "warning",
            //     buttons: true,
            //     dangerMode: true,
            //     })
            //     .then((willDelete) => {
            //     if (willDelete) {
            //         window.location = "<?php echo base_url('admin/data_kecelakaan/hapus/') ?>" + id_kecelakaan;
            //     } else {
            //         swal("Data Tidak Terhapus !");
            //     }
            // });
        }
    </script>
    <script>
        $(function(){
            $(document).on('click','.edit_kategori',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post("<?php echo base_url('admin/template/file_export')?>",
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
    <!-- <script>
        function add_view()
        {   
            $.ajax({
					url: "<?php echo base_url('admin/edit_kecelakaan/add_view') ?>",
                    success: function (data) {
                        $('#content').html(data);
                    }
			})
                
        }
    </script> -->