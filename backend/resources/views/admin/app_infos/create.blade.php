@extends('admin.layouts.app')

@section('title', 'Tambah Info Aplikasi')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Tambah Info Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.app_infos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="version" class="form-label">Versi</label>
                <input type="text" class="form-control" name="version" value="{{ old('version') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" name="content" rows="4" required>{{ old('content') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.app_infos.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
