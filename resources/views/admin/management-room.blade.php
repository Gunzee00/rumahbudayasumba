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

          {{-- Upload Gambar --}}
          <div id="image-wrapper">
            <div class="mb-3 image-field">
              <label>Gambar 1</label>
              <input type="file" name="image1" class="form-control image-input">
              <img class="img-preview mt-2 d-none" style="max-height:150px; border-radius:8px;">
            </div>
          </div>
          <button type="button" id="add-image" class="btn btn-sm btn-outline-primary mb-3">+ Tambah Gambar</button>

          {{-- Nama Room --}}
          <div class="mb-3">
            <label>Nama Room</label>
            <input type="text" name="name_room" class="form-control" required>
          </div>

          {{-- Harga --}}
          <div class="mb-3">
            <label>Harga</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="text" name="price" id="price" class="form-control" required>
            </div>
          </div>

          {{-- Jumlah Kamar --}}
          <div class="mb-3">
            <label>Jumlah Kamar</label>
            <input type="number" name="jumlah_kamar" class="form-control" min="1" required>
          </div>

          {{-- Jumlah Tamu --}}
          <div class="mb-3">
            <label>Jumlah Tamu</label>
            <input type="number" name="jumlah_tamu" class="form-control" min="1" required>
          </div>

          {{-- Fasilitas --}}
          <div id="fasilitas-wrapper">
            <div class="mb-3 fasilitas-field">
              <label>Fasilitas 1</label>
              <input type="text" name="fasilitas1" class="form-control">
            </div>
          </div>
          <button type="button" id="add-fasilitas" class="btn btn-sm btn-outline-primary mb-3">+ Tambah Fasilitas</button>

          {{-- Deskripsi --}}
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="desc" class="form-control" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="background-color:#7B1E1E; border-color:#7B1E1E; color:#FFFFFF;">Tambah</button>
        </form>
      </div>
    </div>

    {{-- Card List Room --}}
    <div class="card">
      <div class="card-header">Daftar Room</div>
      <div class="card-body">
        @forelse($rooms as $room)
          <div class="card mb-3 p-3">

            {{-- 🔹 Gambar --}}
            <div class="row mb-3 text-center">
              @php
                $images = [
                  $room->image1, $room->image2, $room->image3, $room->image4, $room->image5,
                  $room->image6, $room->image7, $room->image8, $room->image9, $room->image10
                ];
                $filteredImages = array_filter($images);
              @endphp
              @if(count($filteredImages) > 0)
                @foreach($filteredImages as $img)
                  <div class="col-md-2 col-4 mb-2">
                    <img src="{{ $img }}" class="img-fluid rounded" style="height:120px; object-fit:cover; width:100%;">
                  </div>
                @endforeach
              @else
                <p class="text-muted">Tidak ada gambar</p>
              @endif
            </div>

            {{-- 🔹 Detail --}}
            <div class="row">
              <div class="col-12">
                <h5 class="card-title">{{ $room->name_room }}</h5>
                <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($room->price,0,',','.') }}</p>
                <p class="mb-1"><strong>Jumlah Kamar:</strong> {{ $room->jumlah_kamar }}</p>
                <p class="mb-2"><strong>Jumlah Tamu:</strong> {{ $room->jumlah_tamu }}</p>
                <p class="mb-2"><strong>Deskripsi:</strong> {{ $room->desc }}</p>

                {{-- List Fasilitas --}}
                <ul>
                  @foreach(range(1,10) as $i)
                    @if(!empty($room->{'fasilitas'.$i}))
                      <li>{{ $room->{'fasilitas'.$i} }}</li>
                    @endif
                  @endforeach
                </ul>

                {{-- Aksi --}}
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $room->id }}">Edit</button>
                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Yakin hapus room ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
              </div>
            </div>
          </div>

          {{-- Modal Edit --}}
          <div class="modal fade" id="editModal{{ $room->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Room</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Room --}}
                    <div class="mb-3">
                      <label>Nama Room</label>
                      <input type="text" name="name_room" value="{{ $room->name_room }}" class="form-control" required>
                    </div>

                    {{-- Harga --}}
                    <div class="mb-3">
                      <label>Harga</label>
                      <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="price" class="form-control" value="{{ number_format($room->price, 0, ',', '.') }}" required>
                      </div>
                    </div>

                    {{-- Jumlah Kamar --}}
                    <div class="mb-3">
                      <label>Jumlah Kamar</label>
                      <input type="number" name="jumlah_kamar" value="{{ $room->jumlah_kamar }}" class="form-control" min="1" required>
                    </div>

                    {{-- Jumlah Tamu --}}
                    <div class="mb-3">
                      <label>Jumlah Tamu</label>
                      <input type="number" name="jumlah_tamu" value="{{ $room->jumlah_tamu }}" class="form-control" min="1" required>
                    </div>

                    {{-- Fasilitas --}}
                    @for($i=1; $i<=10; $i++)
                      <div class="mb-3">
                        <label>Fasilitas {{ $i }}</label>
                        <input type="text" name="fasilitas{{ $i }}" value="{{ $room->{'fasilitas'.$i} }}" class="form-control">
                      </div>
                    @endfor

                    {{-- Upload Gambar Baru --}}
                    @for($i=1; $i<=10; $i++)
                      <div class="mb-3">
                        <label>Ganti Gambar {{ $i }}</label>
                        <input type="file" name="image{{ $i }}" class="form-control">
                        @if($room->{'image'.$i})
                          <img src="{{ $room->{'image'.$i} }}" class="mt-2 rounded" style="max-height:100px;">
                        @endif
                      </div>
                    @endfor

                    {{-- Deskripsi --}}
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
        @empty
          <p class="text-center">Belum ada room</p>
        @endforelse
      </div>
    </div>

  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Format harga
  const priceInputs = document.querySelectorAll('#price');
  priceInputs.forEach(input => {
    input.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value) {
        value = new Intl.NumberFormat('id-ID').format(value);
      }
      e.target.value = value;
    });
  });

  // Fungsi preview gambar
  function previewImage(input) {
    const file = input.files[0];
    const preview = input.nextElementSibling;
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.classList.remove("d-none");
      }
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
      preview.classList.add("d-none");
    }
  }

  // Event untuk input gambar awal
  document.querySelectorAll(".image-input").forEach(input => {
    input.addEventListener("change", function() {
      previewImage(this);
    });
  });

  // Tambah Gambar
  let imageCount = 1;
  document.getElementById("add-image").addEventListener("click", function() {
    if (imageCount < 10) {
      imageCount++;
      const wrapper = document.getElementById("image-wrapper");
      const div = document.createElement("div");
      div.classList.add("mb-3", "image-field");
      div.innerHTML = `
        <label>Gambar ${imageCount}</label>
        <input type="file" name="image${imageCount}" class="form-control image-input">
        <img class="img-preview mt-2 d-none" style="max-height:150px; border-radius:8px;">
      `;
      wrapper.appendChild(div);

      div.querySelector(".image-input").addEventListener("change", function() {
        previewImage(this);
      });
    }
    if (imageCount >= 10) {
      this.disabled = true;
    }
  });

  // Tambah Fasilitas
  let fasilitasCount = 1;
  document.getElementById("add-fasilitas").addEventListener("click", function() {
    if (fasilitasCount < 10) {
      fasilitasCount++;
      const wrapper = document.getElementById("fasilitas-wrapper");
      const div = document.createElement("div");
      div.classList.add("mb-3", "fasilitas-field");
      div.innerHTML = `
        <label>Fasilitas ${fasilitasCount}</label>
        <input type="text" name="fasilitas${fasilitasCount}" class="form-control">
      `;
      wrapper.appendChild(div);
    }
    if (fasilitasCount >= 10) {
      this.disabled = true;
    }
  });
});
</script>
@endsection
