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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">Monitoring Usulan</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item tx-15"><a href="javascript:void(0);"></a></li>
                            <li class="breadcrumb-item active" aria-current="page"></li> -->
                        </ol>
                    </div>
                </div>
                <!-- /breadcrumb -->

                <!-- A N G G A R A N   C A R D-->
                <div class="row row-sm">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="card sales-card circle-image1">
                            <?php
                            $jml_ang_ajuan = 0;
                            $jml_ang_disetujui = 0;
                            $statusTor2 = [];
                            $count1 = 0;
                            $count2 = 0;
                            $cekId = 0;
                            $i2 = 0;
                            $i3 = 0;
                            $udah = 1;
                            $disetujui = [
                                'tor' => [],
                                'anggaran' => [],
                            ]; //apakah ketiga wd sudah validasi?
                            $tordisetujui = [];
                            for ($m2 = 0; $m2 < count($tor); $m2++) {
                                $i2 = 0;
                                for ($tr2 = 0; $tr2 < count($trx_status_tor); $tr2++) {
                                    if ($trx_status_tor[$tr2]->id_tor == $tor[$m2]->id) {
                                        $cekId == $tor[$m2]->id;
                                        for ($s2 = 0; $s2 < count($status); $s2++) {
                                            if ($trx_status_tor[$tr2]->id_status == $status[$s2]->id) {
                                                $statusTor2[$tor[$m2]->id][$i2] = $status[$s2]->nama_status . ' , ';
                                                for ($u5 = 0; $u5 < count($users); $u5++) {
                                                    if ($trx_status_tor[$tr2]->create_by == $users[$u5]->id) {
                                                        if ($trx_status_tor[$tr2]->create_by == $users[$u5]->id) {
                                                            if ($status[$s2]->nama_status == 'Validasi' && $trx_status_tor[$tr2]->role_by == 'WD 3') {
                                                                $disetujui['anggaran'][$i3] = $tor[$m2]->jumlah_anggaran; //anggaran kegiatan yg telah divalidasi WD 3
                                                                $disetujui['tor'][$i3] = $tor[$m2]->id; // Kegiatan yg telah divalidasi wd 3
                                                                'TOR' . $tor[$m2]->id . ' -' . '[' . $tor[$m2]->id . '[[' . $i2 . '] ' . $statusTor2[$tor[$m2]->id][$i2] . '<br />';
                                                                $i3 += 1;
                                                            }
                                                            $i2 += 1;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        if ($tor[$m2]->id != $cekId) {
                                            $count1 += 1;
                                            $jml_ang_ajuan += $tor[$m2]->jumlah_anggaran; //penjumlahan anggaran yg disetujui wd 3
                                            $cekId = $tor[$m2]->id;
                                        }
                                    }
                                }
                                // echo "<br />";
                            }
                            ?><?php
                                $x = 0; //agar array tidakduplicate
                                for ($d = 0; $d < count($disetujui['tor']); $d++) {
                                    if ($disetujui['tor'][$d] != $x) {
                                        $jml_ang_disetujui += $disetujui['anggaran'][$d];
                                        $count2 += 1;
                                    }

                                    $x = $disetujui['tor'][$d];
                                }
                                ?>

                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-4 pt-4 pe-3 pb-4 pt-0">
                                        <div class="">
                                            <h6 class="mb-2 tx-12 ">Jumlah Anggaran Ajuan</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <h6 class="tx-18 font-weight-semibold mb-2">
                                                    {{ 'Rp. ' . number_format($jml_ang_ajuan - $jml_ang_disetujui) }}
                                                </h6>
                                            </div>
                                            <p class="mb-0 tx-12 text-muted"><i class="fas fa-arrow-circle-up mx-2 text-success"></i>
                                                <span class=" text-primary"> {{ $count1 - $count2 }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="circle-icon widget bg-primary-gradient text-center align-self-center shadow-primary overflow-hidden box-shadow-primary">
                                        <i class="fe fe-shopping-bag tx-20 lh-lg text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="card sales-card circle-image2">
                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-4 pt-4 pe-3 pb-4 pt-0">
                                        <div class="">
                                            <h6 class="mb-2 tx-12">Jumlah Anggaran Disetujui</h6>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <h4 class="tx-18 font-weight-semibold mb-2">
                                                    {{ 'Rp. ' . number_format($jml_ang_disetujui) }}
                                                </h4>
                                            </div>
                                            <p class="mb-0 tx-12 text-muted"><i class="fas fa-arrow-circle-up mx-2 text-danger"></i>
                                                <span class=" text-success">{{ $count2 }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="circle-icon widget bg-info-gradient text-center align-self-center shadow-secondary overflow-hidden box-shadow-info">
                                        <i class="fe fe-dollar-sign tx-20 lh-lg text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- E N D   A N G G A R A N   C A R D-->


                <div class="row row-sm">
                    <div class="col-lg-12">

                        <div class="card custom-card overflow-hidden">

                            <div class="card-body">

                                <div class="table-responsive">
                                    <div class="form-group row">
                                        <form action="{{ url('/monitoringUsulan/filterTw') }}" method="GET">
                                            <div class="row mr-3">
                                                <div class="col-sm-12 col-md-2">
                                                    <select class="form-control filter sm-8" name="filterTw" id="filterTw">
                                                        <option value="0">All</option>
                                                        <?php for ($tw1 = 0; $tw1 < count($tw); $tw1++) {
                                                            foreach ($tahun as $thn) {
                                                                if ($thn->is_aktif == 1) {
                                                                    if ($thn->tahun == substr($tw[$tw1]->triwulan, 0, 4)) {  ?>
                                                                        <option value="{{$tw[$tw1]->id}}" {{$filtertw==$tw[$tw1]->id ? 'selected':''}}>{{$tw[$tw1]->triwulan}}</option>
                                                        <?php }
                                                                }
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                            </div>
                                        </form>

                                    </div>


                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No.</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Triwulan</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Prodi</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Judul Kegiatan</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Tanggal Mulai</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Nama PIC</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Anggaran Ajuan</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Status</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Tor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        for ($m = 0; $m < count($tor); $m++) {
                                                            $ada = 0; //sudah diajukan apa belum
                                                            //  P R O D I 
                                                            $prodiTor = "";
                                                            for ($p = 0; $p < count($prodi); $p++) {
                                                                if ($tor[$m]->id_unit == $prodi[$p]->id) {
                                                                    $prodiTor = $prodi[$p]->nama_unit;
                                                                }
                                                            }

                                                            // S T A T U S

                                                            $statusTor = [
                                                                [
                                                                    'tor' => '',
                                                                    'status' => '',
                                                                    'statusMemo' => '',
                                                                    'statusLPJ' => '',
                                                                    'statusSPJ' => '',
                                                                ]
                                                            ];
                                                            for ($tr = 0; $tr < count($trx_status_tor); $tr++) {
                                                                if ($trx_status_tor[$tr]->id_tor == $tor[$m]->id) {
                                                                    for ($s = 0; $s < count($status); $s++) {
                                                                        if ($trx_status_tor[$tr]->id_status == $status[$s]->id) {
                                                                            $ada = 1;
                                                                            $statusTor[0]['tor'] = "TOR" . $tor[$m]->id;
                                                                            for ($u = 0; $u < count($users); $u++) {
                                                                                if ($trx_status_tor[$tr]->create_by == $users[$u]->id) {
                                                                                    for ($r = 0; $r < count($roles); $r++) {
                                                                                        if ($users[$u]->role == $roles[$r]->id) {
                                                                                            $statusTor[0]['status'] = $status[$s]->nama_status . " - " . $trx_status_tor[$tr]->role_by;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            // APAKAH SUDAH ADA MEMO CAIR ?
                                                            // for ($dm = 0; $dm < count($dokMemo); $dm++) {
                                                            //     if ($dokMemo[$dm]->id_tor == $tor[$m]->id && $dokMemo[$dm]->jenis == "Memo Cair") {
                                                            //         $statusTor[0]['statusMemo'] = "Memo sudah diunggah";
                                                            //     }
                                                            // }

                                                            // // STATUS LPJ DAN SPJ ?
                                                            // for ($tr2 = 0; $tr2 < count($trx_status_keu); $tr2++) {
                                                            //     if ($trx_status_keu[$tr2]->id_tor == $tor[$m]->id) {
                                                            //         for ($s2 = 0; $s2 < count($status_keu); $s2++) {
                                                            //             if ($trx_status_keu[$tr2]->id_status == $status_keu[$s2]->id) {
                                                            //                 if ($status_keu[$s2]->kategori == 'LPJ') {
                                                            //                     $statusTor[0]['statusLPJ'] = $status_keu[$s2]->nama_status . " LPJ";
                                                            //                 }
                                                            //                 if ($status_keu[$s2]->kategori == 'SPJ') {
                                                            //                     $statusTor[0]['statusSPJ'] = $status_keu[$s2]->nama_status . " SPJ";
                                                            //                 }
                                                            //                 // if ($status_keu[$s2]->kategori == 'Memo Cair') {
                                                            //                 //     $statusTor[0]['statusMemo'] = "Memo sudah diunggah";
                                                            //                 // }
                                                            //                 if ($status_keu[$s2]->kategori == 'Persekot Kerja') {
                                                            //                     $statusTor[0]['persekotKerja'] = $status_keu[$s2]->nama_status . " Persekot Kerja";
                                                            //                 }
                                                            //             }
                                                            //         }
                                                            //     }
                                                            // }

                                                        ?>
                                                            <?php if ($ada == 1) { ?>
                                                                <tr>
                                                                    <td>{{ $no + 1 }}</td><?php $no++ ?>
                                                                    <?php foreach ($tw as $wulan) {
                                                                        if ($wulan->id == $tor[$m]->id_tw) { ?>
                                                                            <td>{{ $wulan->triwulan }}</td>
                                                                    <?php }
                                                                    } ?>
                                                                    <td>{{ $prodiTor }}</td>
                                                                    <td>{{ $tor[$m]->nama_kegiatan }}</td>
                                                                    <td><?php
                                                                        $date = date_create($tor[$m]->tgl_mulai_pelaksanaan);
                                                                        echo date_format($date, 'M d, Y'); ?></td>
                                                                    <td>{{ $tor[$m]->nama_pic }}</td>
                                                                    <td>{{ 'Rp. ' . number_format($tor[$m]->jumlah_anggaran, 2, ',', ',') }}
                                                                    </td>
                                                                    <td>
                                                                        <?php if (empty($statusTor[0]['statusMemo'])) { ?>
                                                                            <div class="badge badge-pill {{ $statusTor[0]['status'] == 'Validasi - WD 3' ?  'badge-success' : 'badge-secondary' }}">{{ $statusTor[0]['status'] }}</div>
                                                                        <?php } elseif (!empty($statusTor[0]['statusMemo']) && empty($statusTor[0]['persekotKerja'])) { ?>
                                                                            <div class="badge badge-pill badge-warning">{{ $statusTor[0]['statusMemo'] }}</div>

                                                                        <?php } elseif (!empty($statusTor[0]['statusMemo']) && !empty($statusTor[0]['persekotKerja']) && empty($statusTor[0]['statusSPJ']) && empty($statusTor[0]['statusLPJ'])) { ?>
                                                                            <div class="badge badge-pill badge-warning">{{ $statusTor[0]['persekotKerja'] }}</div>

                                                                        <?php } elseif (!empty($statusTor[0]['statusSPJ']) && empty($statusTor[0]['statusLPJ'])) { ?>
                                                                            <div class="badge badge-pill badge-primary">{{ $statusTor[0]['statusSPJ'] }}</div>

                                                                        <?php } elseif (empty($statusTor[0]['statusSPJ']) && !empty($statusTor[0]['statusLPJ'])) { ?>
                                                                            <div class="badge badge-pill badge-primary">{{ $statusTor[0]['statusLPJ']}}</div>

                                                                        <?php } elseif (!empty($statusTor[0]['statusSPJ']) && !empty($statusTor[0]['statusLPJ'])) { ?>
                                                                            <div class="badge badge-pill badge-primary">{{ $statusTor[0]['statusSPJ'] ." & ".$statusTor[0]['statusLPJ']}}</div>
                                                                        <?php } ?>
                                                                        <button class="badge badge-sm btn-info" data-bs-toggle="modal" data-placement="top" data-bs-target="#detail_tor{{$tor[$m]->id}}">
                                                                            <i class="fa fa-tasks"></i>
                                                                        </button>
                                                                        <!-- -------------------------------------------------------------------------M O D A L S T A T U S------------------------------------------------------------------------------------
                                                                -----------------------------------------------------------------------------------MODAL STATUS------------------------------------------------------------------------------------
                                                                ---------------------------------------------------------------------------M O D A L S T A T U S------------------------------------------------------------------------------------  -->
                                                                        <div class="modal fade" tabindex="-1" role="dialog" id="detail_tor{{$tor[$m]->id}}">
                                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header" style="background-color: #ffc107;color:white">
                                                                                        <h5 class="modal-title" style="color:white"><b>Status Pengajuan TOR</b> </h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="card">
                                                                                            <div class="card-header bg-transparent pb-0">
                                                                                                <div>
                                                                                                    <!-- <h3 class="card-title mb-2">Status Pengajuan TOR</h3> -->
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="card-body mt-0">
                                                                                                <div class="latest-timeline mt-4">
                                                                                                    <ul class="timeline mb-0">
                                                                                                        <?php
                                                                                                        $indexwarna = 0;
                                                                                                        $ada = 0;
                                                                                                        if (!empty($trx_status_tor)) {
                                                                                                            foreach ($trx_status_tor as $q3) {
                                                                                                                if ($q3->id_tor == $tor[$m]->id) {
                                                                                                        ?>
                                                                                                                    <li>
                                                                                                                        <?php for ($st = 0; $st < count($status); $st++) {
                                                                                                                            if ($status[$st]->id == $q3->id_status) {
                                                                                                                                $wstatus = $status[$st]->nama_status;
                                                                                                                                if ($wstatus == 'Proses Pengajuan') {
                                                                                                                                    $warnaLingkar = 'featured_icon';
                                                                                                                                } elseif ($wstatus == 'Verifikasi') {
                                                                                                                                    $warnaLingkar = 'featured_icon warning';
                                                                                                                                } elseif ($wstatus == 'Review') {
                                                                                                                                    $warnaLingkar = 'featured_icon info';
                                                                                                                                } elseif ($wstatus == 'Revisi') {
                                                                                                                                    $warnaLingkar = 'featured_icon danger';
                                                                                                                                } elseif ($wstatus == 'Validasi') {
                                                                                                                                    $warnaLingkar = 'featured_icon success';
                                                                                                                                } elseif ($wstatus == 'Pengajuan Perbaikan') {
                                                                                                                                    $warnaLingkar = 'featured_icon';
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    <li>
                                                                                                                        <div class="{{$warnaLingkar}}"></div>
                                                                                                                    </li>
                                                                                                                    <div><span class="tx-11 text-muted float-end">{{$q3->created_at}}</span></div>
                                                                                                                    <!-- <div class="{{$warnaLingkar}}"><i class="ri-check-fill" style="color:black"></i></div> -->
                                                                                                                    <?php
                                                                                                                    $indexwarna += 1;
                                                                                                                    if ($indexwarna > 3) {
                                                                                                                        $indexwarna = 0;
                                                                                                                    }
                                                                                                                    ?>

                                                                                                                    <li class="mt-0 activity">
                                                                                                                        <?php
                                                                                                                        foreach ($status as $st3) {
                                                                                                                            if ($st3->id == $q3->id_status) {
                                                                                                                                // echo  $st3->nama_status;
                                                                                                                        ?>
                                                                                                                                <a href="javascript:void(0);" class="tx-12 text-dark">
                                                                                                                                    <p class="mb-1 font-weight-semibold text-dark tx-13">
                                                                                                                                        <?php echo "<b>" . "" . "</b>" . $st3->nama_status; ?>
                                                                                                                                    </p>
                                                                                                                                </a>
                                                                                                                                <?php
                                                                                                                                foreach ($users as $u) {
                                                                                                                                    if ($u->id == $q3->create_by) {
                                                                                                                                        foreach ($roles as $rl) {
                                                                                                                                            if ($rl->id == $u->role) {
                                                                                                                                                // echo "<br/>" . " - create by : " . $u->name . " - " . $q3->role_by;
                                                                                                                                ?>
                                                                                                                                                <p class="text-muted mt-0 mb-0 tx-12">
                                                                                                                                                    <?php echo "Create by : " . $u->name . " - " . $q3->role_by; ?>
                                                                                                                                                </p>
                                                                                                                        <?php
                                                                                                                                                // $pengvalidasi = $rl->id;
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                        <div class="col">
                                                                                                                            <small style="font-size: smaller;color:grey" class="float-right mt-1">{{$q3->created_at}}</small>
                                                                                                                        </div>
                                                                                                                    </li>



                                                                                                                    <br />
                                                                                                        <?php }
                                                                                                            }
                                                                                                        } ?>
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <!-- */ --------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                                                                    </td>
                                                                    <?php $idtor = base64_encode($tor[$m]->id) ?>
                                                                    <td><a href="{{ url('/detailtor/' . $idtor) }}">Detail</a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>
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

    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    @include('dashboards/users/layouts/footer')

    <script>
        $(document).ready(function() {
            $('#monitoring').Table({
                "scrollY": 200,
                "scrollX": true
            });
        });
    </script>


    <script>
        // $(document).ready(function() {
        //     $.noConflict();
        //     $('#monitoring').DataTable({
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     });
        // });
    </script>
</body>

</html>