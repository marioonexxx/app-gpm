@extends('layouts.navbar')
@section('Title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sub Seksi Mengsulkan Program</h3>
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
