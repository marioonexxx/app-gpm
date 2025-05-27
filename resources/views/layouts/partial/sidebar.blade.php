            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light"
                                src="{{ asset('cuba/assets/images/logo/logo2.png') }}" alt=""><img
                                class="img-fluid for-dark" src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}"
                                alt=""></a>
                        <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                                data-feather="grid"></i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                                src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                            {{-- ROLE SEKSI --}}
                            @if (Auth::user()->role == '1')
                                <div id="sidebar-menu">
                                    <ul class="sidebar-links" id="simple-bar">

                                        <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                                    src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}"
                                                    alt=""></a>
                                            <div class="mobile-back text-end"><span>Back</span><i
                                                    class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                                        </li>

                                        <li class="pin-title sidebar-main-title">
                                            <div>
                                                <h6>Pinned</h6>
                                            </div>
                                        </li>

                                        <li class="sidebar-list">
                                            <i class="fa-solid fa-thumbtack"></i>
                                            <a class="sidebar-link sidebar-title link-nav"
                                                href="{{ route('seksi.dashboard') }}">
                                                <i data-feather="home"></i>
                                                <span>Dashboard</span></a>
                                        </li>
                                        <li class="sidebar-main-title">
                                            <div>
                                                <h6>PROGRAM KERJA</h6>
                                            </div>
                                        </li>

                                        <li class="sidebar-list">
                                            <i class="fa-solid fa-thumbtack"></i>
                                            <label class="badge badge-light-primary">{{ $ProgramCount ?? 0 }}</label>
                                            <a class="sidebar-link sidebar-title" href="#">
                                                <i data-feather="file-text"></i>
                                                <span>Program </span>
                                            </a>

                                            <ul class="sidebar-submenu">
                                                <li>
                                                    <a href="{{ route('seksi.verifikasi') }}">Verifikasi <span class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}</span>
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('seksi.verifikasi_disetujui') }}">Penetapan <span class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span></a>
                                                </li>
                                                <li><a href="{{ route('seksi.verifikasi_ditolak') }}">Ditolak <span class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span></a></li>

                                            </ul>
                                        </li>
                                        <li class="sidebar-list">
                                            <i class="fa-solid fa-thumbtack"></i>
                                            <label class="badge badge-light-primary">{{ $ProgramCount ?? 0 }}</label>
                                            <a class="sidebar-link sidebar-title" href="#">
                                                <i data-feather="file-text"></i>
                                                <span>Monev </span>
                                            </a>

                                            <ul class="sidebar-submenu">
                                                <li>
                                                    <a href="{{ route('seksi.verifikasi') }}">Verifikasi<span class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}</span>
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('seksi.verifikasi_disetujui') }}">Disetujui<span class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span></a>
                                                </li>
                                                <li><a href="{{ route('seksi.verifikasi_ditolak') }}">Revisi<span class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span></a></li>

                                            </ul>
                                        </li>     

                                        <li class="sidebar-main-title">
                                            <div>
                                                <h6>PENGATURAN AKUN</h6>
                                            </div>
                                        </li>

                                        <li class="sidebar-list">
                                            <i class="fa-solid fa-thumbtack"></i>
                                            <a class="sidebar-link sidebar-title link-nav" href="file-manager.html">
                                                <i data-feather="users"></i>
                                                <span>Profil</span></a>
                                        </li>




                                    </ul>
                                </div>
                            @endif

                            {{-- ROLE SUB SEKSI --}}
                            @if (Auth::user()->role == '2')
                                <div id="sidebar-menu">
                                    <ul class="sidebar-links" id="simple-bar">

                                        <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                                    src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}"
                                                    alt=""></a>
                                            <div class="mobile-back text-end"><span>Back</span><i
                                                    class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                                        </li>

                                        <li class="pin-title sidebar-main-title">
                                            <div>
                                                <h6>Pinned</h6>
                                            </div>
                                        </li>
                                        <li class="sidebar-main-title">
                                            <div>
                                                <h6>PROGRAM KERJA</h6>
                                            </div>
                                        </li>

                                        <li class="sidebar-list">
                                            <i class="fa-solid fa-thumbtack"></i>
                                            <label class="badge badge-light-primary">{{ $ProgramCount ?? 0 }}</label>
                                            <a class="sidebar-link sidebar-title" href="#">
                                                <svg class="stroke-icon">
                                                    <use
                                                        href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-files') }}">
                                                    </use>
                                                </svg>
                                                <svg class="fill-icon">
                                                    <use
                                                        href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-edit') }}">
                                                    </use>
                                                </svg>
                                                <span>Program </span>
                                            </a>

                                            <ul class="sidebar-submenu">
                                                <li><a href="{{ route('subseksi.usulan') }}">Usulan<span class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}</span></a></li>
                                                <li><a href="{{ route('subseksi.usulan_disetujui') }}">Penetapan<span class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span></a></li>
                                                <li><a href="{{ route('subseksi.usulan_ditolak') }}">Ditolak<span class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span></a></li>

                                            </ul>

                                            <a class="sidebar-link sidebar-title" href="#">
                                                <svg class="stroke-icon">
                                                    <use
                                                        href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                                    </use>
                                                </svg>
                                                <svg class="fill-icon">
                                                    <use
                                                        href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                                    </use>
                                                </svg>
                                                <span>Monev</span>
                                            </a>

                                            <ul class="sidebar-submenu">
                                                <li><a href="{{ route('subseksi.monev') }}">Input Monev<span class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}</span></a></li>
                                                <li><a href="{{ route('subseksi.monev_waiting') }}">Menunggu Verifikasi<span class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span></a></li>
                                                <li><a href="{{ route('subseksi.usulan_ditolak') }}">Terverifikasi<span class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span></a></li>

                                            </ul>
                                        </li>
                                        
                                        

                                        

                                        

                                        <li class="sidebar-main-title">
                                            <div>
                                                <h6>PENGATURAN AKUN</h6>
                                            </div>
                                        </li>

                                        <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                                class="sidebar-link sidebar-title link-nav"
                                                href="file-manager.html"><svg class="stroke-icon">
                                                    <use
                                                        href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-file') }}">
                                                    </use>
                                                </svg><svg class="fill-icon">
                                                    <use
                                                        href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-file') }}">
                                                    </use>
                                                </svg><span>Profil</span></a></li>




                                    </ul>
                                </div>
                            @endif

                            {{-- ROLE KEUANGAN --}}

                            @if (Auth::user()->role == '3')
                            @endif

                            {{-- ROLE LITBANG --}}
                            @if (Auth::user()->role == '4')
                            @endif


                            {{-- ROLE SEKRETARIS --}}
                            @if (Auth::user()->role == '5')
                            @endif

                            {{-- ROLE ADMINISTRATOR --}}
                            @if (Auth::user()->role == '0')
                            @endif







                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
