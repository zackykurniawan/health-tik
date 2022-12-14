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
        $result = new konsul($request->tahun, $request->berat, $request->tinggi);

        $data = [
            'nama' => $request->nama,
            'hobi' => $request->hobi,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'bmi' => $result->hitungBMI(),
            'status' => $result->status(),
            'umur' => $result->hitungUmur(),
            'konsultasi' => $result->konsultasi(),
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
    public function __construct($tahun, $berat, $tinggi)
    {
        $this->tahun = $tahun;
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
    }

    public function hitungBMI()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }

    public function hitungUmur()
    {
        return 2022 - $this->tahun;
    }
}

class konsul extends hitung
{
    public function status()
    {
        $hbmi = $this->hitungBMI();

        if ($hbmi < 18.5) {
            return 'Kurus';
        } elseif ($hbmi >= 18.5 && $hbmi <= 22.9) {
            return 'Normal';
        } elseif ($hbmi > 22.9 && $hbmi <= 29.9) {
            return 'Gemuk';
        } elseif ($hbmi > 30) {
            return 'Obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }

    public function konsultasi()
    {
        if($this->hitungUmur() >= 17 && $this->hitungBMI() >= 30){
            return 'Anda Mendapatkan Konsultasi Gratis';
        } else {
            return 'Anda tidak mendapatkan Konsultasi Gratis';
        }
    }
}

// class umur
// {

//     public function __construct($tahun)
//     {
//         $this->tahun = 2022 - $tahun;
//     }

//     public function hitungUmur()
//     {
//         return $this->tahun;
//     }
// }

// class konsultasi extends umur{

//     public function __construct($dbmi)
//     {
//         $this->bmi = $dbmi;
//     }

//     public function hitung()
//     {
//         if ($this->hitungUmur() > 17) {
//             return 'Dewasa';
//         }else{
//             return 'Belum Dewasa';
//         }
//     }

//     public function konsul()
//     {
//         if ($this->hitung() == 'Dewasa' && $this->status() == 'Obesitas') {
//             return 'Anda bisa mendapatkan Konsultasi Gratis';
//         }else{
//             return 'Anda tidak bisa mendapatkan Konsultasi Gratis';
//         }
//     }
// }
