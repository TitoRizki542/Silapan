@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Administrasi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Administrasi</li>
        </ol>

        <div class="card rounded-4 shadow mb-4">
            <div class="card-header">
                <i class="fa-solid fa-user me-1"></i>
                Daftar Masyarakat
            </div>
            <div class="card-body w-100">
                <div class="row mb-3">
                    <h6>Pencarian</h6>
                    <div class="col-md">
                        <form method="GET" class="d-flex gap-2">
                            <select name="status" id="status" class="form-select rounded-pill">
                                <option value="">-- Pilih Status --</option>
                                <option value="berhasil" @selected(request()->input('status') == 'berhasil')>Setuju</option>
                                <option value="ditolak" @selected(request()->input('status') == 'ditolak')>Ditolak</option>
                                <option value="proses" @selected(request()->input('status') == 'proses')>Proses</option>
                            </select>

                            <select name="jenis_pengajuan" id="jenis_pengajuan" class="form-select rounded-pill">
                                <option value="">-- Pilih Jenis Pengajuan --</option>
                                @foreach ($jenisPengajuan as $jp)
                                    <option value="{{ $jp->value }}" @selected($jp->value == request()->input('jenis_pengajuan'))>
                                        @formatUnderscore($jp->value)
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-success rounded-pill">Cari</button>
                        </form>

                        <span class="text-muted">Pencarian ini berdasarkan jenis pengajuan dan status pada pengajuan.</span>
                    </div>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Tiket</th>
                            <th>Nama yang Mengajukan</th>
                            <th>Jenis Pengajuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>No Tiket</th>
                            <th>Nama yang Mengajukan</th>
                            <th>Jenis Pengajuan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($administrasis as $administrasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $administrasi->no_tiket }}</td>
                                <td>
                                    {{ $administrasi->user->user_detail->nama_depan }}
                                    {{ $administrasi->user->user_detail->nama_belakang }}
                                </td>
                                <td>
                                    @formatUnderscore($administrasi->jenis_pengajuan->value)

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
                                </td>
                                <td>{{ $administrasi->created_at->format('d F Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.administrasi.detail', $administrasi->no_tiket) }}"
                                        class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fa-regular fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
