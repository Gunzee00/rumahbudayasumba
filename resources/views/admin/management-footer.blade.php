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
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th style="width:200px;">Address</th>
                    <th style="width:180px;">Email</th>
                    <th>Phone</th>
                    <th style="width:180px;">Facebook</th>
                    <th style="width:180px;">Youtube</th>
                    <th style="width:180px;">Instagram</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($footers as $index => $footer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td style="word-break: break-word; white-space: normal;">{{ $footer->address }}</td>
                    <td style="word-break: break-word; white-space: normal;">{{ $footer->email }}</td>
                    <td>{{ $footer->phone }}</td>
                    <td style="word-break: break-word; white-space: normal;">{{ $footer->facebook }}</td>
                    <td style="word-break: break-word; white-space: normal;">{{ $footer->youtube }}</td>
                    <td style="word-break: break-word; white-space: normal;">{{ $footer->instagram }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $footer->id }}">Edit</button>
                        <form action="{{ route('footer.destroy', $footer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
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
