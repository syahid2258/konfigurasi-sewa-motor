@extends('admin.layouts.app')

@section('title', 'Data Pesanan (Booking)')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Daftar Pesanan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pengguna</th>
                        <th>Motor</th>
                        <th>Tanggal</th>
                        <th>Harga Total</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>{{ $booking->user->name ?? 'N/A' }}</td>
                            <td>{{ $booking->motor->name ?? 'N/A' }}</td>
                            <td>{{ $booking->start_date }} s/d {{ $booking->end_date }}</td>
                            <td>{{ $booking->price }}</td>
                            <td>
                                @if($booking->status == 'Menunggu')
                                    <span class="badge bg-warning text-dark">{{ $booking->status }}</span>
                                @elseif($booking->status == 'Aktif')
                                    <span class="badge bg-success">{{ $booking->status }}</span>
                                @elseif($booking->status == 'Selesai')
                                    <span class="badge bg-primary">{{ $booking->status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $booking->status }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> Ubah Status</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
