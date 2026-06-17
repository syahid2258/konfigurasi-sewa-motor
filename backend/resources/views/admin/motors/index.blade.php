@extends('admin.layouts.app')

@section('title', 'Data Motor')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0">Daftar Motor</h5>
        <a href="{{ route('admin.motors.create') }}" class="btn btn-primary btn-sm">Tambah Motor</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tersedia</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($motors as $motor)
                        <tr>
                            <td>
                                <img src="{{ $motor->image }}" alt="Motor" class="img-thumbnail" style="width: 80px;">
                            </td>
                            <td>{{ $motor->name }}</td>
                            <td>{{ $motor->category->name }}</td>
                            <td>{{ $motor->price }}</td>
                            <td>{{ $motor->status }}</td>
                            <td>
                                @if($motor->is_available)
                                    <span class="badge bg-success">Ya</span>
                                @else
                                    <span class="badge bg-danger">Tidak</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.motors.edit', $motor) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.motors.destroy', $motor) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
