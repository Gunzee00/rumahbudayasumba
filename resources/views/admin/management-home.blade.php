@extends('admin-layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-12">

    {{-- Alert Message --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Card Tambah Data --}}
    <div class="card mb-4">
      <div class="card-header">Tambah Data Home</div>
      <div class="card-body">
        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label>Main Image</label>
            <input type="file" name="main_image" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea name="desc" class="form-control" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>

    {{-- Card Data List --}}
<div class="card">
  <div class="card-header">Daftar Home</div>
  <div class="card-body">
    @forelse($homes as $index => $home)
      <div class="card mb-3 shadow-sm">
        <div class="row g-0 align-items-center">
          {{-- Kolom Gambar --}}
          <div class="col-md-3 text-center p-2">
            @if($home->main_image)
              <img src="{{ $home->main_image }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
            @else
              <span class="text-muted">No Image</span>
            @endif
          </div>

          {{-- Kolom Konten --}}
          <div class="col-md-6 p-3">
            <h5 class="mb-1">{{ $home->title }}</h5>
            <p class="mb-0 text-muted">{{ $home->desc }}</p>
          </div>

          {{-- Kolom Aksi --}}
          <div class="col-md-3 text-end p-3">
            {{-- Tombol Edit --}}
            <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $home->id }}">Edit</button>

            {{-- Tombol Delete --}}
            <form action="{{ route('home.destroy', $home->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </div>
        </div>
      </div>

      {{-- Modal Edit --}}
      <div class="modal fade" id="editModal{{ $home->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('home.update', $home->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label>Main Image</label>
                  <input type="file" name="main_image" class="form-control">
                  @if($home->main_image)
                    <img src="{{ $home->main_image }}" width="100" class="img-thumbnail mt-2">
                  @endif
                </div>
                <div class="mb-3">
                  <label>Title</label>
                  <input type="text" name="title" value="{{ $home->title }}" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Description</label>
                  <textarea name="desc" class="form-control" rows="3" required>{{ $home->desc }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End Modal --}}

    @empty
      <div class="text-center text-muted">Belum ada data</div>
    @endforelse
  </div>
</div>


  </div>
</div>
@endsection
