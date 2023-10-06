@extends('frontend.main_master')
@section('main')

@section('title', 'Contact - Software Engineer | Full Stack Developer')
@section('description',
    'Contact Dominic Azuka, a Software Engineer and Full Stack Developer, with your project ideas or
    general inquiries.')
@section('og_description',
    'Reach out to Dominic Azuka, a Software Engineer and Full Stack Developer, with your
    questions, ideas, or inquiries.')
@section('twitter_description',
    'Connect with Dominic Azuka, a Software Engineer and Full Stack Developer, and share
    your thoughts or project ideas.')

    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Contact Me</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
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

        <!-- contact-map -->
        <div id="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.440625660489!2d7.365898974252758!3d9.114613287644529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104ddfa4a241f90d%3A0xf25bc8e0b3fe3065!2sLemon%20Street%2C%20Mab%20Global%20Estates!5e0!3m2!1sen!2suk!4v1696436966968!5m2!1sen!2suk"
                allowfullscreen loading="lazy"></iframe>
        </div>
        <!-- contact-map-end -->

        <!-- contact-area -->
        <div class="contact-area">
            <div class="container">
                <form id="contactPageForm" method="post" action="{{ route('store.message') }}" class="contact__form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <span class="text-danger error-message"></span>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="name" type="text" placeholder="Enter your name*">
                        </div>
                        <div class="form-group col-md-6">
                            <span class="text-danger error-message"></span>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="email" type="email" placeholder="Enter your mail*">
                        </div>
                        <div class="form-group col-md-6">
                            <span class="text-danger error-message"></span>
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="subject" type="text" placeholder="Enter your subject*">
                        </div>
                        <div class="form-group col-md-6">
                            <span class="text-danger error-message"></span>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="phone" type="text" placeholder="Your Phone*">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="text-danger error-message"></span>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea name="message" id="message" placeholder="Enter your message*"></textarea>
                    </div>
                    <div class="form-group mt-3 mb-5">
                        <span class="text-danger recaptcha"></span>
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" style="display: flex; justify-content: center;"></div>
                    </div>
                    <div class="form-group text-center" id="loader" style="display: none;">
                        <div class="mb-3 spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <button type="submit" class="btn" style="border-radius: 50px; padding: 10px 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">send message</button>
                </form>
            </div>
        </div>
        <!-- contact-area-end -->

        <!-- contact-info-area -->
        <section class="contact-info-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__info">
                            <div class="contact__info__icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                            </div>
                            <div class="contact__info__content">
                                <h4 class="title">address line</h4>
                                <span>{{ $allFooter->address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__info">
                            <div class="contact__info__icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png/') }}" alt="">
                            </div>
                            <div class="contact__info__content">
                                <h4 class="title">Phone Number</h4>
                                <span>{{ $allFooter->number }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__info">
                            <div class="contact__info__icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                            </div>
                            <div class="contact__info__content">
                                <h4 class="title">Mail Address</h4>
                                <span>{{ $allFooter->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-area-end -->
    </main>


    <div style="height: 150px;"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#contactPageForm').submit(function(event) {
                if ($('#contactPageForm').valid()) {
                    $('#loader').show();
                    // Submit the form
                    $('.recaptcha').text('');
                    $('#contactPageForm').submit();
                } else {
                    if (grecaptcha.getResponse() === '') {
                        event.preventDefault();
                        $('#contactPageForm').find('.recaptcha').text('Please complete the reCAPTCHA verification.');
                        $('#contactPageForm').find('.recaptcha').show();
                    }
                }
            });
            $('#contactPageForm').validate({
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
