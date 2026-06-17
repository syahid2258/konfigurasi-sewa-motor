@extends('admin.layouts.app')

@section('title', 'Edit Voucher')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Edit Voucher</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.vouchers.update', $voucher) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Judul Voucher</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $voucher->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="code" class="form-label">Kode Voucher (Unik)</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $voucher->code) }}" required>
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="discount" class="form-label">Diskon (Misal: 10% atau Rp 20.000)</label>
                <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount', $voucher->discount) }}" required>
                @error('discount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="valid_until" class="form-label">Berlaku Sampai (Tanggal)</label>
                <input type="date" class="form-control @error('valid_until') is-invalid @enderror" id="valid_until" name="valid_until" value="{{ old('valid_until', $voucher->valid_until) }}" required>
                @error('valid_until')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.vouchers.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
