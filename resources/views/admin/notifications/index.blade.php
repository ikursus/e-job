@extends('admin.induk')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1 class="page-title"><i class="bi bi-people me-2"></i>Pengurusan Notifikasi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-house me-1"></i>Dashboard</a></li>
                <li class="breadcrumb-item active">Notifikasi</li>
            </ol>
        </nav>
    </div>

    @include('alerts')
    
    <!-- Users Table -->
    <div class="card table-card fade-in" style="animation-delay: 0.6s">
        <div class="table-header">
            <h5><i class="bi bi-list-ul me-2"></i>Senarai Notifikasi</h5>
            <small class="opacity-75">Senarai Notifikasi</small>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table" id="table-datatables">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash me-1"></i>ID</th>
                            <th><i class="bi bi-person me-1"></i>PERKARA</th>
                            <th><i class="bi bi-gear me-1"></i>TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->notifications as $notification)
                            <tr>
                                <td>{{ $notification->id }}</td>
                                <td>
                                    Terdapat permohonan baru untuk jawatan<br> 
                                    {{ $notification->data['nama_jawatan'] }}<br>
                                    daripada {{ $notification->data['nama_pemohon'] }}
                                </td>
                                <td>
                                    @if(!$notification->read_at)
                                        <a href="{{ route('admin.notifications.read', $notification->id) }}" class="btn btn-sm btn-primary">Baca</a>
                                    @endif

                                    <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="post" onsubmit="return confirm('Adakah anda yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('admin.notifications.destroy') }}" method="post" onsubmit="return confirm('Adakah anda yakin?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus Semua</button>
            </form>
        </div>
    </div>
</div>
@endsection
