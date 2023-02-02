@extends('layout.bodyall')
@section('judul_tab', 'JADWAL LAPANGAN')
@section('judul_navbar', 'JADWAL LAPANGAN')
@section('content')

    <a href="/" class="btn btn-danger mb-5">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </a>
    <div class="row mb-4 text-center">
        {{-- disetujui --}}
        <div class="col">
            <div class="card bg-transparent border border-danger">
                <div class="card-body p-0">
                    <table class="table table-borderless text-white">
                        <thead class="bg-danger">
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Pemesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                @if ($item->status == 'Disetujui')
                                    <tr>
                                        <td>{{ $item->kode_booking }}</td>
                                        <td>{{ $item->penanggungjawab }}</td>
                                        <td class="text-success">
                                            <i class="fa-solid fa-check"></i> ({{ $item->status }})
                                        </td>
                                        <td>
                                            <a href="{{ route('reservasi.show', $item->id) }}" class="btn btn-success">
                                                <i class="fa-solid fa-print"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- row ditolak dan menunggu --}}
    <div class="row justify-content-center text-center">

        {{-- menunggu --}}
        <div class="col">
            <div class="card bg-transparent border border-danger">
                <div class="card-body m-0 p-0">
                    <table class="table table-borderless text-white">
                        <thead class="bg-danger">
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Pemesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                @if ($item->status == 'Menunggu')
                                    <tr>
                                        <td>{{ $item->kode_booking }}</td>
                                        <td>{{ $item->penanggungjawab }}</td>
                                        <td class="text-warning">
                                            <i class="fa-solid fa-clock"></i> ({{ $item->status }})
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning disabled">
                                                <i class="fa-solid fa-clock"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ditolak --}}
        <div class="col">
            <div class="card bg-transparent border border-danger">
                <div class="card-body m-0 p-0">
                    <table class="table table-borderless text-white">
                        <thead class="bg-danger">
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Pemesan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                @if ($item->status == 'Ditolak')
                                    <td>{{ $item->kode_booking }}</td>
                                    <td>{{ $item->penanggungjawab }}</td>
                                    <td class="text-danger">
                                        <i class="fa-solid fa-circlex"></i> ({{ $item->status }})
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger ">knp ??</a>
                                    </td>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

{{-- <h1 class="text-center mb-3">Jadwal Lapangan (Menunggu)</h1>
    <div class="col">
        <table class="table table-striped-dark table-borderless text-white text-center">
            <thead class="bg-danger">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Mulai</th>
                    <th scope="col">Selesai</th>
                    <th scope="col">kegiatan</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th scope="col">Status</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            @foreach ($reservasi as $i => $item)
                <tr>
                    @if ($item->status == 'Menunggu')
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_selesai }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ $item->penanggungjawab }}</td>
                        <td class="text-warning">
                            <i class="fa-solid fa-clock"></i>
                        </td>
                        <td>
                            <a href="" class="btn btn-success disabled">
                                Print <i class="fa fa-print"></i>
                            </a>
                        </td>
                    @elseif ($item->status == 'Ditolak')
                        <td class="text-danger">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </td>
                    @else
                        <td class="text-warning">
                            <i class="fa-solid fa-clock"></i>
                        </td>
                    @endif
                </tr>
            @endforeach
            <tbody>
            </tbody>
        </table>
    </div> --}}
