<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RESERVASI | @yield('judul_tab')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @foreach ($reservasi as $detail)
        <div class="modal fade" id="exampleModal{{ $detail->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Penanggung Jawab / Pemesan :
                            <strong>{{ $detail->penanggungjawab }}</strong>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                Tanggal
                            </div>
                            <div class="col">
                                {{ $detail->tanggal }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Jenis Lapangan
                            </div>
                            <div class="col">
                                {{ $detail->lapangan->nama_lapangan }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Waktu Mulai - Waktu Selesai
                            </div>
                            <div class="col">
                                {{ $detail->waktu_mulai }}:00 - {{ $detail->waktu_selesai }}:00
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Status
                            </div>
                            <div class="col">
                                @if ($detail->status == 'Disetujui')
                                    <div class="g text-success">Setuju</div>
                                @elseif($detail->status == 'Menunggu')
                                    <div class="g text-warning">Menunggu</div>
                                @else
                                    <div class="g text-danger">Ditolak</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            @if ($detail->status == 'Disetujui')
                                <a href="{{ route('cetak.pdf', $detail->id) }}" target="_blank"
                                    class="btn btn-success w-50">Print</a>
                            @elseif($detail->status == 'Ditolak')
                                <button class="btn btn-danger w-50" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Alasan Ditolak  <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="collapse" id="collapseExample">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            {{ $detail->alasan }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('layout.css')

</head>

<body>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
            @yield('content')
        </div>
    </section><!-- End Hero -->

    <div class="container">
        @yield('isibody')
    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    @include('layout.script')

</body>

</html>
