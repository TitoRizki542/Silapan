<x-guest-layout>
    <h3 class="card-title fw-semibold text-center text-success mb-2">Selamat Datang!</h3>

    <p class="text-center text-muted mb-5 w-75">
        Daftarkan dirimu untuk dapat mengajukan administrasi pada kelurahan.
    </p>

    <form method="POST" action="{{ route('register') }}" class="w-75">
        @csrf

        <!-- Nama -->
        <div class="row">
            <!-- Nama Depan -->
            <div class="col-md-6">
                <div class="input-group has-validation mb-3">
                    <div class="form-floating @error('nama_depan') is-invalid @enderror">
                        <input type="text" class="form-control rounded-pill @error('nama_depan') is-invalid @enderror"
                            id="nama_depan" placeholder="Isikan nama depanmu" value="{{ old('nama_depan') }}"
                            name="nama_depan">
                        <label for="nama_depan">Nama Depan<font color="red">*</font></label>
                    </div>
                    @error('nama_depan')
                        <div class="invalid-feedback text-capitalize">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!-- Nama Belakang -->
            <div class="col-md-6">
                <div class="input-group has-validation mb-3">
                    <div class="form-floating @error('nama_belakang') is-invalid @enderror">
                        <input type="text"
                            class="form-control rounded-pill @error('nama_belakang') is-invalid @enderror"
                            id="nama_belakang" placeholder="Isikan nama depanmu" value="{{ old('nama_belakang') }}"
                            name="nama_belakang">
                        <label for="nama_belakang">Nama Belakang<font color="red">*</font></label>
                    </div>
                    @error('nama_belakang')
                        <div class="invalid-feedback text-capitalize">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Username -->
        <div class="input-group has-validation mb-3">
            <div class="form-floating @error('username') is-invalid @enderror">
                <input type="text" class="form-control rounded-pill @error('username') is-invalid @enderror"
                    id="username" placeholder="Isikan nama depanmu" value="{{ old('username') }}" name="username">
                <label for="username">Username<font color="red">*</font></label>
            </div>
            @error('username')
                <div class="invalid-feedback text-capitalize">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="input-group has-validation mb-3">
            <div class="form-floating @error('email') is-invalid @enderror">
                <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror"
                    id="email" placeholder="name@example.com" value="{{ old('email') }}" name="email"
                    autocomplete="off">
                <label for="email">Alamat Email<font color="red">*</font></label>
            </div>
            @error('email')
                <div class="invalid-feedback text-capitalize">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="input-group has-validation mb-3">
            <div class="form-floating @error('password') is-invalid @enderror">
                <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror"
                    id="password" name="password" placeholder="Password">
                <label for="password">Password<font color="red">*</font></label>
            </div>
            @error('password')
                <div class="invalid-feedback text-capitalize">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="input-group has-validation mb-3">
            <div class="form-floating">
                <input type="password" class="form-control rounded-pill" id="password_confirmation"
                    name="password_confirmation" placeholder="Konfirmasi Password">
                <label for="password_confirmation">
                    Konfirmasi Password<font color="red">*</font>
                </label>
            </div>
        </div>

        <!-- Register Button -->
        <div class="mb-3">
            <button class="w-100 btn btn-success btn-lg rounded-pill">
                Daftar Sekarang
            </button>
        </div>

        <div class="mt-2">
            <small class="text-muted mb-0">
                <font color="red">*</font>) Wajib untuk diisi
            </small>
        </div>
    </form>

    <div class="mt-auto">
        <p class="text-muted">
            <b>Sudah punya akun</b>? <a href="{{ route('login') }}">Login Sekarang</a>
        </p>
    </div>
</x-guest-layout>
