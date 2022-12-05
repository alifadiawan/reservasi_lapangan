@extends('layout.bodyall')
@section('judul_tab', 'RESERVASI')
@section('judul_navbar', 'RESERVASI')
@section('content')

    <div class="row">
        <h1 class="text-center mb-3">RESERVASI LAPANGAN</h1>
        <div class="col">
            {{-- form lapangan --}}
            <form method="post" enctype="multipart/form-data" action="{{route('reservasi.store')}}">
                @csrf
                <div class="form-group">
                    <label for="nama_lapangan">Pilih Lapangan</label>
                    <select class="form-select" aria-label="Default select example" 
                    class=" form-control" id="jenis_lapangan_id" name="jenis_lapangan_id">
                        @foreach ($lapangan as $i => $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lapangan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="tanggal pinjam"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="waktu_mulai">Waktu mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" placeholder="waktu awal"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="waktu_selesai">Waktu selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" placeholder="waktu akhir"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="kegiatan">kegiatan</label>
                    <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                        placeholder="konser, bazaar, ekstra" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="penangunggjawab">Peminjam</label>
                    <input type="text" name="penanggungjawab" id="penanggungjawab" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="kode_booking">Peminjam</label>
                    <input type="hidden" name="kode_booking" id="kode_booking" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <div class="form-group mt-3 text-center">
                    <input type="submit" class="btn btn-success" value="SUBMIT">
                    <a href="/" class="btn btn-outline-danger">BATAL</a>
                </div>
            </form>
        </div>


        {{-- carousel lapangan --}}
        <div class="col mt-5">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/lp2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>LAPANGAN INDOOR</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/lp1.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>LAPANGAN OUTDOOR</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

@endsection
