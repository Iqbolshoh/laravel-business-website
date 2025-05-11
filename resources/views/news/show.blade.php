<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>News Details</title>
    <meta name="description" content="{{ Str::limit($newsItem->description, 160) }}">
    <meta name="keywords" content="news, {{ Str::slug($newsItem->title) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <div class="page-title" data-aos="fade">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('news.index') }}">News</a></li>
                        <li class="current">{{ Str::limit($newsItem->title, 30) }}</li>
                    </ol>
                </nav>
                <h1>News Details</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">
                                <div class="post-img">
                                    <img src="{{ $newsItem->image ? asset('storage/' . $newsItem->image) : asset('images/placeholder.jpg') }}"
                                        alt="{{ $newsItem->title }}" class="img-fluid">
                                </div>
                                <h2 class="title" style="color: var(--heading-color);">
                                    {{ $newsItem->title }}
                                </h2>
                                <div class="meta-top">
                                    <ul>
                                        <li>
                                            <i class="bi bi-eye" style="color: var(--accent-color);"></i>
                                            {{ $newsItem->views }} Views
                                        </li>
                                        <li>
                                            <i class="bi bi-clock" style="color: var(--accent-color);"></i>
                                            {{ $newsItem->created_at->format('F j, Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <p style="color: var(--default-color);">{!! nl2br(e($newsItem->description)) !!}</p>
                                </div>
                            </article>
                        </div>
                    </section>

                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">

                        <div class="recent-posts-widget widget-item" id="recent-posts" aria-live="polite">
                            <h3 class="widget-title" style="color: var(--heading-color);">Recent News</h3>
                            @if($recentNews->isEmpty())
                                <div class="alert alert-info"
                                    style="background-color: var(--surface-color); color: var(--default-color); border-color: var(--accent-color);">
                                    No recent posts available.
                                </div>
                            @else
                                <div class="recent-news-list">
                                    @foreach($recentNews as $recent)
                                        <div class="recent-news-item mb-3 p-3 border rounded"
                                            style="background-color: var(--surface-color); border-color: rgba(233, 107, 86, 0.2);">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0 me-3">
                                                    <img src="{{ $recent->image ? asset('storage/' . $recent->image) : asset('images/placeholder.jpg') }}"
                                                        alt="{{ $recent->title }}" class="rounded" width="80"
                                                        style="border: 1px solid rgba(233, 107, 86, 0.1);">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="mb-1" style="color: var(--heading-color);">
                                                        <a href="{{ route('news.show', $recent->id) }}"
                                                            class="text-decoration-none" style="color: var(--heading-color);">
                                                            {{ Str::limit($recent->title, 50) }}
                                                        </a>
                                                    </h5>
                                                    <div class="d-flex justify-content-between align-items-center small mb-1"
                                                        style="color: var(--default-color);">
                                                        <time datetime="{{ $recent->created_at->format('Y-m-d') }}">
                                                            <i class="bi bi-calendar me-1"
                                                                style="color: var(--accent-color);"></i>
                                                            {{ $recent->created_at->format('M j, Y') }}
                                                        </time>
                                                        <span>
                                                            <i class="bi bi-eye me-1" style="color: var(--accent-color);"></i>
                                                            {{ $recent->views }} views
                                                        </span>
                                                    </div>
                                                    <a href="{{ route('news.show', $recent->id) }}" class="btn btn-sm mt-1"
                                                        style="background-color: var(--accent-color); color: var(--contrast-color); border-color: var(--accent-color);">
                                                        Read More <i class="bi bi-arrow-right ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>

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
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>