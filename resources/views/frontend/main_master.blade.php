<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="title" content="@yield('title', 'Dominic Azuka - Software Engineer | Full Stack Developer')" />
    <meta content="Dominic Azuka" name="author" />

    <!-- Primary Meta Tags -->
    <meta name="description" content="@yield('description', 'Full Stack Developer | YouTube Content Creator | JavaScript (MERN) Developer | Coding Tips and Tricks | Product & Graphic Designer | AWS, Docker, Kubernetes, & GCP Architect | PHP | Laravel | MySql | Sequelize | ORM')" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="@yield('og_url', url()->current())" />
    <meta property="og:title" content="@yield('og_title', 'Dominic Azuka - Software Engineer | Full Stack Developer')" />
    <meta property="og:description" content="@yield('og_description', 'Full Stack Developer | YouTube Content Creator | JavaScript (MERN) Developer | Coding Tips and Tricks | Product & Graphic Designer | AWS, Docker, Kubernetes, & GCP Architect | PHP | Laravel | MySql | Sequelize | ORM')" />
    <meta property="og:image" content="@yield('og_image', 'https://i.ibb.co/qD14wW7/DSC-2396-1.png')" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="@yield('twitter_url', url()->current())" />
    <meta property="twitter:title" content="@yield('twitter_title', 'Dominic Azuka - Software Engineer | Full Stack Developer')" />
    <meta property="twitter:description" content="@yield('twitter_description', 'Full Stack Developer | YouTube Content Creator | JavaScript (MERN) Developer | Coding Tips and Tricks | Product & Graphic Designer | AWS, Docker, Kubernetes, & GCP Architect | PHP | Laravel | MySql | Sequelize | ORM')" />
    <meta property="twitter:image" content="@yield('twitter_image', 'https://i.ibb.co/qD14wW7/DSC-2396-1.png')" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    {{-- toast notification --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>
    <!-- preloader-start -->
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    {{-- header start --}}
    @include('frontend.body.header')
    {{-- header end --}}

    <!-- main-area -->
    <main>
        @yield('main')
    </main>
    <!-- main-area-end -->



    <!-- Footer-area -->
    @include('frontend.body.footer')
    <!-- Footer-area-end -->




    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/element-in-view.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    {{-- toast notification --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
