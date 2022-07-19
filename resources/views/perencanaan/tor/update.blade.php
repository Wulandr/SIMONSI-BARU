<?php

use Illuminate\Support\Facades\Auth;
?>
@can('tor_create')
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

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h5 class="main-content-label mb-1">UPDATE PENGAJUAN TOR</h5>
                                </div>
                            </div>
                            <?php $data = 1 ?>
                            <div class="card-body">
                                <?php
                                $arrayStatus = [];
                                $i = 0;
                                foreach ($trx_status_tor as $trx2) {
                                    foreach ($status as $status2) {
                                        if ($trx2->id_tor == $id) {
                                            if ($status2->id == $trx2->id_status) {
                                                $arrayStatus[$i] = $status2->nama_status;
                                                $status2->nama_status . "<br />";

                                                if ($status2->nama_status == "Revisi") {
                                                    $arrayRev[$i] = $status2->nama_status;
                                                }

                                                $ch = "checked";
                                                $i += 1;
                                            }
                                        }
                                    }
                                }
                                $ch = "checked";
                                ?>
                                <form class="text-center mt-4" method="post" action="{{ url('/tor/update/'.$id) }}">
                                    @csrf
                                    <div id="wizard4">
                                        <h3>1</h3>
                                        <section>
                                            <div class="row row-sm">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input type="hidden" name="create_by" id="create_by" value="{{ Auth()->user()->id }}" class="custom-control-input">
                                                        <input type="hidden" name="update_by" id="update_by" value="{{ Auth()->user()->id }}" class="custom-control-input">
                                                        <label><b>Jenis Ajuan</b></label><br />
                                                        <label class="rdiobox">
                                                            <input id="jenis_ajuan" name="jenis_ajuan" value="Baru" type="radio" required {{$ch}}> <span>Baru</span>
                                                            <!-- <input type="radio" id="customRadio6" name="jenis_ajuan" id="jenis_ajuan" value="Baru" class="custom-control-input" {{$ch}}>
                                                            <label class="custom-control-label" for="customRadio6"> Baru </label> -->
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label><b>Prodi</b></label>
                                                        <?php
                                                        $UnitUser = "";
                                                        if (!empty($unit)) {
                                                            for ($u = 0; $u < count($unit); $u++) {
                                                                if ($unit[$u]->id == Auth::user()->id_unit) {
                                                                    $UnitUser = $unit[$u]->nama_unit;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <?php if ($UnitUser == "Sekolah Vokasi") { ?>
                                                            <select name="id_unit" id="id_unit" class="form-control form-select select2 @error('id_unit') is-invalid @enderror">
                                                                @foreach($unit as $unit)
                                                                <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                                                                @endforeach
                                                            </select>
                                                        <?php } ?>
                                                        <?php if ($UnitUser != "Sekolah Vokasi") { ?>
                                                            <select name="id_unit" id="id_unit" class="form-control form-select select2 @error('id_unit') is-invalid @enderror">
                                                                <?php for ($u2 = 0; $u2 < count($unit); $u2++) {
                                                                    if ($unit[$u2]->id == Auth()->user()->id_unit) { ?>
                                                                        <option value="{{$unit[$u2]->id}}">{{$unit[$u2]->nama_unit}}</option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        <?php } ?>
                                                        @error('id_unit')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><br />

                                            <div class="row">
                                                <div class="form-group">
                                                    <h6 style="text-align: left;"><b>Kode Sub Kegiatan</b></h6>
                                                    <div class="row">
                                                        <select name="id_subK" id="id_subK" class="form-control">
                                                            <?php for ($s = 0; $s < count($subkeg); $s++) { ?>
                                                                <option value="{{old('id_subK',$subkeg[$s]->id)}}" {{$subkeg[$s]->id == $tor['id_subK'] ? 'selected' : '' }}>{{$subkeg[$s]->subK . " - " . substr($subkeg[$s]->deskripsi, 0, 100) }}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />

                                            <div class="row" style="border: 1cm;">
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <b>
                                                            <h6 class="card-title"><b>Indikator Kinerja Utama (IKU)</b></h6>
                                                        </b>
                                                        <div class="form-group">
                                                            <label>Realisasi IKU (%)</label>
                                                            <input name="realisasi_IKU" id="realisasi_IKU" value="{{old('realisasi_IKU',$tor['realisasi_IKU'])}}" type="text" class="form-control @error('realisasi_IKU') is-invalid @enderror">
                                                        </div>
                                                        @error('realisasi_IKU')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label>Target IKU (%)</label>
                                                            <input name="target_IKU" id="target_IKU" value="{{old('target_IKU',$tor['target_IKU'])}}" type="text" class="form-control @error('target_IKU') is-invalid @enderror">
                                                        </div>
                                                        @error('target_IKU')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <b>
                                                            <h6 class="card-title"><b>Indikator Kinerja Kegiatan (IK)</b></h6>
                                                        </b>
                                                        <div class="form-group">
                                                            <label>Realisasi IK (%)</label>
                                                            <input name="realisasi_IK" id="realisasi_IK" value="{{old('realisasi_IK',$tor['realisasi_IK'])}}" type="text" class="form-control @error('realisasi_IK') is-invalid @enderror">
                                                        </div>
                                                        @error('realisasi_IK')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="form-group">
                                                            <label>Target IK (%)</label>
                                                            <input name="target_IK" id="target_IK" value="{{old('target_IK',$tor['target_IK'])}}" type="text" class="form-control @error('target_IK') is-invalid @enderror">
                                                        </div>
                                                        @error('target_IK')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><br />

                                            <div class="row">
                                                <div class="form-group">
                                                    <label><b>Nama Kegiatan</b></label>
                                                    <input name="nama_kegiatan" id="nama_kegiatan" type="text" value="{{old('nama_kegiatan',$tor['nama_kegiatan'])}}" class="form-control">
                                                </div>
                                            </div>
                                        </section>

                                        <h3>2</h3>
                                        <section>
                                            <div class="form-group">
                                                <label><b>Latar Belakang</b></label>
                                                <textarea class="ckeditor form-control" id="latar_belakang" name="latar_belakang" value="{!!old('latar_belakang',$tor['latar_belakang'])!!}">{{$tor['latar_belakang']}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Rasionalisasi</b></label>
                                                <textarea class="ckeditor form-control" id="rasionalisasi" name="rasionalisasi" rows="2">{{$tor['rasionalisasi']}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tujuan</b></label>
                                                <textarea class="ckeditor form-control" id="tujuan" name="tujuan" rows="2">{{$tor['tujuan']}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Mekanisme</b></label>
                                                <textarea class="ckeditor form-control" id="mekanisme" name="mekanisme" rows="2">{{$tor['mekanisme']}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Keberlanjutan</b></label>
                                                <textarea class="ckeditor form-control" id="keberlanjutan" name="keberlanjutan" rows="2">{{$tor['keberlanjutan']}}</textarea>
                                            </div>

                                        </section>

                                        <!-- TAHAP 3 -->
                                        <h3>3</h3>
                                        <section>
                                            <div class="form-group">
                                                <label><b>Nama PIC Kegiatan</b></label>
                                                <select name="nama_pic" id="nama_pic" class="form-control @error('nama_pic') is-invalid @enderror">
                                                    <?php
                                                    for ($pi2 = 0; $pi2 < count($roles); $pi2++) {
                                                        if (Auth::user()->role == $roles[$pi2]->id) {
                                                            if ($roles[$pi2]->name == "PIC") { ?>
                                                                <option value="<?= $tor['nama_pic'] ?>"><?= $tor['nama_pic'] ?></option>
                                                                <?php }
                                                            if ($roles[$pi2]->name == "Prodi") {
                                                                for ($pi1 = 0; $pi1 < count($users); $pi1++) {
                                                                    for ($pi3 = 0; $pi3 < count($roles2); $pi3++) {
                                                                        if ($users[$pi1]->role == $roles2[$pi3]->id) {
                                                                            if ($roles2[$pi3]->name == "PIC") { ?>
                                                                                <option value="<?= $users[$pi1]->name ?>"><?= $users[$pi1]->name ?></option>
                                                            <?php }
                                                                        }
                                                                    }
                                                                }
                                                            } ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Email PIC Kegiatan</b></label>
                                                <input name="email_pic" id="email_pic" type="text" class="form-control" value="{{old('email_pic',$tor['email_pic'])}}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Kontak PIC Kegiatan</b></label>
                                                <input name="kontak_pic" id="kontak_pic" type="text" class="form-control" value="{{old('kontak_pic',$tor['kontak_pic'])}}">
                                            </div>



                                            <div class="form-group">
                                                <label><b>Tanggal Mulai Pelaksanaan</b></label>
                                                <input name="tgl_mulai_pelaksanaan" id="tgl_mulai_pelaksanaan" value="{{old('tgl_mulai_pelaksanaan',$tor['tgl_mulai_pelaksanaan'])}}" type="date" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Tanggal Selesai Pelaksanaan</b></label>
                                                <input name="tgl_akhir_pelaksanaan" id="tgl_akhir_pelaksanaan" value="{{old('tgl_akhir_pelaksanaan',$tor['tgl_akhir_pelaksanaan'])}}" type="date" class="form-control">
                                            </div>
                                            <!-- <div class="form-group">
                                                    <label><b>Jumlah Anggaran</b></label> -->
                                            <input name="jumlah_anggaran" id="jumlah_anggaran" value="{{old('jumlah_anggaran',$tor['jumlah_anggaran'])}}" type="hidden" class="form-control">
                                            <!-- </div> -->

                                            <div class="form-group">
                                                <label><b>Rencana Penarikan Dana</b></label>
                                                <select name="id_tw" id="id_tw" class="form-control">
                                                    <?php for ($t2 = 0; $t2 < count($tw); $t2++) { ?>
                                                        <option value="{{old('id_tw',$tw[$t2]->id)}}" {{$tw[$t2]->id == $tor['id_tw'] ? 'selected' : ''}}><?= $tw[$t2]->triwulan ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="create_by" value="{{$tor['create_by']}}">
                                            <input type="hidden" name="update_by" value="{{Auth()->user()->id}}">

                                        </section>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboards/users/layouts/footer')
    <script>
        $('[href="#finish"]').click(function() {
            $('form').submit();
        })
    </script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<div class="col-md-8"><div class="form-group"><label>Komponen Input</label><input name="komponen[]" id="" type="text" class="form-control"></div></div><div class="col-md-2"><div class="form-group"><label>Bulan</label><input name="bulan[]" id="" type="text" class="form-control"></div></div><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>');
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('<div class="col-md-8">').remove();
        });
    </script>
</body>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

</html>
@endcan