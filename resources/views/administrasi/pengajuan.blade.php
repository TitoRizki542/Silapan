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
            <a href="{{ route('administrasi') }}" class="btn btn-outline-success rounded-pill mb-2">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-sm">
                                    <div class="rounded-circle bg-success circle mx-auto active">
                                        1
                                    </div>
                                    <p class="text-center mb-0">Pilih Pengajuan</p>
                                </div>
                                <div class="col-sm border-bottom border-success"></div>
                                <div class="col-sm">
                                    <div class="rounded-circle bg-success circle mx-auto">
                                        2
                                    </div>
                                    <p class="text-center mb-0">Berkas Persyaratan</p>
                                </div>
                                <div class="col-sm border-bottom border-success"></div>
                                <div class="col-sm">
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

            <div class="row">
                <div class="col-md">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <form action="{{ route('administrasi.pengajuan') }}" method="get">
                                <div class="mb-3">
                                    <label for="jenis_pengajuan" class="form-label">Jenis Pengajuan</label>
                                    <div class="input-group">
                                        <select name="jenis_pengajuan" id="jenis_pengajuan"
                                            class="form-select rounded-pill">
                                            <option value="" selected disabled>
                                                -- Pilih Jenis Pengajuan --
                                            </option>
                                            <option value="akta_kelahiran">Akta Kelahiran</option>
                                            <option value="akta_kematian">Akta Kematian</option>
                                            <option value="pindah_datang">Pindah Datang</option>
                                            <option value="pindah_keluar">Pindah Keluar</option>
                                            <option value="kehilangan_kk">Kehilangan KK</option>
                                            <option value="skck">SKCK</option>
                                            <option value="ket_belum_menikah">Keterangan Belum Menikah</option>
                                            <option value="surat_keterangan">Surat Keterangan</option>
                                            <option value="pengantar_kehilangan">Pengantar Kehilangan</option>
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-success rounded-pill">Selanjutnya</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
