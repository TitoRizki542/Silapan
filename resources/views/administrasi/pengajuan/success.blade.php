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
                                    <div class="rounded-circle bg-success circle mx-auto">
                                        <i class="fa-regular fa-check"></i>
                                    </div>
                                    <p class="text-center mb-0">Berkas Persyaratan</p>
                                </div>
                                <div class="col-md col-sm border-bottom border-success"></div>
                                <div class="col-md col-sm">
                                    <div class="rounded-circle bg-success circle mx-auto active">
                                        3
                                    </div>
                                    <p class="text-center mb-0">Selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Image Success --}}
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <img src="https://img.freepik.com/free-vector/ambition-abstract-concept-vector-illustration-business-ambition-determination-setting-big-goal-making-fast-career-self-confident-getting-what-you-want-desire-success-abstract-metaphor_335657-2892.jpg?t=st=1714539628~exp=1714543228~hmac=d0a7eb499641604e0ae421db0394790fac557180e094899a32bea9425a7eeec7&w=360"
                                    alt="Success" width="300">

                                <h5 class="mb-3">
                                    Pengajuan Administrasi kamu berhasil dibuat. Mohon menunggu konfirmasi persetujuan
                                    dari
                                    admin. Terimakasih.
                                </h5>

                                <a href="{{ route('administrasi') }}" class="btn btn-success rounded-pill">
                                    Kembali ke halaman Daftar Pengajuan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
