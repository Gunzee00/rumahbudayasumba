@extends('admin-layouts.app')

@section('title', 'Galeri Management')
@section('page-title', 'Galeri Management')

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
      <div class="card-header">Tambah Gambar</div>
      <div class="card-body">
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
            @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary" style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">Tambah</button>
        </form>
      </div>
    </div>

    {{-- Card Data List --}}
    <div class="card">
      <div class="card-header">Daftar Galeri</div>
      <div class="card-body">
        <table class="table table-bordered align-middle">
          <thead>
            <tr>
              <th style="width: 50px">No</th>
              <th style="width: 150px">Gambar</th>
              <th style="width: 200px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($galeri as $index => $item)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @if($item->image)
                    <img src="{{ $item->image }}" width="120" class="img-thumbnail">
                  @endif
                </td>
                <td>
                  {{-- Tombol Edit --}}
                  <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}" style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">
                    Edit
                  </button>

                  {{-- Tombol Delete --}}
                  <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm" style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>

              {{-- Modal Edit --}}
              <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Gambar</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('galeri.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label">Gambar Baru</label>
                          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                          @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror

                          @if($item->image)
                            <img src="{{ $item->image }}" width="120" class="mt-2 img-thumbnail">
                          @endif
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
                <td colspan="3" class="text-center">Belum ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
