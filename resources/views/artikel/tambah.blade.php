@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Artikel</div>

                <div class="card-body">
                    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi</label>
                            <textarea name="isi" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori_id">
                                <option selected>Pilih kategori</option>
                                @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
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
