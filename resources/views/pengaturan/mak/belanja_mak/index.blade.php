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

                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <ul class="nav nav-pills nav-fill" id="pills-tab-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/mak')}}" aria-selected="false">Kategori MAK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/kelompok_mak')}}" aria-selected="false">Kelompok MAK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/belanja_mak')}}" aria-selected="true">Belanja MAK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/detail_mak')}}" aria-selected="true">Detail MAK</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <h5 class="main-content-label mb-1">Belanja MAK
                                        </h5>
                                        @can('belanjamak_create')
                                        <button class="search-toggle iq-waves-effect bg-primary rounded" data-bs-toggle="modal" title="Tambah Belanja MAK" data-original-title="Tambah Belanja MAK" data-bs-target="#tambahBelMak"><i class="fa fa-plus-circle"></i>
                                        </button>
                                        @endcan
                                        <!-- Modal Tambah BELANJA MAK -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahBelMak">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Belanja MAK</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/belanja_mak/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Kelompok MAK</label>
                                                                <select class="js-example-basic-single1" name="id_kelompok" id="id_kelompok" style="width: 100%;height:50px;line-height:45px;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;border-radius:5px">
                                                                    @foreach($kelompok_mak as $iniKel)
                                                                    <option value="{{$iniKel->id}}">{{$iniKel->kelompok}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Belanja Mak</label>
                                                                <input name="belanja" id="belanja" type="text" class="form-control">
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
                                        timer: 3000
                                    })
                                </script>
                                @endif

                                <div class="table-responsive">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No.</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">MAK</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.703px;">Kelompok MAK</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Nama Belanja MAK</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114.328px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1; ?>
                                                        @foreach ($joinKelompok as $k2 => $join)
                                                        <?php //$num =  $joinKelompok->firstItem() + $k2 
                                                        ?>
                                                        <tr>
                                                            <td><a href="#">{{$num}}</a></td>
                                                            <td>{{$join->jenis_belanja}}</td>
                                                            <td>{{$join->kelompok}}</td>
                                                            <td>{{$join->belanja}}</td>
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    @can('belanjamak_update')
                                                                    <a class="iq-bg-primary" data-bs-toggle="modal" data-placement="top" title="Update Belanja" data-original-title="Update Belanja" href="" data-bs-target="#update_bel<?= $join->idBelanja ?>" onclick="update_belanja(<?= $join->idBelanja ?>)"><i class="ri-pencil-line"></i></a>
                                                                    @endcan
                                                                    @can('belanjamak_delete')
                                                                    <a class="iq-bg-primary belanjamak-confirm" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/belanja_mak/delete/'.base64_encode($join->idBelanja))}}"><i class="ri-delete-bin-line"></i></a>
                                                                    @endcan
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- Modal Ubah IK -->
                                                        <div class="js-update modal hide fade" role="dialog" id="update_bel<?= $join->idBelanja ?>" style="overflow:hidden;">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update Belanja</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" method="post" action="{{ url('/belanja_mak/update/'.$join->idBelanja) }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label>Kelompok</label>
                                                                                <select name="id_kelompok" id="ubahSelect{{ $join->idBelanja }}" aria-hidden="true" data-select2-id="select2-data-98-efh8" style="width: 100%;height:50px;line-height:45px;color:#a09e9e;background:#00000000;border:1px solid #f1f1f1;border-radius:5px">
                                                                                    <?php for ($b2 = 0; $b2 < count($kelompok_mak); $b2++) { ?>
                                                                                        <option value="{{$kelompok_mak[$b2]->id}}" {{$kelompok_mak[$b2]->id == $join->idKelompok ? 'selected' : ''}}>{{$kelompok_mak[$b2]->kelompok}}</option>
                                                                                    <?php
                                                                                    } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Nama Belanja Mak</label>
                                                                                <input name="belanja" id="belanja" value="{{old('belanja',$join->belanja)}}" type="text" class="form-control">
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
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Wrapper END -->
                </div>
            </div>
        </div>


        @include('dashboards/users/layouts/footer')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-single1').select2({
                    allowClear: true,
                    dropdownParent: $('#tambahBelMak')
                });
            });

            function update_belanja(idupdate) {
                $('#ubahSelect' + idupdate).select2({
                    allowClear: true,
                    dropdownParent: $('#update_bel' + idupdate)
                });
            }
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $('.belanjamak-confirm').on('click', function(event) {
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

</body>

</html>