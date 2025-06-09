@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sekretaris - Daftar Program Yang Diusulkan</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Usulan Program</li>
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
                        <div class="card-header d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div>
                                <h5>Usulan Program</h5>
                                <p class="f-m-light mt-1 mb-0">Tabel daftar usulan program dari semua seksi.</p>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tombol trigger modal -->
                            {{-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#inputModal">
                                Tambah Usulan Program
                            </button> --}}

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
                                            <th>Kelompok Sasaran</th>
                                            <th>Biaya</th>
                                            <th>Tempat</th>
                                            <th>Waktu Kegiatan</th>
                                            <th>Keterangan Waktu</th>
                                            <th>Keterangan</th>
                                            <th>Tahun</th>
                                            <th>Periode Renstra</th>
                                            <th>Status Usulan</th>
                                            
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
                                                <td>{{ $item->kelompok_sasaran }}</td>
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
                                                    @if ($item->status_usulan == '1')
                                                        <span class="badge rounded-pill badge-primary">Tahap Usulan</span>
                                                    @elseif ($item->status_usulan == '2')
                                                        <span class="badge rounded-pill badge-success">Tahap Pra
                                                            Sidang</span>
                                                    @elseif ($item->status_usulan == '3')
                                                        <span class="badge rounded-pill badge-success">Ditetapkan
                                                        </span>
                                                    @elseif ($item->status_usulan == '4')
                                                        <span class="badge rounded-pill badge-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-secondary">Unknown</span>
                                                    @endif
                                                </td>                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection


@section('script')  
    <script>
        $(document).ready(function() {
            // Cegah reinitialisasi
            if (!$.fn.DataTable.isDataTable('#programTable')) {
                $('#programTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>
@endsection






