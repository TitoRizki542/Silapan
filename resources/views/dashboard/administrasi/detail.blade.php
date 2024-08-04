@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Administrasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.administrasi') }}" class="text-decoration-none">
                    Administrasi
                </a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="row mb-3">
            <div class="col-md">
                <div class="card rounded-4 shadow">
                    <div class="card-body">

                        {{-- Jenis Pengajuan --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0 fw-semibold">
                                Jenis Pengajuan:
                            </h6>
                            <p class="mb-0">
                                @formatUnderscore($administrasi->jenis_pengajuan->value)
                            </p>
                        </div>

                        {{-- No Tiket --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0 fw-semibold">
                                No Tiket:
                            </h6>
                            <p class="mb-0">
                                {{ $administrasi->no_tiket }}
                            </p>
                        </div>

                        {{-- Tanggal Pengajuan --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0 fw-semibold">
                                Tanggal Pengajuan:
                            </h6>
                            <p class="mb-0">
                                {{ $administrasi->created_at->format('d F Y') }}
                            </p>
                        </div>

                        {{-- Status --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0 fw-semibold">
                                Status:
                            </h6>
                            <p class="mb-0">
                                @if ($administrasi->status->value === 'proses')
                                    <div class="badge bg-warning">
                                        <i class="fa-regular fa-clock-rotate-left"></i> Sedang Proses
                                    </div>
                                @elseif ($administrasi->status->value === 'berhasil')
                                    <div class="badge bg-success">
                                        <i class="fa-light fa-circle-check"></i> Setuju
                                    </div>
                                @elseif ($administrasi->status->value === 'ditolak')
                                    <div class="badge bg-danger">
                                        <i class="fa-light fa-circle-xmark"></i> Ditolak
                                    </div>
                                @endif
                            </p>
                        </div>

                        {{-- Tanggal Verifikasi --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0 fw-semibold">
                                Tanggal Verifikasi:
                            </h6>
                            <p class="mb-0">
                                {{ $administrasi->tgl_verifikasi ?? '-' }}
                            </p>
                        </div>

                        {{-- Catatan --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0 fw-semibold">
                                Catatan:
                            </h6>
                            <p class="mb-0">
                                {!! $administrasi->catatan ?? '-' !!}
                            </p>
                        </div>

                        {{-- Alamat Tujuan --}}
                        @if ($administrasi->jenis_pengajuan === 'pindah_keluar')
                            <div class="d-flex align-items-center gap-3">
                                <h6 class="mb-0 fw-semibold">
                                    Alamat Tujuan:
                                </h6>
                                <p class="mb-0">
                                    {{ $administrasi->alamat_tujuan }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="row">
                    <div class="col-md">
                        <div class="card rounded-4 shadow overflow-hidden border-0">
                            <div class="card-header bg-success-subtle fw-semibold">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">
                                            Berkas Persyaratan
                                        </h6>
                                    </div>

                                    <div>
                                        <a href="#" role="button" class="btn btn-success rounded-pill"
                                            data-bs-toggle="modal" data-bs-target="#konfirmasi">
                                            <i class="fa-light fa-file-check me-1"></i> Konfirmasi Pengajuan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row column-gap-0 gap-3">
                                    @foreach ($administrasi->syarats as $syarat)
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card rounded-4">
                                                <a href="{{ pathinfo($syarat->berkas, PATHINFO_EXTENSION) == 'pdf' ? route('admin.admin.administrasi.openpdf', $syarat->id) : (pathinfo($syarat->berkas, PATHINFO_EXTENSION) == 'xlsx' || pathinfo($syarat->berkas, PATHINFO_EXTENSION) == 'xls' ? route('admin.admin.administrasi.openexcel', $syarat->id) : '#') }}"
                                                    target="_blank" class="text-decoration-none link-dark">
                                                    <div class="card-body text-center">
                                                        @if (pathinfo($syarat->berkas, PATHINFO_EXTENSION) == 'pdf')
                                                            <i class="fa-regular fa-file-pdf text-danger fs-1 mb-2"></i>
                                                            <h6 class="mb-0">{{ $syarat->nama }}</h6>
                                                        @elseif (pathinfo($syarat->berkas, PATHINFO_EXTENSION) == 'xlsx' || pathinfo($syarat->berkas, PATHINFO_EXTENSION) == 'xls')
                                                            <i class="fa-regular fa-file-excel text-success fs-1 mb-2"></i>
                                                            <h6 class="mb-0">{{ $syarat->nama }}</h6>
                                                        @elseif ($syarat->berkas == '-')
                                                            <i
                                                                class="fa-regular fa-file-xmark fa-ban text-danger fs-1 mb-2"></i>
                                                            <h6 class="mb-0">{{ $syarat->nama }} (Kosong)</h6>
                                                        @endif
                                                    </div>
                                                </a>
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

        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pengajuan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.administrasi.konfirmasi', $administrasi->no_tiket) }}" method="post">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="jenis_pengajuan" class="form-label">Jenis Pengajuan</label>
                                <div class="input-group">
                                    <h6 class="mb-0">@formatUnderscore($administrasi->jenis_pengajuan->value)</h6>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <div class="input-group has-validation">
                                    <select type="text"
                                        class="form-select @error('status') is-invalid @enderror rounded-pill"
                                        name="status" id="status">
                                        <option value="" selected disabled>--- Pilih Status Pengajuan ---</option>
                                        <option value="berhasil" @selected(old('status') == 'berhasil')>Berhasil</option>
                                        <option value="ditolak" @selected(old('status') == 'ditolak')>Ditolak</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <div class="input-group has-validation">
                                    <textarea type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan">{{ old('catatan') }}</textarea>
                                    @error('catatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger rounded-pill"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- <!-- Modal Surat -->
        <div class="modal fade" id="surat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pembuatan Surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.administrasi.konfirmasi', $administrasi->no_tiket) }}" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger rounded-pill"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary rounded-pill">Unduh</button>
                            </div>
                    </form>
                </div>
            </div>
        </div> --}}
    @endsection
