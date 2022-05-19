<!DOCTYPE HTML>
<html><head>

</head><body>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Admin</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                            
                                <li class="breadcrumb-item active">Data Kecelakaan
                                </li>
                            </ol>
                        </div>
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered complex-headers">
                                    <thead>
                                    <tr>
                                                    <th rowspan="2" class="align-top">No</th>
                                                    <th rowspan="2" class="align-top">Lokasi Jalan</th>
                                                    <!-- <th rowspan="2" class="align-top">Longitude</th>
                                                    <th rowspan="2" class="align-top">Latitude</th> -->
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
                                        <?php $no = 1;
                                            foreach ($data_export as $data) :
                                            ?>
                                        <tr>
                                            
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['nama_jalan'] ?></td>
                                            <td><?php echo $data['meninggal_dunia'] ?></td>
                                            <td>
                                                <?php echo $data['luka_berat'] ?>
                                            </td>
                                            <td> <?php echo $data['luka_ringan'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div >
                                                        <span>Rp. </span>
                                                        <?php echo number_format($data['kerugian_materi'], 0, '', '.') ?>
                                                    </div>
                                                
                                                </div>
                                            </td>
                                            <td>test</td>
                                            
                                        </tr>
                                        <?php endforeach; ?>  
                                    </thead>
                                </table>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
</body></html>
