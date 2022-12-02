<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekomendasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keluhan = $request->keluhan;
        $tahun = $request->tahun;

        $class = new saran($keluhan, $tahun);

        $data = [
            'keluhan'=>$keluhan,
            'tahun'=>$tahun,
            'umur'=>$class->umur(),
            'jamu'=>$class->namaJamu(),
            'saran'=>$class->Saran(),
            'khasiat'=>$class->khasiat()
        ];

        return view('rekomendasi', compact('data'));
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

class jamu {
    public function __construct($keluhan, $tahun) {
        $this->keluhan = $keluhan;
        $this->tahun = $tahun;
    }

    public function namaJamu(){
        $keluhan = $this->keluhan;

        if ($keluhan == 'Keseleo dan kurang nafsu makan') {
            return 'Beras kencur';
        } else if ($keluhan == 'Pegal-pegal') {
            return 'Kunyit asam';
        } else if($keluhan == 'Darah tinggi dan gula darah') {
            return 'Brotowali';
        } else if ($keluhan == 'Kram perut dan masuk angin') {
            return 'Temulawak';
        } else {
            return 'Terserah beliau mau minum apa';
        }
    }
}

class saran extends jamu{
    public function umur(){
        $tahunLahir = $this->tahun;
        $tahunSekarang = date('Y');

        return $tahunSekarang - $tahunLahir;
    }

    public function Saran(){
        $jamu = $this->namaJamu();
        $keluhan = $this->keluhan;
        $umur = $this->umur();

        if ($jamu == 'Beras kencur' && $keluhan == 'Keseleo dan kurang nafsu makan') {
            return 'Dioleskan';
        } else {
            if ($umur <= 10) {
                return 'Dikonsumsi 1x';
            } else {
                return 'Dikonsumsi 2x';
            }
        }
    }

    public function khasiat(){
        $jamu = $this->namaJamu();

        if ($jamu) {
            return 'Menyembuhkan '. $this->keluhan;
        } else {
            return 'Khasiat tidak ditemukan';
        }
    }
}