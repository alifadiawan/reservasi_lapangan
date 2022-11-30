<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Auth;
use App\Models\reservasi;
use App\Models\lapangan;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservasi = reservasi::all();
        $lapangan = lapangan::all();
        return view ('admin.dashboard_admin' , compact('reservasi' , 'lapangan'));
        
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

    public function tambah($id)
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
            'foto' => 'required'
        ], $message );

       //ambil parameter
       $file = $request->file('foto');
        
       //rename
       $nama_file = time() . '_' . $file->getClientOriginalName();
       
       //proses upload
       $tujuan_upload = './template/img';
       $file->move($tujuan_upload, $nama_file);

        lapangan::create([
            'nama_lapangan'=> $request-> nama_lapangan,
            'foto' => $nama_file
        ]); 

        Session::flash('success', 'Lapangan Berhasil Ditambahkan');
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

    public function hapus($id){
        $lapangan = lapangan::find($id);
        $lapangan->delete();
        Session::flash('delete', $lapangan->nama_lapangan);
        return redirect(route('admin.index'));   
    }

}
