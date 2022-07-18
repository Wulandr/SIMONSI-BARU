<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;

?>

<!-- main-header -->
<div class="main-header side-header sticky nav nav-item">
    <div class="main-container container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ route('home') }}" class="header-logo">
                    <img src="{{ asset('assets/img/brand/Logo.png') }}" class="mobile-logo logo-1" alt="logo">
                    <img src="{{ asset('assets/img/brand/Logo.png') }}" class="mobile-logo dark-logo-1" alt="logo">
                </a>
            </div>
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
            </div>
            <div class="logo-horizontal">
                <a href="index.html" class="header-logo">
                    <img src="{{ asset('assets/img/brand/logo.png') }}" class="mobile-logo logo-1" alt="logo">
                    <img src="{{ asset('assets/img/brand/Logo.png') }}" class="mobile-logo dark-logo-1" alt="logo">
                </a>
            </div>
            <div class="main-header-center ms-4 d-sm-none d-md-none d-lg-block form-group">
                <input class="form-control" placeholder="Search..." type="search">
                <button class="btn"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fe fe-more-vertical "></span>
            </button>
            <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="nav nav-item header-icons navbar-nav-right ms-auto">
                        <li class="dropdown nav-item main-header-notification d-flex">
                            <a class="new nav-link" data-bs-toggle="dropdown" href="javascript:void(0);">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z" />
                                </svg><span class=" pulse"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content text-start border-bottom">
                                    <div class="d-flex">
                                        <h6 class="dropdown-title mb-1 tx-15 font-weight-semibold">
                                            Pengajuan TOR</h6>
                                        <span class="badge badge-pill badge-warning ms-auto my-auto float-end">Mark
                                            All Read</span>
                                    </div>
                                    <p class="dropdown-title-text subtext mb-0 op-6 pb-0 tx-12 ">You have 4
                                        unread Notifications</p>
                                </div>
                                <div class="main-notification-list Notification-scroll">
                                    <a class="d-flex p-3 border-bottom" href="mail.html">
                                        <div class="notifyimg bg-pink">
                                            <i class="far fa-folder-open text-white"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="notification-label mb-1">New files available</h5>
                                            <div class="notification-subtext">10 hour ago</div>
                                        </div>
                                        <div class="ms-auto">
                                            <i class="las la-angle-right text-end text-muted"></i>
                                        </div>
                                    </a>

                                </div>
                                <div class="dropdown-footer">
                                    <a class="btn btn-primary btn-sm btn-block" href="mail.html">VIEW ALL</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-link search-icon d-lg-none d-block">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="reset" class="btn btn-default">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="submit" class="btn btn-default nav-link resp-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="header-icon-svgs" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>
                        <li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
                            <a class="new nav-link profile-user d-flex" href="" data-bs-toggle="dropdown"><img alt="" src="{{ asset('nowa/assets/img/faces/2.jpg') }}" class=""></a>
                            <div class="dropdown-menu">
                                <div class="menu-header-content p-3 border-bottom">
                                    <div class="d-flex wd-100p">
                                        <div class="main-img-user"><img alt="" src="{{ asset('nowa/assets/img/faces/2.jpg') }}" class=""></div>
                                        <div class="ms-3 my-auto">
                                            <h6 class="tx-15 font-weight-semibold mb-0" style="color: black;"><?= Auth::user()->name ?></h6><span class="dropdown-title-text subtext op-6  tx-12">Premium
                                                Member</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{ url('/profil') }}"><i class="far fa-user-circle"></i>Profile</a>
                                <a class="dropdown-item" href="chat.html"><i class="far fa-smile"></i>
                                    Change Role
                                    <br />
                                </a>

                                <div class="row ml-3">
                                    <?php
                                    $myArray = (explode(',', Auth()->user()->multirole));
                                    ?>
                                    <?php $var = 0;
                                    foreach ($myArray as $tag) {
                                        foreach ($tabelRole as $r3) {
                                            if ($r3->id == $tag) { ?>
                                                <form class="form-horizontal" method="post" action="{{ url('/pergantian') }}">
                                                    {{csrf_field()}}
                                                    <div class="col lg-2">
                                                        <button class="btn mb-1 {{Auth()->user()->role == $r3->id ? 'bg-success disabled' : 'bg-secondary'}} " style="color: white;" type="submit">
                                                            {{ $r3->name}} <i class="ri-login-box-line ml-2">
                                                            </i>
                                                            <input type="text" name="pilihrole" id="pilihrole" value="{{$r3->id}}" style="display:none;">
                                                        </button>
                                                    </div>
                                                </form>
                                    <?php }
                                        }
                                    } ?>
                                </div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" role="button"><i class="far fa-arrow-alt-circle-left"></i> Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>