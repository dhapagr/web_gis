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
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/Dashboard"); ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Data Berita
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('test');?>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-primary">Tabel Berita</h4>
                            </div>
                            <div class="ml-2">
                                <a href="<?php echo base_url("admin/Berita/add"); ?>">
                                    <button type="button" class="btn btn-success glow mr-1 mb-1">
                                        <i class="bx bxs-down-arrow-square"></i>
                                        <span class="align-middle ml-25">Tambah Data</span>
                                    </button>
                                </a>
                                <!-- <a href="<?php echo base_url("admin/Berita/test"); ?>">
                                    <button type="button" class="btn btn-primary glow mr-1 mb-1">
                                        <i class="bx bxs-down-arrow-square"></i>
                                        <span class="align-middle ml-25">Tambah Data</span>
                                    </button>
                                </a> -->
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered complex-headers">
                                        <thead>
                                            <tr>
                                                <th style='width:40px'>No</th>
                                                <th>Judul</th>
                                                <th>Sub Judul</th>
                                                <th style='width:30px'>Status</th>
                                                <th style='width:160px'>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; $i=1; $j=1;
                                                foreach ($data_berita as $data) :
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?= $data['judul_berita'] ?></td>
                                                <td><?= $data['sub_judul'] ?></td>
                                                <td>
                                                    <span class="badge badge-light-success" id="status<?= $data['id_berita']?>"><?php 
                                                        if($data['status'] == 1):echo "Tampil";
                                                        elseif($data['status'] == 0):echo "Tidak tampil";
                                                        endif;
                                                    ?></span>
                                                </td>
                                                <td>
                                                    <div  class="d-flex justify-content-around">
                                                        <div class="checkbox checkbox-primary " style="width: 45px; height: auto;">
                                                            <input value="<?= $data['id_berita']?>" type="checkbox" id="colorCheckbox<?= $i++?>" class="tampil-tidak" 
                                                                <?php if($data['status'] == 1): 
                                                                    echo "checked=''";
                                                                endif;?>
                                                            >
                                                            <label for="colorCheckbox<?= $j++?>"></label>
                                                        </div>
                                                        <button type="button" class="btn btn-icon btn-warning mr-1 mb-1" onclick="window.location.href='<?php echo base_url('admin/Berita/edit/'.$data['id_berita']) ?>'"><i class="bx bx-edit" ></i></button>
                                                        <button type="button" class="btn btn-icon btn-danger mr-1 mb-1" onclick="hapus(<?php echo $data['id_berita'] ?>)"><i class="bx bxs-trash"></i></button>
                                                    </div>    
                                                </td>
                                            </tr>
                                            <?php endforeach; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.tampil-tidak').click(function() {
            var id_berita = $(this).val();
            $.ajax({
				url: "<?php echo base_url('admin/Berita/status/') ?>" + id_berita,
                success: function(response) {
                    if(response == 1){
                        $('#status'+id_berita).text('Tampil');
                    }else if(response == 0){
                        $('#status'+id_berita).text('Tidak tampil');
                    }
				}
            });
        })
    })
</script>
<script>
    function hapus(id_berita)
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
                window.location = "<?php echo base_url('admin/Berita/hapus/') ?>" + id_berita;
            }
            else if (result.dismiss === Swal.DismissReason.cancel) {
            
            }
        })
    }
</script>