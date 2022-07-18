<!-- main-sidebar -->
<div class="sticky">
    <aside class="app-sidebar ps ps--active-y">
        <div class="main-sidebar-header active">
            <a class="header-logo active" href="{{ url('/home') }}">
                <img src="{{ asset('nowa/assets/img/brand/logo.png') }}" class="main-logo  desktop-logo" alt="logo">
                <img src="{{ asset('nowa/assets/img/brand/logo-white.png') }}" class="main-logo  desktop-dark" alt="logo">
                <img src="{{ asset('nowa/assets/img/brand/favicon.png') }}" class="main-logo  mobile-logo" alt="logo">
                <img src="{{ asset('nowa/assets/img/brand/favicon-white.png') }}" class="main-logo  mobile-dark" alt="logo">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                {{-- DASHBOARD --}}
                <li class="slide {{ Request::is('home', 'admin/dashboard') ? 'active' : '' }}">
                    <a class="side-menu__item {{ url('/home') }}" data-bs-toggle="slide" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z" />
                        </svg>
                        <span class="side-menu__label">Dashboards</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                </li>

                {{-- MENU PERENCANAAN --}}
                <li class="slide {{ Request::is('monitoringUsulan', 'torab', 'validasi', 'detailtor', 'steppengajuantor') ? 'active' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
                        </svg>
                        <span class="side-menu__label">Perencanaan</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Perencanaan</a></li>
                        @can('ajuan_monitoring')
                        <li><a class="slide-item" href="{{ url('/monitoringUsulan') }}">Monitoring</a></li>
                        @endcan
                        @can('ajuan_torrab')
                        <li><a class="slide-item" href="{{ url('/torab') }}">TOR & RAB</a>
                        </li>
                        @endcan
                        @can('ajuan_validasi')
                        <li><a class="slide-item" href="{{ url('/validasi') }}">Validasi</a></li>
                        @endcan
                    </ul>
                </li>


                {{-- MENU KEUANGAN --}}
                <li class="slide {{ Request::is('memo_cair', 'persekot_kerja', 'spj', 'lpj', 'monitoring_kak', 'upload_spj') ? 'active' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
                        </svg><span class="side-menu__label">Keuangan</span><i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Keuangan</a></li>
                        <li><a class="slide-item" href="{{ url('/memo_cair') }}">Memo Cair</a></li>
                        <li><a class="slide-item" href="{{ url('/persekot_kerja') }}">Persekot Kerja</a></li>
                        <li class="sub-slide">
                            <a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span class="sub-side-menu__label">SPJ</span><i class="sub-angle fe fe-chevron-down me-4"></i></a>
                            <!-- <ul class="sub-slide-menu">
                                <li><a class="sub-side-menu__item" href="{{ url('/spj') }}">Upload SPJ</a></li>
                                <li><a class="sub-side-menu__item" href="javascript:void(0);">Panduan SPJ</a></li>
                                <li><a class="sub-side-menu__item" href="javascript:void(0);">Template SPJ</a></li>
                            </ul> -->
                        </li>
                        <li class="sub-slide">
                            <a class="slide-item" data-bs-toggle="sub-slide" href="javascript:void(0);"><span class="sub-side-menu__label">LPJ</span><i class="sub-angle fe fe-chevron-down me-4"></i></a>
                            <!-- <ul class="sub-slide-menu">
                                <li><a class="sub-side-menu__item" href="{{ url('/lpj') }}">Input LPJ</a></li>
                                <li><a class="sub-side-menu__item" href="javascript:void(0);">Template SPJ</a></li>
                            </ul> -->
                        </li>
                        <li><a class="slide-item" href="{{ url('/monitoring_kak') }}">Monitoring Rekapitulasi
                            </a></li>
                    </ul>
                </li>


                {{-- MENU PENGATURAN --}}
                <li class="slide {{ Request::is('pedomans', 'spj_kategori', 'spj_subkategori', 'tahun', 'triwulan', 'unit', 'pagu', 'mak', 'iku', 'roles', 'user') ? 'active' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
                        </svg>
                        <span class="side-menu__label">Pengaturan</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu__label1"><a href="javascript:void(0);">Pengaturan</a></li>
                        @can('spjkategori_show')
                        <li>
                            <a class="slide-item" href="{{ url('/spj_kategori') }}"><i class="las la-stream" data-toggle="tooltip" data-placement="right" title="SPJ Kategori"></i>SPJ Kategori
                                <div role="status" class="spinner-grow spinner-grow-sm text-info"></div>
                            </a>
                        </li>
                        @endcan
                        @can('spjsubkategori_show')
                        <li>
                            <a class="slide-item" href="{{ url('/spj_subkategori') }}"><i class="las la-stream" data-toggle="tooltip" data-placement="right" title="SPJ Sub-Kategori"></i>SPJ Sub-Kategori
                                <div role="status" class="spinner-grow spinner-grow-sm text-info"></div>
                            </a>
                        </li>
                        @endcan
                        @can('pedoman_show')
                        <li>
                            <a class="slide-item" href="{{ url('/pedomans') }}"><i class="las la-folder" data-toggle="tooltip" data-placement="right" title="Pedoman"></i>Pedoman
                                <div role="status" class="spinner-grow spinner-grow-sm text-warning">
                                </div>
                                <div role="status" class="spinner-grow spinner-grow-sm text-info">
                                </div>
                            </a>
                        </li>
                        @endcan
                        @can('tahun_show')
                        <li><a class="slide-item" href="{{ url('/tahun') }}">Tahun</a></li>
                        @endcan
                        @can('triwulan_show')
                        <li><a class="slide-item" href="{{ url('/triwulan') }}">Triwulan</a>
                        </li>
                        @endcan
                        @can('unit_show')
                        <li><a class="slide-item" href="{{ url('/unit') }}">Unit</a></li>
                        @endcan
                        @can('pagu_show')
                        <li><a class="slide-item" href="{{ url('/pagu') }}">Pagu</a></li>
                        @endcan
                        @can('mak_show')
                        <li><a class="slide-item" href="{{ url('/mak') }}">MAK</a></li>
                        @endcan
                        @can('iku_show')
                        <li><a class="slide-item" href="{{ url('/iku') }}">IKU</a></li>
                        @endcan
                        @can('role_show')
                        <li><a class="slide-item" href="{{ url('/roles') }}">Roles</a></li>
                        @endcan
                        @can('user_show')
                        <li><a class="slide-item" href="{{ url('/user') }}">User</a></li>
                        @endcan
                    </ul>
                </li>

            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </aside>
</div>
<!-- main-sidebar -->