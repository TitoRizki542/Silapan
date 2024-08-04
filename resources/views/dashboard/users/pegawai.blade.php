@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pegawai</li>
        </ol>

        <div class="card rounded-4 shadow mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa-solid fa-user-tie me-1"></i>
                        Daftar Pegawai
                    </div>

                    <div>
                        <a href="{{ route('users.pegawai.create') }}" class="btn btn-success rounded-pill">
                            <i class="fa-regular fa-circle-plus"></i> Tambahkan Pegawai
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body w-100">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pegawai as $pt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pt->name }}</td>
                                <td>{{ $pt->username }}</td>
                                <td>{{ $pt->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
