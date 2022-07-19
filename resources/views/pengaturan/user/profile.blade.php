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
                        <span class="main-content-title mg-b-0 mg-b-lg-1">PROFILE</span>
                    </div>
                    <div class="justify-content-center mt-2">
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item tx-15"><a href="javascript:void(0);"> </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> </li>
                        </ol> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body d-md-flex">
                                <div class="">
                                    <span class="profile-image pos-relative">
                                        <img class="br-5" alt="" src="../assets/img/faces/profile.jpg">
                                        <span class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span>
                                    </span>
                                </div>
                                <div class="my-md-auto mt-4 prof-details">
                                    <h4 class="font-weight-semibold ms-md-4 ms-0 mb-1 pb-0">Sonya Taylor</h4>
                                    <p class="tx-13 text-muted ms-md-4 ms-0 mb-2 pb-2 ">
                                        <span class="me-3"><i class="far fa-address-card me-2"></i>Ui/Ux
                                            Developer</span>
                                        <span class="me-3"><i class="fa fa-taxi me-2"></i>West fransisco,Alabama</span>
                                        <span><i class="far fa-flag me-2"></i>New Jersey</span>
                                    </p>
                                    <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-phone me-2"></i></span><span class="font-weight-semibold me-2">Phone:</span><span>+94 12345 6789</span>
                                    </p>
                                    <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-envelope me-2"></i></span><span class="font-weight-semibold me-2">Email:</span><span>spruko.space@gmail.com</span>
                                    </p>
                                    <p class="text-muted ms-md-4 ms-0 mb-2"><span><i class="fa fa-globe me-2"></i></span><span class="font-weight-semibold me-2">Website</span><span>sprukotechnologies</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer py-0">
                                <div class="profile-tab tab-menu-heading border-bottom-0">
                                    <nav class="nav main-nav-line p-0 tabs-menu profile-nav-line border-0 br-5 mb-0	">
                                        <a class="nav-link  mb-2 mt-2 active" data-bs-toggle="tab" href="#about">About</a>
                                        <a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                                        <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#timeline">Timeline</a>
                                        <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#gallery">Gallery</a>
                                        <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#friends">Friends</a>
                                        <a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#settings">Account
                                            Settings</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="custom-card main-content-body-profile">
                            <div class="tab-content">
                                <div class="main-content-body tab-pane  active" id="about">
                                    <div class="card">
                                        <div class="card-body p-0 border-0 p-0 rounded-10">
                                            <div class="p-4">
                                                <h4 class="tx-15 text-uppercase mb-3">BIOdata</h4>
                                                <p class="m-b-5">Hi I'm Teri Dactyl,has been the industry's standard
                                                    dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type. Donec pede justo, fringilla vel, aliquet nec,
                                                    vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a,
                                                    venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                                                    Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi.
                                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                                    consequat vitae, eleifend ac, enim.</p>
                                                <div class="m-t-30">
                                                    <div class=" p-t-10">
                                                        <h5 class="text-primary m-b-5 tx-14">Lead designer / Developer
                                                        </h5>
                                                        <p class="">websitename.com</p>
                                                        <p><b>2010-2015</b></p>
                                                        <p class="text-muted tx-13 m-b-0">Lorem Ipsum is simply dummy
                                                            text of the printing and typesetting industry. Lorem Ipsum
                                                            has been the industry's standard dummy text ever since the
                                                            1500s, when an unknown printer took a galley of type and
                                                            scrambled it to make a type specimen book.</p>
                                                    </div>

                                                    <div class="">
                                                        <h5 class="text-primary m-b-5 tx-14">Senior Graphic Designer
                                                        </h5>
                                                        <p class="">coderthemes.com</p>
                                                        <p><b>2007-2009</b></p>
                                                        <p class="text-muted tx-13 mb-0">Lorem Ipsum is simply dummy
                                                            text of the printing and typesetting industry. Lorem Ipsum
                                                            has been the industry's standard dummy text ever since the
                                                            1500s, when an unknown printer took a galley of type and
                                                            scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-content-body tab-pane border-top-0" id="edit">
                                    <div class="card">
                                        <div class="card-body border-0">
                                            <div class="mb-4 main-content-label">Personal Information</div>
                                            <form class="form-horizontal">
                                                <div class="mb-4 main-content-label">Name</div>
                                                <div class="form-group ">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3">
                                                            <label class="form-label">User Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="User Name" value="Mack Adamia">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3">
                                                            <label class="form-label">First Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="First Name" value="Mack Adamia">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3">
                                                            <label class="form-label">last Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Last Name" value="Mack Adamia">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3">
                                                            <label class="form-label">Nick Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="Nick Name" value="Spruha">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-6 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="col-md-6 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                Change Information
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container ml-3">
                        @if (session('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: "{{session('error')}}",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>
                        @endif
                        @if (session('success'))
                        <!-- <div class="alert alert-success">
                            {{ session('success') }}
                        </div> -->
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: "{{session('success')}}",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>
                        @endif
                        @if (session('successPass'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: "{{session('successPass')}}",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        </script>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">

                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Personal Information</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">

                                            <div class="form-group row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="profile-img-edit">
                                                        <?php if (!empty(Auth::user()->image)) { ?>
                                                            <img class="profile-pic" src="{{asset('imageprofil/'.Auth::user()->image)}}" alt="profile-pic" width="110" height="130">
                                                        <?php } ?>
                                                        <?php if (empty(Auth::user()->image)  || Auth::user()->image == 'NULL') {  ?>
                                                            <img class="profile-pic" src="{{asset('findash/assets/images/user/1.jpg')}}" alt="profile-pic" width="110" height="130">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" row align-items-center">
                                                <div class="form-group col-sm-6">
                                                    <label for="fname">Nama: {{Auth::user()->name}}</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="uname">Unit :
                                                        <?php for ($r = 0; $r < count($unit); $r++) {
                                                            if ($unit[$r]->id == Auth::user()->id_unit) { ?>
                                                                {{$unit[$r]->nama_unit}}
                                                        <?php }
                                                        } ?>
                                                    </label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cname">NIP/NIK/NIM : {{Auth::user()->nip}}</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cname">Email : {{Auth::user()->email}}</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="cname">Role :
                                                        <?php foreach ($namaroles as $r2) {
                                                            if ($r2->id == Auth::user()->role) { ?>
                                                                {{$r2->name}}
                                                        <?php }
                                                        } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Change Information</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form class="form-horizontal" method="post" action="{{ route('profil.update',['id'=>Auth::user()->id]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12 ml-3">
                                                        <div class="profile-img-edit">
                                                            <?php if (!empty(Auth::user()->image)) { ?>
                                                                <img class="profile-pic" src="{{asset('imageprofil/'.Auth::user()->image)}}" alt="profile-pic" width="110" height="130">
                                                            <?php } ?>
                                                            <?php if (empty(Auth::user()->image)  || Auth::user()->image == 'NULL') {  ?>
                                                                <img class="profile-pic" src="{{asset('findash/assets/images/user/1.jpg')}}" alt="profile-pic" width="110" height="130">
                                                            <?php } ?>
                                                            <div class="p-image">
                                                                <i class="ri-pencil-line upload-button"></i>
                                                                <input class="file-upload" type="file" name="file" accept="image/*" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center mb-5">
                                                    @error('file')
                                                    <div class="alert text-white bg-success" role="alert">
                                                        <div class="iq-alert-icon">
                                                            <i class="ri-alert-line"></i>
                                                        </div>
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Tolong tambahkan file sebelum submit!
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group col-sm-6 ml-3">
                                                        <label for="fname">Foto :</label>
                                                        <input type="file" class="form-control-file" name="file" id="file" required>
                                                        @error('file')
                                                        <div class="alert text-white bg-success" role="alert">
                                                            <div class="iq-alert-icon">
                                                                <i class="ri-alert-line"></i>
                                                            </div>
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                            <div class="invalid-feedback">
                                                                Tolong tambahkan file sebelum submit!
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">Nama:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name',Auth::user()->name)}}">
                                                    </div>
                                                    <!-- <div class="form-group col-sm-6">
                                                        <label for="fname">Password:</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                                    </div> -->
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">NIP/NIK/NIM:</label>
                                                        <input type="text" class="form-control" id="nip" name="nip" value="{{old('nip',Auth::user()->nip)}}">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="cname">Email:</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{old('email',Auth::user()->email)}}">
                                                    </div>
                                                    <input type="hidden" id="id" value="{{Auth::user()->id}}">
                                                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                                </div>
                                                <br />
                                            </form>
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
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2000);
        </script>
        @include('dashboards/users/layouts/footer')
</body>

</html>