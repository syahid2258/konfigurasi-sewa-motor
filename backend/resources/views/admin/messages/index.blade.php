@extends('admin.layouts.app')

@section('title', 'Percakapan / Chat')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0">Daftar Percakapan</h5>
    </div>
    <div class="card-body">
        <div class="list-group">
            @forelse($messages as $msg)
                <a href="{{ route('admin.messages.show', $msg) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $msg->user->name ?? $msg->sender_name ?? 'Pengguna Tidak Diketahui' }}</h6>
                            <p class="mb-0 text-muted small text-truncate" style="max-width: 300px;">
                                {{ $msg->text }}
                            </p>
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="text-muted d-block">{{ $msg->time }}</small>
                        @if($msg->unread_count > 0)
                            <span class="badge bg-danger rounded-pill">{{ $msg->unread_count }}</span>
                        @endif
                    </div>
                </a>
            @empty
                <div class="text-center py-4">
                    <p class="text-muted">Tidak ada percakapan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
