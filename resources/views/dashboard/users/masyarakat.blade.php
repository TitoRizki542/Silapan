@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Masyarakat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Masyarakat</li>
        </ol>

        <div class="card rounded-4 shadow mb-4">
            <div class="card-header">
                <i class="fa-solid fa-user me-1"></i>
                Daftar Masyarakat
            </div>
            <div class="card-body w-100">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($masyarakat as $ms)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $ms->user_detail->nama_depan }}
                                    {{ $ms->user_detail->nama_belakang }}
                                </td>
                                <td>{{ $ms->username }}</td>
                                <td>{{ $ms->email }}</td>
                                <td>
                                    <a href="{{ route('users.masyarakat.detail', $ms->username) }}"
                                        class="btn btn-sm btn-primary rounded-pill">
                                        <i class="fa-sharp fa-regular fa-eye"></i> Detail
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
