@extends('admin.layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Edit Pengguna</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password (Biarkan kosong jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="gender">
                        <option value="">Pilih</option>
                        <option value="Laki-laki" {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Poin</label>
                    <input type="number" class="form-control" name="points" value="{{ old('points', $user->points) }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="address" rows="2">{{ old('address', $user->address) }}</textarea>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_premium" id="is_premium" value="1" {{ old('is_premium', $user->is_premium) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_premium">
                            Member Premium
                        </label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection
