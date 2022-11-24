@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Artikel</div>

                    <div class="card-body">
                        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" required
                                    value="{{ $artikel->judul }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label><br>
                                <img src="{{ asset('storage/' . $artikel->foto) }}" alt="" width="100px">
                                <input type="file" class="form-control mt-2" name="foto">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <textarea name="isi" class="form-control" required>{{ $artikel->isi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required
                                    value="{{ $artikel->tanggal }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori_id">
                                    <option selected>Pilih kategori</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{ $kt->id }}" @selected($artikel->kategori_id == $kt->id)>{{ $kt->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
