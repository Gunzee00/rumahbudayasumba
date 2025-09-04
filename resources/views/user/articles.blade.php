@extends('user-layouts.app')

@section('title', 'My Bookings - Grandoria')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Artikel</h2>

    @if($articles->isEmpty())
        <p>Tidak ada artikel tersedia.</p>
    @else
        <div class="row">
            @foreach($articles as $article)
                <div class="col-12 mb-3"> {{-- full width --}}
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">
                                {{ Str::limit($article->content, 150) }}
                            </p>
                            <p class="text-muted mb-0">{{ $article->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
