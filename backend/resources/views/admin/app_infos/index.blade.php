@extends('admin.layouts.app')

@section('title', 'Info Aplikasi')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0">Daftar Info Aplikasi</h5>
        <a href="{{ route('admin.app_infos.create') }}" class="btn btn-primary btn-sm">Tambah Info</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Versi</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appInfos as $info)
                        <tr>
                            <td>{{ $info->title }}</td>
                            <td>{{ Str::limit($info->content, 50) }}</td>
                            <td>{{ $info->version }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.app_infos.edit', $info) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.app_infos.destroy', $info) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
