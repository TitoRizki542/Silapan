<x-app-layout>
    <section>
        <div class="w-100 text-white d-flex align-items-center justify-content-center"
            style="min-height: 40vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(219, 146, 146, 0), rgba(0,0,0,0.8)), url({{ URL::asset('assets/img/borobudur-bg.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h1 class="fw-bold">Detail Pengajuan</h1>
                <h6 class="text-center">
                    <a href="{{ route('home') }}" class="link-light text-decoration-none">Home</a> /
                    <span>Detail Pengajuan</span>
                </h6>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <a href="{{ route('administrasi') }}" class="btn btn-outline-success rounded-pill mb-2"><i
                    class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
            <div class="row mb-3">
                <div class="col-md">
                    <div class="card rounded-4 shadow">
                        <div class="card-body">
                            {{-- Jenis Pengajuan --}}
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <p class="mb-0">Jenis Pengajuan :</p>
                                <p class="mb-0 fw-semibold">
                                    @formatUnderscore($pengajuan->jenis_pengajuan->value)
                                </p>
                            </div>

                            {{-- No Tiket --}}
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <p class="mb-0">No Tiket :</p>
                                <p class="mb-0 fw-semibold">
                                    {{ $pengajuan->no_tiket }}
                                </p>
                            </div>

                            {{-- Status --}}
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <p class="mb-0">Status :</p>
                                <h6 class="mb-0 fw-semibold">
                                    @if ($pengajuan->status->value === 'proses')
                                        <div class="badge bg-warning">
                                            <i class="fa-regular fa-clock-rotate-left"></i> Sedang Proses
                                        </div>
                                    @elseif ($pengajuan->status->value === 'berhasil')
                                        <div class="badge bg-success">
                                            <i class="fa-light fa-circle-check"></i> Setuju
                                        </div>
                                    @elseif ($pengajuan->status->value === 'ditolak')
                                        <div class="badge bg-danger">
                                            <i class="fa-light fa-circle-xmark"></i> Ditolak
                                        </div>
                                    @endif
                                </h6>
                            </div>

                            {{-- Tanggal Verifikasi --}}
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <p class="mb-0">Tanggal Verifikasi :</p>
                                <p class="mb-0 fw-semibold">
                                    {{ $pengajuan->tgl_verifikasi ?? '-' }}
                                </p>
                            </div>

                            {{-- Tanggal Verifikasi --}}
                            <div class="d-flex gap-3 align-items-center mb-2">
                                <p class="mb-0">Catatan :</p>
                                <p class="mb-0 fw-semibold">
                                    {!! $pengajuan->catatan ?? '-' !!}
                                </p>
                            </div>




                            {{-- Alamat Tujaun (Jenis: Pindah Keluar) --}}
                            @if ($pengajuan->jenis_pengajuan->value === 'pindah_keluar')
                                <div class="d-flex gap-3 align-items-center mb-2">
                                    <p class="mb-0">Alamat Tujuan :</p>
                                    <p class="mb-0 fw-semibold">
                                        {!! $pengajuan->alamat_tujuan ?? '-' !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <div class="card rounded-4 shadow overflow-hidden border-0">
                        <div class="card-header bg-success-subtle fw-semibold">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Berkas Persyaratan</span>
                                <a class="btn btn-success rounded-pill"
                                    href="{{ route('administrasi.pengajuan.detail', $pengajuan->no_tiket) }}?export=pdf">
                                    <i class="fa-regular fa-file-arrow-down"></i> Cetak Bukti Pengajuan
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row column-gap-0 gap-3">
                                @foreach ($pengajuan->syarats as $syarat)
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card rounded-4">
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
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
