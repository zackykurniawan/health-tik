@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Daftar Artikel</h2>
            @foreach ($data as $item)
                <div class="col-3 text-center">
                    <div class="card my-3 me-3" style="width: 18rem; height: auto;">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <h6 class="card-text">{{ $item->isi }}</h6>
                            <p class="card-text">{{ $item->tanggal }}</p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('footer')
<footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright: TIK Health
    </div>
</footer>
@endsection
