@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Sekretaris Manajemen Akun Seksi dan Sub Seksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sekretaris Manajemen Akun Seksi dan Sub Seksi</h3>
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
                <div class="col-sm-12">

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


