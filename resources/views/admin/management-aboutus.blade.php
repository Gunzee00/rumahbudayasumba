@extends('admin-layouts.app')

@section('title', 'About Us Management')
@section('page-title', 'About Us Management')

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
      <div class="card-header">Tambah About Us</div>
      <div class="card-body">
        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>

    {{-- Card Data List --}}
    <div class="card">
      <div class="card-header">Daftar About Us</div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Title</th>
              <th>Subtitle</th>
              <th>Description</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($abouts as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @if($item->image)
                    <img src="{{ $item->image }}" width="100">
                  @endif
                </td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->subtitle }}</td>
                <td>{{ $item->description }}</td>
                <td>
                  {{-- Tombol Edit --}}
                  <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

                  {{-- Tombol Delete --}}
                  <form action="{{ route('about.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>

              {{-- Modal Edit --}}
              <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit About Us</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('about.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label>Gambar Baru</label>
                          <input type="file" name="image" class="form-control">
                          @if($item->image)
                            <img src="{{ $item->image }}" width="100" class="mt-2">
                          @endif
                        </div>
                        <div class="mb-3">
                          <label>Title</label>
                          <input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label>Subtitle</label>
                          <input type="text" name="subtitle" value="{{ $item->subtitle }}" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label>Description</label>
                          <textarea name="description" class="form-control" rows="3" required>{{ $item->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Modal --}}
            @empty
              <tr>
                <td colspan="6" class="text-center">Belum ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
