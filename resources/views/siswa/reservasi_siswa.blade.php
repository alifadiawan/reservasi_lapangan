@extends('layout.bodysiswa')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')
@section('konten')

<form method="post" enctype="multipart/form-data" action="{{ route('siswa.store') }}">
    @csrf
    <div class="form-group">
        <label for="nama_lapangan">Pilih Lapangan</label>
        <select class="form-select" aria-label="Default select example" class=" form-control"
            id="jenis_lapangan_id" name="jenis_lapangan_id">
            @foreach ($lapangan as $i => $item)
                <option value="{{ $item->id }}">{{ $item->nama_lapangan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="user_id" id="user_id" class="form-control" placeholder=""
            aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control"
            placeholder="tanggal pinjam" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="waktu_mulai">Waktu mulai</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control"
            placeholder="waktu awal" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="waktu_selesai">Waktu selesai</label>
        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
            placeholder="waktu akhir" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="kegiatan">kegiatan</label>
        <input type="text" name="kegiatan" id="kegiatan" class="form-control"
            placeholder="konser, bazaar, ekstra" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <input type="hidden" name="penanggungjawab" id="penanggungjawab" class="form-control"
            placeholder="" aria-describedby="helpId" value="{{$id = Auth::user()->name}}">
    </div>
    <div class="form-group">
        <input type="hidden" name="tipe_pemesan" id="tipe_pemesan" class="form-control"
            placeholder="" aria-describedby="helpId" value="{{'siswa'}}">
    </div>
    <div class="form-group">
        <input type="hidden" name="kode_booking" id="kode_booking" class="form-control"
            placeholder="" aria-describedby="helpId" value="">
    </div>
    <div class="form-group">
        <input type="hidden" name="status" id="status" class="form-control"
            placeholder="" aria-describedby="helpId" value="{{ 'Menunggu' }}">
    </div>
    <div class="form-group mt-3 text-center">
        <input type="submit" class="btn btn-success" value="SUBMIT">
        <a href="{{route('siswa.index')}}" class="btn btn-outline-danger">BATAL</a>
    </div>
</form>
</div>

@endsection