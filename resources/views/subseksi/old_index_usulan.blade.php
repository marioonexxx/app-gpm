@extends('layouts.navbar')
@section('Title', 'Sistem Informasi Manajemen Gereja - Usulan Program Subseksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Usulan Program</h3>
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
                            <h5>Usulan Program</h5>
                            <p class="f-m-light mt-1">Silahkan melengkapi data usulan program dari seksi.</p>
                        </div>
                        <div class="card-body">
                            <!-- Tombol trigger modal -->
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#usulanModal">
                                Tambah Usulan Program
                            </button>



                            <!-- Modal -->
                            <div class="modal fade" id="usulanModal" tabindex="-1" aria-labelledby="usulanModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Form Usulan Program</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Program Strategis</label>
                                                        <input type="text" name="program_strategis" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Nama Kegiatan</label>
                                                        <textarea name="nama_kegiatan" class="form-control" required></textarea>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Seksi</label>
                                                        <select name="seksi_id" class="form-select" required>
                                                            {{-- @foreach ($seksi as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}
                                                                </option>
                                                            @endforeach --}}
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Sub Seksi</label>
                                                        <select name="sub_seksi_id" class="form-select">
                                                            {{-- @foreach ($subseksi as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}
                                                                </option>
                                                            @endforeach --}}
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Indikator</label>
                                                        <textarea name="indikator" class="form-control" rows="2" required></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Biaya (Rp)</label>
                                                        <input type="number" name="biaya" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Kelompok Sasaran</label>
                                                        <input type="text" name="kelompok_sasaran" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tempat Kegiatan</label>
                                                        <input type="text" name="tempat_kegiatan" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Waktu Mulai</label>
                                                        <input type="datetime-local" name="waktu_mulai" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Waktu Selesai</label>
                                                        <input type="datetime-local" name="waktu_selesai"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Keterangan Waktu</label>
                                                        <textarea name="keterangan_waktu" class="form-control" rows="2"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" class="form-control" rows="2"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tahun</label>
                                                        <select name="tahun" class="form-select" required>
                                                            @for ($i = now()->year; $i <= now()->year + 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tahun Renstra</label>
                                                        <select name="tahun_renstra" class="form-select" required>
                                                            @foreach ([2020, 2025, 2030] as $renstra)
                                                                <option value="{{ $renstra }}">{{ $renstra }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mt-3">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            {{-- Table display data --}}
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
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->tahun_renstra }}</td>
                                            <td>
                                                <span class="badge rounded-pill badge-danger">Pending</span>
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit">
                                                        <a href="#" class="btn-edit" data-id="{{ $item->id }}"
                                                            data-program_strategis="{{ $item->program_strategis }}"
                                                            data-nama_kegiatan="{{ $item->nama_kegiatan }}"
                                                            data-seksi_id="{{ $item->seksi_id }}"
                                                            data-sub_seksi_id="{{ $item->sub_seksi_id ?? '' }}"
                                                            data-indikator="{{ $item->indikator }}"
                                                            data-biaya="{{ $item->biaya }}"
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
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form id="editForm" method="POST" action="">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Usulan Program</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="edit-id">
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Program Strategis</label>
                                                        <input type="text" name="program_strategis"
                                                            id="edit-program_strategis" class="form-control">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Nama Kegiatan</label>
                                                        <textarea name="nama_kegiatan" id="edit-nama_kegiatan" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Seksi</label>
                                                        <select name="seksi_id" id="edit-seksi_id" class="form-select">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Sub Seksi</label>
                                                        <select name="sub_seksi_id" id="edit-sub_seksi_id"
                                                            class="form-select">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Indikator</label>
                                                        <textarea name="indikator" id="edit-indikator" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Biaya (Rp)</label>
                                                        <input type="number" name="biaya" id="edit-biaya"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tempat Kegiatan</label>
                                                        <input type="text" name="tempat_kegiatan"
                                                            id="edit-tempat_kegiatan" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Waktu Mulai</label>
                                                        <input type="datetime-local" name="waktu_mulai"
                                                            id="edit-waktu_mulai" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Waktu Selesai</label>
                                                        <input type="datetime-local" name="waktu_selesai"
                                                            id="edit-waktu_selesai" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Keterangan Waktu</label>
                                                        <textarea name="keterangan_waktu" id="edit-keterangan_waktu" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" id="edit-keterangan" class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tahun</label>
                                                        <select name="tahun" id="edit-tahun" class="form-select">
                                                            @for ($i = now()->year; $i <= now()->year + 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tahun Renstra</label>
                                                        <select name="tahun_renstra" id="edit-tahun_renstra"
                                                            class="form-select">
                                                            @foreach ([2020, 2025, 2030] as $renstra)
                                                                <option value="{{ $renstra }}">{{ $renstra }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mt-3">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
                    confirmButtonText: 'OK'
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
        $('.btn-edit').on('click', function() {
        let modal = $('#editModal');

        // Isi input berdasarkan data-attribute
        modal.find('#edit-id').val($(this).data('id'));
        modal.find('#edit-program_strategis').val($(this).data('program_strategis'));
        modal.find('#edit-nama_kegiatan').val($(this).data('nama_kegiatan'));
        modal.find('#edit-seksi_id').val($(this).data('seksi_id'));
        modal.find('#edit-sub_seksi_id').val($(this).data('sub_seksi_id'));
        modal.find('#edit-indikator').val($(this).data('indikator'));
        modal.find('#edit-biaya').val($(this).data('biaya'));
        modal.find('#edit-tempat_kegiatan').val($(this).data('tempat_kegiatan'));
        modal.find('#edit-waktu_mulai').val($(this).data('waktu_mulai'));
        modal.find('#edit-waktu_selesai').val($(this).data('waktu_selesai'));
        modal.find('#edit-keterangan_waktu').val($(this).data('keterangan_waktu'));
        modal.find('#edit-keterangan').val($(this).data('keterangan'));
        modal.find('#edit-tahun').val($(this).data('tahun'));
        modal.find('#edit-tahun_renstra').val($(this).data('tahun_renstra'));

        // **Ini yang kamu tanyakan: pasang di sini**
        $('#editForm').attr('action', '/subseksi/usulan/' + $(this).data('id'));
        });
        
    </script>

@endsection
