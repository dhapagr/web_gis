    <!-- BEGIN: Content-->
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
                                <li class="breadcrumb-item active">Data Wilayah
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
                                    <h5 class="card-title">Tabel Data Wilayah Kecamatan Taman</h5>
                                  
                                    <ul class="list-inline mb-0 d-flex align-items-center">
                                   
                                    </ul>
                                </div>
                                <!-- <div class="ml-2">
                                    <button onclick="tutup()" class="btn btn-primary" data-toggle="modal" data-target="#inlineForm">Tambah Data</button>
                                </div> -->
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <!-- <th>id_kelurahan</th> -->
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan</th>
                                                    <th>Tgl_update</th>
                                                    <!-- <th>Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kec_taman as $data) :
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <!-- <td>
                                                        <?php echo $data['id_kelurahan'] ?>
                                                    </td> -->
                                                    <td><?php echo $data['nama_kecamatan'] ?></td>
                                                    <td><?php echo $data['nama_kelurahan'] ?></td>
                                                    <td><?php echo $data['date'] ?></td>
                                                    <!-- <td>
                                                        <div  class="form-row">
                                                            <button class="btn btn-icon btn-warning mr-1 mb-1" data-toggle="modal" data-target="#editModal<?= $data['id_kelurahan']?>"><i class="bx bx-edit" ></i></button>

                                                            <button onclick="hapus(<?php echo $data['id_kelurahan'] ?>)" class="btn btn-icon btn-danger mr-1 mb-1"><i class="bx bxs-trash"></i></button>
                                                            <a href="#" type="submit" class="btn btn-icon btn-danger mr-1 mb-1 hapus"><i class="bx bxs-trash"></i></a>
                                                        </div>                                       
                                                    </td> -->
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
               <!--modal Tambah data -->
               
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Tabel Data Wilayah Kecamatan Manguharjo</h5>
                                    <ul class="list-inline mb-0 d-flex align-items-center"></ul>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan</th>
                                                    <th>Tgl_update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kec_mangu as $data) :
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['nama_kecamatan'] ?></td>
                                                    <td><?php echo $data['nama_kelurahan'] ?></td>
                                                    <td><?php echo $data['date'] ?></td>
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
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Tabel Data Wilayah Kecamatan Kartoharjo</h5>
                                  
                                    <ul class="list-inline mb-0 d-flex align-items-center">
                                   
                                    </ul>
                                </div>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan</th>
                                                    <th>Tgl_update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kec_karto as $data) :
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['nama_kecamatan'] ?></td>
                                                    <td><?php echo $data['nama_kelurahan'] ?></td>
                                                    <td><?php echo $data['date'] ?></td>
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
    <!-- END: Content-->

    <script type="text/javascript">
        function tutup()  
        {
            $('input[name="kelurahan"]').val('');
            $('input[name="kel"]').val('');
        }
        function hapus(id_kelurahan)
        {
            swal({
                title: "Hapus Data?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "<?php echo base_url('admin/Data_wilayah/hapus/') ?>" + id_kelurahan;
                } else {
                    swal("Data Tidak Terhapus !");
                }
            });
        }
    </script>
    <script>
        <?php if($this->session->flashdata('test')) { ?>
            var isi = <?php echo json_encode($this->session->flashdata('test')) ?>;
            Swal.fire({
                position: 'top-start',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500,
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            })
        <?php  } ?>
    </script>