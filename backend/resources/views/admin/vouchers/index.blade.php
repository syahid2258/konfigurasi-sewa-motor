@extends('admin.layouts.app')

@section('title', 'Data Voucher')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0">Daftar Voucher</h5>
        <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary btn-sm">Tambah Voucher</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kode</th>
                        <th>Diskon</th>
                        <th>Berlaku Sampai</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->title }}</td>
                            <td><span class="badge bg-secondary">{{ $voucher->code }}</span></td>
                            <td>{{ $voucher->discount }}</td>
                            <td>{{ $voucher->valid_until }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.vouchers.edit', $voucher) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.vouchers.destroy', $voucher) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
