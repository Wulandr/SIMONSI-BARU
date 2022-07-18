<?php

use Illuminate\Support\Facades\Auth;
?>
<!--
    HALAMAN VALIDASI UNTUK BPU, WD 2, WD 3, STAF KEU, STAF PERENCANAAN
 -->
@include('dashboards/users/layouts/script')

<!-- ------------------------------- G A N T I    T A M P I L A N -------------------------------- -->

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
        <div id="content-page" class="main-content app-content"><?php $join = $join; ?>
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <h5 class="main-content-label mb-1">VALIDASI DAN VERIFIKASI
                                        </h5>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="float-end ms-auto">
                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" onclick="printDiv()"><i class="fe fe-download me-2"></i> Print</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-0 example1-table">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-right mb-3 mr-2">
                                        <div class="form-group row">
                                            <form action="{{ url('/validasi/filter') }}" method="GET">
                                                <div class="row mr-3">
                                                    <div class="col mr-1">
                                                        <!-- <select class="form-control filter sm-8" name="tahun" id="tahun">
                                                            <option value="0">All</option>
                                                            <?php for ($thn = 0; $thn < count($tabeltahun); $thn++) { ?>
                                                                <option value="{{ $tabeltahun[$thn]->tahun }}" {{ $filtertahun == $tabeltahun[$thn]->tahun ? 'selected' : '' }}>{{ $tabeltahun[$thn]->tahun }}</option>
                                                            <?php } ?>
                                                        </select> -->
                                                    </div>
                                                    <div class="col-xs-4 mr-3">
                                                        <select class="form-control form-select filter sm-8" name="triwulan" id="triwulan">
                                                            <option value="0">All</option>
                                                            <?php for ($tw1 = 0; $tw1 < count($triwulan); $tw1++) {
                                                                foreach ($tabeltahun as $thn) {
                                                                    if ($thn->is_aktif == 1) {
                                                                        if ($thn->tahun == substr($triwulan[$tw1]->triwulan, 0, 4)) {  ?>
                                                                            <option value="{{ $triwulan[$tw1]->triwulan }}" {{ $filtertw == $triwulan[$tw1]->triwulan ? 'selected' : '' }}>
                                                                                {{ $triwulan[$tw1]->triwulan }}
                                                                            </option>
                                                            <?php }
                                                                    }
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <?php if ($filterprodi != 0) { ?>
                                                        <input type="hidden" name="prodi" id="prodi" value="{{ $filterprodi }}">
                                                    <?php } ?>
                                                    <div class="col-xs-4 mr-3">
                                                        <select class="form-control form-select filter sm-8" name="prodi" id="prodi">
                                                            <option value="0">All</option>
                                                            <?php
                                                            for ($pr = 0; $pr < count($unit); $pr++) { ?>
                                                                <option value="{{ $unit[$pr]->id }}" {{ $filterprodi == $unit[$pr]->id ? 'selected' : '' }}>
                                                                    {{ $unit[$pr]->nama_unit }}
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                </div>
                                            </form>

                                        </div>
                                    </span>
                                </div>

                                <div class="table-responsive">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 45.281px;">No.</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 75.3906px;">Triwulan</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Prodi</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.703px;">Judul Kegiatan</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Jenis Ajuan</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Tanggal Mulai</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Nama PIC</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Anggaran Ajuan</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Status</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Tor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <div class="container">
                                                            <?php
                                                            $no = 0;
                                                            $perulangan = 0;
                                                            $jmltor = 1;
                                                            $ada = 0;
                                                            $x = 0;
                                                            for ($a = 0; $a < count($join); $a++) {
                                                                $prodiTor = "";
                                                                foreach ($unit as $unitTor) {
                                                                    if ($join[$a]->id_unit == $unitTor->id) {
                                                                        $prodiTor = $unitTor->nama_unit;
                                                                    }
                                                                }

                                                                for ($stk2 = 0; $stk2 < count($trx_status_tor); $stk2++) {
                                                                    if ($trx_status_tor[$stk2]->id_tor == $join[$a]->tor_id) {
                                                                        $jmltor += 1;
                                                                        $perulangan += 1; //biar tidak mengulang-ulang teks tor nya
                                                                        if ($trx_status_tor[$stk2]->id_tor  == $x) {
                                                                            break;
                                                                        }

                                                            ?>

                                                                        <?php
                                                                        if (!empty($trx_status_tor)) {
                                                                            for ($q3 = 0; $q3 < count($trx_status_tor); $q3++) {
                                                                                if ($trx_status_tor[$q3]->id_tor == $join[$a]->tor_id) {
                                                                                    $jmltor += 1;
                                                                                    $ada += 1;
                                                                                    for ($s4 = 0; $s4 < count($status); $s4++) {
                                                                                        if ($trx_status_tor[$q3]->id_status == $status[$s4]->id) {
                                                                                            $statuskeg = $status[$s4]->nama_status;
                                                                                        }
                                                                                    }
                                                                                    for ($st3 = 0; $st3 < count($status); $st3++) {
                                                                                        if ($status[$st3]->id == $trx_status_tor[$q3]->id_status) {
                                                                                            for ($u = 0; $u < count($user); $u++) {
                                                                                                if ($user[$u]->id == $trx_status_tor[$q3]->create_by) {
                                                                                                    for ($rl = 0; $rl < count($role); $rl++) {
                                                                                                        if ($role[$rl]->id == $user[$u]->role) {
                                                                                                            $pengvalidasi = $trx_status_tor[$q3]->role_by;
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        } elseif (empty($trx_status_tor)) {
                                                                            $statuskeg = '';
                                                                            $pengvalidasi = '';
                                                                        } else {
                                                                            $statuskeg = '';
                                                                        }
                                                                        ?>

                                                                        <!-- W A R N A  R O W  -->
                                                                        <?php
                                                                        $warnaRow = '';
                                                                        if ($statuskeg . ' ' . $pengvalidasi == 'Validasi WD 3') {
                                                                            $warnaRow = 'background-color:#D3D3D3';
                                                                        }
                                                                        ?>

                                                                        <!-- jk sebelumnya sudah ditulis, jangan ditulis lagi -->
                                                                        <tr style="<?= $warnaRow ?>">
                                                                            <td>{{ $no + 1 }}</td><?php $no++; ?>
                                                                            <?php foreach ($triwulan as $wulan) {
                                                                                if ($wulan->id == $join[$a]->id_tw) { ?>
                                                                                    <td>{{ $wulan->triwulan }}</td>
                                                                            <?php }
                                                                            } ?>
                                                                            <td>{{ $prodiTor }}</td>
                                                                            <td>{{ $join[$a]->nama_kegiatan }}<?php $x = $trx_status_tor[$stk2]->id_tor; ?>
                                                                            <td>{{ $join[$a]->jenis_ajuan }}<?php $x = $trx_status_tor[$stk2]->id_tor; ?>
                                                                            </td>
                                                                            <td><?php
                                                                                $date = date_create($join[$a]->tgl_mulai_pelaksanaan);
                                                                                echo date_format($date, 'M d, Y'); ?></td>
                                                                            <td>{{ $join[$a]->nama_pic }}</td>
                                                                            <td>{{ 'Rp. ' . number_format($join[$a]->jumlah_anggaran, 2, ',', ',') }}
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                $badge = 'badge-warning';
                                                                                if ($statuskeg == "Validasi" && $pengvalidasi == "WD 3") {
                                                                                    $badge = 'badge-success';
                                                                                } ?>
                                                                                <div class="badge badge-pill {{$badge}}">
                                                                                    {{ $statuskeg . ' ' . $pengvalidasi }}
                                                                                </div>
                                                                                <button class="badge badge-info" data-bs-toggle="modal" data-placement="top" data-bs-target="#detail_tor{{ $x }}">
                                                                                    <i class="fa fa-tasks"></i>
                                                                                </button>
                                                                                @include('perencanaan/validasi/modal/tor/detail')
                                                                            </td>
                                                                            <td>
                                                                                <a href="{{ url('/detailtor/' . base64_encode($join[$a]->tor_id)) }}"><button class="badge badge-warning rounded">Detail
                                                                                    </button></a>
                                                                            </td>
                                                                        </tr>
                                                            <?php
                                                                        $nomer = 1;
                                                                    }
                                                                }
                                                            } ?>
                                                        </div>
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
    </div>

    @include('dashboards/users/layouts/footer')

</body>

</html>