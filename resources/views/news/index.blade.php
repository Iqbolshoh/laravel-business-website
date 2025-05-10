<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>News</title>
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
                        <li><a href="index.html">Home</a></li>
                        <li class="current">News</li>
                    </ol>
                </nav>
                <h1>News</h1>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">
                        <div class="container">
                            <div class="row gy-4">
                                @foreach ($news as $new)
                                    <div class="col-lg-12">
                                        <article>
                                            <!-- Post Image -->
                                            <div class="post-img">
                                                <img src="{{ asset('storage/' . $new->image) }}" alt="{{ $new->title }}"
                                                    class="img-fluid">
                                            </div>

                                            <!-- Post Title -->
                                            <h2 class="title">
                                                <a href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
                                            </h2>

                                            <!-- Post Metadata -->
                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-clock"></i>
                                                        <a href="{{ route('news.show', $new->id) }}">
                                                            <time datetime="{{ $new->created_at->format('Y-m-d') }}">
                                                                {{ $new->created_at->format('F j, Y') }}
                                                            </time>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Post Content -->
                                            <div class="content">
                                                <p>
                                                    {{ Str::limit($new->description, 400) }}
                                                </p>
                                                <div class="read-more">
                                                    <a href="{{ route('news.show', $new->id) }}">Read More</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- End post list item -->
                                @endforeach
                            </div><!-- End blog posts list -->
                        </div>
                    </section><!-- /Blog Posts Section -->

                    <!-- Blog Pagination Section -->
                    <section id="blog-pagination" class="blog-pagination section">
                        <div class="container">
                            <div class="d-flex justify-content-center">
                                {{ $news->links('pagination.custom') }}
                            </div>
                        </div>
                    </section><!-- /Blog Pagination Section -->

                </div>

                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!--/Search Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Recent Posts</h3>
                            @foreach($recentNews as $recent)
                                <div class="post-item">
                                    <img src="{{ asset('storage/' . $recent->image) }}" alt="" class="flex-shrink-0">
                                    <div>
                                        <h4><a href="{{ route('news.show', $recent->id) }}">{{ $recent->title }}</a></h4>
                                        <time
                                            datetime="{{ $recent->created_at->format('Y-m-d') }}">{{ $recent->created_at->format('M j, Y') }}</time>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/Recent Posts Widget -->

                        <!-- Tags Widget -->
                        <div class="tags-widget widget-item">
                            <h3 class="widget-title">Tags</h3>
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div><!--/Tags Widget -->

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
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>