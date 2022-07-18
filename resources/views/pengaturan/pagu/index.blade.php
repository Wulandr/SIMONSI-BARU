<?php

use Illuminate\Support\Facades\Auth;

?>
<script>
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
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
                                    <div class="col-sm-12 col-md-6">
                                        <h5 class="main-content-label mb-1">PAGU
                                        </h5>
                                        @can('pagu_create')
                                        <button class="search-toggle iq-waves-effect bg-primary rounded" data-bs-toggle="modal" title="Tambah PAGU" data-original-title="Tambah PAGU" data-bs-target="#tambahpagu"><i class="fa fa-plus-circle"></i>
                                        </button>
                                        @endcan
                                        <!-- Modal Tambah PAGU -->
                                        <div class="modal fade" role="dialog" id="tambahpagu" style="overflow:hidden;">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah PAGU</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/pagu/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Nominal PAGU</label>
                                                                <input name="pagu" id="pagu" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>RPD Triwulan 1</label>
                                                                <input name="tw1" id="tw1" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>RPD Triwulan 2</label>
                                                                <input name="tw2" id="tw2" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>RPD Triwulan 3</label>
                                                                <input name="tw3" id="tw3" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>RPD Triwulan 4</label>
                                                                <input name="tw4" id="tw4" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Prodi</label>
                                                                <select name="id_unit" id="tambahunit" aria-hidden="true" data-select2-id="select2-data-58-6f47" style="width: 100%;height:50px;line-height:45px;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;border-radius:5px">
                                                                    @foreach($unit as $unit)
                                                                    <option value="{{$unit->id}}">{{$unit->nama_unit}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tahun</label>
                                                                <select name="id_tahun" id="id_tahun" class="form-control">
                                                                    @foreach($tabeltahun as $pt)
                                                                    <option value="{{$pt->id}}">{{$pt->tahun}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                            <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                @if (session('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: "{{session('success')}}",
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                </script>
                                @endif
                                <span class="table-add float-right mb-3 mr-2">
                                    <div class="form-group row">
                                        <form action="{{ url('/pagu/filtertahun') }}" method="GET">
                                            <div class="row mr-3">
                                                <div class="col-lg-2 mr-1">
                                                    <select class="form-control filter sm-8" name="tahun" id="input">
                                                        <option value="0">All</option>
                                                        <?php for ($thn2 = 0; $thn2 < count($tabeltahun); $thn2++) { ?>
                                                            <option value="{{$tabeltahun[$thn2]->id}}" {{$filtertahun==$tabeltahun[$thn2]->tahun ? 'selected':''}}>{{$tabeltahun[$thn2]->tahun}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                            </div>
                                        </form>
                                    </div>
                                </span>


                                <div class="table-responsive" style="overflow-x:scroll;">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No.</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Unit</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Tahun</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Pagu</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">RPD TW 1</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">RPD TW 2</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">RPD TW 3</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">RPD TW 4</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1; ?>
                                                        <?php for ($a = 0; $a < count($pagu); $a++) { ?>
                                                            <tr>
                                                                <td><a href="#">{{$num}}</a></td>
                                                                <td>
                                                                    <?php for ($b = 0; $b < count($unit2); $b++) {
                                                                        if ($unit2[$b]->id ==  $pagu[$a]->id_unit) {
                                                                            echo $unit2[$b]->nama_unit;
                                                                        }
                                                                    } ?>
                                                                </td>
                                                                <td>
                                                                    <?php for ($c = 0; $c < count($tabeltahun); $c++) {
                                                                        if ($tabeltahun[$c]->id ==  $pagu[$a]->id_tahun) {
                                                                            echo $tabeltahun[$c]->tahun;
                                                                        }
                                                                    } ?>
                                                                </td>
                                                                <td>{{"Rp. " .  number_format($pagu[$a]->pagu, 2, ',', '.') }}</td>
                                                                <td>{{"Rp. " .  number_format($pagu[$a]->tw1, 2, ',', '.') }}</td>
                                                                <td>{{"Rp. " .  number_format($pagu[$a]->tw2, 2, ',', '.') }}</td>
                                                                <td>{{"Rp. " .  number_format($pagu[$a]->tw3, 2, ',', '.') }}</td>
                                                                <td>{{"Rp. " .  number_format($pagu[$a]->tw4, 2, ',', '.') }}</td>
                                                                <td>
                                                                    <div class="flex align-items-center list-user-action">
                                                                        @can('pagu_update')
                                                                        <a class="iq-bg-primary" data-bs-toggle="modal" data-placement="top" title="Update Pagu" data-original-title="Update Pagu" href="" data-bs-target="#update_pagu<?= $pagu[$a]->id ?>" onclick="update_pagu(<?= $pagu[$a]->id ?>)"><i class="ri-pencil-line"></i></a>
                                                                        @endcan
                                                                        @can('pagu_delete')
                                                                        <a class="pagu-confirm iq-bg-primary" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/pagu/delete/'.base64_encode($pagu[$a]->id))}}"><i class="ri-delete-bin-line"></i></a>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php $idpagu = $pagu[$a]->id ?>
                                                            <!-- Modal Ubah Pagu -->
                                                            <div class="asa modal fade" role="dialog" id="update_pagu<?= $pagu[$a]->id ?>" style="overflow:hidden;">
                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Update PAGU</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal" method="post" action="{{ url('/pagu/update/'.$pagu[$a]->id) }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label>Nominal PAGU</label>
                                                                                    <input name="pagu" id="pagu" type="text" value="{{old('pagu',$pagu[$a]->pagu)}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Triwulan 1</label>
                                                                                    <input name="tw1" id="tw1" type="text" value="{{old('tw1',$pagu[$a]->tw1)}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Triwulan 2</label>
                                                                                    <input name="tw2" id="tw2" type="text" value="{{old('tw2',$pagu[$a]->tw2)}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Triwulan 3</label>
                                                                                    <input name="tw3" id="tw3" type="text" value="{{old('tw3',$pagu[$a]->tw3)}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Triwulan 4</label>
                                                                                    <input name="tw4" id="tw4" type="text" value="{{old('tw4',$pagu[$a]->tw4)}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Prodi {{$pagu[$a]->id_unit}}</label>
                                                                                    <select name="id_unit" id="ubahSelect{{ $pagu[$a]->id }}" aria-hidden="true" data-select2-id="select2-data-58-6f57" style="width: 100%;height:50px;line-height:45px;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;border-radius:5px">
                                                                                        @foreach($unit2 as $unit)
                                                                                        <option value="{{$unit->id}}" {{$unit->id == $pagu[$a]->id_unit ? 'selected' : ''}}>{{$unit->nama_unit}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Tahun</label>
                                                                                    <select name="id_tahun" id="id_tahun" class="form-control">
                                                                                        @foreach($tabeltahun as $pt)
                                                                                        <option value="{{old('id_tahun',$pt->id)}}" {{$pagu[$a]->id_tahun == $pt->id ? 'selected' : ''}}>{{$pt->tahun}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                                                <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                                                                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php $num += 1; ?>
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
    <!-- Wrapper END -->
    @include('dashboards/users/layouts/footer')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.pagu-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

        //print page
        function printDiv() {
            var printContents = document.getElementById("content-page").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
        };
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>

    <script>
        $(document).ready(function() {
            $('#tambahunit').select2({
                allowClear: true,
                dropdownParent: $('#tambahpagu')
            });
        });

        function update_pagu(idupdate) {
            $('#ubahSelect' + idupdate).select2({
                allowClear: true,
                dropdownParent: $('#update_pagu' + idupdate)
            });
        }
    </script>

</body>

</html>