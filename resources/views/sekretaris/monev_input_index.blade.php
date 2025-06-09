@extends('layouts.navbar')
@section('title',
    'Sistem Informasi Manajemen Gereja - Sekretaris Monitoring Input Monev Kegiatan Strategis Sidang
    Jemaat')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sekretaris Monitoring Kegiatan Strategis Sidang Jemaat</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Monitoring Monev</li>
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
                                <h5>Monitoring dan Evaluasi Program </h5>
                                <p class="f-m-light mt-1 mb-0">Daftar Program yang akan dimonitoring dan dievaluasi.</p>
                            </div>
                            <div>
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#inputModal">
                                    Tambah Usulan Program
                                </button> --}}
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
                                            <th>Biaya</th>
                                            <th>Tempat</th>
                                            <th>Waktu Kegiatan</th>
                                            <th>Keterangan Waktu</th>
                                            <th>Keterangan</th>
                                            <th>Status Monev</th>
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

                                                <td>
                                                    @if ($item->status_monev == '1')
                                                        <span class="badge rounded-pill badge-primary">Menunggu<br>Laporan
                                                        </span>
                                                    @elseif ($item->status_monev == '2')
                                                        <span class="badge rounded-pill badge-warning">Menunggu<br>
                                                            Verifikasi Seksi</span>
                                                    @elseif ($item->status_monev == '3')
                                                        <span class="badge rounded-pill badge-success">Laporan Monev
                                                            Terverifikasi</span>
                                                    @elseif ($item->status_monev == '4')
                                                        <span class="badge rounded-pill badge-success">Segera Revisi
                                                            Laporan</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-danger">Undefined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Tombol icon dengan badge -->
                                                    <span role="button"
                                                        class="badge bg-info text-white d-inline-flex align-items-center px-2 py-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#inputMonevModal{{ $item->id }}">
                                                        <i class="fa fa-info-circle me-1"></i> Detail
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Modal section outside table --}}
                            @foreach ($listProgram as $item)
                                <div class="modal fade" id="inputMonevModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $item->id }}">Detail Program:
                                                    {{ $item->nama_kegiatan }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Program Strategis</th>
                                                        <td>{{ $item->program_strategis }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Kegiatan</th>
                                                        <td>{{ $item->nama_kegiatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seksi</th>
                                                        <td>{{ $item->seksi->nama_seksi ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub Seksi</th>
                                                        <td>{{ $item->sub_seksi->nama_sub_seksi ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Indikator</th>
                                                        <td>{{ $item->indikator }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Biaya</th>
                                                        <td>Rp{{ number_format($item->biaya, 0, ',', '.') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tempat</th>
                                                        <td>{{ $item->tempat_kegiatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Waktu Kegiatan</th>
                                                        <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedFormat('l, d F Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedFormat('l, d F Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Keterangan Waktu</th>
                                                        <td>{{ $item->keterangan_waktu }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Keterangan</th>
                                                        <td>{{ $item->keterangan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status Monev</th>
                                                        <td>
                                                            @if ($item->status_monev == '1')
                                                                <span
                                                                    class="badge rounded-pill badge-primary">Menunggu<br>Laporan
                                                                </span>
                                                            @elseif ($item->status_monev == '2')
                                                                <span class="badge rounded-pill badge-warning">Menunggu<br>
                                                                    Verifikasi Seksi</span>
                                                            @elseif ($item->status_monev == '3')
                                                                <span class="badge rounded-pill badge-success">Laporan Monev
                                                                    Terverifikasi</span>
                                                            @elseif ($item->status_monev == '4')
                                                                <span class="badge rounded-pill badge-success">Segera Revisi
                                                                    Laporan</span>
                                                            @else
                                                                <span
                                                                    class="badge rounded-pill badge-danger">Undefined</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
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

{{-- Sweet Alert Sucess Insert --}}
@section('script')

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    buttonsStyling: false, // penting agar customClass aktif
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            });
        </script>
    @endif


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
