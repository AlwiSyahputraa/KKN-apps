@extends('layouts.app')

@section('content')
    @include('partials._hero', ['items' => $beritas])
    <div class="bg-white py-5">
        @include('partials._berita', ['beritas' => $beritas])
    </div>
    <div class="py-5">
        @include('partials._proker', ['prokers' => $prokers, 'total' => $totalProker])
    </div>
    <div class="bg-white py-5">
        @include('partials._galeri', ['galeris' => $galeris, 'total' => $totalGaleri])
    </div>
@endsection
