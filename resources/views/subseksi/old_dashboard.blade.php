@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Dashboard Sub Seksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Dashboard Subseksi</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Sample Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Program</h5>
                            <p class="f-m-light mt-1">Data statistik program yang ditampilkan dalam berbagai chart/diagram.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div id="pieChart" style="height: 350px; width: 100%; max-width: 400px;"></div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div id="pieChart2" style="height: 350px; width: 100%; max-width: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Program</h5>
                            <p class="f-m-light mt-1">Data statistik program yang ditampilkan dalam berbagai chart/diagram.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div id="pieChart" style="height: 350px; width: 100%; max-width: 400px;"></div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div id="pieChart2" style="height: 350px; width: 100%; max-width: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <h5>Data Statistik Monitoring dan Evaluasi</h5>
                            <p class="f-m-light mt-1">Data statistik monitoring dan evaluasi program yang ditampilkan dalam berbagai chart/diagram.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div id="pieChart" style="height: 350px; width: 100%; max-width: 400px;"></div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div id="pieChart2" style="height: 350px; width: 100%; max-width: 400px;"></div>
                                </div>
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
                    type: 'pie'
                },
                series: [
                    @foreach ($data as $item)
                        {{ $item->total }},
                    @endforeach
                ],
                labels: [
                    @foreach ($data as $item)
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

            const chart2 = new ApexCharts(document.querySelector("#pieChart2"), options);
            chart2.render();
        });
    </script>
@endpush
