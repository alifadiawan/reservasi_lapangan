@extends('layout.bodysiswa')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')
@section('konten')

    x:notify-messages />
    <div class="row mx-5">
        {{-- alert message --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-3">
                <strong>{{ $message }} telah melakukan reservasi</strong>
            </div>
        @endif


        <div class="col mt-4">
            {{-- modal reservasi --}}
            <button type="button" class="btn btn-outline-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Reservasi
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{-- form lapangan --}}
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
                                    <input type="hidden" name="kelas_id" id="kelas_id" class="form-control" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                                        placeholder="tanggal pinjam" aria-describedby="helpId">
                                </div>
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
                                    <label for="waktu_mulai">Waktu mulai</label>
                                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control"
                                        placeholder="waktu awal" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="waktu_selesai">Waktu selesai</label>
                                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control"
                                        placeholder="waktu akhir" aria-describedby="helpId">
                                </div> --}}
                                <div class="form-group">
                                    <label for="kegiatan">kegiatan</label>
                                    <input type="text" name="kegiatan" id="kegiatan" class="form-control"
                                        placeholder="konser, bazaar, ekstra" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="penanggungjawab" id="penanggungjawab" class="form-control"
                                        placeholder="" aria-describedby="helpId" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="user_id" id="user_id" class="form-control" placeholder=""
                                        aria-describedby="helpId" value="{{ $userId = Auth::id() }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="tipe_pemesan" id="tipe_pemesan" class="form-control"
                                        placeholder="" aria-describedby="helpId" value="{{ 'siswa' }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="kode_booking" id="kode_booking" class="form-control"
                                        placeholder="" aria-describedby="helpId" value="">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="status" id="status" class="form-control"
                                        placeholder="" aria-describedby="helpId" value="{{ 'Menunggu' }}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group mt-3 text-center">
                                <input type="submit" class="btn btn-success" value="SUBMIT">
                                <a data-bs-dismiss="modal" class="btn btn-outline-secondary">BATAL</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal reservasi --}}

            {{-- jadwal reservasi --}}
            <table class="table table-bordered table-hover text-white text-center">
                <thead class="bg-danger">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">kegiatan</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Status</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasi as $i => $item)
                        <tr class="text-dark active">
                            <th scope="row">{{ $item->created_at }}</th>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->waktu_selesai }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->penanggungjawab }}</td>
                            @if ($item->status == 'Disetujui')
                                <td class="text-success">
                                    <i class="fa-solid fa-check"></i>
                                </td>
                                <td>
                                    <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-outline-success">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </td>
                            @elseif ($item->status == 'Ditolak')
                                <td class="text-danger">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </td>
                                <td>
                                    <a href="{{ route('siswa.show', $item->id) }}">
                                        <i class="fa-solid fa-x"></i>
                                    </a>
                                </td>
                            @else
                                <td class="text-warning">
                                    <i class="fa-solid fa-clock"></i>
                                </td>
                                <td class="text-warning">
                                    <i class="fa-solid fa-clock"></i>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h5>Reservasi Milik {{ auth()->user()->name }}</h5>
        <table class="table table-bordered table-hover text-white text-center">
            <thead class="bg-danger">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Mulai</th>
                    <th scope="col">Selesai</th>
                    <th scope="col">kegiatan</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Status</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $i => $item)
                    @if (auth()->user()->id == $item->user_id)
                        <tr class="text-dark active">
                            <th scope="row">{{ $item->created_at }}</th>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->waktu_selesai }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->penanggungjawab }}</td>
                            @if ($item->status == 'Disetujui')
                                <td class="text-success">
                                    <i class="fa-solid fa-check"></i>
                                </td>
                                <td>
                                    <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-outline-success">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </td>
                            @elseif ($item->status == 'Ditolak')
                                <td class="text-danger">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </td>
                                <td>
                                    <a href="{{ route('siswa.show', $item->id) }}">
                                        <i class="fa-solid fa-x"></i>
                                    </a>
                                </td>
                            @else
                                <td class="text-warning">
                                    <i class="fa-solid fa-clock"></i>
                                </td>
                                <td class="text-warning">
                                    <i class="fa-solid fa-clock"></i>
                                </td>
                            @endif
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>


@endsection
