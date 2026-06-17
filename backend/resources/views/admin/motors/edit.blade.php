@extends('admin.layouts.app')

@section('title', 'Edit Motor')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Edit Motor</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.motors.update', $motor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Motor</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $motor->name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $motor->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga (Contoh: Rp 150.000/hari)</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price', $motor->price) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">URL Gambar</label>
                    <input type="url" class="form-control" name="image" value="{{ old('image', $motor->image) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" step="0.1" max="5" class="form-control" name="rating" value="{{ old('rating', $motor->rating) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status (Teks misal: 'Tersedia')</label>
                    <input type="text" class="form-control" name="status" value="{{ old('status', $motor->status) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kapasitas Bensin</label>
                    <input type="text" class="form-control" name="fuel_capacity" value="{{ old('fuel_capacity', $motor->fuel_capacity) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Transmisi</label>
                    <input type="text" class="form-control" name="transmission" value="{{ old('transmission', $motor->transmission) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kapasitas Mesin</label>
                    <input type="text" class="form-control" name="engine_capacity" value="{{ old('engine_capacity', $motor->engine_capacity) }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="3" required>{{ old('description', $motor->description) }}</textarea>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $motor->is_available) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">
                            Tersedia untuk disewa
                        </label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('admin.motors.index') }}" class="btn btn-light mt-3">Batal</a>
        </form>
    </div>
</div>
@endsection
