@extends('admin.layouts.app')

@section('title', 'Detail Percakapan')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Chat dengan {{ $message->user->name ?? 'Pengguna' }}</h5>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-light">Kembali</a>
            </div>
            <div class="card-body bg-light" style="height: 400px; overflow-y: auto;">
                @foreach($chats as $chat)
                    @if($chat->is_me)
                        <!-- User Message (Left) -->
                        <div class="d-flex mb-3">
                            <div class="bg-white p-3 rounded shadow-sm" style="max-width: 75%;">
                                <p class="mb-1">{{ $chat->text }}</p>
                                <small class="text-muted">{{ $chat->time }}</small>
                            </div>
                        </div>
                    @else
                        <!-- Admin Message (Right) -->
                        <div class="d-flex mb-3 justify-content-end">
                            <div class="bg-primary text-white p-3 rounded shadow-sm" style="max-width: 75%;">
                                <p class="mb-1">{{ $chat->text }}</p>
                                <small class="text-white-50">{{ $chat->time }}</small>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="card-footer bg-white">
                <form action="{{ route('admin.messages.reply', $message) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Tulis balasan..." required>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
