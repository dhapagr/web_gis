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
                                <li class="breadcrumb-item ">Data Laporan | Data laporanback
                            </ol>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div>
                        <div class="card-body">
                            <ul class="nav user-profile-nav justify-content-center justify-content-md-start nav-pills border-bottom-0 mb-0" role="tablist">
                                <li class="nav-item mb-0">
                                    <a class=" nav-link d-flex px-1" href="<?=base_url('admin/Data_laporan/')?>" aria-selected="true"><i class="bx bxs-message-rounded-dots"></i><span class="d-none d-md-block">Pengaduan Terjawab</span></a>
                                </li>
                                <li class="nav-item mb-0">
                                    <a class="nav-link d-flex px-1 active" href="<?=base_url('admin/Data_laporan/pengaduan_blm_jwb/')?>" role="tab" aria-selected="false"><i class="bx bxs-message-rounded-dots"></i><span class="d-none d-md-block">Pengaduan Belum Terjawab</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pengaduan</h4>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pelapor</th>
                                                    <th>Lokasi</th>
                                                    <th>Keterangan</th>
                                                    <th>Tgl Laporan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>                                                     
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach($dt_pengaduan as $aduan): ?>
                                                <tr id="row<?=$aduan['id_pengaduan']?>">
                                                    <td><?=$no++?></td>
                                                    <td><?=$aduan['data_user']->nama?></td>
                                                    <td><?=$aduan['lokasi']?></td>
                                                    <td><?=$aduan['subjek']?></td>
                                                    <td><?=$aduan['tanggal_pengaduan']?></td>
                                                    <td id="status<?=$aduan['id_pengaduan']?>">
                                                        <?=$aduan['status_pengaduan'] == 1 ? "<span class='text-success'>Publish</span>": "<span class='text-danger'>Non-Publish</span>"?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink<?=$aduan['id_pengaduan']?>"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink<?=$aduan['id_pengaduan']?>">
                                                                <a data-id="<?=$aduan['id_pengaduan']?>" class="dropdown-item text-success detail" style="cursor: pointer;"><i class="fa fa-search text-success mr-1"></i><b> Detail</b></a>
                                                                <a data-id="<?=$aduan['id_pengaduan']?>" class="dropdown-item text-warning edit" style="cursor: pointer;"><i class="fa fa-edit text-warning mr-1"></i><b> Edit</b></a>
                                                                <a data-id="<?=$aduan['id_pengaduan']?>" class="dropdown-item text-danger hapus" style="cursor: pointer;"><i class="fa fa-trash text-danger mr-1"></i><b> Hapus</b></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div id="tempel-modal"></div>
            </div>
        </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        //nav-tabs laporan heart color change
        $(".user-profile-like").click(function () {
        $(this).toggleClass("bx-heart bxs-heart").toggleClass("text-danger");
        });

        // stories swipper
        var swiperLength = $(".swiper-slide").length;
        if (swiperLength) {
            swiperLength = Math.floor(swiperLength / 2)
        }
        var mySwiperStories = new Swiper('.user-profile-stories', {
            slidesPerView: 'auto',
            initialSlide: swiperLength,
            centeredSlides: true,
            spaceBetween: 15,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var id_pengaduan = <?=$id_pengaduan?>;
        if(id_pengaduan != ""){
            $.ajax({
                url: "<?=base_url('admin/Data_laporan/get_detail_pengaduan/')?>"+id_pengaduan,
                success: function (response) {
                    $('#tempel-modal').html(response);
                    $('#modal-detail-pengaduan').modal('show');
                }
            });
        }
        
        $('.detail').on('click', function(){
            var id_pengaduan = $(this).data('id');
            $.ajax({
                url: "<?=base_url('admin/Data_laporan/get_detail_pengaduan/')?>"+id_pengaduan,
                success: function (response) {
                    $('#tempel-modal').html(response);
                    $('#modal-detail-pengaduan').modal('show');
                }
            });
        }); 

        $('.edit').on('click', function(){
            var id_pengaduan = $(this).data('id');
            $.ajax({
                url: "<?=base_url('admin/Data_laporan/edit_pengaduan/')?>"+id_pengaduan,
                success: function (response) {
                    $('#tempel-modal').html(response);
                    $('#modal-edit-pengaduan').modal('show');
                }
            });
        }); 

        $('.hapus').on('click', function(){
            var id_pengaduan = $(this).data('id');
            let text = "Apakah anda yakin ingin menghapus pengaduan ini ?";
            if (confirm(text) == true) {
                $.ajax({
                    url: "<?=base_url('admin/Data_laporan/hapus_pengaduan/')?>"+id_pengaduan,
                    success: function (response) {
                        if(response == 1){
                            $('#row'+id_pengaduan).remove();
                            setTimeout(function(){
                                alert("Pengaduan berhasil dihapus");
                            }, 300);
                        }else{
                            alert("Pengaduan tidak dapat dihapus");
                        }
                    }
                });
            } else {
                setTimeout(function(){
                    alert("Pengaduan batal dihapus");
                }, 300);
            }
        });
    });

    function simpan(id_pengaduan){
        var jawaban = $('#jawaban').val();
        if(jawaban != ""){
            $.ajax({
                url: "<?=base_url('admin/Data_laporan/simpan_jawaban/')?>"+id_pengaduan,
                type: "POST",
                data: {jawaban: jawaban},
                success: function (response) {
                    if(response == 1){
                        var zzz = $('#modal-edit-pengaduan').modal('hide');
                        setTimeout(function(){
                            alert('Jawaban berhasil disimpan');
                        }, 300);
                    }else{
                        alert('Jawaban gagal disimpan');
                    }
                }
            });
        }else{
            alert('Jawaban tidak boleh kosong!');
        }
    }
</script>