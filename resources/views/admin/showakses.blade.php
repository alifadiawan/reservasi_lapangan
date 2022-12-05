@if ($reservasi->isEmpty())
    <h6>Belum memilih Pesanan</h6>
@else
    
<h5>terpilih</h5>

{{-- <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped-dark table-borderless text-white text-center">
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">kegiatan</th>
                        <th scope="col">Peminjam</th>
                        <th scope="col">Status</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @foreach ($reservasi as $i => $item)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->waktu_selesai }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->penanggungjawab }}</td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                <a href="" class="btn btn-danger">
                                    <i class="fa fa-ban"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
@endif
