<?php
// ======================================================================
// LANGKAH 7: Perbarui Tampilan Manajemen Akun
// FILE: resources/views/admin/users/index.blade.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Akun</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Akun</a>
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead><tr><th>Nama</th><th>Email</th><th>Jabatan</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge bg-info">{{ ucwords(str_replace('_', ' ', $user->role)) }}</span></td>
                        <td>
                            @if($user->status == 'approved')
                                <span class="badge bg-success">Disetujui</span>
                            @else
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @endif
                        </td>
                        <td>
                            @if($user->status == 'pending')
                                <form action="{{ route('admin.users.approve', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Setujui</button>
                                </form>
                            @endif
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus akun ini?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data akun.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection