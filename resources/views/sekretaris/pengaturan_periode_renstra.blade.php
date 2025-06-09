@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Dashboard Sub Seksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sekretaris - Pengaturan Periode Renstra</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Pengaturan Periode Renstra</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div>
                                <h5>Data Periode Renstra</h5>
                                <p class="f-m-light mt-1 mb-0">Tabel Data Periode Renstra</p>
                            </div>
                            <!-- Tombol trigger modal -->
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#inputModal"><i class="fa-solid fa-plus-circle"></i>
                                Tambah
                            </button>
                        </div>
                        <div class="card-body">


                            {{-- Table display data --}}
                            <div class="table-responsive">
                                <table class="table table-bordered" id="programTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Periode</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listPeriode as $index => $periode)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $periode->nama_periode }}</td>
                                                <td>
                                                    @if ($periode->status == 1)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-secondary">Non-Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Tombol Edit -->
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $periode->id }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>

                                                    <!-- Tombol Delete -->
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $periode->id }}">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>

                                                    <!-- Tombol Set Aktif -->
                                                    @if ($periode->status == 0)
                                                        <form
                                                            action="{{ route('sekretaris.periode_renstra_aktif', $periode->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success">
                                                                <i class="fa fa-check-circle"></i> Set Aktif
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $periode->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $periode->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('sekretaris.periode_renstra_update', $periode->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Periode</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="nama_periode" class="form-label">Nama
                                                                        Periode</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_periode"
                                                                        value="{{ $periode->nama_periode }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select class="form-select" name="status" required>
                                                                        <option value="1"
                                                                            {{ $periode->status == 1 ? 'selected' : '' }}>
                                                                            Aktif</option>
                                                                        <option value="0"
                                                                            {{ $periode->status == 0 ? 'selected' : '' }}>
                                                                            Non-Aktif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deleteModal{{ $periode->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $periode->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('sekretaris.periode_renstra_delete', $periode->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Periode</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah Anda yakin ingin menghapus periode
                                                                    <strong>{{ $periode->nama_periode }}</strong>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
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

        <!-- Modal Tambah -->
        <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inputModalLabel">Tambah Periode</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_periode" class="form-label">Nama Periode</label>
                                <input type="text" class="form-control" name="nama_periode" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="0">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>




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
