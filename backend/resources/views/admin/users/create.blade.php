@extends('admin.layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Tambah Pengguna Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="gender">
                        <option value="">Pilih</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Poin Awal</label>
                    <input type="number" class="form-control" name="points" value="{{ old('points', 0) }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" rows="2">{{ old('address') }}</textarea>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_premium" id="is_premium" value="1" {{ old('is_premium') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_premium">
                            Member Premium
                        </label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection
