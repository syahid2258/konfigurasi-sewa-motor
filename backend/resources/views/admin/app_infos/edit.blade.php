@extends('admin.layouts.app')

@section('title', 'Edit Info Aplikasi')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Edit Info Aplikasi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.app_infos.update', $appInfo) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $appInfo->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="version" class="form-label">Versi</label>
                <input type="text" class="form-control" name="version" value="{{ old('version', $appInfo->version) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" name="content" rows="4" required>{{ old('content', $appInfo->content) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.app_infos.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
