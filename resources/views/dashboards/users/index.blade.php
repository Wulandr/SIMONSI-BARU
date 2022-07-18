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
        <div>
            @include('dashboards/users/layouts/navbar')
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

                <?php
                // Ambil data Jumlah Anggaran dari TOR
                $total_anggaran = 0;
                foreach ($tor as $data) {
                    $total_anggaran += $data['jumlah_anggaran'];
                }

                // Ambil data Jumlah Realisasi dari SPJ
                $total_realisasi = 0;
                foreach ($spj as $nilai) {
                    $total_realisasi += $nilai['nilai_total'];
                }

                // Ambil data Sisa
                $total_sisa = $total_anggaran - $total_realisasi;
                ?>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-box-relative">
                                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                                    <i class="ri-focus-2-line"></i>
                                </div>
                                <p class="text-secondary">Total Anggaran</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4><b>{{ 'Rp ' . number_format($total_anggaran) }}</b></h4>
                                    <div id="iq-chart-box1"></div>
                                    <span class="text-primary"><b>100.00 %</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-box-relative">
                                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                                    <i class="ri-database-2-line"></i>
                                </div>
                                <p class="text-secondary">Total Realisasi</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4><b>{{ 'Rp ' . number_format($total_realisasi) }}</b></h4>
                                    <div id="iq-chart-box2"></div>
                                    <span class="text-danger">
                                        <b>{{ number_format(($total_realisasi / $total_anggaran) * 100, 2, '.', '') }}%
                                        </b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-box-relative">
                                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                                    <i class="ri-pie-chart-2-line"></i>
                                </div>
                                <p class="text-secondary">Total Sisa</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4><b>{{ 'Rp ' . number_format($total_sisa) }}</b></h4>
                                    <div id="iq-chart-box3"></div>
                                    <span class="text-warning"><b>{{ number_format(($total_sisa / $total_anggaran) * 100, 2, '.', '') }}%</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br />

                <div class="row row-sm">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="iq-header-title">
                                    <h4 class="card-title">REKAPITULASI AJUAN PER TW</h4>
                                </div>
                            </div>
                            <div class="card-body pt-0 example1-table">
                                <div class="table-responsive">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Nama Kegiatan</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.703px;">Penanggungjawab</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Anggaran</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114.328px;">Realisasi</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114.328px;">Sisa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php
                                                            $no = 0;
                                                            for ($m = 0; $m < count($tor); $m++) {
                                                                $realisasi = 0;
                                                                $sisa = 0;
                                                                $anggaran = $tor[$m]->jumlah_anggaran;
                                                            ?>
                                                                <td>{{ $no + 1 }}</td><?php $no++; ?>
                                                                <td class="text-left">{{ $tor[$m]->nama_kegiatan }}</td>
                                                                <td>{{ $tor[$m]->nama_pic }}</td>
                                                                <td>{{ 'Rp ' . number_format($anggaran) }}</td>
                                                                @foreach ($spj as $nominal)
                                                                @if ($tor[$m]->id == $nominal->id_tor)
                                                                <?php $realisasi = $nominal->nilai_total; ?>
                                                                <?php $sisa = $anggaran - $realisasi; ?>
                                                                @endif
                                                                @endforeach
                                                                <td>{{ 'Rp ' . number_format($realisasi) }}</td>
                                                                <td>{{ 'Rp ' . number_format($sisa) }}</td>
                                                        </tr>
                                                    <?php
                                                            }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('dashboards/users/layouts/footer')
</body>

</html>