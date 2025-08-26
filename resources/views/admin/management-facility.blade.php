@extends('admin-layouts.app')

@section('page-title', 'Management Facility')

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

    {{-- Card Tambah Facility --}}
    <div class="card mb-4">
      <div class="card-header">Tambah Facility</div>
      <div class="card-body">
        <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label>Nama Facility</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>

    {{-- Card Data List --}}
    <div class="card">
      <div class="card-header">Daftar Facility</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th style="width: 50px;">No</th>
                <th style="width: 120px;">Gambar</th>
                <th style="width: 200px;">Nama</th>
                <th>Deskripsi</th>
                <th style="width: 150px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($facilities as $index => $facility)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>
  @if($facility->image)
    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $facility->id }}">
      <img src="{{ $facility->image }}" 
           class="img-thumbnail" 
           style="max-width: 100px; max-height: 100px; object-fit: contain;" 
           alt="{{ $facility->name }}">
    </a>
  @endif
</td>
                  <td style="max-width: 200px; word-wrap: break-word; white-space: normal;">
                    {{ $facility->name }}
                  </td>
                  <td style="max-width: 350px; word-wrap: break-word; white-space: normal; text-align: left;">
                    {{ $facility->description }}
                  </td>
                  <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $facility->id }}">Edit</button>

                    {{-- Tombol Delete --}}
                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Yakin hapus facility ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>
           
{{-- Modal Preview Gambar --}}
<div class="modal fade" id="imageModal{{ $facility->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0 shadow-none">
      <div class="modal-body text-center">
        <img src="{{ $facility->image }}" 
             class="img-fluid rounded shadow" 
             alt="{{ $facility->name }}"
             style="max-width: 90%; max-height: 80vh; object-fit: contain;">
      </div>
    </div>
  </div>
</div>


                {{-- Modal Edit --}}
                <div class="modal fade" id="editModal{{ $facility->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Facility</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            <label>Gambar Baru</label>
                            <input type="file" name="image" class="form-control">
                            @if($facility->image)
                              <img src="{{ $facility->image }}" class="img-thumbnail mt-2" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                            @endif
                          </div>
                          <div class="mb-3">
                            <label>Nama Facility</label>
                            <input type="text" name="name" value="{{ $facility->name }}" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3">{{ $facility->description }}</textarea>
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
                  <td colspan="5" class="text-center">Belum ada facility</td>
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
