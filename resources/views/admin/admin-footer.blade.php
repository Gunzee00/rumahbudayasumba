@extends('admin-layouts.app')

@section('title', 'Footer Management')
@section('page-title', 'Footer Management')

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

        {{-- Card Tambah Footer --}}
        <div class="card mb-4">
            <div class="card-header">Tambah Footer</div>
            <div class="card-body">
                <form action="{{ route('footer.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Facebook</label>
                        <input type="url" name="facebook" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Youtube</label>
                        <input type="url" name="youtube" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Instagram</label>
                        <input type="url" name="instagram" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>

        {{-- Card Data List --}}
        <div class="card">
            <div class="card-header">Daftar Footer</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Facebook</th>
                            <th>Youtube</th>
                            <th>Instagram</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($footers as $index => $footer)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $footer->address }}</td>
                            <td>{{ $footer->email }}</td>
                            <td>{{ $footer->phone }}</td>
                            <td>{{ $footer->facebook }}</td>
                            <td>{{ $footer->youtube }}</td>
                            <td>{{ $footer->instagram }}</td>
                            <td>
                                {{-- Tombol Edit --}}
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $footer->id }}">Edit</button>

                                {{-- Tombol Delete --}}
                                <form action="{{ route('footer.destroy', $footer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editModal{{ $footer->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Footer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('footer.update', $footer->id) }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Address</label>
                                                <input type="text" name="address" value="{{ $footer->address }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{ $footer->email }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{ $footer->phone }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Facebook</label>
                                                <input type="url" name="facebook" value="{{ $footer->facebook }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Youtube</label>
                                                <input type="url" name="youtube" value="{{ $footer->youtube }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Instagram</label>
                                                <input type="url" name="instagram" value="{{ $footer->instagram }}" class="form-control">
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
                            <td colspan="8" class="text-center">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
