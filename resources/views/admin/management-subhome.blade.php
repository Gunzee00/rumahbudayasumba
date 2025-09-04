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
                <button type="submit" class="btn btn-primary" style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">Simpan</button>
            </form>
        </div>
    </div>

    {{-- List Data ke bawah --}}
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
                    {{-- Tombol Edit buka modal --}}
                    <button class="btn btn-warning btn-sm" 
                        style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;" 
                        data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                        Edit
                    </button>

                    {{-- Hapus --}}
                    <form action="{{ route('subhome.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" 
                            class="btn btn-danger btn-sm" 
                            style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

            {{-- Modal Edit --}}
            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#7B1E1E; color:#fff;">
                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit SubHome</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('subhome.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control" value="{{ $item->sub_title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $item->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Image 1</label>
                                    <input type="file" name="image1" class="form-control">
                                    @if($item->image1)
                                        <img src="{{ $item->image1 }}" width="120" class="mt-2">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label>Image 2</label>
                                    <input type="file" name="image2" class="form-control">
                                    @if($item->image2)
                                        <img src="{{ $item->image2 }}" width="120" class="mt-2">
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary" style="background-color:#7B1E1E; border-color:#7B1E1E;">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Modal --}}
        @empty
            <p class="text-center">Belum ada data</p>
        @endforelse
    </div>
</div>


</div>

@endsection
