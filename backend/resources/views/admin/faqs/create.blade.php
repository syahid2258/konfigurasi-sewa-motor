@extends('admin.layouts.app')

@section('title', 'Tambah FAQ')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Tambah FAQ Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.faqs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="question" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control" name="question" value="{{ old('question') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="answer" class="form-label">Jawaban</label>
                <textarea class="form-control" name="answer" rows="4" required>{{ old('answer') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
