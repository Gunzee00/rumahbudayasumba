@extends('admin-layouts.app')

@section('title', 'SubHome Management')
@section('page-title', 'SubHome Management')

@section('content')

<div class="container">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah --}}
    <div class="card mb-4">
        <div class="card-header">Tambah SubHome</div>
        <div class="card-body">
            <form action="{{ route('subhome.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Image 1</label>
                    <input type="file" name="image1" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Image 2</label>
                    <input type="file" name="image2" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    {{-- List Data ke bawah --}}
    <div class="card">
        <div class="card-header">Daftar SubHome</div>
        <div class="card-body">
            @forelse($subhomes as $item)
                <div class="border rounded p-3 mb-3">
                    <h5>{{ $item->title }}</h5>
                    <p><strong>Sub Title:</strong> {{ $item->sub_title }}</p>
                    <p><strong>Description:</strong> {{ $item->description }}</p>

                    @if($item->image1)
                        <p><strong>Image 1:</strong></p>
                        <img src="{{ $item->image1 }}" alt="Image1" width="200" class="mb-2 d-block">
                    @endif

                    @if($item->image2)
                        <p><strong>Image 2:</strong></p>
                        <img src="{{ $item->image2 }}" alt="Image2" width="200" class="mb-2 d-block">
                    @endif

                    <div class="mt-2">
                        {{-- Tombol Edit (bisa diarahkan ke modal atau form edit terpisah) --}}
                        <a href="{{ route('subhome.show', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        {{-- Hapus --}}
                        <form action="{{ route('subhome.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada data</p>
            @endforelse
        </div>
    </div>

</div>

@endsection
