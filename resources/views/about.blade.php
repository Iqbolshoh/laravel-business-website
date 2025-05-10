<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins&family=Raleway&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('includes.header')

    <main class="main">

        <!-- About Section -->
        <section id="about" class="section about">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    @foreach ($aboutItems as $about)
                        <div class="col-lg-6 order-1 order-lg-2">
                            @if (!empty($about['image']))
                                <img src="{{ asset('storage/' . $about['image']) }}" class="img-fluid" alt="About Us">
                            @endif
                        </div>
                        <div class="col-lg-6 order-2 order-lg-1 content">
                            <h3>{{ $about['title'] }}</h3>
                            <p class="fst-italic">{{ $about['text_1'] }}</p>
                            <h4>Our Services:</h4>
                            @if (!empty($about['list_items']))
                                <ul>
                                    @foreach ($about['list_items'] as $item)
                                        <li><i class="bi bi-check2-all"></i> {{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <p>{{ $about['text_2'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    @include('includes.footer')

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>