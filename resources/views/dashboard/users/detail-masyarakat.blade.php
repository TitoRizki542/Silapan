@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Masyarakat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('users.masyarakat') }}" class="text-decoration-none">Masyarakat</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="row">

            <div class="col-md-6">

                {{-- Nama Lengkap --}}
                <div class="card rounded-4 shadow mb-3">
                    <div class="card-body w-100">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <h6 class="mb-0 fw-semibold">
                                Nama Lengkap
                            </h6>
                            <p class="mb-0">
                                {{ $masyarakat->user_detail->nama_depan }}
                                {{ $masyarakat->user_detail->nama_belakang }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Username & Email --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        Username
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->username }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        Email
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Agama --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        Agama
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->user_detail->agama }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        Tgl Lahir
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->user_detail->tanggal_lahir }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NIK --}}
                <div class="card rounded-4 shadow mb-3">
                    <div class="card-body w-100">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <h6 class="mb-0 fw-semibold">
                                NIK
                            </h6>
                            <p class="mb-0">
                                {{ $masyarakat->user_detail->nik }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- No handphone --}}
                <div class="card rounded-4 shadow mb-3">
                    <div class="card-body w-100">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <h6 class="mb-0 fw-semibold">
                                No Handphone
                            </h6>
                            <p class="mb-0">
                                {{ $masyarakat->user_detail->no_hp }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RT & RW --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        RT
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->user_detail->rt }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        RW
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->user_detail->rw }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RT & RW --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        Kel/Desa
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->user_detail->kelurahan_desa }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card rounded-4 shadow mb-3">
                            <div class="card-body w-100">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h6 class="mb-0 fw-semibold">
                                        Kecamatan
                                    </h6>
                                    <p class="mb-0">
                                        {{ $masyarakat->user_detail->kecamatan }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <div class="card rounded-4 shadow mb-sm-3 bg-warning">
                        <div class="card-body">
                            <h6 class="text-white">
                                <i class="fa-light fa-clock-rotate-left"></i> Proses
                            </h6>

                            <h3 class="mb-0 text-white">{{ $administrasi['proses'] }}</h3>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="card rounded-4 shadow mb-sm-3 bg-success">
                        <div class="card-body">
                            <h6 class="text-white">
                                <i class="fa-light fa-circle-check"></i> Berhasil
                            </h6>

                            <h3 class="mb-0 text-white">{{ $administrasi['berhasil'] }}</h3>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="card rounded-4 shadow mb-sm-3 bg-danger">
                        <div class="card-body">
                            <h6 class="text-white">
                                <i class="fa-sharp fa-light fa-circle-xmark"></i> Ditolak
                            </h6>

                            <h3 class="mb-0 text-white">{{ $administrasi['ditolak'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
