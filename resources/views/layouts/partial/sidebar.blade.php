            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                                src="{{ asset('cuba/assets/images/logo/logo.png') }}" alt=""><img
                                class="img-fluid for-dark" src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}"
                                alt=""></a>
                        <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                            </i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                                src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>


                        {{-- ROLE SUB SEKSI --}}
                        @if (Auth::user()->role == '2')
                            <div id="sidebar-menu">

                                <ul class="sidebar-links" id="simple-bar">
                                    <li class="back-btn">
                                        <div class="mobile-back text-end"><span>Back</span><i
                                                class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                                    </li>
                                    <li class="pin-title sidebar-main-title">
                                        <div>
                                            <h6>Pinned</h6>
                                        </div>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                        <a class="sidebar-link sidebar-title link-nav"
                                            href="{{ route('subseksi.dashboard') }}" target="_blank">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                                </use>
                                            </svg><span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-task') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-task') }}">
                                                </use>
                                            </svg><span>Kegiatan<label
                                                    class="badge badge-light-primary">{{ $ProgramCount ?? 0 }}</label></span></a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('subseksi.usulan') }}">Tahap Usulan
                                                    <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('subseksi.usulan_prasidang') }}">Tahap Pra Sidang
                                                    <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramPrasidang ?? 0 }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('subseksi.usulan_disetujui') }}">Tahap Penetapan
                                                    <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('subseksi.usulan_ditolak') }}">Program Ditolak
                                                    <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-charts') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-charts') }}">
                                                </use>
                                            </svg><span>Monev Kegiatan</span></a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('subseksi.monev') }}">Input Monev </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('subseksi.monev_waiting') }}">Menunggu Verifikasi</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('subseksi.monev_approve') }}">Sudah Verifikasi</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('subseksi.monev_revisi_input') }}">Revisi Laporan</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title link-nav"
                                            href="{{ route('subseksi.profile_index') }}">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}">
                                                </use>
                                            </svg><span>Akun anda</span></a>

                                    </li>









                                </ul>

                            </div>
                        @endif

                        {{-- ROLE SEKSI --}}
                        @if (Auth::user()->role == '1')
                            <div id="sidebar-menu">

                                <ul class="sidebar-links" id="simple-bar">
                                    <li class="back-btn">
                                        <div class="mobile-back text-end"><span>Back</span><i
                                                class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                                    </li>
                                    <li class="pin-title sidebar-main-title">
                                        <div>
                                            <h6>Pinned</h6>
                                        </div>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                        <a class="sidebar-link sidebar-title link-nav"
                                            href="{{ route('subseksi.dashboard') }}" target="_blank">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                                </use>
                                            </svg><span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-task') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-task') }}">
                                                </use>
                                            </svg><span>Program Kerja<label
                                                    class="badge badge-light-primary">{{ $ProgramCount ?? 0 }}</label></span></a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a class="submenu-title"
                                                    href="{{ route('seksi.verifikasi') }}">Verifikasi
                                                    <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}
                                                    </span>
                                                    <span class="sub-arrow">
                                                        <i class="fa-solid fa-angle-right"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="submenu-title"
                                                    href="{{ route('seksi.verifikasi_prasidang') }}">Pra Sidang<span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramPrasidang ?? 0 }}</span><span
                                                        class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>
                                            </li>
                                            <li> <a class="submenu-title"
                                                    href="{{ route('seksi.verifikasi_disetujui') }}">Penetapan<span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span><span
                                                        class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>

                                            </li>
                                            <li> <a class="submenu-title"
                                                    href="{{ route('seksi.verifikasi_ditolak') }}">Ditolak<span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span><span
                                                        class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                        <a class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-charts') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-charts') }}">
                                                </use>
                                            </svg>
                                            <span>Monev Program<span
                                                    class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}
                                                </span>
                                            </span>
                                        </a>
                                        <ul class="sidebar-submenu">

                                            <li>
                                                <a class="submenu-title" href="{{ route('seksi.monev') }}">Menunggu
                                                    Verifikasi<span
                                                        class="badge badge-light-secondary float-end">{{ $MonevWaitVerifikasi ?? 0 }}
                                                    </span><span class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>
                                            </li>
                                            <li> <a class="submenu-title"
                                                    href="{{ route('seksi.monev_revisi_index') }}">Revisi Laporan<span
                                                        class="badge badge-light-secondary float-end">{{ $MonevRevisi ?? 0 }}
                                                    </span><span class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>

                                            </li>
                                            <li> <a class="submenu-title"
                                                    href="{{ route('seksi.verif_index') }}">Sudah Verifikasi<span
                                                        class="badge badge-light-secondary float-end">{{ $MonevVerifikasiAccept ?? 0 }}
                                                    </span><span class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>

                                            </li>


                                        </ul>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title"
                                            href="{{ route('subseksi.profile_index') }}">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}">
                                                </use>
                                            </svg><span>Akun anda</span></a>

                                    </li>





                                </ul>

                            </div>
                        @endif

                        {{-- ROLE SEKRETARIS --}}
                        @if (Auth::user()->role == '5')
                            <div id="sidebar-menu">

                                <ul class="sidebar-links" id="simple-bar">
                                    <li class="back-btn">
                                        <div class="mobile-back text-end"><span>Back</span><i
                                                class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                                    </li>
                                    <li class="pin-title sidebar-main-title">
                                        <div>
                                            <h6>Pinned</h6>
                                        </div>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                        <a class="sidebar-link sidebar-title link-nav"
                                            href="{{ route('subseksi.dashboard') }}">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                                </use>
                                            </svg><span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title link-nav"
                                            href="{{ route('sekretaris.program_strategis') }}">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-to-do') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-to-do') }}">
                                                </use>
                                            </svg><span>Program Strategis</span></a>

                                    </li>


                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-task') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-task') }}">
                                                </use>
                                            </svg><span>Program Kerja<label
                                                    class="badge badge-light-primary">{{ $ProgramCount ?? 0 }}</label></span></a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('sekretaris.program_index') }}">Tahap
                                                    Usulan
                                                    <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramPending ?? 0 }}
                                                    </span>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('sekretaris.program_prasidang_index') }}">Tahap Pra
                                                    Sidang <span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramPrasidang ?? 0 }}</span>
                                                </a>
                                            </li>
                                            <li> <a href="{{ route('sekretaris.program_penetapan_index') }}">Tahap
                                                    Penetapan<span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramApprove ?? 0 }}</span></a>

                                            </li>
                                            <li> <a href="{{ route('sekretaris.program_ditolak_index') }}">Program
                                                    Ditolak<span
                                                        class="badge badge-light-secondary float-end">{{ $ProgramReject ?? 0 }}</span></a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-charts') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-charts') }}">
                                                </use>
                                            </svg><span>Monev Program <label
                                                        class="badge badge-light-primary">{{ $ProgramApprove ?? 0 }}
                                                    </label></span></a>
                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('sekretaris.monev_index') }}">Menunggu Input<label
                                                        class="badge badge-light-primary">{{ $MonevWaitInput ?? 0 }}</label></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('sekretaris.monev_waitverifikasi') }}">Menunggu
                                                    Verifikasi<label
                                                        class="badge badge-light-primary">{{ $MonevWaitVerifikasi ?? 0 }}
                                                    </label></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('sekretaris.monev_terverifikasi') }}">Sudah
                                                    Verifikasi
                                                    <label
                                                        class="badge badge-light-primary">{{ $MonevVerifikasiAccept ?? 0 }}
                                                    </label>
                                                </a>

                                            </li>
                                            <li> <a href="{{ route('sekretaris.monev_revisi') }}">Revisi
                                                    Laporan<label
                                                        class="badge badge-light-primary">{{ $MonevRevisi ?? 0 }}
                                                    </label></a>

                                            </li>

                                        </ul>
                                    </li>

                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title" href="#">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-api') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-api') }}">
                                                </use>
                                            </svg><span>Pengaturan</span></a>

                                        <ul class="sidebar-submenu">
                                            <li>
                                                <a href="{{ route('sekretaris.pengaturan_periode_tahun') }}">Tahun<span
                                                        class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('sekretaris.pengaturan_periode_renstra') }}">Periode
                                                    Renstra<span class="sub-arrow"><i
                                                            class="fa-solid fa-angle-right"></i></span></a>
                                            </li>
                                        </ul>

                                    </li>

                                    <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                            class="sidebar-link sidebar-title link-nav"
                                            href="{{ route('sekretaris.profile_index') }}">
                                            <svg class="stroke-icon">
                                                <use
                                                    href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}">
                                                </use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}">
                                                </use>
                                            </svg><span>Akun anda</span></a>

                                    </li>





                                </ul>

                            </div>
                        @endif


                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
