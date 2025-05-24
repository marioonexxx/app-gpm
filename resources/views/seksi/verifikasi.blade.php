@extends('layouts.navbar')
@section('Title', 'Sistem Informasi Manajemen Gereja - Jemaat GPM Halong Anugerah')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Seksi Verifikasi Usulan Program</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
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
                            <h5>Verifikasi usulan program.</h5>
                            <p class="f-m-light mt-1">Seksi melakukan verifikasi usulan program dari masing-masing sub
                                seksi.</p>
                        </div>
                        <div class="card-body">

                            {{-- Table display data --}}
                            <div class="table-responsive">
                                <table id="programTable" class="table table-bordered mt-8">
                                    <thead>
                                        <tr>
                                            <th>Program Strategis</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Seksi</th>
                                            <th>Sub Seksi</th>
                                            <th>Indikator</th>
                                            <th>Biaya</th>
                                            <th>Tempat</th>
                                            <th>Waktu Kegiatan</th>
                                            <th>Keterangan Waktu</th>
                                            <th>Keterangan</th>
                                            <th>Tahun</th>
                                            <th>Periode Renstra</th>
                                            <th>Status Usulan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listProgram as $item)
                                            <tr>
                                                <td>{{ $item->program_strategis }}</td>
                                                <td>{{ $item->nama_kegiatan }}</td>
                                                <td>{{ $item->seksi->nama_seksi ?? '-' }}</td>
                                                <td>{{ $item->sub_seksi->nama_sub_seksi ?? '-' }}</td>
                                                <td>{{ $item->indikator }}</td>
                                                <td>Rp{{ number_format($item->biaya, 0, ',', '.') }}</td>
                                                <td>{{ $item->tempat_kegiatan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedFormat('l, d F Y') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedFormat('l, d F Y') }}
                                                </td>
                                                <td>{{ $item->keterangan_waktu }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->tahun_renstra }}</td>
                                                <td>
                                                    <span class="badge rounded-pill badge-danger">Pending</span>
                                                </td>
                                                <td>

                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $item->id }}"
                                                        class="text-info d-inline-flex align-items-center gap-1"
                                                        title="Lihat Detail">
                                                        <i class="fa-solid fa-circle-info"></i> <span>Detail</span>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach ($listProgram as $item)
                                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail
                                                        Program</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><strong>Program Strategis:</strong>
                                                            {{ $item->program_strategis }}</li>
                                                        <li class="list-group-item"><strong>Nama Kegiatan:</strong>
                                                            {{ $item->nama_kegiatan }}</li>
                                                        <li class="list-group-item"><strong>Seksi:</strong>
                                                            {{ $item->seksi->nama_seksi ?? '-' }}</li>
                                                        <li class="list-group-item"><strong>Sub Seksi:</strong>
                                                            {{ $item->sub_seksi->nama_sub_seksi ?? '-' }}</li>
                                                        <li class="list-group-item"><strong>Indikator:</strong>
                                                            {{ $item->indikator }}</li>
                                                        <li class="list-group-item"><strong>Biaya:</strong>
                                                            Rp{{ number_format($item->biaya, 0, ',', '.') }}</li>
                                                        <li class="list-group-item"><strong>Tempat:</strong>
                                                            {{ $item->tempat_kegiatan }}</li>
                                                        <li class="list-group-item"><strong>Waktu Kegiatan:</strong>
                                                            {{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedFormat('d F Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedFormat('d F Y') }}
                                                        </li>
                                                        <li class="list-group-item"><strong>Keterangan Waktu:</strong>
                                                            {{ $item->keterangan_waktu }}</li>
                                                        <li class="list-group-item"><strong>Keterangan:</strong>
                                                            {{ $item->keterangan }}</li>
                                                        <li class="list-group-item"><strong>Tahun:</strong>
                                                            {{ $item->tahun }}</li>
                                                        <li class="list-group-item"><strong>Periode Renstra:</strong>
                                                            {{ $item->tahun_renstra }}</li>
                                                        <li class="list-group-item"><strong>Status Usulan:</strong>
                                                            {{ $item->status_usulan }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @foreach ($listProgram as $item)
                                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail
                                                    Program</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group mb-3">
                                                    <li class="list-group-item"><strong>Program Strategis:</strong>
                                                        {{ $item->program_strategis }}</li>
                                                    <li class="list-group-item"><strong>Nama Kegiatan:</strong>
                                                        {{ $item->nama_kegiatan }}</li>
                                                    <li class="list-group-item"><strong>Seksi:</strong>
                                                        {{ $item->seksi->nama_seksi ?? '-' }}</li>
                                                    <li class="list-group-item"><strong>Sub Seksi:</strong>
                                                        {{ $item->sub_seksi->nama_sub_seksi ?? '-' }}</li>
                                                    <li class="list-group-item"><strong>Indikator:</strong>
                                                        {{ $item->indikator }}</li>
                                                    <li class="list-group-item"><strong>Biaya:</strong>
                                                        Rp{{ number_format($item->biaya, 0, ',', '.') }}</li>
                                                    <li class="list-group-item"><strong>Tempat:</strong>
                                                        {{ $item->tempat_kegiatan }}</li>
                                                    <li class="list-group-item"><strong>Waktu Kegiatan:</strong>
                                                        {{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedFormat('d F Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedFormat('d F Y') }}
                                                    </li>
                                                    <li class="list-group-item"><strong>Keterangan Waktu:</strong>
                                                        {{ $item->keterangan_waktu }}</li>
                                                    <li class="list-group-item"><strong>Keterangan:</strong>
                                                        {{ $item->keterangan }}</li>
                                                    <li class="list-group-item"><strong>Tahun:</strong> {{ $item->tahun }}
                                                    </li>
                                                    <li class="list-group-item"><strong>Periode Renstra:</strong>
                                                        {{ $item->tahun_renstra }}</li>
                                                    <li class="list-group-item"><strong>Status Usulan:</strong>
                                                        {{ $item->status_usulan }}</li>
                                                </ul>

                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

@endsection
