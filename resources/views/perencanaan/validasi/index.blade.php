<?php

use Illuminate\Support\Facades\Auth;

?>
@include('dashboards/users/layouts/script')

<body class="ltr main-body app sidebar-mini">

    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="page">

        <?php $notifikasi = 1; ?>
        <div>
            @include('dashboards/users/layouts/validasiTor/navbar')
            @include('dashboards/users/layouts/sidebar')
        </div>

        <!-- Page Content  -->
        <div id="content-page" class="main-content app-content">
            <div class="main-container container-fluid">

                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="left-content">
                        <span class="main-content-title mg-b-0 mg-b-lg-1"> </span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);"> </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> </li>
                        </ol> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Verifikasi & Validasi Ajuan</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <a href="/validasi/ajuan/{{base64_encode(0)}}">
                            <div class="card">
                                <div class="card-body iconfont text-start">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-3"><b></b></h4>
                                    </div>
                                    <div class="d-flex mb-0">
                                        <div class="">
                                            <h4 class="mb-2 tx-16 text-muted font-weight-bold">All<span class="text-success tx-13 ms-2"></span></h4>
                                            <!-- <p class="mb-2 tx-12 text-muted">Overview of Last month</p> -->
                                        </div>
                                        <div class="card-chart bg-primary-transparent brround ms-auto mt-0">
                                            <i class="typcn typcn-group-outline text-primary"></i>
                                        </div>
                                    </div>

                                    <!-- <div class="progress progress-sm mt-2">
                                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-primary wd-70p" role="progressbar"></div>
                                    </div> -->
                                    <!-- <small class="mb-0  text-muted">Monthly<span class="float-end text-muted">70%</span></small> -->
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    $color = ["primary", "success", "info", "danger"];
                    $warna = "primary";
                    for ($un = 0; $un < count($unit); $un++) {
                        $warna = $color[0];
                    ?>
                        <?php if ($unit[$un]->nama_unit != "Sekolah Vokasi") { ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                <a href="/validasi/ajuan/{{base64_encode($unit[$un]->id)}}">
                                    <div class="card">
                                        <div class="card-body iconfont text-start">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="card-title mb-3"></h4>
                                            </div>
                                            <div class="d-flex mb-0">
                                                <div class="">
                                                    <h4 class="mb-2 tx-16 text-muted font-weight-bold">{{$unit[$un]->nama_unit}}</h4>
                                                    <!-- <h4 class="mb-1 font-weight-bold">154<span class="text-success tx-13 ms-2">(+0.98%)</span></h4>
                                                <p class="mb-2 tx-12 text-muted">Overview of Last month</p> -->
                                                </div>
                                                <div class="card-chart bg-primary-transparent brround ms-auto mt-0">
                                                    <i class="typcn typcn-group-outline text-primary"></i>
                                                </div>
                                            </div>

                                            <!-- <div class="progress progress-sm mt-2">
                                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar bg-primary wd-70p" role="progressbar"></div>
                                        </div>
                                        <small class="mb-0  text-muted">Monthly<span class="float-end text-muted">70%</span></small> -->
                                        </div>
                                    </div>
                                </a>

                            </div>
                        <?php } ?>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    @include('dashboards/users/layouts/footer')

</body>

</html>