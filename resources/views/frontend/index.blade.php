@extends('frontend.main_master')
@section('main')
    <!-- banner-area -->

    <!-- banner-area-end -->
    @include('frontend.home_all.home_slide')
    <!-- about-area -->
    @include('frontend.home_all.home_about')
    <!-- about-area-end -->

    <!-- services-area -->
    @include('frontend.home_all.home_service')
    <!-- services-area-end -->

    <!-- work-process-area -->
    <section class="work__process">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section__title text-center">
                        <span class="sub-title">03 - Working Process</span>
                        <h2 class="title">From Discovery to Delivery: Crafting Digital Excellence</h2>
                    </div>
                </div>
            </div>
            <div class="row work__process__wrap">
                <div class="col">
                    <div class="work__process__item">
                        <span class="work__process_step">Step - 01</span>
                        <div class="work__process__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon01.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon01.png') }}" alt="">
                        </div>
                        <div class="work__process__content">
                            <h4 class="title">Discover</h4>
                            <p>Explore project requirements and client needs, Research technologies and design trends,
                                Identify challenges and potential solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="work__process__item">
                        <span class="work__process_step">Step - 02</span>
                        <div class="work__process__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon02.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon02.png') }}" alt="">
                        </div>
                        <div class="work__process__content">
                            <h4 class="title">Define</h4>
                            <p>Outline project scope and objectives, Create wireframes and design concepts, Define tech
                                stack and architecture choices.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="work__process__item">
                        <span class="work__process_step">Step - 03</span>
                        <div class="work__process__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon03.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon03.png') }}" alt="">
                        </div>
                        <div class="work__process__content">
                            <h4 class="title">Develop</h4>
                            <p>Write clean, efficient code using required technology stack, Implement best coding practices
                                and design patterns, Utilize AWS, Docker, Kubernetes, GCP, and other tools for scalability
                                and deployment.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="work__process__item">
                        <span class="work__process_step">Step - 04</span>
                        <div class="work__process__icon">
                            <img class="light" src="{{ asset('frontend/assets/img/icons/wp_light_icon04.png') }}"
                                alt="">
                            <img class="dark" src="{{ asset('frontend/assets/img/icons/wp_icon04.png') }}" alt="">
                        </div>
                        <div class="work__process__content">
                            <h4 class="title">Deliver</h4>
                            <p>Conduct rigorous testing and quality assurance, Collaborate with clients for feedback and
                                revisions, Launch and maintain products with PHP, Laravel, MySQL, Sequelize, MERN Stack, React Native, NextJs and other technology
                                expertise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- work-process-area-end -->

    <!-- portfolio-area -->
    @include('frontend.home_all.portfolio')
    <!-- portfolio-area-end -->

    <!-- partner-area -->
    @include('frontend.home_all.partner')
    <!-- partner-area-end -->

    <!-- testimonial-area -->
    @include('frontend.home_all.testimonial')
    <!-- testimonial-area-end -->

    <!-- blog-area -->
    @include('frontend.home_all.home_blog')
    <!-- blog-area-end -->

    <!-- contact-area -->
    <section class="homeContact">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
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
@endsection
