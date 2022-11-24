@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Artikel</div>

                    <div class="card-body">
                        <a href="{{ url('artikel/create') }}" class="btn btn-primary">Tambah Artikel</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->judul }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$item->foto) }}" alt="" width="100px">
                                        </td>
                                        <td>{{ $item->isi }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->kategori->nama }}</td>
                                        <td>
                                            <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('delart/' . $item->id) }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
