@extends('layouts.navbar')
@section('title', 'Sistem Informasi Manajemen Gereja - Profil Pengguna')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Update Data Pengguna</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Profil Anda</h5>
                                <div class="card-options"><a class="card-options-collapse" href="#"
                                        data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                            class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <form class="custom-input" method="POST" action="{{ route('sekretaris.profile_update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row custom-input">
                                        <div class="profile-title">
                                            <div class="d-flex flex-column align-items-center text-center mb-4">
                                                <label for="foto" style="margin: 0;">
                                                    <img id="preview-image" class="rounded-circle"
                                                        src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('cuba/assets/images/user/7.jpg') }}"
                                                        alt="Foto Profil"
                                                        style="cursor: pointer; width: 120px; height: 120px; object-fit: cover;">
                                                </label>
                                                <input type="file" name="foto" id="foto" style="display: none;"
                                                    accept="image/*" onchange="previewFoto(this)">

                                                <div class="flex-grow-1">
                                                    <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                                    <p>{{ Auth::user()->jabatan }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 box-col-12">
                                            <div class="mb-3"><label class="form-label">Email Aktif</label><input
                                                    class="form-control" type="email" name="email"
                                                    placeholder="your-email@domain.com" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 box-col-12">
                                            <div class="mb-3"><label class="form-label">Nomor Handphone
                                                    Aktif</label><input class="form-control" type="text" name="no_hp"
                                                    placeholder="0811XXXXXXXX" value="{{ Auth::user()->no_hp }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 box-col-12">
                                            <div class="mb-3"><label class="form-label">Alamat</label>
                                                <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat tempat tinggal">{{ Auth::user()->alamat }}</textarea>
                                            </div>
                                        </div>
                                        @php
                                            $roles = [
                                                0 => ['label' => 'Administrator', 'class' => 'badge bg-primary'],
                                                1 => ['label' => 'Seksi', 'class' => 'badge bg-primary'],
                                                2 => ['label' => 'Sub Seksi', 'class' => 'badge bg-primary'],
                                                3 => ['label' => 'Bendahara / Keuangan', 'class' => 'badge bg-primary'],
                                                4 => ['label' => 'Litbang', 'class' => 'badge bg-primary'],
                                                5 => ['label' => 'Sekretaris', 'class' => 'badge bg-primary'],
                                            ];

                                            $userRole = Auth::user()->role ?? null;
                                        @endphp

                                        <div class="col-xxl-6 box-col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Role</label><br>
                                                @if (!is_null($userRole))
                                                    <span class="{{ $roles[$userRole]['class'] ?? 'badge bg-light' }}">
                                                        {{ $roles[$userRole]['label'] ?? 'Tidak Diketahui' }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-light">Tidak Ada Data Role</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 box-col-12">
                                            <div class="mb-3"><label class="form-label">Jabatan</label><input
                                                    class="form-control" name="jabatan" type="text" placeholder="Jabatan"
                                                    value="{{ Auth::user()->jabatan }}">
                                            </div>
                                        </div>
                                        @php
                                            $user = Auth::user();
                                        @endphp

                                        @if (!is_null($user->seksi))
                                            <div class="col-xxl-6 box-col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Seksi</label>
                                                    <input class="form-control" type="text" value="{{ $user->seksi }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!is_null($user->sub_seksi))
                                            <div class="col-xxl-6 box-col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Sub Seksi</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ $user->sub_seksi }}" readonly>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-xxl-6 box-col-12">
                                            <div class="mb-3"><label class="form-label">Password</label><input
                                                    class="form-control" name="password" type="password" placeholder="**********">
                                            </div>
                                        </div>

                                    </div>



                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block">Save</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-8">
                        <form class="card">
                            <div class="card-header">
                                <h5 class="card-title">Edit Profile</h5>
                                <div class="card-options"><a class="card-options-collapse" href="#"
                                        data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                            class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row custom-input">
                                    <div class="col-xxl-5 box-col-12">
                                        <div class="mb-3"><label class="form-label"
                                                for="companyName">Company</label><input class="form-control"
                                                id="companyName" type="text" placeholder="Company"></div>
                                    </div>
                                    <div class="col-sm-6 col-xxl-3 box-col-6">
                                        <div class="mb-3"><label class="form-label"
                                                for="customUsername">Username</label><input class="form-control"
                                                id="customUsername" type="text" placeholder="Username"></div>
                                    </div>
                                    <div class="col-sm-6 col-xxl-4 box-col-6">
                                        <div class="mb-3"><label class="form-label" for="customAddress">Email
                                                Address</label><input class="form-control" id="customAddress" type="email"
                                                placeholder="Email"></div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3"><label class="form-label" for="customFirstName">First
                                                Name</label><input class="form-control" id="customFirstName" type="text"
                                                placeholder="Company"></div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3"><label class="form-label" for="customLastName">Last
                                                Name</label><input class="form-control" id="customLastName"
                                                type="text" placeholder="Last name"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3"><label class="form-label" for="customAddress">Address</label>
                                            <textarea class="form-control" id="customAddress" type="text" rows="2.5" placeholder="Home address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xxl-4 box-col-6">
                                        <div class="mb-3"><label class="form-label" for="customCity">City</label><input
                                                class="form-control" id="customCity" type="text" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xxl-3 box-col-6">
                                        <div class="mb-3"><label class="form-label" for="customPostalCode">Postal
                                                Code</label><input class="form-control" id="customPostalCode"
                                                type="number" placeholder="Postal code"></div>
                                    </div>
                                    <div class="col-xxl-5 box-col-12">
                                        <div class="mb-3"><label class="form-label"
                                                for="customCountry">Country</label><select class="form-control btn-square"
                                                id="customCountry">
                                                <option value="0">--Select--</option>
                                                <option value="1">Germany</option>
                                                <option value="2">Canada</option>
                                                <option value="3">Usa</option>
                                                <option value="4">Aus</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div><label class="form-label" for="aboutMeDesc">About
                                                Me</label>
                                            <textarea class="form-control" id="aboutMeDesc" rows="4" placeholder="Enter about your description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end"><button class="btn btn-primary" type="submit">Update
                                    Profile</button></div>
                        </form>
                    </div> --}}
            </div>
        </div>
    </div><!-- Container-fluid Ends-->
    </div>

@endsection

<script>
    function previewFoto(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>

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
