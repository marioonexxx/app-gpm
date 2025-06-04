@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Program Pra Sidang Jemaat</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Program Pra Sidang Jemaat</li>
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
                                <p class="f-m-light mt-1 mb-0">Silahkan melengkapi data usulan program dari seksi.</p>
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
                                                <td class="text-center">
                                                    <a href="#"
                                                        class="badge bg-info d-inline-flex align-items-center gap-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModal{{ $item->id }}">
                                                        <i class="fa-solid fa-circle-info"></i>Detail
                                                    </a>
                                                </td>

                                            </tr>
                                            <!-- Detail Modal -->
                                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="detailModalLabel{{ $item->id }}">Detail Program:
                                                                {{ $item->nama_kegiatan }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Program
                                                                                Strategis</strong></label>
                                                                        <textarea class="form-control" rows="2" readonly>{{ $item->program_strategis }}</textarea>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Nama
                                                                                Kegiatan</strong></label>
                                                                        <textarea class="form-control" rows="2" readonly>{{ $item->nama_kegiatan }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-label"><strong>Seksi</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $item->seksi->nama_seksi ?? '-' }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Sub
                                                                                Seksi</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $item->sub_seksi->nama_sub_seksi ?? '-' }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-label"><strong>Indikator</strong></label>
                                                                        <textarea class="form-control" rows="3" readonly>{{ $item->indikator }}</textarea>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Kelompok
                                                                                Sasaran</strong></label>
                                                                        <textarea class="form-control" rows="3" readonly>{{ $item->kelompok_sasaran }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-label"><strong>Biaya</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="Rp{{ number_format($item->biaya, 0, ',', '.') }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Tempat
                                                                                Kegiatan</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $item->tempat_kegiatan }}" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Waktu
                                                                                Kegiatan</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ \Carbon\Carbon::parse($item->waktu_mulai)->translatedFormat('l, d F Y') }} - {{ \Carbon\Carbon::parse($item->waktu_selesai)->translatedFormat('l, d F Y') }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Keterangan
                                                                                Waktu</strong></label>
                                                                        <textarea class="form-control" rows="2" readonly>{{ $item->keterangan_waktu }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-label"><strong>Keterangan</strong></label>
                                                                        <textarea class="form-control" rows="2" readonly>{{ $item->keterangan }}</textarea>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label
                                                                            class="form-label"><strong>Tahun</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $item->tahun }}" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Periode
                                                                                Renstra</strong></label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $item->tahun_renstra }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-label"><strong>Status
                                                                                Usulan</strong></label><br>
                                                                        @switch($item->status_usulan)
                                                                            @case('1')
                                                                                <span class="badge rounded-pill bg-success">Tahap
                                                                                    Usulan</span>
                                                                            @break

                                                                            @case('2')
                                                                                <span
                                                                                    class="badge rounded-pill bg-warning text-dark">Tahap
                                                                                    Pra Sidang</span>
                                                                            @break

                                                                            @case('3')
                                                                                <span
                                                                                    class="badge rounded-pill bg-primary">Ditetapkan</span>
                                                                            @break

                                                                            @case('4')
                                                                                <span
                                                                                    class="badge rounded-pill bg-danger">Ditolak</span>
                                                                            @break

                                                                            @default
                                                                                <span
                                                                                    class="badge rounded-pill bg-secondary">Unknown</span>
                                                                        @endswitch
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
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


    <script>
        $(document).ready(function() {
            // Edit button click
            $('.btn-edit').on('click', function() {
                const btn = $(this);
                const modal = $('#editModal');

                modal.find('#edit-program_strategis').val(btn.data('program_strategis'));
                modal.find('#edit-nama_kegiatan').val(btn.data('nama_kegiatan'));
                modal.find('#edit-seksi_id').val(btn.data('seksi_id'));
                modal.find('#edit-sub_seksi_id').val(btn.data('sub_seksi_id'));
                modal.find('#edit-indikator').val(btn.data('indikator'));
                modal.find('#edit-biaya').val(btn.data('biaya'));
                modal.find('#edit-tempat_kegiatan').val(btn.data('tempat_kegiatan'));
                modal.find('#edit-waktu_mulai').val(btn.data('waktu_mulai'));
                modal.find('#edit-waktu_selesai').val(btn.data('waktu_selesai'));
                modal.find('#edit-keterangan_waktu').val(btn.data('keterangan_waktu'));
                modal.find('#edit-keterangan').val(btn.data('keterangan'));
                modal.find('#edit-tahun').val(btn.data('tahun'));
                modal.find('#edit-tahun_renstra').val(btn.data('tahun_renstra'));

                $('#editForm').attr('action', '/subseksi/usulan/' + btn.data('id'));
            });

            // Delete button click
            $('.delete a').on('click', function(e) {
                e.preventDefault();
                const btn = $(this);
                const id = btn.closest('tr').find('.btn-edit').data('id');
                $('#deleteForm').attr('action', '/subseksi/usulan/' + id);
                $('#deleteModal').modal('show');
            });
        });
    </script>



@endsection
