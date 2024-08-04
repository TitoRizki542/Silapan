@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('users.pegawai') }}" class="text-decoration-none">Pegawai</a>
            </li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>

        <form action="{{ route('users.pegawai.create') }}" method="post">
            @csrf
            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="form-label">
                    Nama<font color="red">*</font>
                </label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control rounded-pill @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" name="nama" id="nama">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Username --}}
            <div class="mb-3">
                <label for="username" class="form-label">
                    Username<font color="red">*</font>
                </label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control rounded-pill @error('username') is-invalid @enderror"
                        value="{{ old('username') }}" name="username" id="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email<font color="red">*</font>
                </label>
                <div class="input-group has-validation">
                    <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" id="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">
                    Password<font color="red">*</font>
                </label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror"
                        name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password<font color="red">*</font>
                </label>
                <div class="input-group has-validation">
                    <input type="password"
                        class="form-control rounded-pill @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success rounded-pill">
                Tambah Petugas
            </button>
        </form>
    </div>
@endsection
