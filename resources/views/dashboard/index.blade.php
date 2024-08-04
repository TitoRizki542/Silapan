@extends('dashboard.layouts.app')

@section('content')
    <div class="container-fluid px-4 min-vh-100">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            @if (auth('admin')->user()->role === 'admin')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 rounded-4 shadow">
                        <div class="card-body">
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <i class="fa-solid fa-people-pulling"></i> Jumlah Masyarakat
                                </div>
                                <div>
                                    <h5 class="mb-0">{{ $totalMasyarakat }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link" href="{{ route('users.masyarakat') }}">
                                View Details
                            </a>
                            <div class="small"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-6 col-md-3">
                <div class="card mb-4 rounded-4 shadow">
                    <div class="card-body">
                        <div class="d-flex flex-column gap-2">
                            <div>
                                <i class="fa-regular fa-files"></i> Jumlah Pengajuan
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $totalAdm }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="{{ route('admin.administrasi') }}">View Details</a>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
