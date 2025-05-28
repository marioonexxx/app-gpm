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
                                            <th>Detail Program</th>
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
                                                    @if ($item->status_usulan == '1')
                                                        <span class="badge rounded-pill badge-success">Menunggu
                                                            Verifikasi</span>
                                                    @elseif ($item->status_usulan == '2')
                                                        <span class="badge rounded-pill badge-danger">Tahap Pra
                                                            Sidang</span>
                                                    @elseif ($item->status_usulan == '3')
                                                        <span class="badge rounded-pill badge-success">Ditetapkan
                                                            Sidang</span>
                                                    @elseif ($item->status_usulan == '4')
                                                        <span class="badge rounded-pill badge-success">Ditolak</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-secondary">Unknown</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#"
                                                        class="badge bg-info text-white d-inline-flex align-items-center"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $item->id }}"
                                                        style="cursor: pointer;">
                                                        <i class="fa-solid fa-circle-info me-1"></i> Detail
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                                                <div class="container-fluid">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Program
                                                                    Strategis</strong></label>
                                                            <textarea class="form-control" readonly rows="2">{{ $item->program_strategis }}</textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Nama Kegiatan</strong></label>
                                                            <textarea class="form-control" readonly rows="2">{{ $item->nama_kegiatan }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Seksi</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->seksi->nama_seksi ?? '-' }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Sub Seksi</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->sub_seksi->nama_sub_seksi ?? '-' }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Indikator</strong></label>
                                                            <textarea class="form-control" readonly rows="4">{{ $item->indikator }}</textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Biaya</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="Rp{{ number_format($item->biaya, 0, ',', '.') }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Tempat
                                                                    Kegiatan</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->tempat_kegiatan }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Waktu
                                                                    Kegiatan</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedFormat('d F Y') }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Keterangan
                                                                    Waktu</strong></label>
                                                            <textarea class="form-control" readonly>{{ $item->keterangan_waktu }}</textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Keterangan</strong></label>
                                                            <textarea class="form-control" readonly rows="4">{{ $item->keterangan }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Tahun</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->tahun }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label"><strong>Periode
                                                                    Renstra</strong></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->tahun_renstra }}" readonly>
                                                        </div>
                                                    </div>

                                                    {{-- Form Update Status --}}
                                                    <form action="{{ route('seksi.verifikasi_update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row align-items-end">
                                                            <div class="col-md-6">
                                                                <label for="status_usulan_{{ $item->id }}"
                                                                    class="form-label"><strong>Update Status
                                                                        Usulan</strong></label>
                                                                <select name="status_usulan"
                                                                    id="status_usulan_{{ $item->id }}"
                                                                    class="form-select" required>
                                                                    <option value="">-- Pilih Status --</option>                                                                    
                                                                    <option value="2" {{ $item->status_usulan == '2' ? 'selected' : '' }}>Pra Sidang</option>
                                                                    <option value="4" {{ $item->status_usulan == '4' ? 'selected' : '' }}>Tolak</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 text-end">
                                                                <button type="submit"
                                                                    class="btn btn-success mt-4 d-inline-flex align-items-center gap-2">
                                                                    <i class="fa-solid fa-check-circle"></i> VERIFIKASI
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
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

@section('script')

    {{-- Sweetalert --}}
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
