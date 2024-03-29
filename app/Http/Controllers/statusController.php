<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\reservasi;
use App\Models\lapangan;
use App\Models\User;

class statusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservasi = reservasi::where('status','menunggu')->get();
        $lapangan = lapangan::all();
        return view('admin.status', compact('reservasi', 'lapangan'));
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
        $reservasi = reservasi::find($id);
        $lapangan = lapangan::find($id);
        return view('admin.akses', compact('reservasi', 'lapangan'));
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

        $reservasi = reservasi::find($id);
        $reservasi->status = $request->status;
        $reservasi->alasan = $request->alasan;
        $reservasi->save();  



        // $lapangan = lapangan::all();
        // $reservasi = reservasi::all();
        // $jumlah_permintaan = reservasi::where('status','Menunggu')->count();
        // $lapangan = lapangan::paginate(4);
        // $jumlah_siswa = User::where('role','siswa')->count();
        // $detail_siswa = User::where('role','siswa')->get('email');
        notify()->success('a');
        Session::flash('setujui', auth()->user()->name);
        return redirect('admin');
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
