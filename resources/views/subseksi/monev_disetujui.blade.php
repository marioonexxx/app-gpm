@extends('layouts.navbar')
@section('Title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sub Seksi - Menunggu Verifikasi Hasil Monev</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Menunggu Verifikasi</li>
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
                                <h5>Program Kerja Sub Seksi</h5>
                                <p class="f-m-light mt-1 mb-0">Data Program Kerja</p>
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
                                            <th>Kelompok Sasaran</th>
                                            <th>Kesuaian Waktu</th>
                                            <th>Realisasi Anggaran</th>
                                            <th>Tingkat Kesesuaian Penggunaan Anggaran</th>
                                            <th>Tingkat Partisipasi</th>
                                            <th>Output Kegiatan</th>
                                            <th>Kendala Pelaksanaan</th>
                                            <th>Rencana Tindak Lanjut</th>
                                            <th>Laporan</th>
                                            <th>Status Monev</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listMonev as $item)
                                            <tr>
                                                <td>{{ $item->program->program_strategis ?? '-' }}</td>
                                                <td>{{ $item->program->nama_kegiatan ?? '-' }}</td>
                                                <td>{{ $item->program->kelompok_sasaran ?? '-' }}</td>
                                                <td>{{ $item->kesesuaian_waktu }}</td>
                                                <td>{{ $item->realisasi_anggaran }}</td>

                                                <td>{{ $item->tingkat_kes_anggaran }}</td>
                                                <td>{{ $item->tingkat_par_jemaat }}</td>
                                                <td>{{ $item->output_kegiatan }}</td>
                                                <td>{{ $item->kendala }}</td>
                                                <td>{{ $item->rencana_tin_lanjut }}</td>
                                                <td>
                                                    @if ($item->upload_laporan)
                                                        <a href="{{ asset('storage/' . $item->upload_laporan) }}"
                                                            target="_blank" title="Lihat Laporan"
                                                            class="d-inline-flex align-items-center gap-1 text-danger">
                                                            <i class="fa-solid fa-file-pdf fa-lg"></i>
                                                            <span>Download</span>
                                                        </a>
                                                    @else
                                                        <i class="fa-solid fa-ban text-muted" title="Tidak ada file"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->program->status_monev == 'Menunggu Verifikasi')
                                                        <span class="badge rounded-pill badge-warning">Menunggu<br>Verifikasi</span>
                                                    @elseif ($item->program->status_monev == 'Menunggu')
                                                        <span class="badge rounded-pill badge-danger">Ditolak</span>
                                                    @elseif ($item->program->status_monev == 'Disetujui')
                                                        <span class="badge rounded-pill badge-success">Disetujui</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-secondary">Menunggu Revisi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="#" class="btn-edit">

                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                            </a>
                                                        </li>
                                                        <li class="delete"><a href="#"><i
                                                                    class="fa-solid fa-trash-can"></i></a></li>
                                                        <li class="delete">
                                                    </ul>
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
