
$(document).ready(function() {
    $('#kecamatan').change(function() {
        var data = $('#kecamatan').val();

        if (data != '') {
            $.ajax({
                url: "<?php echo base_url('admin/peta_kecelakaan/filter_kecamatan/') ?>"+data,
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



$(document).ready(function() {
    $('#kelurahan').change(function() {
        var data = $('#kelurahan').val();
        if (data != '') {
            $.ajax({
                url: "<?php echo base_url('admin/peta_kecelakaan/filter_kelurahan/') ?>"+data,
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
