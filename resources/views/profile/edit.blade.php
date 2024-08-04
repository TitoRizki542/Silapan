<x-app-layout>
    @push('css')
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                /* margin: 0; */
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>
    @endpush

    <section>
        <div class="w-100 text-white d-flex align-items-center justify-content-center"
            style="min-height: 40vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(219, 146, 146, 0), rgba(0,0,0,0.8)), url({{ URL::asset('assets/img/borobudur-bg.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h1 class="fw-bold">Profil</h1>
                <h6 class="text-center">
                    <a href="{{ route('home') }}" class="link-light text-decoration-none">Home</a> /
                    <span>Profil</span>
                </h6>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="row mb-3">
                <div class="col-md">
                    <div class="card rounded-4 shadow">
                        <div class="card-body">
                            <div class="d-flex gap-3">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle"
                                        style="background-image: url(https://cdn-icons-png.flaticon.com/512/219/219986.png); background-size: cover; background-repeat: no-repeat; width: 80px; height: 80px;">
                                    </div>
                                </div>

                                <div class="flex-grow-1 py-2">
                                    <h3 class="mb-0 fw-bold">
                                        {{ auth()->user()->user_detail->nama_depan }}
                                        {{ auth()->user()->user_detail->nama_belakang }}
                                    </h3>

                                    <h6>{{ auth()->user()->email }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-sm-3">
                    <div class="card rounded-4 shadow border-0 overflow-hidden">
                        <div class="card-header bg-success-subtle fw-semibold">
                            Setting Akun
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="post">
                                @method('patch')
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">
                                        Username
                                    </label>
                                    <div class="input-group has-validation">
                                        <input type="text"
                                            class="form-control rounded-pill @error('username') is-invalid @enderror"
                                            name="username" id="username"
                                            value="{{ old('username', auth()->user()->username) }}">

                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <div class="input-group has-validation">
                                        <input type="email"
                                            class="form-control rounded-pill @error('email') is-invalid @enderror"
                                            name="email" id="email"
                                            value="{{ old('email', auth()->user()->email) }}">

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success rounded-pill">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card border-0 rounded-4 overflow-hidden shadow">
                        <div class="card-header bg-success-subtle fw-semibold">
                            Data Diri
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update.user-detail') }}" method="post">
                                @method('patch')
                                @csrf
                                {{-- Nama depan dan belakang --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama_depan" class="form-label">
                                                Nama Depan
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="text"
                                                    class="form-control rounded-pill @error('nama_depan') is_invalid @enderror"
                                                    name="nama_depan" id="nama_depan"
                                                    value="{{ auth()->user()->user_detail->nama_depan }}">

                                                @error('nama_depan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="nama_belakang" class="form-label">
                                                Nama Belakang
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="text"
                                                    class="form-control rounded-pill @error('nama_belakang') is_invalid @enderror"
                                                    name="nama_belakang" id="nama_belakang"
                                                    value="{{ auth()->user()->user_detail->nama_belakang }}">

                                                @error('nama_belakang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Agama & Tanggal Lahir --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="agama" class="form-label">
                                                Agama
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="text"
                                                    class="form-control rounded-pill @error('agama') is-invalid @enderror"
                                                    name="agama" id="agama" placeholder="Cth: Islam"
                                                    value="{{ old('agama', auth()->user()->user_detail->agama) }}">

                                                @error('agama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">
                                                Tanggal Lahir
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="date"
                                                    class="form-control rounded-pill @error('tanggal_lahir') is-invalid @enderror"
                                                    name="tanggal_lahir" id="tanggal_lahir" placeholder="Cth: Islam"
                                                    value="{{ old('tanggal_lahir', auth()->user()->user_detail->tanggal_lahir) }}">

                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- NIK --}}
                                <div class="mb-3">
                                    <label for="nik" class="form-label">
                                        NIK (Nomor Induk Kependudukan)
                                    </label>
                                    <div class="input-group has-validation">
                                        <input type="number"
                                            class="form-control rounded-pill @error('nik') is-invalid @enderror"
                                            name="nik" id="nik"
                                            value="{{ old('nik', auth()->user()->user_detail->nik) }}"
                                            placeholder="Cth: 1234567891234567" maxlength="16">

                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- No telepon --}}
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">
                                        No Handphone
                                    </label>
                                    <div class="input-group has-validation">
                                        <input type="number"
                                            class="form-control rounded-pill @error('no_hp') is-invalid @enderror"
                                            name="no_hp" id="no_hp" placeholder="Cth: 08123456789"
                                            maxlength="14"
                                            value="{{ old('no_hp', auth()->user()->user_detail->no_hp) }}">

                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- RT & RW --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="rt" class="form-label">
                                                RT
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="number"
                                                    class="form-control rounded-pill @error('rt') is-invalid @enderror"
                                                    name="rt" id="rt" placeholder="Cth: 001"
                                                    value="{{ old('rt', auth()->user()->user_detail->rt) }}">

                                                @error('rt')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="rw" class="form-label">
                                                RW
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="number"
                                                    class="form-control rounded-pill @error('rw') is-invalid @enderror"
                                                    name="rw" id="rw" placeholder="Cth: 002"
                                                    value="{{ old('rw', auth()->user()->user_detail->rw) }}">

                                                @error('rw')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Desan/Kelurahan dan Desa --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="kelurahan_desa" class="form-label">
                                                Kelurahan/Desa
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="text"
                                                    class="form-control rounded-pill @error('kelurahan_desa') is-invalid @enderror"
                                                    name="kelurahan_desa" id="kelurahan_desa"
                                                    placeholder="Cth: Payaman"
                                                    value="{{ old('kelurahan_desa', auth()->user()->user_detail->kelurahan_desa) }}">

                                                @error('kelurahan_desa')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="kecamatan" class="form-label">
                                                Kecamatan
                                            </label>
                                            <div class="input-group has-validation">
                                                <input type="text"
                                                    class="form-control rounded-pill @error('kecamatan') is-invalid @enderror"
                                                    name="kecamatan" id="kecamatan" placeholder="Cth: Payaman"
                                                    value="{{ old('kecamatan', auth()->user()->user_detail->kecamatan) }}">

                                                @error('kecamatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success rounded-pill">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
