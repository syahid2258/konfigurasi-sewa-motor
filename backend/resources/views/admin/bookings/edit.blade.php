@extends('admin.layouts.app')

@section('title', 'Verifikasi Pembayaran / Pesanan')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Detail Pesanan #{{ $booking->id }}</h5>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h6>Informasi Pengguna</h6>
                <p class="mb-1"><strong>Nama:</strong> {{ $booking->user->name ?? 'N/A' }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ $booking->user->email ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <h6>Informasi Motor</h6>
                <p class="mb-1"><strong>Nama Motor:</strong> {{ $booking->motor->name ?? 'N/A' }}</p>
                <p class="mb-1"><strong>Tanggal Sewa:</strong> {{ $booking->start_date }} s/d {{ $booking->end_date }}</p>
                <p class="mb-1"><strong>Harga Total:</strong> {{ $booking->price }}</p>
                <p class="mb-1"><strong>Lokasi:</strong> {{ $booking->location }}</p>
            </div>
        </div>

        <hr>

        <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="status" class="form-label">Ubah Status Pesanan</label>
                <select class="form-select" name="status" id="status" required>
                    <option value="Menunggu" {{ $booking->status == 'Menunggu' ? 'selected' : '' }}>Menunggu (Verifikasi Pembayaran)</option>
                    <option value="Aktif" {{ $booking->status == 'Aktif' ? 'selected' : '' }}>Aktif (Sedang Disewa)</option>
                    <option value="Selesai" {{ $booking->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Dibatalkan" {{ $booking->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Status</button>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>
@endsection
