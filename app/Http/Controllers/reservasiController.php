<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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

    public function __invoke()
    {
        return redirect('/jadwal_lapangan' . request()->segment(1));
    }

    public function index()
    {
        //
        $reservasi = reservasi::all();
        $lapangan = lapangan::all();
        return view ('pihakluar.jadwal_lapangan' , compact('reservasi', 'lapangan'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapangan = lapangan::all();
        return view('pihakluar.tabel_reservasi', compact('lapangan'));
    }

    public function tambah()
    {
        //
    }

    public function KodeUnik() 
    {
        do {
            $code = random_int(100000, 999999);
        } while (reservasi::where("kode_booking", "=", $code)->first());
  
        return $code;
    }

    public function print($id)
    {
        $reservasi = reservasi::find($id);
        $nama_lapangan = lapangan::find($id);
        return view('siswa.printsiswa', compact('reservasi','nama_lapangan'));
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

            //user yang sedang login 
            'user_id'=> $request->user(),

            'tanggal'=> $request-> tanggal,
            'waktu_mulai'=> $request-> waktu_mulai,
            'waktu_selesai'=> $request-> waktu_selesai,
            'kegiatan'=> $request -> kegiatan ,
            'penanggungjawab'=> $request-> penanggungjawab,
            'tipe_pemesan'=> $request-> tipe_pemesan,
            'status'=> $request-> status,
            'kode_booking' => $this->KodeUnik()
        ]); 

        notify()->success('Berhasil dibuat');
        // Session::flash('success', 'data berhasil ditambah !!!');
        return redirect('/reservasi');
        
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
    public function edit($kode_booking)
    {
        //
        $reservasi = reservasi::find($kode_booking);
        return view('admin.status' , compact('reservasi'));
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

    public function hapus($id)
    {
        $reservasi = reservasi::find($id)->delete();
        // session::flash('hapus_reservasi', );
        notify()->success('Reservasi milik Berhasil Dihapus');
        return redirect('/admin');
    }
}
