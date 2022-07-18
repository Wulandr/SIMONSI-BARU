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

                <!-- row -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <h5 class="main-content-label mb-1">Data Tahun
                                        </h5>
                                        @can('tahun_create')
                                        <button class="search-toggle iq-waves-effect bg-primary rounded" data-bs-toggle="modal" title="Tambah TAHUN" data-original-title="Tambah TAHUN" data-bs-target="#tambahtahun"><i class="fa fa-plus-circle"></i>
                                        </button>
                                        @endcan
                                        <!-- Modal Tambah TAHUN -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="tambahtahun">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Tahun</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" method="post" action="{{ url('/tahun/create') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Tahun</label>
                                                                <input name="tahun" id="tahun" type="text" class="form-control">
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
                                <div class="table-responsive">
                                    <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
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
                                                <table class="table table-bordered text-nowrap border-bottom dataTable no-footer" id="basic-datatable" role="grid" aria-describedby="basic-datatable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="wd-20p sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 115.281px;">No.</th>
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Tahun</th>
                                                            @can('tahun_create')
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Status</th>
                                                            @endcan
                                                            @can('tahun_update')
                                                            <th class="wd-25p sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 159.297px;">Action</th>
                                                            @endcan
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $num = 1; ?>
                                                        <?php foreach ($tahun as $thn) { ?>
                                                            <tr>
                                                                <td><a href="#">{{$num}}</a></td>
                                                                <td>{{$thn->tahun}}</td>
                                                                @can('tahun_create')
                                                                <td>
                                                                    <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                                                                        <div class="custom-switch-inner">
                                                                            <input data-id="{{$thn->id}}" type="checkbox" class="custom-control-input" data-on-label="On" data-off-label="Off" id="customSwitch-22{{$thn->id}}" {{ $thn->is_aktif ? 'checked' : '' }}>
                                                                            <label class="custom-control-label" for="customSwitch-22{{$thn->id}}" data-on-label="On" data-off-label="Off">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                @endcan
                                                                @if(Gate::check('tahun_update') || Gate::check('tahun_delete'))
                                                                <td>
                                                                    <div class="flex align-items-center list-user-action">
                                                                        @can('tahun_update')
                                                                        <a class="iq-bg-primary" data-bs-toggle="modal" data-placement="top" title="Update Tahun" data-original-title="Update Tahun" href="" data-bs-target="#update_thn<?= $thn->id ?>"><i class="ri-pencil-line"></i></a>
                                                                        @endcan
                                                                        @can('tahun_delete')
                                                                        <a href="{{url('/tahun/delete/'.base64_encode($thn->id))}}" class="iq-bg-primary tahun-confirm" data-toggle="tooltip" title="Delete">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                        <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/tahun/delete/'.$thn->id)}}" onclick="return confirm('Apakah anda yakin ingin hapus ?')"><i class="ri-delete-bin-line"></i></a> -->
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                                @endif
                                                            </tr>
                                                            <!-- Modal Ubah TAHUN -->
                                                            <div class="modal fade" tabindex="-1" role="dialog" id="update_thn<?= $thn->id ?>">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Ubah Tahun</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal" method="post" action="{{ url('/tahun/update/'.$thn->id) }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label>Tahun</label>
                                                                                    <input name="tahun" value="{{old('tahun',$thn->tahun)}}" id="tahun" type="text" class="form-control">
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.tahun-confirm').on('click', function(event) {
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
    </script>
    @include('dashboards/users/layouts/footer')

    <script>
        // $(document).ready(function() {
        //     $.noConflict();
        //     $('#mytahun').DataTable();
        //     // $('#example').DataTable();
        // });
        //print page
        function printDiv() {
            var printContents = document.getElementById("content-page").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
        };
    </script>
    <script>
        $(function() {
            $('.custom-control-input').change(function() {
                var is_aktif = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/tahun/isaktif',
                    data: {
                        'is_aktif': is_aktif,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
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
            $('#example').DataTable();
        });
    </script>
</body>

</html>