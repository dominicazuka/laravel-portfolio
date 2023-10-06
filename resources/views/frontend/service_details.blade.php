        @extends('frontend.main_master')
        @section('main')

        @section('title', $service->service_title . ' Service - Software Engineer | Full Stack Developer')
        @section('description',
            'Learn about the detailed services offered by Dominic Azuka, a Software Engineer and
            Full Stack Developer.')
        @section('og_description',
            'Explore the comprehensive services provided by Dominic Azuka, a Software Engineer
            and Full Stack Developer.')
        @section('twitter_description',
            'Discover the range of services offered by Dominic Azuka, a Software Engineer
            and Full Stack Developer.')

            {{--  <!-- main-area -->  --}}
            <main>
                {{--  <!-- breadcrumb-area -->  --}}
                <section class="breadcrumb__wrap">
                    <div class="container custom-container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-10">
                                <div class="breadcrumb__wrap__content">
                                    <h2 class="title" style="word-wrap: break-word;">{{ $service->service_title }}</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Service Details</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumb__wrap__icon">
                        <ul>
                            @foreach ($icons as $icon)
                                <li><img src="{{ asset($icon->multi_image) }}" alt=""></li>
                            @endforeach
                        </ul>
                    </div>
                </section>
                {{--  <!-- breadcrumb-area-end -->  --}}

                {{--  <!-- service-details-area -->  --}}
                <section class="standard__blog blog__details">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="standard__blog__post">
                                    <div class="standard__blog__thumb">
                                        <img src="{{ asset($service->service_image) }}" alt="">
                                    </div>
                                    <div class="blog__details__content services__details__content">
                                        <h2 class="title" style="word-wrap: break-word;">{{ $service->service_title }}</h2>
                                        <p>{!! $service->service_description !!}</p>
                                        {{--  <div class="services__details__img">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="{{ asset('frontend/assets/img/blog/blog_details_img01.jpg')}}" alt="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <img src="{{ asset('frontend/assets/img/blog/blog_details_img02.jpg')}}" alt="">
                                                </div>
                                            </div>
                                        </div>  --}}
                                    </div>
                                    {{--  Tags  --}}
                                    <div class="blog__details__bottom">
                                        {{--  social media handles  --}}
                                        <ul class="blog__details__social">
                                            <li class="title">Share :</li>
                                            <li class="social-icons">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                                <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{--  Recent Blog and Categories  --}}
                            <div class="col-lg-4">
                                <aside class="services__sidebar">
                                    {{--  contact form  --}}
                                    <div class="widget">
                                        <h5 class="title">Get in Touch</h5>
                                        <form id="serviceForm" method="post" action="{{ route('store.message') }}"
                                            class="sidebar__contact">
                                            @csrf

                                            <div class="form-group">
                                                <span class="text-danger error-message"></span>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input name="name" type="text" placeholder="Enter name*"
                                                    id="name">
                                            </div>

                                            <div class="form-group">
                                                <span class="text-danger error-message"></span>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input name="email" type="email" placeholder="Enter your mail*"
                                                    id="email">
                                            </div>

                                            <div class="form-group">
                                                <span class="text-danger error-message"></span>
                                                @error('subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input name="subject" type="text" placeholder="Enter your subject*"
                                                    id="subject">
                                            </div>

                                            <div class="form-group">
                                                <span class="text-danger error-message"></span>
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input name="phone" type="text" placeholder="Your Phone*"
                                                    id="phone">
                                            </div>

                                            <div class="form-group">
                                                <span class="text-danger error-message"></span>
                                                @error('message')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <textarea name="message" id="message" placeholder="Message*"></textarea>
                                            </div>
                                            <div class="form-group mt-3 mb-5">
                                                <span class="text-danger recaptcha"
                                                    style="display: flex; justify-content: center;"></span>
                                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                                                    style="display: flex; justify-content: center;"></div>
                                            </div>
                                            <div class="form-group text-center" id="loader" style="display: none;">
                                                <div class="mb-3 spinner-border text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn"
                                                    style="border-radius: 50px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">send
                                                    message</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{--  <div class="widget">
                                        <form action="#" class="search-form">
                                            <input type="text" placeholder="Search">
                                            <button type="submit"><i class="fal fa-search"></i></button>
                                        </form>
                                    </div>  --}}
                                    {{--  Recent Blog  --}}
                                    <div class="widget">
                                        <h4 class="widget-title">Recent Blog</h4>
                                        <ul class="rc__post">
                                            @foreach ($allBlogs as $all)
                                                <li class="rc__post__item">
                                                    <div class="rc__post__thumb">
                                                        <a href="{{ route('blog.details', $all->id) }}"><img
                                                                src="{{ asset($all->blog_image) }}" alt=""></a>
                                                    </div>
                                                    <div class="rc__post__content">
                                                        <h5 class="title"
                                                            style="word-wrap: break-word; overflow-wrap: break-word;"><a
                                                                href="{{ route('blog.details', $all->id) }}">{{ $all->blog_title }}</a>
                                                        </h5>
                                                        <span class="post-date"><i class="fal fa-calendar-alt"></i>
                                                            {{ Carbon\Carbon::parse($all->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{--  Categories  --}}
                                    <div class="widget">
                                        <h4 class="widget-title">Categories</h4>
                                        <ul class="sidebar__cat">
                                            @foreach ($categories as $cat)
                                                <li class="sidebar__cat__item"><a
                                                        href="{{ route('category.blog', $cat->id) }}">{{ $cat->blog_category }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </section>
                {{--  <!-- service-details-area-end -->  --}}
                <div style="height: 150px;"></div>
            </main>
            {{--  <!-- main-area-end -->  --}}
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#serviceForm').submit(function(event) {
                        if ($('#serviceForm').valid()) {
                            $('#loader').show();
                            // Submit the form
                            $('.recaptcha').text('');
                            $('#serviceForm').submit();
                        } else {
                            if (grecaptcha.getResponse() === '') {
                                event.preventDefault();
                                $('#serviceForm').find('.recaptcha').text(
                                    'Please complete the reCAPTCHA verification.');
                                $('#serviceForm').find('.recaptcha').show();
                            }
                        }
                    });
                    $('#serviceForm').validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            email: {
                                required: true,
                                email: true,
                            },
                            subject: {
                                required: true,
                            },
                            phone: {
                                required: true,
                            },
                            message: {
                                required: true,
                            },
                        },
                        messages: {
                            name: {
                                required: 'Please Enter Name',
                            },
                            email: {
                                required: 'Please Enter Email',
                                email: 'Please Enter a Valid Email',
                            },
                            subject: {
                                required: 'Please Enter Subject',
                            },
                            phone: {
                                required: 'Please Enter Phone Number',
                            },
                            message: {
                                required: 'Please Enter Message',
                            },
                        },
                        errorElement: 'span',
                        errorPlacement: function(error, element) {
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').find('.error-message').html(error);
                        },
                        highlight: function(element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');
                        },
                    });
                });
            </script>
        @endsection
