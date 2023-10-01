@extends('frontend.main_master')
@section('main')
    @php
        $allFooter = App\Models\Footer::find(1);
    @endphp

    {{--  Page title  --}}
@section('title')
Portfolio - Software Engineer | Full Stack Developer
@endsection

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">{{ $portfolio->portfolio_name }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
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
                            <h2 class="title">{{ $portfolio->portfolio_title }}</h2>
                            <p>{!! $portfolio->portfolio_description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="services__sidebar">
                            <div class="widget">
                                <h5 class="title">Get in Touch</h5>
                                <form method="post" action="{{ route('store.message') }}" class="sidebar__contact">
                                    @csrf
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="name" type="text" placeholder="Enter name*">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="email" type="email" placeholder="Enter your mail*">

                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="subject" type="text" placeholder="Enter your subject*">

                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="phone" type="text" placeholder="Your Phone*">


                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="message" id="message" placeholder="Message*"></textarea>

                                    <button type="submit" class="btn">send message</button>
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
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="name" type="text" placeholder="Enter name*">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="email" type="email" placeholder="Enter your mail*">

                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="subject" type="text" placeholder="Enter your subject*">

                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="phone" type="text" placeholder="Your Phone*">


                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="message" id="message" placeholder="Message*"></textarea>

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
    <!-- main-area-end -->
@endsection
