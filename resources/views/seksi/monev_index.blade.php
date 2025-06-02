@extends('layouts.navbar')
@section('Title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Seksi - Melakukan Verifikasi Laporan Monitoring dan Evaluasi</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Verifikasi Laporan Monev</li>
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
                                <h5>Data Laporan Monev</h5>
                                <p class="f-m-light mt-1 mb-0">Harap melakukan pemeriksaan laporan monitoring dan evaluasi
                                    dengan teliti.</p>
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
                                            <th>Catatan Revisi (Jika Ada)</th>
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
                                                <td>{{ 'Rp ' . number_format($item->realisasi_anggaran, 0, ',', '.') }}</td>

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
                                                <td>{{ $item->program->monev_revisi }}</td>
                                                <td>
                                                    @if ($item->program->status_monev == '1')
                                                        <span class="badge rounded-pill badge-primary">Menunggu<br>Laporan
                                                        </span>
                                                    @elseif ($item->program->status_monev == '2')
                                                        <span class="badge rounded-pill badge-warning">Menunggu
                                                            Verifikasi</span>
                                                    @elseif ($item->program->status_monev == '3')
                                                        <span class="badge rounded-pill badge-success">Laporan Monev
                                                            Terverifikasi</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-danger">Undefined</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form id="verifikasi-form-{{ $item->program->id }}"
                                                        action="{{ route('seksi.verifikasi_monev', $item->program->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <div class="d-flex flex-wrap gap-1">
                                                        <button type="button"
                                                            class="badge bg-success border-0 btn-verifikasi"
                                                            data-id="{{ $item->program->id }}">
                                                            <i class="fa-solid fa-check-circle me-1"></i> Verifikasi
                                                        </button>
                                                        <button type="button" class="badge bg-danger border-0 btn-revisi"
                                                            data-id="{{ $item->program->id }}">
                                                            <i class="fa-solid fa-rotate-left me-1"></i> Revisi
                                                        </button>
                                                        <button type="button"
                                                            class="badge bg-info border-0 d-inline-flex align-items-center gap-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detailModal{{ $item->id }}">
                                                            <i class="fa-solid fa-circle-info"></i> Detail
                                                        </button>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach ($listMonev as $item)
                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail
                                                        Laporan MONEV</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th>Program Strategis</th>
                                                                <td>{{ $item->program->program_strategis ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama Kegiatan</th>
                                                                <td>{{ $item->program->nama_kegiatan ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kelompok Sasaran</th>
                                                                <td>{{ $item->program->kelompok_sasaran ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kesesuaian Waktu</th>
                                                                <td>{{ $item->kesesuaian_waktu }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Realisasi Anggaran</th>
                                                                 <td>{{ 'Rp ' . number_format($item->realisasi_anggaran, 0, ',', '.') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tingkat Kesesuaian Penggunaan Anggaran</th>
                                                                <td>{{ $item->tingkat_kes_anggaran }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tingkat Partisipasi Jemaat</th>
                                                                <td>{{ $item->tingkat_par_jemaat }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Output Kegiatan</th>
                                                                <td>{{ $item->output_kegiatan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kendala Pelaksanaan</th>
                                                                <td>{{ $item->kendala }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Rencana Tindak Lanjut</th>
                                                                <td>{{ $item->rencana_tin_lanjut }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Laporan</th>
                                                                <td>
                                                                    @if ($item->upload_laporan)
                                                                        <a href="{{ asset('storage/' . $item->upload_laporan) }}"
                                                                            target="_blank" class="text-danger">
                                                                            <i class="fa-solid fa-file-pdf me-1"></i>
                                                                            Download
                                                                        </a>
                                                                    @else
                                                                        <i class="fa-solid fa-ban text-muted"></i> Tidak ada
                                                                        file
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Catatan Revisi</th>
                                                                <td>
                                                                    @if (!empty($item->program->monev_revisi))
                                                                        <span
                                                                            class="badge bg-danger">{{ $item->program->monev_revisi }}</span>
                                                                    @else
                                                                        <span class="text-muted">-</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status MONEV</th>
                                                                <td>
                                                                    @if ($item->program->status_monev == '1')
                                                                        <span class="badge bg-primary">Menunggu
                                                                            Laporan</span>
                                                                    @elseif ($item->program->status_monev == '2')
                                                                        <span class="badge bg-warning">Menunggu
                                                                            Verifikasi</span>
                                                                    @elseif ($item->program->status_monev == '3')
                                                                        <span class="badge bg-success">Laporan
                                                                            Terverifikasi</span>
                                                                    @else
                                                                        <span class="badge bg-secondary">Undefined</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach





                                <!-- Modal Revisi -->
                                <div class="modal fade" id="modalRevisi" tabindex="-1" aria-labelledby="modalRevisiLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="formRevisi" method="POST"
                                            action="{{ route('seksi.verifikasi_input_revisi') }}">
                                            @csrf
                                            <input type="hidden" name="program_id" id="modalProgramId">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalRevisiLabel">Catatan Revisi Laporan
                                                        Monev</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="catatanRevisi" class="form-label">Catatan
                                                            Revisi</label>
                                                        <textarea class="form-control" name="monev_revisi" id="catatanRevisi" rows="4" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Kirim Revisi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-revisi').forEach(button => {
                button.addEventListener('click', function() {
                    const programId = this.getAttribute('data-id');
                    document.getElementById('modalProgramId').value = programId;
                    document.getElementById('catatanRevisi').value = '';
                    const modal = new bootstrap.Modal(document.getElementById('modalRevisi'));
                    modal.show();
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Verifikasi (sudah ada)
            document.querySelectorAll('.btn-verifikasi').forEach(button => {
                button.addEventListener('click', function() {
                    const programId = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Yakin ingin memverifikasi?',
                        text: "Laporan ini akan disetujui sebagai hasil Monev.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, verifikasi!',
                        cancelButtonText: 'Batal',
                        customClass: {
                            confirmButton: 'btn btn-success me-2',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`verifikasi-form-${programId}`)
                                .submit();
                        }
                    });
                });
            });
        });
    </script>
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
