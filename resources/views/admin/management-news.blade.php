@extends('admin-layouts.app')

@section('title', 'News Management')
@section('page-title', 'News Management')

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

    {{-- Card Tambah News --}}
    <div class="card mb-4">
      <div class="card-header">Tambah News</div>
      <div class="card-body">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
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
            <label>Description</label>
            <textarea name="desc" class="form-control" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>

 
    {{-- Card Data List --}}
<div class="card">
  <div class="card-header">Daftar News</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th style="width: 50px;">No</th>
            <th style="width: 120px;">Gambar</th>
            <th style="width: 200px;">Title</th>
            <th>Description</th>
            <th style="width: 150px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($news as $index => $item)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>
                @if($item->image)
                  <img src="{{ $item->image }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                @endif
              </td>
              <td style="max-width: 200px; word-wrap: break-word; white-space: normal;">
                {{ $item->title }}
              </td>
              <td style="max-width: 350px; word-wrap: break-word; white-space: normal; text-align: left;">
                {{ $item->desc }}
              </td>
              <td>
                {{-- Tombol Edit --}}
                <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

                {{-- Tombol Delete --}}
                <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Yakin hapus news ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
              </td>
            </tr>

            {{-- Modal Edit --}}
            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('news.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label>Gambar Baru</label>
                        <input type="file" name="image" class="form-control">
                        @if($item->image)
                          <img src="{{ $item->image }}" class="img-thumbnail mt-2" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                        @endif
                      </div>
                      <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label>Description</label>
                        <textarea name="desc" class="form-control" rows="3" required>{{ $item->desc }}</textarea>
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
              <td colspan="5" class="text-center">Belum ada news</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>


  </div>
</div>
@endsection
