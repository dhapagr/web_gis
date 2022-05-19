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
                                    <a class=" nav-link d-flex px-1 active" id="laporan-tab" data-toggle="tab" href="#laporan" aria-controls="laporan" role="tab" aria-selected="true"><i class="bx bxs-comment-error"></i><span class="d-none d-md-block">Tabel Laporan</span></a>
                                </li>
                                <li class="nav-item mb-0">
                                    <a class="nav-link d-flex px-1" id="feedback-tab" data-toggle="tab" href="#feedback" aria-controls="feedback" role="tab" aria-selected="false"><i class="bx bxs-message-rounded-dots"></i><span class="d-none d-md-block">Tabel Feedback</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                   
                <div class="tab-content">
                    <div class="tab-pane active" id="laporan" aria-labelledby="laporan-tab" role="tabpanel">
                        <section id="basic-datatable">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Data laporan | Tabel Laporan</h4>
                                        </div>
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <table class="table zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>                                                     
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                               </div>
                            </div>
                        </section>
                    </div>                     
                    <div class="tab-pane " id="feedback" aria-labelledby="feedback-tab" role="tabpanel">
                        <section id="basic-datatable">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Data laporan | Tabel Feedback</h4>
                                        </div>
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <table class="table zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Position</th>
                                                            <th>Office</th>
                                                            <th>Age</th>
                                                            <th>Start date</th>
                                                            <th>Salary</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                                
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
        </div>
</div>
<script>
    $(document).ready(function () {

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