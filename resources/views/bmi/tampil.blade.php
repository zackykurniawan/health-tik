@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Masukkan Data</div>

                    <div class="card-body">
                        <form action="{{ route('bmi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Berat</label>
                                <input type="number" class="form-control" name="berat" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tinggi</label>
                                <input type="number" class="form-control" name="tinggi" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hobi <i>(Masukkan 3 Hobi)</i></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="hobi" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun lahir</label>
                                <input type="number" class="form-control" name="tahun" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/bmi" type="button" class="btn btn-success">Refresh</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Tampilan Data</div>

                    <div class="card-body">
                        <form action="" method="">
                            @isset($data)
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Berat</label>
                                    <input type="number" class="form-control" value="{{ $data['berat'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tinggi</label>
                                    <input type="number" class="form-control" value="{{ $data['tinggi'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">BMI</label>
                                    <input type="number" class="form-control" value="{{ $data['bmi'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hobi</label>
                                    <input type="text" class="form-control" value="{{ $data['hobi'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Umur</label>
                                    <input type="number" class="form-control" value="{{ $data['umur'] }}" readonly>
                                </div>
                                <div class="">
                                    <label class="form-label">Konsultasi Gratis</label>
                                    <input type="text" class="form-control" value="{{ $data['konsultasi'] }}" readonly>
                                </div>
                            @endisset
                        </form>
                    </div>
                </div>
            </div>

        </div>
        {{-- <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">Tabel Data</div>

                    <div class="card-body">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tinggi</th>
                                    <th scope="col">Berat</th>
                                    <th scope="col">BMI</th>
                                    <th scope="col">Status berat badan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @isset($data)
                                        <td>{{ $data['bmi'] }}</td>
                                        <td>{{ $data['obes'] }}</td>
                                    @endisset
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
