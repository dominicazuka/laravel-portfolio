@extends('frontend.main_master')
@section('main')
    @php
        $allFooter = App\Models\Footer::find(1);
    @endphp

@section('title', $portfolio->portfolio_name . ' Portfolio - Software Engineer | Full Stack Developer')
@section('description', 'Explore the detailed project portfolio entry for ' . $portfolio->portfolio_name . ' Project by
    Dominic Azuka, a Software Engineer and Full Stack Developer.')
@section('og_description', 'Dive into the detailed portfolio entry for ' . $portfolio->portfolio_name . ' Project by
    Dominic Azuka, showcasing skills in software development and design.')
@section('twitter_description', 'Discover the comprehensive portfolio entry for ' . $portfolio->portfolio_name . '
    Project by Dominic Azuka, highlighting software development expertise.')

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title" style="word-wrap: break-word;">{{ $portfolio->portfolio_name }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" style="word-wrap: break-word;">
                                        {{ $portfolio->portfolio_name }}</li>
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

        <!-- portfolio-details-area -->
        <section class="services__details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="services__details__thumb">
                            <img src="{{ asset($portfolio->portfolio_image) }}" alt="">
                        </div>
                        <div class="services__details__content">
                            <h2 class="title" style="word-wrap: break-word;">{{ $portfolio->portfolio_title }}</h2>
                            <p>{!! $portfolio->portfolio_description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="services__sidebar">
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
                            <div class="widget">
                                <h5 class="title">Project Information</h5>
                                <ul class="sidebar__contact__info">
                                    <li><span>Date :</span> {{ $portfolio->portfolio_date }}</li>
                                    <li><span>Location :</span> {{ $portfolio->portfolio_location }}</li>
                                    <li><span>Client :</span> {{ $portfolio->portfolio_client }}</li>
                                    <li class="category"><span>Category :</span>{{ $portfolio->portfolio_category }}</li>
                                    <li><span>Project Link :</span> <a href="{{ $portfolio->portfolio_link }}"
                                            target="_blank">{{ $portfolio->portfolio_link }}</a></li>
                                </ul>
                            </div>
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
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-details-area-end -->
    </main>
    <!-- main-area-end -->
    <div style="height: 150px;"></div>

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
