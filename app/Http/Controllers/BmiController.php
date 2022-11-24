<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan halaman dashboard
        return view('bmi.tampil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $a = new konsul($request->nama, $request->berat, $request->tinggi, $request->hobi, $request->umur,);

        $b = new konsultasi($request->umur, $request->tahun, $request->konsul,);

        $data = [
            'nama' => $a->nama,
            'hobi' => $a->hobi,
            // 'umur' => $a->umur,
            'berat' => $a->berat,
            'tinggi' => $a->tinggireal,
            'bmi' => $a->bmi(),
            'status' => $a->status(),
            'umur' => $b->hitungUmur(),
            'konsul' => $b->konsul(),
        ];

        return view('bmi.tampil', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class hitung
{
    public function __construct($nama, $berat, $tinggi, $hobi,)
    {
        $this->nama = $nama;
        $this->hobi = $hobi;
        $this->berat = $berat;
        // $this->lahir = 2022;
        // $this->tahun = $tahun;
        $this->tinggireal = $tinggi;
        $this->tinggi = $tinggi / 100;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }

    // public function hitungUmur()
    // {
    //     return $this->lahir - $this->tahun;
    // }
}

class konsul extends hitung
{
    public function status()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18.5) {
            return 'Kurus';
        } elseif ($dbmi >= 18.5 && $dbmi <= 22.9) {
            return 'Normal';
        } elseif ($dbmi > 22.9 && $dbmi <= 29.9) {
            return 'Gemuk';
        } elseif ($dbmi > 30) {
            return 'Obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }
}

class umur
{

    public function __construct($tahun)
    {
        $this->tahun = 2022 - $tahun;
    }

    public function hitungUmur()
    {
        return '19';
    }
}

class konsultasi extends umur{

    public function __construct($dbmi)
    {
        $this->bmi = $dbmi;
    }

    public function hitung()
    {
        if ($this->hitungUmur() > 17) {
            return 'Dewasa';
        }else{
            return 'Belum Dewasa';
        }
    }

    public function konsul()
    {
        if ($this->hitung() == 'Dewasa' && $this->bmi == 'Obesitas') {
            return 'Anda bisa mendapatkan Konsultasi Gratis';
        }else{
            return 'Anda tidak bisa mendapatkan Konsultasi Gratis';
        }
    }
}
