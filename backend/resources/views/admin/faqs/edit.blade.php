@extends('admin.layouts.app')

@section('title', 'Edit FAQ')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Edit FAQ</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="question" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control" name="question" value="{{ old('question', $faq->question) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="answer" class="form-label">Jawaban</label>
                <textarea class="form-control" name="answer" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
