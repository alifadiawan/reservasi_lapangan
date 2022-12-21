@extends('layout.bodysiswa')
@section('judul_tab', 'DASHBOARD')
@section('judul_navbar', 'DASHBOARD')
@section('konten')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <a href="{{route('siswa.create')}}" class="btn btn-success mb-4 ">
                    <i class="fa fa-plus"></i> Reservasi 
                </a>
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
                    <tbody>
                        @foreach ($reservasi as $i => $item)
                            <tr class="text-dark">
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->waktu_mulai }}</td>
                                <td>{{ $item->waktu_selesai }}</td>
                                <td>{{ $item->kegiatan }}</td>
                                <td>{{ $item->penanggungjawab }}</td>
                                @if ($item->status == 'Disetujui')
                                    <td class="text-success">{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.show', $item->id) }}" class="btn btn-success">
                                            Print <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                @elseif ($item->status == 'Ditolak')
                                    <td class="text-danger"><a href="">{{ $item->status }}</a></td>
                                @else
                                    <td class="text-warning">{{ $item->status }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>




@endsection
