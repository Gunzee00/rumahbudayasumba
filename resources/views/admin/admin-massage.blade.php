@extends('admin-layouts.app')

@section('title', 'Manajemen Pesan')
@section('page-title', 'Daftar Pesan Contact Us')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($messages as $msg)
        <div class="card shadow-sm mb-4 border-0 rounded-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title mb-1">{{ $msg->subject }}</h5>
                        <p class="text-muted mb-2">
                            <strong>{{ $msg->name }}</strong> | {{ $msg->email }} | {{ $msg->phone }}
                        </p>
                    </div>
                    <form action="{{ route('contact.destroy', $msg->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin hapus pesan ini?')" class="ms-3">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>

                <div class="mt-3 p-3 bg-light rounded" style="max-height: 200px; overflow-y: auto;">
                    {{ $msg->message }}
                </div>

                <small class="text-muted d-block mt-2">
                    Dikirim pada: {{ $msg->created_at->format('d M Y, H:i') }}
                </small>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">Belum ada pesan.</div>
    @endforelse
</div>
@endsection
