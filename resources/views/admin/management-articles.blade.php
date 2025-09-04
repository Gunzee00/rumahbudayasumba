@extends('admin-layouts.app')

@section('title', 'Articles Management')
@section('page-title', 'Articles Management')

@section('content')
<div class="container">
    <!-- 🔹 Alert Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- 🔹 Form Tambah/Edit Article -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 id="formTitle">Tambah Article</h5>
        </div>
        <div class="card-body">
            <form id="articleForm" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="article_id" id="article_id">

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (Opsional)</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan</button>
                <button type="reset" class="btn btn-secondary" id="btnReset">Reset</button>
            </form>
        </div>
    </div>

    <!-- 🔹 Tabel List Articles -->
    <div class="card">
        <div class="card-header">
            <h5>Daftar Articles</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $index => $article)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ Str::limit($article->description, 50) }}</td>
                            <td>
                                @if($article->image)
                                    <img src="{{ $article->image }}" width="80" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit -->
                                <button 
                                    class="btn btn-warning btn-sm editBtn" 
                                    data-id="{{ $article->id }}" 
                                    data-title="{{ $article->title }}" 
                                    data-description="{{ $article->description }}">
                                    Edit
                                </button>

                                <!-- Delete -->
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus artikel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada artikel</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- 🔹 Script Edit -->
<script>
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.getElementById('formTitle').innerText = "Edit Article";
            document.getElementById('btnSubmit').innerText = "Update";

            let form = document.getElementById('articleForm');
            form.action = "/admin/articles-management/" + this.dataset.id;

            // hapus _method lama biar gak dobel
            let oldMethod = form.querySelector('input[name="_method"]');
            if (oldMethod) oldMethod.remove();

            // tambahkan hidden input _method=PUT
            let hiddenMethod = document.createElement('input');
            hiddenMethod.type = "hidden";
            hiddenMethod.name = "_method";
            hiddenMethod.value = "PUT";
            form.appendChild(hiddenMethod);

            document.getElementById('article_id').value = this.dataset.id;
            document.getElementById('title').value = this.dataset.title;
            document.getElementById('description').value = this.dataset.description;
        });
    });

    // Reset form
    document.getElementById('btnReset').addEventListener('click', function () {
        let form = document.getElementById('articleForm');
        document.getElementById('formTitle').innerText = "Tambah Article";
        document.getElementById('btnSubmit').innerText = "Simpan";
        form.action = "{{ route('admin.articles.store') }}";

        // hapus _method PUT kalau ada
        let oldMethod = form.querySelector('input[name="_method"]');
        if (oldMethod) oldMethod.remove();
    });
</script>
@endsection
