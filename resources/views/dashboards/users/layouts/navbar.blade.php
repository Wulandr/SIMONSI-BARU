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
                        <li class="dropdown main-header-message right-toggle">
                            <a class="new nav-link nav-link pe-0" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
                                <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs fa-spin" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"></path>
                                    <path d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sidebar-right-->
<div class="sidebar sidebar-right sidebar-animate">

    <div class="panel panel-primary card mb-0 box-shadow">
        <div class="tab-menu-heading card-img-top-1 border-0 p-3">
            <div class="card-title mb-0">Settings</div>
            <div class="card-options ms-auto">
                <a href="javascript:void(0);" class="sidebar-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
            <div class="tabs-menu ">
                <div class="switcher-wrapper">
                    <div class="demo_changer">
                        <div class="form_holder sidebar-right1 ps ps--active-y">
                            <div class="row">
                                <div class="predefined_styles">
                                    <div class="container text-center">
                                        <div class="p-3 d-grid gap-2"> <a href="../../index.html" class="btn ripple btn-primary mt-0">View Demo</a> <a href="https://themeforest.net/item/nowa-bootstrap-admin-dashboard-html-template/35273899" class="btn ripple btn-info">Buy Now</a> <a href="https://themeforest.net/user/spruko/portfolio" class="btn ripple btn-danger">Our Portfolio</a> </div>
                                    </div>
                                    <div class="container">
                                        <h6>LTR AND RTL VERSIONS</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">LTR</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch25" id="myonoffswitch54" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch54" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">RTL</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch25" id="myonoffswitch55" class="onoffswitch2-checkbox"> <label for="myonoffswitch55" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Navigation Style</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Vertical Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch15" id="myonoffswitch34" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch34" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizantal Click Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch15" id="myonoffswitch35" class="onoffswitch2-checkbox"> <label for="myonoffswitch35" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Horizantal Hover Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch15" id="myonoffswitch111" class="onoffswitch2-checkbox"> <label for="myonoffswitch111" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Light Theme Style</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Light Theme</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1" id="myonoffswitch1" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch1" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Light Primary</span>
                                                    <div class=""> <input class="wd-25 ht-25 input-color-picker color-primary-light" value="#38cab3" id="colorID" oninput="changePrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id7="transparentcolor" name="lightPrimary"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Dark Theme Style</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Theme</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1" id="myonoffswitch2" class="onoffswitch2-checkbox"> <label for="myonoffswitch2" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Primary</span>
                                                    <div class=""> <input class="wd-25 ht-25 input-dark-color-picker color-primary-dark" value="#38cab3" id="darkPrimaryColorID" oninput="darkPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id8="transparentcolor" name="darkPrimary"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Transparent Style</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex mt-2 mb-3"> <span class="me-auto">Transparent Theme</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch1" id="myonoffswitchTransparent" class="onoffswitch2-checkbox"> <label for="myonoffswitchTransparent" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Transparent Primary</span>
                                                    <div class=""> <input class="wd-30 ht-30 input-transparent-color-picker color-primary-transparent" value="#38cab3" id="transparentPrimaryColorID" oninput="transparentPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id4="primary" data-id9="transparentcolor" name="tranparentPrimary"> </div>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Transparent Background</span>
                                                    <div class=""> <input class="wd-30 ht-30 input-transparent-color-picker color-bg-transparent" value="#38cab3" id="transparentBgColorID" oninput="transparentBgColor()" type="color" data-id5="body" data-id6="theme" data-id9="transparentcolor" name="transparentBackground"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Transparent Bg-Image Style</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">BG-Image Primary</span>
                                                    <div class=""> <input class="wd-30 ht-30 input-transparent-color-picker color-primary-transparent" value="#38cab3" id="transparentBgImgPrimaryColorID" oninput="transparentBgImgPrimaryColor()" type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border" data-id3="primary" data-id4="primary" data-id9="transparentcolor" name="tranparentPrimary"> </div>
                                                </div>
                                                <div class="switch-toggle"> <a class="bg-img1" onclick="bgImage(this)" href="javascript:void(0);"><img src="{{ asset('nowa/assets/img/media/bg-img1.jpg')}}" id="bgimage1" alt="switch-img" width="35px"></a> <a class="bg-img2" onclick="bgImage(this)" href="javascript:void(0);"><img src="{{ asset('nowa/assets/img/media/bg-img2.jpg')}}" width="35px" id="bgimage2" alt="switch-img"></a> <a class="bg-img3" onclick="bgImage(this)" href="javascript:void(0);"><img src="{{ asset('nowa/assets/img/media/bg-img3.jpg')}}" id="bgimage3" width="35px" alt="switch-img"></a> <a class="bg-img4" onclick="bgImage(this)" href="javascript:void(0);"><img src="{{ asset('nowa/assets/img/media/bg-img4.jpg')}}" width="35px" id="bgimage4" alt="switch-img"></a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container leftmenu-styles">
                                        <h6>Leftmenu Styles</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Light Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch2" id="myonoffswitch3" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch3" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Color Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch2" id="myonoffswitch4" class="onoffswitch2-checkbox"> <label for="myonoffswitch4" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch2" id="myonoffswitch5" class="onoffswitch2-checkbox"> <label for="myonoffswitch5" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Gradient Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch2" id="myonoffswitch25" class="onoffswitch2-checkbox"> <label for="myonoffswitch25" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container header-styles">
                                        <h6>Header Styles</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Light Header</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch3" id="myonoffswitch6" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch6" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Color Header</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch3" id="myonoffswitch7" class="onoffswitch2-checkbox"> <label for="myonoffswitch7" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Dark Header</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch3" id="myonoffswitch8" class="onoffswitch2-checkbox"> <label for="myonoffswitch8" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Gradient Header</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch3" id="myonoffswitch26" class="onoffswitch2-checkbox"> <label for="myonoffswitch26" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Layout Width Styles</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Full Width</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch4" id="myonoffswitch9" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch9" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Boxed</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch4" id="myonoffswitch10" class="onoffswitch2-checkbox"> <label for="myonoffswitch10" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Layout Positions</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Fixed</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch5" id="myonoffswitch11" class="onoffswitch2-checkbox" checked=""> <label for="myonoffswitch11" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Scrollable</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch5" id="myonoffswitch12" class="onoffswitch2-checkbox"> <label for="myonoffswitch12" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container vertical-switcher">
                                        <h6>Sidemenu layout Styles</h6>
                                        <div class="skin-body">
                                            <div class="switch_section">
                                                <div class="switch-toggle d-flex"> <span class="me-auto">Default Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked=""> <label for="myonoffswitch13" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Closed Menu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="myonoffswitch30" class="onoffswitch2-checkbox default-menu"> <label for="myonoffswitch30" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Icon with Text</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="myonoffswitch14" class="onoffswitch2-checkbox"> <label for="myonoffswitch14" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Icon Overlay</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="myonoffswitch15" class="onoffswitch2-checkbox"> <label for="myonoffswitch15" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Hover Submenu</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="myonoffswitch32" class="onoffswitch2-checkbox"> <label for="myonoffswitch32" class="onoffswitch2-label"></label> </p>
                                                </div>
                                                <div class="switch-toggle d-flex mt-2"> <span class="me-auto">Hover Submenu style 1</span>
                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="myonoffswitch33" class="onoffswitch2-checkbox"> <label for="myonoffswitch33" class="onoffswitch2-label"></label> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="container">
                                        <h6>Reset All Styles</h6>
                                        <div class="skin-body">
                                            <div class="switch_section my-4"> <button class="btn btn-danger btn-block" onclick="localStorage.clear();
                                                    document.querySelector('html').style = '';
                                                    resetData()
                                                    names();" type="button">Reset All </button> </div>
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                            </div>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 361px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 61px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Sidebar-right-->