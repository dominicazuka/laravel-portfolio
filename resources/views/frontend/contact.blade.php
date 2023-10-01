@extends('frontend.main_master')
@section('main')

@section('title', 'Contact - Software Engineer | Full Stack Developer')
@section('description', 'Contact Dominic Azuka, a Software Engineer and Full Stack Developer, with your project ideas or general inquiries.')
@section('og_description', 'Reach out to Dominic Azuka, a Software Engineer and Full Stack Developer, with your questions, ideas, or inquiries.')
@section('twitter_description', 'Connect with Dominic Azuka, a Software Engineer and Full Stack Developer, and share your thoughts or project ideas.')

    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Contact us</h2>
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
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
                allowfullscreen loading="lazy"></iframe>
        </div>
        <!-- contact-map-end -->

        <!-- contact-area -->
        <div class="contact-area">
            <div class="container">
                <form method="post" action="{{ route('store.message') }}" class="contact__form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="name" type="text" placeholder="Enter your name*">

                        </div>
                        <div class="col-md-6">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="email" type="email" placeholder="Enter your mail*">

                        </div>
                        <div class="col-md-6">
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="subject" type="text" placeholder="Enter your subject*">

                        </div>
                        <div class="col-md-6">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input name="phone" type="text" placeholder="Your Phone*">

                        </div>
                    </div>
                    @error('message')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="message" id="message" placeholder="Enter your message*"></textarea>
                    <button type="submit" class="btn">send message</button>
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

        <!-- contact-area -->
        <section class="homeContact homeContact__style__two">
            <div class="container">
                <div class="homeContact__wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                <span class="sub-title">07 - Say hello</span>
                                <h2 class="title">Any questions? Feel free <br> to contact</h2>
                            </div>
                            <div class="homeContact__content">
                                <p>You can always reach out to me with any project idea or general enquiry</p>
                                <h2 class="mail"><a href="mailto:Visitdominicazuka@gmail.com">Visitdominicazuka@gmail.com</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form method="post" action="{{ route('store.message') }}" class="sidebar__contact">
                                    @csrf
                                    <div class="form-group">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input name="name" type="text" placeholder="Enter name*">

                                    </div>
                                    <div class="form-group">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input name="email" type="email" placeholder="Enter your mail*">

                                    </div>
                                    <div class="form-group">
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input name="subject" type="text" placeholder="Enter your subject*">

                                    </div>
                                    <div class="form-group">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input name="phone" type="text" placeholder="Your Phone*">

                                    </div>
                                    <div class="form-group">
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <textarea name="message" id="message" placeholder="Message*"></textarea>

                                    </div>

                                    <button type="submit" class="btn">send message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->
    </main>
@endsection
