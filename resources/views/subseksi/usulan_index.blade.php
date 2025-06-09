@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Sub Seksi Melakukan Usulan Kegiatan')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sub Seksi Mengsulkan Kegiatan</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Usulan Kegiatan</li>
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
                                <h5>Tabel Usulan Kegiatan</h5>
                                
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#inputModal">
                                    <i class="fas fa-plus-circle me-1"></i> Tambah Usulan
                                </button>
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
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit">
                                                            <a href="#" class="btn-edit"
                                                                data-id="{{ $item->id }}"
                                                                data-program_strategis="{{ $item->program_strategis }}"
                                                                data-nama_kegiatan="{{ $item->nama_kegiatan }}"
                                                                data-seksi_id="{{ $item->seksi_id }}"
                                                                data-sub_seksi_id="{{ $item->sub_seksi_id ?? '' }}"
                                                                data-indikator="{{ $item->indikator }}"
                                                                data-biaya="{{ $item->biaya }}"
                                                                data-kelompok_sasaran="{{ $item->kelompok_sasaran }}"
                                                                data-tempat_kegiatan="{{ $item->tempat_kegiatan }}"
                                                                data-waktu_mulai="{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('Y-m-d\TH:i') }}"
                                                                data-waktu_selesai="{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('Y-m-d\TH:i') }}"
                                                                data-keterangan_waktu="{{ $item->keterangan_waktu ?? '' }}"
                                                                data-keterangan="{{ $item->keterangan ?? '' }}"
                                                                data-tahun="{{ $item->tahun }}"
                                                                data-tahun_renstra="{{ $item->tahun_renstra }}"
                                                                data-bs-toggle="modal" data-bs-target="#editModal">
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


                            <!-- Input Modal -->
                            <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form id="inputForm" method="POST" action="{{ route('subseksi.usulan_store') }}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="inputModalLabel">Tambah Usulan Program Baru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-program_strategis" class="form-label">Program
                                                            Strategis</label>
                                                        {{-- <textarea rows="2" name="program_strategis" class="form-control" id="input-program_strategis" required></textarea> --}}
                                                        <select name="program_strategis" id="input-program_strategis"
                                                            class="form-select" required>
                                                            <option value="">-- Pilih Program Strategis --</option>
                                                            @foreach ($listProgramStrategis as $list)
                                                                <option value="{{ $list->nama_program }}">
                                                                    {{ $list->nama_program }}</option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-nama_kegiatan" class="form-label">Nama
                                                            Kegiatan</label>
                                                        <textarea rows="2" name="nama_kegiatan" class="form-control" id="input-nama_kegiatan" required> </textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-seksi_id" class="form-label">Seksi</label>
                                                        <select name="seksi_id" id="input-seksi_id" class="form-select"
                                                            required>
                                                            <option value="">-- Pilih Seksi --</option>
                                                            @foreach ($seksiList as $seksi)
                                                                <option value="{{ $seksi->id }}">
                                                                    {{ $seksi->nama_seksi }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-sub_seksi_id" class="form-label">Sub
                                                            Seksi</label>
                                                        <select name="sub_seksi_id" id="input-sub_seksi_id"
                                                            class="form-select">
                                                            <option value="">-- Pilih Sub Seksi --</option>
                                                            @foreach ($subSeksiList as $subSeksi)
                                                                <option value="{{ $subSeksi->id }}">
                                                                    {{ $subSeksi->nama_sub_seksi }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-indikator" class="form-label">Indikator</label>
                                                        <textarea name="indikator" class="form-control" id="input-indikator" rows="2"></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-kelompok-sasaran" class="form-label">Kelompok
                                                            Sasaran</label>
                                                        <textarea name="kelompok_sasaran" class="form-control" id="input-biaya" rows="2" required></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-biaya" class="form-label">Biaya</label>
                                                        <input type="number" name="biaya" class="form-control"
                                                            id="input-biaya" required>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-tempat_kegiatan" class="form-label">Tempat
                                                            Kegiatan</label>
                                                        <input type="text" name="tempat_kegiatan" class="form-control"
                                                            id="input-tempat_kegiatan">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-waktu_mulai" class="form-label">Waktu
                                                            Mulai</label>
                                                        <input type="date" name="waktu_mulai"
                                                            class="form-control" id="input-waktu_mulai" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-waktu_selesai" class="form-label">Waktu
                                                            Selesai</label>
                                                        <input type="date" name="waktu_selesai"
                                                            class="form-control" id="input-waktu_selesai" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-keterangan_waktu" class="form-label">Keterangan
                                                            Waktu</label>
                                                        <textarea name="keterangan_waktu" class="form-control" id="input-keterangan_waktu" rows="2"></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-keterangan"
                                                            class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" class="form-control" id="input-keterangan" rows="2"></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-tahun" class="form-label">Tahun</label>
                                                        <input type="number" name="tahun" class="form-control"
                                                            id="input-tahun" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="input-tahun_renstra" class="form-label">Periode
                                                            Renstra</label>
                                                        <input type="text" name="tahun_renstra" class="form-control" id="input-tahun_renstra" value="{{ $periodeAktif }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <form id="editForm" method="POST" action="#">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Usulan Program</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-program_strategis" class="form-label">Program
                                                                Strategis</label>                                                            
                                                        <select name="program_strategis" id="edit-program_strategis"
                                                            class="form-select" required>
                                                            <option value="">-- Pilih Program Strategis --</option>
                                                            @foreach ($listProgramStrategis as $list)
                                                                <option value="{{ $list->nama_program }}">
                                                                    {{ $list->nama_program }}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-nama_kegiatan" class="form-label">Nama
                                                                Kegiatan</label>
                                                            <textarea name="nama_kegiatan" class="form-control" id="edit-nama_kegiatan" rows="2" required></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-seksi_id" class="form-label">Seksi</label>
                                                            <select name="seksi_id" id="edit-seksi_id"
                                                                class="form-select" required>
                                                                <option value="">-- Pilih Seksi --</option>
                                                                @foreach ($seksiList as $seksi)
                                                                    <option value="{{ $seksi->id }}">
                                                                        {{ $seksi->nama_seksi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-sub_seksi_id" class="form-label">Sub
                                                                Seksi</label>
                                                            <select name="sub_seksi_id" id="edit-sub_seksi_id"
                                                                class="form-select">
                                                                <option value="">-- Pilih Sub Seksi --</option>
                                                                @foreach ($subSeksiList as $subSeksi)
                                                                    <option value="{{ $subSeksi->id }}">
                                                                        {{ $subSeksi->nama_sub_seksi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-indikator"
                                                                class="form-label">Indikator</label>
                                                            <textarea name="indikator" class="form-control" id="edit-indikator" rows="2"></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-kelompok-sasaran" class="form-label">Kelompok
                                                                Sasaran</label>
                                                            <textarea name="kelompok_sasaran" class="form-control" id="edit-kelompok-sasaran" required rows="2"></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-biaya" class="form-label">Biaya</label>
                                                            <input type="number" name="biaya" class="form-control"
                                                                id="edit-biaya" required>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-tempat_kegiatan" class="form-label">Tempat
                                                                Kegiatan</label>
                                                            <input type="text" name="tempat_kegiatan"
                                                                class="form-control" id="edit-tempat_kegiatan">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-waktu_mulai" class="form-label">Waktu
                                                                Mulai</label>
                                                            <input type="date" name="waktu_mulai"
                                                                class="form-control" id="edit-waktu_mulai" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-waktu_selesai" class="form-label">Waktu
                                                                Selesai</label>
                                                            <input type="date" name="waktu_selesai"
                                                                class="form-control" id="edit-waktu_selesai" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-keterangan_waktu"
                                                                class="form-label">Keterangan Waktu</label>
                                                            <textarea name="keterangan_waktu" class="form-control" id="edit-keterangan_waktu" rows="2"></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-keterangan"
                                                                class="form-label">Keterangan</label>
                                                            <textarea name="keterangan" class="form-control" id="edit-keterangan" rows="2"></textarea>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-tahun" class="form-label">Tahun</label>
                                                            <input type="number" name="tahun" class="form-control"
                                                                id="edit-tahun" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit-tahun_renstra" class="form-label">Periode
                                                                Renstra</label>
                                                            <input type="text" name="tahun_renstra"  class="form-control" id="edit-tahun_renstra" required disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form id="deleteForm" method="POST" action="">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus Usulan Program</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus usulan program ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
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
                modal.find('#edit-kelompok-sasaran').val(btn.data('kelompok_sasaran'));
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
