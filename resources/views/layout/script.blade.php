{{-- notif tambah lapangan --}}
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div>

{{-- modal decline --}}
{{-- <div class="modal" tabindex="-1" id="decline_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alasan pembatalan</h5>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="alasan_decline" id="alasan_decline" class="form-control"
                            aria-describedby="helpId">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <form action="{{ route('status.update', $reservasi->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger" value="{{'Ditolak'}}">DECLINE</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">cancel</button>
                </form>
            </div>  
        </div>
    </div>
</div> --}}

{{-- modal detail reservasi --}}

{{-- modal logout --}}
<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Log Out ?</h5>
            </div>
            <div class="modal-footer">
                <form action="logout" method="POST">
                    @csrf
                    <input type="submit" value="Log Out" class="btn btn-danger">
                </form>
                <button type="button" data-bs-dismiss="modal" class="btn btn-outline-primary">Batal</button>
            </div>
        </div>
    </div>
</div>

{{-- notif --}}
@notifyJs

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js') }}"></script>
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- font awesome --}}
<script src="{{ asset('https://kit.fontawesome.com/e4a753eb05.js') }}" crossorigin="anonymous"></script>
