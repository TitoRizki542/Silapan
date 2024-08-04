<x-app-layout>
    @push('css')
        <style>
            @media (max-width: 1080px) {
                .w-md-screen {
                    width: 1080px
                }
            }
        </style>
    @endpush

    <section>
        <div class="w-100 text-white d-flex align-items-center justify-content-center"
            style="min-height: 40vh; background-image: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(219, 146, 146, 0), rgba(0,0,0,0.8)), url({{ URL::asset('assets/img/borobudur-bg.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="">
                <h1 class="fw-bold">Pelayanan Administrasi</h1>
                <h6 class="text-center">
                    <a href="{{ route('home') }}" class="link-light text-decoration-none">Home</a> /
                    <span>Pelayanan Administrasi</span>
                </h6>
            </div>
        </div>
    </section>

    <section>
        <div class=""></div>
        <div class="container py-5">
            <form method="get">
                <div class="row mb-3">
                    <h5>Cari Pengajuanmu</h5>
                        <form action="{{route('administrasi.cari')}}" method="GET">
                            <div class="col-md-5 mb-3 mb-md-0">
                            <label for="jenis_pengajuan">Jenis Pengajuan</label>
                            <div class="input-group">
                                <select name="jenis_pengajuan" id="jenis_pengajuan" class="form-select rounded-pill">
                                    <option value="$administrasi->jenis_pengajuan">-- Pilih Jenis Pengajuan --</option>
                                    @foreach ($jenisPengajuan as $jp)
                                    <option value="{{ $jp->value }}" @selected($jp->value == request()->input('jenis_pengajuan'))>@formatUnderscore($jp->value)
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 align-self-md-end w-full">
                                <button class="btn btn-success rounded-pill" style="width: 100%">
                                    <i class="fa-regular fa-magnifying-glass"></i> Cari
                                </button>
                            </div>
                        </form>
                    <!-- <div class="col-md-5 mb-3 mb-md-0">
                        <label for="no_tiket">No Tiket</label>
                        <div class="input-group">
                            <input type="text" class="form-control rounded-pill" name="no_tiket"
                                value="{{ request()->input('no_tiket') }}" placeholder="Masukan no tiket disini...">
                        </div>
                    </div> -->

                    
                </div>
            </form>

            <div class="row">
                <div class="col-md">
                    <div class="card border-0 shadow rounded-4 overflow-hidden">
                        <div class="card-header mb-0 bg-success-subtle border-0 fw-semibold">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Daftar Pengajuan</span>
                                <a class="btn btn-success rounded-pill" href="{{ route('administrasi.pengajuan') }}">
                                    <i class="fa-regular fa-circle-plus"></i> Buat Pengajuan
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mb-3 mb-md-0">
                                <table class="table align-middle w-md-screen">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">No Tiket</th>
                                            <th scope="col">Jenis Pengajuan</th>
                                            <th scope="col">Tanggal Pengajuan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($administrasis as $administrasi)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $administrasi->no_tiket }}</td>
                                                <td>@formatUnderscore($administrasi->jenis_pengajuan->value)</td>
                                                <td>{{ $administrasi->created_at->format('d F Y') }}</td>
                                                <td>
                                                    @if ($administrasi->status->value === 'proses')
                                                        <div class="badge bg-warning">
                                                            <i class="fa-regular fa-clock-rotate-left"></i> Sedang
                                                            Proses
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
                                                </td>
                                                <td>
                                                    <a href="{{ route('administrasi.pengajuan.detail', $administrasi->no_tiket) }}"
                                                        class="btn btn-sm btn-primary rounded-pill">
                                                        <i class="fa-sharp fa-regular fa-eye"></i> Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    <p class="text-muted mb-0 text-center">
                                                        Tidak ada data pengajuan.
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $administrasis->links() }}
                            </div>
                            <small class="text-muted mb-0 d-md-none">
                                Scroll ke kanan/kiri untuk melihat data
                                pengajuan
                                lainya.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
