<x-app-layout>
    @push('css')
        <style>
            .circle {
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
            }


            .circle.active {
                border: 1px dashed rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important;
                background-color: #fff !important;
                color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) !important;
            }
        </style>
    @endpush

    {{-- Header --}}
    <section>
        <div class="w-100 text-white d-flex align-items-center justify-content-center"
            style="min-height: 40vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(219, 146, 146, 0), rgba(0,0,0,0.8)), url({{ URL::asset('assets/img/borobudur-bg.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h1 class="fw-bold">Pengajuan Administrasi</h1>
                <h6 class="text-center">
                    <a href="{{ route('home') }}" class="link-light text-decoration-none">Home</a> /
                    <a href="{{ route('administrasi') }}" class="link-light text-decoration-none">
                        Pelayanan Administrasi
                    </a> /
                    <span>Pengajuan</span>
                </h6>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <a href="{{ route('administrasi.pengajuan') }}" class="btn btn-outline-success rounded-pill mb-2">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>

            {{-- Step --}}
            <div class="row mb-3">
                <div class="col-md">
                    <div class="card shadow rounded-4">
                        <div class="card-body">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md col-sm">
                                    <div class="rounded-circle bg-success circle mx-auto">
                                        <i class="fa-regular fa-check"></i>
                                    </div>
                                    <p class="text-center mb-0">Pilih Pengajuan</p>
                                </div>
                                <div class="col-md col-sm border-bottom border-success"></div>
                                <div class="col-md col-sm">
                                    <div class="rounded-circle bg-success circle mx-auto active">
                                        2
                                    </div>
                                    <p class="text-center mb-0">Berkas Persyaratan</p>
                                </div>
                                <div class="col-md col-sm border-bottom border-success"></div>
                                <div class="col-md col-sm">
                                    <div class="rounded-circle bg-success circle mx-auto">
                                        3
                                    </div>
                                    <p class="text-center mb-0">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Perhatian --}}
            <div class="row mb-3">
                <div class="col-md">
                    <div class="card shadow rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold text-warning">
                                <i class="fa-regular fa-triangle-exclamation"></i>
                                Perhatian
                            </h5>
                            <p class="mb-0">
                                Sebelum mengirim berkas pengajuan, harap memasukan berkas persyaratan dengan benar.
                                Perhatikan format berkas yang diperlukan
                                dan ukuran berkas tidak lebih dari 2mb. Terimakasih atas perhatianya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="row">
                <div class="col-md">
                    @if (request()->jenis_pengajuan === 'akta_kelahiran')
                        <x-form-akta-kelahiran />
                    @elseif (request()->jenis_pengajuan === 'akta_kematian')
                        <x-form-akta-kematian />
                    @elseif (request()->jenis_pengajuan === 'pindah_datang')
                        <x-form-pindah-datang />
                    @elseif (request()->jenis_pengajuan === 'pindah_keluar')
                        <x-form-pindah-keluar />
                    @elseif (request()->jenis_pengajuan === 'kehilangan_kk')
                        <x-form-kehilangan-kk />
                    @elseif (request()->jenis_pengajuan === 'skck')
                        <x-form-skck />
                    @elseif (request()->jenis_pengajuan === 'ket_belum_menikah')
                        <x-form-ket-belum-menikah />
                    @elseif (request()->jenis_pengajuan === 'surat_keterangan')
                        <x-form-surat-keterangan />
                    @elseif (request()->jenis_pengajuan === 'pengantar_kehilangan')
                        <x-form-pengantar-kehilangan />
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
