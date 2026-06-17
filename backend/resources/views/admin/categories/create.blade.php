@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Tambah Kategori Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
