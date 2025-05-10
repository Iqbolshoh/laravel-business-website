<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Products</title>
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
                        <li><a href="./">Home</a></li>
                        <li class="current">Products</li>
                    </ol>
                </nav>
                <h1>Products</h1>
            </div>
        </div><!-- End of Page Title -->


        <!-- Products Section -->
        <section id="portfolio" class="portfolio section">
            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <!-- Products Category -->
                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($categories as $category)
                            <li data-filter=".filter-category-{{ $category->id }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                    <!-- End Products Category -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($groupedProducts as $category_id => $products)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-category-{{ $category_id }}">
                                    <div class="portfolio-content h-100">
                                        <a href="{{ route('products.show', ['id' => $product->id]) }}">
                                            @php
                                                $imageUrl = optional($product->images->first())->image_url;
                                              @endphp
                                            <img src="{{ asset('storage/' . $imageUrl) }}" class="img-fluid" alt="">
                                            <div class="portfolio-info">
                                                <h4>{{ $product->product_name }}</h4>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div><!-- End Portfolio Container -->

                </div>
            </div>
        </section><!-- /Portfolio Section -->



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