@extends('admin-layouts.app')

@section('title', 'Management Room')
@section('page-title', 'Management Room')

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

    {{-- Card Tambah Room --}}
    <div class="card mb-4">
      <div class="card-header">Tambah Room</div>
      <div class="card-body">
        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
          </div>
          <div class="mb-3">
            <label>Nama Room</label>
            <input type="text" name="name_room" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="desc" class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>

    {{-- Card List Room --}}
    <div class="card">
      <div class="card-header">Daftar Room</div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Nama Room</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($rooms as $index => $room)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @if($room->image)
                    <img src="{{ $room->image }}" width="100">
                  @endif
                </td>
                <td>{{ $room->name_room }}</td>
                <td>{{ number_format($room->price,0,',','.') }}</td>
                <td>{{ $room->desc }}</td>
                <td>
                  {{-- Tombol Edit --}}
                  <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $room->id }}">Edit</button>

                  {{-- Tombol Delete --}}
                  <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus room ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>

              {{-- Modal Edit --}}
              <div class="modal fade" id="editModal{{ $room->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Room</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label>Gambar Baru</label>
                          <input type="file" name="image" class="form-control">
                          @if($room->image)
                            <img src="{{ $room->image }}" width="100" class="mt-2">
                          @endif
                        </div>
                        <div class="mb-3">
                          <label>Nama Room</label>
                          <input type="text" name="name_room" value="{{ $room->name_room }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label>Harga</label>
                          <input type="number" name="price" value="{{ $room->price }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label>Deskripsi</label>
                          <textarea name="desc" class="form-control" rows="3">{{ $room->desc }}</textarea>
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
                <td colspan="6" class="text-center">Belum ada room</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
@endsection
