@extends('layout.bodyall')
@section('judul_tab', 'RESERVASI')
@section('judul_navbar', 'RESERVASI')
@section('content')

    <div class="row  justify-content-center">
        <h1 class="text-center mb-3">RESERVASI LAPANGAN </h1>
        <div class="col-md-6 text-white">
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('salah'))
                <div class="alert alert-danger alert-block mt-3">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            {{-- form lapangan --}}
            <form method="post" enctype="multipart/form-data" action="{{ route('reservasi.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nama_lapangan">Pilih Lapangan</label>
                    <select class="form-select" aria-label="Default select example" class=" form-control"
                        id="jenis_lapangan_id" name="jenis_lapangan_id">
                        <option value="">Pilih lapangan</option>
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
                    <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="tanggal pinjam"
                        aria-describedby="helpId">
                </div>
                {{-- <div class="form-group">
                    <label for="waktu_mulai">Waktu mulai</label>
                    <input type="time" step="3600" name="waktu_mulai" id="waktu_mulai" class="form-control" placeholder="waktu awal"
                        aria-describedby="helpId">
                </div> --}}
                <div class="form-group">
                    <label for="">Waktu Mulai</label>
                    <select name="waktu_mulai" id="waktu_mulai" class="form-control">
                        <option value="">Pilih waktu mulai</option>
                        <option value="1">01:00</option>
                        <option value="2">02:00</option>
                        <option value="3">03:00</option>
                        <option value="4">04:00</option>
                        <option value="5">05:00</option>
                        <option value="6">06:00</option>
                        <option value="7">07:00</option>
                        <option value="8">08:00</option>
                        <option value="9">09:00</option>
                        <option value="10">10:00</option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Waktu selesai</label>
                    <select name="waktu_selesai" id="waktu_selesai" class="form-control">
                        <option value="">Pilih waktu selesai</option>
                        <option value="1">01:00</option>
                        <option value="2">02:00</option>
                        <option value="3">03:00</option>
                        <option value="4">04:00</option>
                        <option value="5">05:00</option>
                        <option value="6">06:00</option>
                        <option value="7">07:00</option>
                        <option value="8">08:00</option>
                        <option value="9">09:00</option>
                        <option value="10">10:00</option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label for="waktu_selesai">Waktu selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
                        placeholder="waktu akhir" aria-describedby="helpId">
                </div> --}}
                {{-- <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="number" name="durasi" id="durasi" class="form-control" placeholder="durasi"
                        min="1" max="8" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="total_sewa">total sewa</label>
                    <input type="text" name="total_sewa" id="total_sewa" class="form-control" placeholder="total_sewa"
                        aria-describedby="helpId" readonly>
                </div> --}}
                <div class="form-group">
                    <label for="kegiatan">kegiatan</label>
                    <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                        placeholder="konser, bazaar, ekstra" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="penangunggjawab">Peminjam</label>
                    <input type="text" name="penanggungjawab" id="penanggungjawab" class="form-control"
                        placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="hidden" name="tipe_pemesan" id="tipe_pemesan" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ 'Pihak Luar' }}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="kode_booking" id="kode_booking" class="form-control" placeholder=""
                        aria-describedby="helpId" value="">
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" id="status" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ 'Menunggu' }}">
                </div>
                <div class="form-group mt-3 text-center">
                    <input type="submit" class="btn btn-success" value="SUBMIT">
                    <a href="/" class="btn btn-outline-danger">BATAL</a>
                </div>
            </form>
        </div>





        {{-- carousel lapangan --}}
        {{-- <div class="col mt-3">
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
        </div> --}}
    </div>

@endsection
