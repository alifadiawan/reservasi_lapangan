<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Auth;
use App\Models\reservasi;
use App\Models\lapangan;
use App\Models\User;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
      }

    public function index()
    {
        $reservasi = reservasi::all();
        $jumlah_permintaan = reservasi::where('status','Menunggu')->count();
        $lapangan = lapangan::paginate(4);
        $jumlah_siswa = User::where('role','siswa')->count();
        $detail_siswa = User::where('role','siswa')->get('email');
        return view ('admin.dashboard_admin' , compact('reservasi' , 'lapangan', 'jumlah_siswa', 'detail_siswa' , 'jumlah_permintaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( ('admin.tambah_fitur'));
    }

    public function tambah()
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
        $message = [
            'required' => ':attribute harus diisi ',
            'min' => ':attribute minimal :min karakter ya ',
            'max' => 'attribute makasimal :max karakter ',
            'foto'=> 'required|mimes:jpg,bmp,png,jpeg',
        ];

        $this->validate($request,[
            'nama_lapangan'=> 'required',
        ], $message );

        lapangan::create([
            'nama_lapangan'=> $request-> nama_lapangan,
        ]); 


        Session::flash('success', $request-> nama_lapangan);
        return redirect(route('admin.index'));
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
        $reservasi = reservasi::find($id);
        $lapangan = lapangan::find($id);
        return view('admin.print', compact('reservasi','lapangan'));
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
        $reservasi = reservasi::find($id);
        $reservasi->delete();
        return view ('admin.dashboard_admin' , compact('reservasi' , 'lapangan', 'jumlah_siswa', 'detail_siswa' , 'jumlah_permintaan'));
    }

    public function hapus($id){
        $lapangan = lapangan::find($id);
        $lapangan->delete();
        Session::flash('delete', $lapangan->nama_lapangan);
        return redirect(route('admin.index'));   
    }

    public function hapus_reservasi($id)
    {
        
    }

}
