@extends('layouts.navbar')
@section('title', 'Program Strategis')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sekretaris - Mengelola Program Strategis</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <h5>Data Program Strategis</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                <i class="fa fa-plus-circle"></i> Tambah
                            </button>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="programTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Program</th>
                                            <th>Periode Renstra</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listProgram as $index => $program)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $program->nama_program }}</td>
                                                <td>{{ $program->periode_renstra }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $program->id }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $program->id }}">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $program->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('sekretaris.program_strategis_update', $program->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Program Strategis</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label>Nama Program</label>
                                                                    <input type="text" name="nama_program"
                                                                        class="form-control"
                                                                        value="{{ $program->nama_program }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Periode Renstra</label>
                                                                    <input type="text" name="periode_renstra"
                                                                        class="form-control"
                                                                        value="{{ $program->periode_renstra }}" required>
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
                                            <div class="modal fade" id="deleteModal{{ $program->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('sekrtaris.program_strategis_delete', $program->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Program</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus program
                                                                    <strong>{{ $program->nama_program }}</strong>?</p>
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

        <!-- Modal Tambah -->
        <div class="modal fade" id="addModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('sekretaris.program_strategis_store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Program Strategis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama Program</label>
                                <input type="text" name="nama_program" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Periode Renstra</label>
                                <input type="text" name="periode_renstra" class="form-control" required>
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
    <script>
        $(document).ready(function() {
            $('#programTable').DataTable();
        });
    </script>
@endsection
