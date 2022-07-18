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
                                    <a class="nav-link" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/iku')}}" aria-controls="pills-home" aria-selected="false">Indikator IKU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/ik')}}" aria-controls="pills-home" aria-selected="false">Indikator IK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/k')}}" aria-controls="pills-home" aria-selected="false">Indikator K</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="padding: 0.8rem 0rem 0.8rem 0.2rem;" href="{{url('/subk')}}" aria-controls="pills-home" aria-selected="false">Indikator SUB K</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <h5 class="main-content-label mb-1">Indikator Kinerja Kegiatan
                                        </h5>
                                        @can('ik_create')
                                        <button class="search-toggle iq-waves-effect bg-primary rounded" data-bs-toggle="modal" title="Tambah IK" data-original-title="Tambah IK" data-bs-target="#tambahik"><i class="fa fa-plus-circle"></i>
                                        </button>
                                        @endcan

                                        <!-- Modal Tambah IK -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahik">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah IK</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/ik/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>IKU</label>
                                                                <select name="id_iku" id="id_iku" class="form-control">
                                                                    @foreach($iku as $iniIku)
                                                                    <option value="{{$iniIku->id}}">{{$iniIku->IKU}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>IK</label>
                                                                <input name="IK" id="IK" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <input name="deskripsi" id="deskripsi" type="text" class="form-control">
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
                                        <!-- <form action="{{ url('/iku/filtertahun') }}" method="GET">
                                                    <div class="row mr-3">
                                                        <div class="col mr-1">
                                                            <select class="form-control filter sm-8" name="tahun" id="input">
                                                                <option value="0">All</option>
                                                                <?php
                                                                // for ($thn2 = 0; $thn2 < count($tabeltahun); $thn2++) { 
                                                                ?>
                                                                    <option value="$tabeltahun[$thn2]->id}}" $filtertahun==$tabeltahun[$thn2]->tahun ? 'selected':''}}>$tabeltahun[$thn2]->tahun}}</option>
                                                                <?php  ?>
                                                            </select>
                                                        </div>
                                                        <input type="submit" class="btn btn-primary btn-sm" value="Filter">
                                                    </div>
                                                </form> -->
                                    </div>
                                </span>

                                <div class="table-responsive">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No.</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">IKU</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 114.703px;">IK</th>
                                                            <th class="wd-15p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 75.3906px;">Deskripsi</th>
                                                            <th class="wd-20p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 114.328px;">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1; ?>
                                                        <?php foreach ($ik as $indexIK => $indikatorIK) { ?>
                                                            <?php
                                                            // $num =  $ik->firstItem() + $indexIK 
                                                            ?>
                                                            <tr>
                                                                <td><a href="#">{{$num}}</a></td>
                                                                <?php for ($sk2 = 0; $sk2 < count($iku); $sk2++) {
                                                                    if ($iku[$sk2]->id == $indikatorIK->id_iku) { ?>
                                                                        <td>{{$iku[$sk2]->IKU}}</td>
                                                                <?php }
                                                                } ?>
                                                                <td>{{$indikatorIK->IK}}</td>
                                                                <td>{{$indikatorIK->deskripsi}}</td>
                                                                <td>
                                                                    <div class="flex align-items-center list-user-action">
                                                                        @can('ik_update')
                                                                        <a class="iq-bg-primary" data-bs-toggle="modal" data-placement="top" title="Update IK" data-original-title="Update IK" href="" data-bs-target="#update_ik<?= $indikatorIK->id ?>"><i class="ri-pencil-line"></i></a>
                                                                        @endcan
                                                                        @can('ik_delete')
                                                                        <a class="ik-confirm iq-bg-primary" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/ik/delete/'.base64_encode($indikatorIK->id))}}"><i class="ri-delete-bin-line"></i></a>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Modal Ubah IK -->
                                                            <div class="modal fade" tabindex="-1" role="dialog" id="update_ik<?= $indikatorIK->id ?>">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Update IK</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal" method="post" action="{{ url('/ik/update/'.$indikatorIK->id) }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label>IKU</label>
                                                                                    <select name="id_iku" id="id_iku" class="form-control">
                                                                                        @foreach($iku as $iniIku)
                                                                                        <option value="{{old('id_iku',$iniIku->id)}}" {{$iniIku->id == $indikatorIK->id_iku ? 'selected' : ''}}>{{$iniIku->IKU}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>IK</label>
                                                                                    <input name="IK" id="IK" value="{{old('IK',$indikatorIK->IK)}}" type="text" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Deskripsi</label>
                                                                                    <input name="deskripsi" id="deskripsi" value="{{old('deskripsi',$indikatorIK->deskripsi)}}" type="text" class="form-control">
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
    @include('dashboards/users/layouts/footer')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.ik-confirm').on('click', function(event) {
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

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
</body>

</html>