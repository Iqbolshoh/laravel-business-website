<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Products details</title>
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
        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="current">Products details</li>
                    </ol>
                </nav>
                <h1>Products details</h1>
            </div>
        </div>

        <section id="portfolio-details" class="portfolio-details section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    @if ($product)
                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper init-swiper">
                                <script type="application/json" class="swiper-config">
                              {
                                "loop": true,
                                "speed": 600,
                                "autoplay": { "delay": 5000 },
                                "slidesPerView": "auto",
                                "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true }
                              }
                            </script>
                                <div class="swiper-wrapper align-items-center">
                                    @foreach ($product->images as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $image->image_url) }}" alt="Mahsulot rasm">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                                <h3>Mahsulot Haqida Ma'lumot</h3>
                                <ul>
                                    <li><strong>Kategoriya</strong>: {{ $product->category->category_name ?? 'Nomaʼlum' }}
                                    </li>
                                    <li><strong>Mahsulot nomi</strong>: {{ $product->product_name }}</li>
                                    <li><strong>Narxi</strong>: {{ number_format($product->price, 0, '', ' ') }} so'm</li>
                                </ul>
                            </div>
                            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                                <h2>Mahsulot Ta'rifi</h2>
                                <p>{{ $product->product_name }} – {{ $product->description }}</p>
                            </div>
                        </div>
                    @else
                        <div class="col-12 product-not-found text-center">
                            <h3>Mahsulot topilmadi</h3>
                            <p>Siz izlagan mahsulot mavjud emas.</p>
                        </div>
                    @endif
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