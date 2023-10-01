@extends('frontend.main_master')
@section('main')

{{--  Page title  --}}
@section('title')
Portfolio - Software Engineer | Full Stack Developer
@endsection


    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Portfolio Page</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Portfolio</li>
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

        <!-- portfolio-area -->
        <section class="portfolio__inner">
            <div class="container">

                <div class="portfolio__inner__active">

                    @foreach ($portfolio as $item)
                        <div class="portfolio__inner__item grid-item cat-two cat-three">
                            <div class="row gx-0 align-items-center">
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__thumb">
                                        <a href="portfolio-details.html">
                                            <img src="{{ asset($item->portfolio_image) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-10">
                                    <div class="portfolio__inner__content">
                                        <h2 class="title"><a
                                                href="{{ route('portfolio.details', $item->id) }}">{{ $item->portfolio_title }}</a>
                                        </h2>
                                        <p>{!! Str::limit($item->portfolio_description, 200) !!} </p>
                                        <a href="{{ route('portfolio.details', $item->id) }}" class="link">View Case
                                            Study</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>
        </section>
        <!-- portfolio-area-end -->


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
@endsection
