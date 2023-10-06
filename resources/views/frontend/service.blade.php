@extends('frontend.main_master')
@section('main')

@section('title', 'All Services - Software Engineer | Full Stack Developer')
@section('description', 'Discover the services offered by Dominic Azuka, a Software Engineer and Full Stack Developer,
    including web development, design, and more.')
@section('og_description', 'Explore the services provided by Dominic Azuka, a Software Engineer and Full Stack
    Developer, encompassing web development, design, and more.')
@section('twitter_description', 'Learn about the services offered by Dominic Azuka, a Software Engineer and Full Stack
    Developer, covering web development, design, and more.')

    @php
        $allFooter = App\Models\Footer::find(1);
    @endphp

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">All Services</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
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
        <!-- breadcrumb-area-end -->


        <!-- blog-area -->
        <section class="standard__blog">
            <div class="container">
                <div class="row">
                    {{--  main content  --}}
                    <div class="col-lg-8">
                        @foreach ($allServices as $item)
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <a href="{{ route('service.details', $item->id) }}"><img
                                            src="{{ asset($item->service_image) }}" alt=""></a>
                                    <a href="{{ route('service.details', $item->id) }}" class="blog__link"><i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                                <div class="standard__blog__content">
                                    <div class="blog__post__avatar">
                                        <div class="thumb"><img src="{{ asset($item->service_icon) }}" alt="">
                                        </div>
                                    </div>
                                    <h2 class="title" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal;"><a
                                            href="{{ route('service.details', $item->id) }}">{{ $item->service_title }}</a>
                                    </h2>
                                    <p>
                                        {!! Str::limit($item->service_description, 200) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        {{--  Pagination  --}}
                        <div class="pagination-wrap">
                            {{ $allServices->links('vendor.pagination.custom') }}
                        </div>
                    </div>

                    {{--  SideBar  --}}
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
                                        <input name="name" type="text" placeholder="Enter name*" id="name">
                                    </div>

                                    <div class="form-group">
                                        <span class="text-danger error-message"></span>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input name="email" type="email" placeholder="Enter your mail*" id="email">
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
                                        <input name="phone" type="text" placeholder="Your Phone*" id="phone">
                                    </div>

                                    <div class="form-group">
                                        <span class="text-danger error-message"></span>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <textarea name="message" id="message" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="form-group mt-3 mb-5">
                                        <span class="text-danger recaptcha" style="display: flex; justify-content: center;"></span>
                                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" style="display: flex; justify-content: center;"></div>
                                    </div>
                                    <div class="form-group text-center" id="loader" style="display: none;">
                                        <div class="mb-3 spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn" style="border-radius: 50px; padding: 10px 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">send message</button>
                                    </div>
                                </form>
                            </div>
                            {{--  contact info  --}}
                            <div class="widget">
                                <h5 class="title">Contact Information</h5>
                                <ul class="sidebar__contact__info">
                                    <li><span>Address :</span>{{ $allFooter->address }}</li>
                                    <li><span>Mail :</span> {{ $allFooter->email }}</li>
                                    <li><span>Phone :</span>{{ $allFooter->number }}</li>
                                </ul>
                                <ul class="sidebar__contact__social">
                                    <li><a href="{{ $allFooter->facebook }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $allFooter->twitter }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $allFooter->linkedin }}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $allFooter->instagram }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $allFooter->github }}" target="_blank"><i
                                                class="fab fa-github"></i></a></li>
                                    <li><a href="{{ $allFooter->youtube }}" target="_blank"><i
                                                class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
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
                                                <h5 class="title" style="word-wrap: break-word; overflow-wrap: break-word;"><a
                                                        href="{{ route('blog.details', $all->id) }}">{{$all->blog_title}}</a>
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
                                <h4 class="widget-title">Blog Categories</h4>
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
        <!-- blog-area-end -->
        <div style="height: 150px;"></div>

    </main>
    <!-- main-area-end -->

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
                        $('#serviceForm').find('.recaptcha').text('Please complete the reCAPTCHA verification.');
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
