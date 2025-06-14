@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Bendahara/Keuangan Jemaat')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Dashboard Keuangan Jemaat</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Bendahara/Keuangan - Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid default-dashboard">
            <div class="row widget-grid">
                <div class="col-xxl-12 col-sm-6 box-col-6">
                    <div class="card profile-box">
                        <div class="card-body">
                            <div class="d-flex media-wrapper justify-content-between">
                                <div class="flex-grow-1">
                                    <div class="greeting-user">
                                        <h2 class="f-w-600">Selamat Datang {{ auth()->user()->name }}!</h2>
                                        <p>Di Website Sistem Informasi Manajemen dan Monev Sidang Jemaat GPM Halong Anugerah, Tuhan Yesus Memberkati.</p>
                                        <div class="whatsnew-btn"><a class="btn btn-outline-white" href="{{ route('keuangan.profile_index') }}"
                                                >View Profile</a></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="clockbox"><svg id="clock" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 600 600">
                                            <g id="face">
                                                <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                                <path class="hour-marks"
                                                    d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                                                </path>
                                                <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                            </g>
                                            <g id="hour">
                                                <path class="hour-hand" d="M300.5 298V142"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="minute">
                                                <path class="minute-hand" d="M300.5 298V67"> </path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="second">
                                                <path class="second-hand" d="M300.5 350V55"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                                </circle>
                                            </g>
                                        </svg></div>
                                    <div class="badge f-10 p-0" id="txt"></div>
                                </div>
                            </div>
                            <div class="cartoon"><img class="img-fluid"
                                    src="{{ asset('cuba/assets/images/dashboard/cartoon.svg') }}"
                                    alt="vector women with leptop">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-3 col-sm-6 box-col-3">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round primary">
                                            <div class="bg-round"><svg class="fill-primary">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                    </use>
                                                </svg><svg class="half-circle svg-fill">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                    </use>
                                                </svg></div>
                                        </div>
                                        <div>
                                            <h1><span class="counter" data-target="45195">{{ $ProgramCount }}</span></h1>
                                            <div class="text-justify">
                                                <span class="f-light">TOTAL PROGRAM YANG DIUSULKAN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-12">
                                <div class="card widget-1">
                                    <div class="card-body">
                                        <div class="widget-content">
                                            <div class="widget-round success">
                                                <div class="bg-round"><svg class="fill-success">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                        </use>
                                                    </svg><svg class="half-circle svg-fill">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                        </use>
                                                    </svg></div>
                                            </div>
                                            <div>
                                                <h1> <span class="counter" data-target="845">{{ $ProgramApprove }}</span>
                                                </h1><span class="f-light">PROGRAM YANG TELAH DITETAPKAN</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-sm-6 box-col-3">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round warning">
                                            <div class="bg-round"><svg class="fill-warning">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                    </use>
                                                </svg><svg class="half-circle svg-fill">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                    </use>
                                                </svg></div>
                                        </div>
                                        <div>
                                            <h1> <span class="counter" data-target="80">{{ $ProgramPending }}</span></h1>
                                            <span class="f-light">PROGRAM SEDANG DIBAHAS DI TIAP SEKSI</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card widget-1">
                                    <div class="card-body">
                                        <div class="widget-content">
                                            <div class="widget-round success">
                                                <div class="bg-round"><svg class="fill-success">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                        </use>
                                                    </svg><svg class="half-circle svg-fill">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                        </use>
                                                    </svg></div>
                                            </div>
                                            <div>
                                                <h1 class="counter" data-target="10905">{{ $MonevVerifikasiAccept }}</h1>
                                                <span class="f-light">PROGRAM YANG SUDAH DIMONEV (TERVERIFIKASI)</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-sm-6 box-col-3">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round warning">
                                            <div class="bg-round"><svg class="fill-warning">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                    </use>
                                                </svg><svg class="half-circle svg-fill">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                    </use>
                                                </svg></div>
                                        </div>
                                        <div>
                                            <h1> <span class="counter" data-target="80">{{ $ProgramPrasidang }}</span>
                                            </h1>
                                            <span class="f-light">PROGRAM SEDANG DIBAHAS PRA SIDANG JEMAAT</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card widget-1">
                                    <div class="card-body">
                                        <div class="widget-content">
                                            <div class="widget-round warning">
                                                <div class="bg-round"><svg class="fill-warning">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                        </use>
                                                    </svg><svg class="half-circle svg-fill">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                        </use>
                                                    </svg></div>
                                            </div>
                                            <div>
                                                <h1 class="counter" data-target="10905">{{ $MonevWaitVerifikasi }}</h1>
                                                <span class="f-light">MONEV PROGRAM MENUNGGU DIVERIFIKASI TIAP SEKSI</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-sm-6 box-col-3">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round secondary">
                                            <div class="bg-round"><svg class="fill-secondary">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                    </use>
                                                </svg><svg class="half-circle svg-fill">
                                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                    </use>
                                                </svg></div>
                                        </div>
                                        <div>
                                            <h1> <span class="counter" data-target="80">{{ $ProgramReject }}</span></h1>
                                            <span class="f-light">PROGRAM YANG DITOLAK</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card widget-1">
                                    <div class="card-body">
                                        <div class="widget-content">
                                            <div class="widget-round warning">
                                                <div class="bg-round"><svg class="fill-warning">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#c-invoice') }}">
                                                        </use>
                                                    </svg><svg class="half-circle svg-fill">
                                                        <use
                                                            href="{{ asset('cuba/assets/svg/icon-sprite.svg#halfcircle') }}">
                                                        </use>
                                                    </svg></div>
                                            </div>
                                            <div>
                                                <h1 class="counter" data-target="10905">{{ $MonevRevisi }}</h1><span
                                                    class="f-light">PROGRAM YANG HARUS REVISI LAPORAN MONEV</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Chart Program -->
                    <div class="col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5>Statistik Usulan Program, Pra Sidang dan Hasil Sidang Jemaat (dalam peresentase)</h5>
                            </div>
                            <div class="card-body">
                                <div id="pieChart" style="height: 500px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Monev -->
                    <div class="col-md-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5>Statistik Monitoring & Evaluasi Program (dalam persentase)</h5>
                            </div>
                            <div class="card-body">
                                <div id="pieChart2" style="height: 500px; width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>









            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

@endsection



@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const options = {
                chart: {
                    type: 'pie',
                    height: 500
                },
                series: [
                    @foreach ($dataProgram as $item)
                        {{ $item->total }},
                    @endforeach
                ],
                labels: [
                    @foreach ($dataProgram as $item)
                        @switch($item->status_usulan)
                            @case(1)
                            'Menunggu Verifikasi',
                            @break

                            @case(2)
                            'Pra Sidang',
                            @break

                            @case(3)
                            'Ditetapkan Sidang',
                            @break

                            @case(4)
                            'Ditolak',
                            @break

                            @default
                                'Unknown',
                        @endswitch
                    @endforeach
                ]
            };



            const chart = new ApexCharts(document.querySelector("#pieChart"), options);
            chart.render();


            // Pie Chart Monev
            const optionsMonev = {
                chart: {
                    type: 'pie',
                    height: 500
                },
                series: [
                    @foreach ($dataMonev as $item)
                        {{ $item->total }},
                    @endforeach
                ],
                labels: [
                    @foreach ($dataMonev as $item)
                        @switch($item->status_monev)
                            @case(1)
                            'Menunggu Laporan Monev',
                            @break

                            @case(2)
                            'Menunggu Verifikasi Seksi',
                            @break

                            @case(3)
                            'Laporan Monev Terverifikasi',
                            @break

                            @case(4)
                            'Laporan Monev Revisi',
                            @break

                            @default
                                'Unknown',
                        @endswitch
                    @endforeach
                ]
            };

            const chartMonev = new ApexCharts(document.querySelector("#pieChart2"), optionsMonev);
            chartMonev.render();


        });
    </script>
@endpush
