<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RESERVASI | @yield('judul_tab')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layout.css')

</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
        @yield('content')
    </div>
  </section><!-- End Hero -->

  @yield('konten')


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

@include('layout.script')

</body>

</html>