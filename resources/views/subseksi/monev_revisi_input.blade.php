@extends('layouts.navbar')
@section('Title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sub Seksi - Revisi Laporan Monitoring dan Evaluasi Program</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Revisi Laporan</li>
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
                                            <th>Catatan Revisi</th>
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
                                                <td><span class="badge bg-danger">{{ $item->program->monev_revisi }}</span>
                                                </td>

                                                <td>
                                                    @if ($item->program->status_monev == '1')
                                                        <span class="badge rounded-pill badge-primary">Menunggu<br>Laporan
                                                        </span>
                                                    @elseif ($item->program->status_monev == '2')
                                                        <span class="badge rounded-pill badge-warning">Menunggu<br>
                                                            Verifikasi Seksi</span>
                                                    @elseif ($item->program->status_monev == '3')
                                                        <span class="badge rounded-pill badge-success">Laporan Monev
                                                            Terverifikasi</span>
                                                    @elseif ($item->program->status_monev == '4')
                                                        <span class="badge rounded-pill badge-success">Segera Revisi
                                                            Laporan</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-danger">Undefined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="#" class="badge bg-primary text-white"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editModal{{ $item->id }}">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>

                                                        </li>

                                                    </ul>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <form action="{{ route('subseksi.monev_update_revisi', $item->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editModalLabel{{ $item->id }}">Edit Data MONEV
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form Inputs -->
                                                                <div class="mb-3">
                                                                    <label for="kesesuaian_waktu{{ $item->id }}"
                                                                        class="form-label">Kesesuaian Waktu</label>
                                                                    <input type="text" class="form-control"
                                                                        id="kesesuaian_waktu{{ $item->id }}"
                                                                        name="kesesuaian_waktu"
                                                                        value="{{ $item->kesesuaian_waktu }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="realisasi_anggaran{{ $item->id }}"
                                                                        class="form-label">Realisasi Anggaran</label>
                                                                    <input type="number" class="form-control"
                                                                        name="realisasi_anggaran"
                                                                        value="{{ $item->realisasi_anggaran }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="tingkat_kes_anggaran{{ $item->id }}"
                                                                        class="form-label">Tingkat Kesesuaian
                                                                        Anggaran</label>
                                                                    <input type="text" class="form-control"
                                                                        name="tingkat_kes_anggaran"
                                                                        value="{{ $item->tingkat_kes_anggaran }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="tingkat_par_jemaat{{ $item->id }}"
                                                                        class="form-label">Tingkat Partisipasi
                                                                        Jemaat</label>
                                                                    <input type="text" class="form-control"
                                                                        name="tingkat_par_jemaat"
                                                                        value="{{ $item->tingkat_par_jemaat }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="output_kegiatan{{ $item->id }}"
                                                                        class="form-label">Output Kegiatan</label>
                                                                    <textarea class="form-control" name="output_kegiatan">{{ $item->output_kegiatan }}</textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="kendala{{ $item->id }}"
                                                                        class="form-label">Kendala</label>
                                                                    <textarea class="form-control" name="kendala">{{ $item->kendala }}</textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="rencana_tin_lanjut{{ $item->id }}"
                                                                        class="form-label">Rencana Tindak Lanjut</label>
                                                                    <textarea class="form-control" name="rencana_tin_lanjut">{{ $item->rencana_tin_lanjut }}</textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="upload_laporan{{ $item->id }}"
                                                                        class="form-label">Upload Laporan (PDF)</label>
                                                                    <input type="file" class="form-control"
                                                                        name="upload_laporan" accept="application/pdf">
                                                                    <small class="text-muted">File maksimal 5MB</small>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Simpan
                                                                    Perubahan</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
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
