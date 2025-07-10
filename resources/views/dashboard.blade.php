@extends('admin.layouts.app')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="alert alert-info">
        <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Anda login sebagai: <strong>{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</strong>.</p>
        <hr>
        <p class="mb-0">Silakan gunakan menu di sebelah kiri untuk mengelola konten yang sesuai dengan jabatan Anda.</p>
    </div>

    {{-- Di sini Anda bisa menambahkan ringkasan atau widget lain nanti --}}
@endsection
