<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;

use App\Models\reservasi;
use App\Models\lapangan;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $user_id = Auth::user()->name;
        $reservasi = reservasi::all()->sortBy('created_at');
        $lapangan = lapangan::all();
        return view ('siswa.dashboard_siswa' , compact('reservasi', 'lapangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapangan = lapangan::all();
        return view('siswa.reservasi_siswa', compact('lapangan')); 
    }

    public function KodeUnik() 
    {
        do {
            $code = random_int(100000, 999999);
        } while (reservasi::where("kode_booking", "=", $code)->first());
  
        return $code;
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
            'jenis_lapangan_id' => 'required',
            'tanggal'=> 'required',
            'waktu_mulai'=> 'required',
            'waktu_selesai'=> 'required',
            'kegiatan'=> 'required',
            'penanggungjawab'=> 'required',
        ], $message );

        reservasi::create([
            'jenis_lapangan_id' => $request->jenis_lapangan_id,
            'user_id' => $request ->user_id,
            'tanggal'=> $request-> tanggal,
            'waktu_mulai'=> $request-> waktu_mulai,
            'waktu_selesai'=> $request-> waktu_selesai,
            'kegiatan'=> $request -> kegiatan ,
            'penanggungjawab'=> $request-> penanggungjawab,
            'tipe_pemesan'=> $request-> tipe_pemesan,
            'status'=> $request-> status,
            'kode_booking' => $this->KodeUnik()
        ]); 

        notify()->success('Welcome to Laravel Notify ⚡️');
        // Session::flash('success');
        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservasi = reservasi::find($id);
        $nama_lapangan = lapangan::find($id);
        return view('siswa.printsiswa', compact('reservasi','nama_lapangan'));
    }

    public function print($id)
    {
        $reservasi = reservasi::find($id);
        $nama_lapangan = lapangan::find($id);
        return view('siswa.printsiswa', compact('reservasi','nama_lapangan'));
    }

    public function profile($id)
    {
        $reservasi = reservasi::find($id);
        $lapangan = lapangan::find($id);
        return view('siswa.profile', compact('reservasi','lapangan'));
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