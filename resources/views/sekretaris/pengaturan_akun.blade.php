@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Sekretaris Manajemen Akun Seksi dan Sub Seksi')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Sekretaris Manajemen Akun Seksi dan Sub Seksi</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Pengaturan Akun Seksi dan Sub Seksi</li>
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
                                <h5>Tabel Data Akun Seksi dan Sub Seksi</h5>
                            </div>
                            <div>
                                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="fa fa-plus"></i> Tambah Pengguna
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="akunTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>Alamat</th>
                                                <th>Role</th>
                                                <th>Seksi</th>
                                                <th>Sub Seksi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listUsersSeksi as $index => $user)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>
                                                        @if ($user->role == 1)
                                                            <span class="badge bg-primary">Seksi</span>
                                                        @elseif ($user->role == 2)
                                                            <span class="badge bg-success">Sub Seksi</span>
                                                        @else
                                                            <span class="badge bg-secondary">Undefined</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->seksi->nama_seksi ?? '-' }}</td>
                                                    <td>{{ $user->sub_seksi->nama_sub_seksi ?? '-' }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $user->id }}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>

                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $user->id }}">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>


                                    <!-- Modal Tambah Pengguna -->
                                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('sekretaris.manajemen_akun_store') }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Pengguna</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-2">
                                                            <label>Nama</label>
                                                            <input type="text" name="name" class="form-control"
                                                                required placeholder="Masukan nama lengkap">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                required placeholder="Masukan email(aktif)">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>No HP</label>
                                                            <input type="text" name="no_hp" class="form-control"
                                                                placeholder="Masukan no hp (aktif)">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Alamat</label>
                                                            <textarea name="alamat" class="form-control" placeholder="Masukan alamat tempat tinggal"></textarea>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Role</label>
                                                            <select name="role" id="roleSelect" class="form-select"
                                                                required>
                                                                <option value="">-- Pilih Role --</option>
                                                                <option value="1">Seksi</option>
                                                                <option value="2">Sub Seksi</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Seksi</label>
                                                            <select name="seksi_id" class="form-select">
                                                                <option value="" selected>-- Pilih Seksi --</option>
                                                                @foreach ($listSeksi as $seksi)
                                                                    <option value="{{ $seksi->id }}">
                                                                        {{ $seksi->nama_seksi }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-2" id="subSeksiContainer" style="display: none;">
                                                            <label>Sub Seksi</label>
                                                            <select name="sub_seksi_id" id="subSeksiSelect"
                                                                class="form-select">
                                                                <option value="">-- Pilih Sub Seksi --</option>
                                                                {{-- Ini akan diisi via JS berdasarkan seksi --}}
                                                            </select>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label>Password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                required minlength="6">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Tambah</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>



                                    @foreach ($listUsersSeksi as $user)
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('sekretaris.manajemen_akun_update', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Pengguna</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-2">
                                                                <label>Nama</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $user->name }}" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    value="{{ $user->email }}" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>No HP</label>
                                                                <input type="text" name="no_hp" class="form-control"
                                                                    value="{{ $user->no_hp }}">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Alamat</label>
                                                                <textarea name="alamat" class="form-control">{{ $user->alamat }}</textarea>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Role</label>
                                                                <select name="role" class="form-select role-select"
                                                                    data-user="{{ $user->id }}" required>
                                                                    <option value="1"
                                                                        {{ $user->role == 1 ? 'selected' : '' }}>Seksi
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $user->role == 2 ? 'selected' : '' }}>Sub Seksi
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Seksi</label>
                                                                <select name="seksi_id" class="form-select seksi-select"
                                                                    data-user="{{ $user->id }}" required>
                                                                    @foreach ($listSeksi as $seksi)
                                                                        <option value="{{ $seksi->id }}"
                                                                            {{ $user->seksi_id == $seksi->id ? 'selected' : '' }}>
                                                                            {{ $seksi->nama_seksi }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-2 sub-seksi-group"
                                                                id="subSeksiGroupEdit{{ $user->id }}"
                                                                style="{{ $user->role == 2 ? '' : 'display:none;' }}">
                                                                <label>Sub Seksi</label>
                                                                <select name="sub_seksi_id"
                                                                    class="form-select sub-seksi-select"
                                                                    data-user="{{ $user->id }}">
                                                                    <option value="">-- Pilih Sub Seksi --</option>
                                                                    @foreach ($listSubSeksi as $sub)
                                                                        @if ($sub->seksi_id == $user->seksi_id)
                                                                            <option value="{{ $sub->id }}"
                                                                                {{ $user->sub_seksi_id == $sub->id ? 'selected' : '' }}>
                                                                                {{ $sub->nama_sub_seksi }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Password (kosongkan jika tidak diubah)</label>
                                                                <input type="password" name="password"
                                                                    class="form-control"
                                                                    placeholder="Isi jika ingin ubah password">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('sekretaris.manajemen_akun_delete', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Pengguna</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Yakin ingin menghapus pengguna
                                                                <strong>{{ $user->name }}</strong>?
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


@section('script')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            });
        </script>
    @endif

    <script>
        const allSubSeksi = @json($listSubSeksi);

        $(document).ready(function() {
            $('#roleSelect').on('change', function() {
                if ($(this).val() == '2') {
                    $('#subSeksiContainer').show();
                } else {
                    $('#subSeksiContainer').hide();
                    $('#subSeksiSelect').html(`<option value="">-- Pilih Sub Seksi --</option>`);
                }
            });

            $('select[name="seksi_id"]').on('change', function() {
                const selectedSeksi = $(this).val();
                const filtered = allSubSeksi.filter(s => s.seksi_id == selectedSeksi);

                let html = `<option value="">-- Pilih Sub Seksi --</option>`;
                filtered.forEach(s => {
                    html += `<option value="${s.id}">${s.nama_sub_seksi}</option>`;
                });
                $('#subSeksiSelect').html(html);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const allSubSeksi = @json($listSubSeksi);

            // Event saat role berubah
            document.querySelectorAll('.role-select').forEach(select => {
                select.addEventListener('change', function() {
                    const userId = this.dataset.user;
                    const subSeksiGroup = document.getElementById('subSeksiGroupEdit' + userId);
                    if (this.value == '2') {
                        subSeksiGroup.style.display = 'block';
                    } else {
                        subSeksiGroup.style.display = 'none';
                    }
                });
            });

            // Event saat seksi berubah
            document.querySelectorAll('.seksi-select').forEach(select => {
                select.addEventListener('change', function() {
                    const userId = this.dataset.user;
                    const selectedSeksiId = this.value;
                    const subSeksiSelect = document.querySelector('.sub-seksi-select[data-user="' +
                        userId + '"]');

                    let options = '<option value="">-- Pilih Sub Seksi --</option>';
                    const filtered = allSubSeksi.filter(s => s.seksi_id == selectedSeksiId);
                    filtered.forEach(sub => {
                        options +=
                            `<option value="${sub.id}">${sub.nama_sub_seksi}</option>`;
                    });

                    subSeksiSelect.innerHTML = options;
                });
            });
        });
    </script>




    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#akunTable')) {
                $('#akunTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        });
    </script>


@endsection
