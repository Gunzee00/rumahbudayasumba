@extends('user-layouts.app')

@section('title', 'Home - Grandoria')

@section('content')
<div class="container mt-5 d-flex justify-content-center custom-gap">
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 500px; width: 100%;">
        <div class="card-body text-center p-4">
            {{-- Avatar --}}
            <div class="mb-3">
                <img src="https://ui-avatars.com/api/?name={{ $user->username }}&background=0D8ABC&color=fff&size=120" 
                     alt="Avatar" 
                     class="rounded-circle shadow">
            </div>

            {{-- Username --}}
            <h4 class="card-title mb-1">{{ ucfirst($user->username) }}</h4>
            <p class="text-muted mb-3">{{ ucfirst($user->role) }}</p>

            {{-- Detail Info --}}
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-person"></i> Username</span>
                    <span class="fw-bold">{{ $user->username }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-shield-lock"></i> Role</span>
                    <span class="fw-bold text-capitalize">{{ $user->role }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-calendar-check"></i> Dibuat pada</span>
                    <span class="fw-bold">{{ $user->created_at->format('d M Y H:i') }}</span>
                </li>
            </ul>

            {{-- Tombol Aksi --}}
            {{-- <div class="mt-4 d-flex justify-content-center gap-2">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary px-4 rounded-pill">
                    <i class="bi bi-pencil-square"></i> Edit Profil
                </a>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger px-4 rounded-pill">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div> --}}
        </div>
    </div>
</div>
@endsection
