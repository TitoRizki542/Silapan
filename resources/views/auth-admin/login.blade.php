<x-guest-admin-layout>
    <h3 class="card-title fw-semibold text-center text-success mb-2">Selamat Datang!</h3>

    <p class="text-center text-muted mb-5 w-75">
        Form ini khusus untuk <b>admin</b> dan <b>pegawai</b>.
    </p>

    <form method="POST" action="{{ route('login.admin') }}" class="w-75">
        @csrf

        <!-- Email Address -->
        <div class="input-group has-validation mb-3">
            <div class="form-floating @error('username_email') is-invalid @enderror">
                <input type="text" class="form-control rounded-pill @error('username_email') is-invalid @enderror"
                    id="username_email" placeholder="name@example.com" value="{{ old('username_email') }}"
                    name="username_email" autocomplete="off">
                <label for="username_email">Username atau Email<font color="red">*</font></label>
            </div>
            @error('username_email')
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

        <!-- Login Button -->
        <div class="mb-3">
            <button class="w-100 btn btn-success btn-lg rounded-pill">
                Masuk
            </button>
        </div>

        <div class="mt-2">
            <small class="text-muted mb-0">
                <font color="red">*</font>) Wajib untuk diisi
            </small>
        </div>
    </form>
</x-guest-admin-layout>
