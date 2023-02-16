<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\reservasi;
use App\Models\lapangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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
        $reservasi = Reservasi::all();
        $lapangan = Lapangan::all();
        return view('pihakluar.tabel_reservasi', compact('lapangan', 'reservasi'));
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

    public function between(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function cek_waktu(Request $request)
    {

        $s = "7";
        $e = "12";

        $start = $s;
        $end = $e;
        
        if($start > $end){
            return('negative');
        }else{
            return(($end - $start) * 100000);
        }
    }


    public function store(Request $request)
    {

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

        //cek waktu
        $start = $request->waktu_mulai;
        $end = $request->waktu_selesai;
        
        if($start > $end or $end - $start > 8 ){
            Session::flash('salah', 'Waktu tidak valid / lebih dari 8 jam ');
            return redirect('/reservasi/create');
        }else{
            reservasi::create([
                'jenis_lapangan_id' => $request->jenis_lapangan_id,
    
                //user yang sedang login 
                'user_id'=> $request->  user(),
    
                'tanggal'=> $request-> tanggal,
                'waktu_mulai'=> $start,
                'waktu_selesai'=> $end,
                'kegiatan'=> $request -> kegiatan ,
                'penanggungjawab'=> $request-> penanggungjawab,
                'tipe_pemesan'=> $request-> tipe_pemesan,
                'status'=> $request-> status,
                'kode_booking' => $this->KodeUnik()
            ]); 
            Session::flash('success', 'data berhasil ditambah !!!');
            return redirect('/reservasi');
        }      
    }

    public function cetak_pdf($id)
    {
    	$reservasi = reservasi::find($id);
        // return $reservasi;
    	$pdf = PDF::loadview('pihakluar.cetak_pihakluar',['reservasi'=>$reservasi]);
    	// return $pdf->download('reservasi.pdf');
        return $pdf->stream();
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
