<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Services</title>
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
                        <li><a href="/">Home</a></li>
                        <li class="current">Services</li>
                    </ol>
                </nav>
                <h1>Services</h1>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Skills Section -->
        <section id="skills" class="skills section">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $service_sections[0]->title }}</h2>
                <p>{{ $service_sections[0]->text_1 }}</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $service_sections[0]->image) }}" class="img-fluid"
                            alt="Mahsulotlarimiz">
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>{{ $service_sections[0]->sub_title }}</h3>
                        <p class="fst-italic">
                            {{ $service_sections[0]->text_2 }}
                        </p>

                        <div class="skills-content skills-animation">
                            @foreach ($ourservices as $service)
                                <div class="progress">
                                    <span class="skill">
                                        <span>{{ $service->service_name }}</span>
                                        <i class="val">{{ $service->skill_level }}%</i>
                                    </span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar"
                                            aria-valuenow="{{ $service->skill_level }}" aria-valuemin="0"
                                            aria-valuemax="100" style="width: {{ $service->skill_level }}%;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="services section">
            <div class="container">
                <div class="row gy-4">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($service['id'] - 1) * 100 }}">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="{{ $service['icon'] }}"></i></div>
                                <a href="#" class="stretched-link">
                                    <h3>{{ $service['title'] }}</h3>
                                </a>
                                <p>{{ $service['description'] }}</p>
                            </div>
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