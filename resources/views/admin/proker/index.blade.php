<?php
// FILE: proker/index.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Program Kerja</h1>
        @if(in_array(Auth::user()->role, ['admin', 'sekretaris']))
        <a href="{{ route('admin.proker.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Proker</a>
        @endif
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead><tr><th>#</th><th>Judul</th><th>Status</th>@if(in_array(Auth::user()->role, ['admin', 'sekretaris', 'acara']))<th>Aksi</th>@endif</tr></thead>
            <tbody>
                @forelse ($prokers as $proker)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $proker->judul }}</td>
                        <td><span class="badge bg-info">{{ $proker->status }}</span></td>
                        @if(in_array(Auth::user()->role, ['admin', 'sekretaris', 'acara']))
                        <td>
                            <a href="{{ route('admin.proker.edit', $proker) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.proker.destroy', $proker) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button></form>
                        </td>
                        @endif
                    </tr>
                @empty
                <tr><td colspan="{{ in_array(Auth::user()->role, ['admin', 'sekretaris','acara']) ? 4 : 3 }}" class="text-center">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $prokers->links() }}
@endsection