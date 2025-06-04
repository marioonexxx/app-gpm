@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Seksi Melakukan Input Data Monitoring dan Evaluasi Program</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Monev Program</li>
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
                                                        <span class="badge rounded-pill badge-success">Segera Revisi Laporan</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-danger">Undefined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Tombol -->
                                                    <span class="badge bg-primary p-2" role="button" data-bs-toggle="modal"
                                                        data-bs-target="#inputMonevModal{{ $item->id }}">
                                                        <i class="fa fa-edit"></i> Input
                                                    </span>

                                                </td>
                                            </tr>


                                            <!-- Modal -->
                                            <div class="modal fade" id="inputMonevModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    {{-- <form action="{{ route('monev.store') }}" method="POST" --}}
                                                    <form action="{{ route('subseksi.monev_store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="program_id"
                                                            value="{{ $item->id }}">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Input Data Monitoring dan Evaluasi
                                                                    Program</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row g-3">
                                                                    <div class="col-md-6">
                                                                        <label>Kesesuaian Waktu</label>
                                                                        <select name="kesesuaian_waktu" class="form-control"
                                                                            required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="LEBIH AWAL DARI JADWAL">LEBIH
                                                                                AWAL
                                                                                DARI JADWAL</option>
                                                                            <option value="SESUAI JADWAL">SESUAI JADWAL
                                                                            </option>
                                                                            <option value="TERLAMBAT MELEWATI JADWAL">
                                                                                TERLAMBAT
                                                                                MELEWATI JADWAL</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Realisasi Anggaran</label>
                                                                        <input type="number" name="realisasi_anggaran"
                                                                            class="form-control"
                                                                            placeholder="Masukkan angka (Rp)" required>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label>Tingkat Kesesuaian Anggaran</label>
                                                                        <select name="tingkat_kes_anggaran"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="Defisit">Defisit</option>
                                                                            <option value="Sesuai">Sesuai</option>
                                                                            <option value="Sisa Saldo">Sisa Saldo</option>
                                                                            <option value="Nihil">Nihil</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Tingkat Partisipasi Jemaat</label>
                                                                        <select name="tingkat_par_jemaat"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="Sangat Kurang">Sangat Kurang
                                                                            </option>
                                                                            <option value="Kurang">Kurang</option>
                                                                            <option value="Baik">Baik</option>
                                                                            <option value="Sangat Baik">Sangat Baik</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label>Output Kegiatan</label>
                                                                        <textarea name="output_kegiatan" class="form-control" rows="2" required></textarea>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Kendala</label>
                                                                        <textarea name="kendala" class="form-control" rows="2"></textarea>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Rencana Tindak Lanjut</label>
                                                                        <textarea name="rencana_tin_lanjut" class="form-control" rows="2"></textarea>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Upload Laporan (PDF maks 5MB)</label>
                                                                        <input type="file" name="upload_laporan"
                                                                            accept="application/pdf" class="form-control"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success"> <i
                                                                        class="fa fa-save me-1"> </i> Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
