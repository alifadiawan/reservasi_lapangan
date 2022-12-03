<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\session;
use Illuminate\Http\Request;

use App\Models\reservasi;
use App\Models\lapangan;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $data = reservasi::all();
        $lapangan = lapangan::all();
        return view ('jadwal_lapangan' , compact('data', 'lapangan'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapangan = lapangan::all();
        return view('tabel_reservasi', compact('lapangan'));
    }

    public function tambah()
    {
        //
        $lapangan = lapangan::all();
        return view('tabel_reservasi', compact('lapangan'));
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
        $message = [
            'required' => ':attribute harus diisi ',
            'min' => ':attribute minimal :min karakter ya ',
            'max' => 'attribute makasimal :max karakter '
        ];

        $this->validate($request,[
            'hari'=> 'required',
            'tanggal'=> 'required',
            'waktu_mulai'=> 'required',
            'waktu_selesai'=> 'required',
            'kegiatan'=> 'required',
            'penanggungjawab'=> 'required',
        ], $message );


        reservasi::create([
            'hari'=> $request-> hari,
            'tanggal'=> $request-> tanggal,
            'waktu_mulai'=> $request-> waktu_mulai,
            'waktu_selesai'=> $request-> waktu_selesai,
            'kegiatan'=> $request -> kegiatan ,
            'penanggungjawab'=> $request-> penanggungjawab
        ]); 

        Session::flash('success', 'data berhasil ditambah !!!');
        return redirect('jadwal_lapangan');
        
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
