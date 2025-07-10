@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengaturan Website</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">Upload Logo</div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <p><strong>Logo Saat Ini:</strong></p>
                        <img src="{{ asset($settings['logo_path'] ?? '') }}" alt="Logo saat ini" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Pilih Logo Baru</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo">
                            @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Logo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Informasi Desa</div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="deskripsi_desa" class="form-label">Deskripsi Singkat Desa</label>
                    <textarea name="deskripsi_desa" id="deskripsi_desa" rows="4" class="form-control @error('deskripsi_desa') is-invalid @enderror">{{ old('deskripsi_desa', $settings['deskripsi_desa'] ?? '') }}</textarea>
                    @error('deskripsi_desa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="lokasi_kkn_map" class="form-label">URL Google Maps Embed</label>
                    <input type="url" name="lokasi_kkn_map" id="lokasi_kkn_map" class="form-control @error('lokasi_kkn_map') is-invalid @enderror" value="{{ old('lokasi_kkn_map', $settings['lokasi_kkn_map'] ?? '') }}">
                    @error('lokasi_kkn_map')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Informasi</button>
            </form>
        </div>
    </div>
@endsection