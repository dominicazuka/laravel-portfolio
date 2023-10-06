@extends('frontend.main_master')
@section('main')
    @php
        $services = App\Models\Services::latest()->get();
        $allTestimonial = App\Models\Testimonial::latest()->get();
        $blogs = App\Models\Blog::latest()
            ->limit(3)
            ->get(); //gets 3 latest post
    @endphp

@section('title', 'About - Software Engineer | Full Stack Developer')
@section('description', 'Learn more about Dominic Azuka, a Software Engineer and Full Stack Developer, specializing in
    JavaScript (MERN stack) development and much more.')
@section('og_description', 'Get to know Dominic Azuka, a Software Engineer and Full Stack Developer, through his journey
    in software development, coding tips, and more.')
@section('twitter_description', 'Explore the story of Dominic Azuka, a Software Engineer and Full Stack Developer, and
    discover his passion for coding, design, and development.')

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">About me</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Me</li>
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

        <!-- about-area -->
        <section class="about about__style__two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about__image">
                            <img src="{{ $aboutpage->about_image }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <div class="section__title">
                                <span class="sub-title">01 - About me</span>
                                <h2 class="title">{{ $aboutpage->title }}</h2>
                            </div>
                            <div class="about__exp">
                                <div class="about__exp__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                                </div>
                                <div class="about__exp__content">
                                    <p><span>{{ $aboutpage->short_title }}</span> </p>
                                </div>
                            </div>
                            <p class="desc">{{ $aboutpage->short_description }}</p>
                            <a href="{{ route('download.resume') }}" class="btn" style="border-radius: 50px; padding: 10px 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">Download my resume</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="about__info__wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="about-tab" data-bs-toggle="tab"
                                        data-bs-target="#about" type="button" role="tab" aria-controls="about"
                                        aria-selected="true">About</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills"
                                        type="button" role="tab" aria-controls="skills"
                                        aria-selected="false">Skills</button>
                                </li>
                                {{--  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards"
                                        type="button" role="tab" aria-controls="awards"
                                        aria-selected="false">awards</button>
                                </li>  --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="education-tab" data-bs-toggle="tab"
                                        data-bs-target="#education" type="button" role="tab" aria-controls="education"
                                        aria-selected="false">education</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                    aria-labelledby="about-tab">
                                    <p class="desc">{!! $aboutpage->long_description !!}</p>
                                </div>
                                <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                                    <div class="about__skill__wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Web Development</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 84%;"
                                                            aria-valuenow="84" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">84%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Databases</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 90%;"
                                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">90%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Version Control</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">50%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Web Services and APIs</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 79%;"
                                                            aria-valuenow="79" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">79%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Server Management and Deployment</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 80%;"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">80%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Testing and Quality Assurance</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 75%;"
                                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">75%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Frameworks and Libraries</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">85%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__skill__item">
                                                    <h5 class="title">Mobile App Development</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="percentage">85%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  Licenses & Certifications  --}}
                                {{--  <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
                                    <div class="about__award__wrap">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6 col-sm-9">
                                                <div class="about__award__item">
                                                    <div class="award__logo">
                                                        <img src="{{ asset('frontend/assets/img/images/awards_01.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="award__content">
                                                        <h5 class="title">Best ux designer award in 2002</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available,
                                                            but the majority have suffered alteration in some form, by
                                                            injected humour,</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-9">
                                                <div class="about__award__item">
                                                    <div class="award__logo">
                                                        <img src="{{ asset('frontend/assets/img/images/awards_02.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="award__content">
                                                        <h5 class="title">BBA final examination 2001</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available,
                                                            but the majority have suffered alteration in some form, by
                                                            injected humour,</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-9">
                                                <div class="about__award__item">
                                                    <div class="award__logo">
                                                        <img src="{{ asset('frontend/assets/img/images/awards_03.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="award__content">
                                                        <h5 class="title">User research award 2020</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available,
                                                            but the majority have suffered alteration in some form, by
                                                            injected humour,</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-9">
                                                <div class="about__award__item">
                                                    <div class="award__logo">
                                                        <img src="{{ asset('frontend/assets/img/images/awards_04.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="award__content">
                                                        <h5 class="title">Dsigning award 2021</h5>
                                                        <p>There are many variations of passages of Lorem Ipsum available,
                                                            but the majority have suffered alteration in some form, by
                                                            injected humour,</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}
                                <div class="tab-pane fade" id="education" role="tabpanel"
                                    aria-labelledby="education-tab">
                                    <div class="about__education__wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">B.Sc Computer Science at Federal University Wukari, Taraba State.</h3>
                                                    <span class="date">2014 – 2018</span>
                                                    <p>This four-year program provided me with a strong foundation in computer science concepts, programming languages, algorithms, and problem-solving skills. It was a transformative period where I not only gained knowledge but also developed a passion for technology and innovation.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">CISCO IT Essentials/Hardware Troubleshooting, Computer Engineering at Industrial Training Fund Abuja</h3>
                                                    <span class="date">2017 – 2018</span>
                                                    <p>During my time at the Industrial Training Fund Abuja, I had the opportunity to delve deep into IT Essentials and Hardware Troubleshooting in the field of Computer Engineering. This hands-on training program allowed me to develop practical skills, including the installation of various operating systems, troubleshooting computer issues, replacing basic computer components, and performing preventive and corrective maintenance.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">CISCO CCNA Routing and Switching, Computer Systems Networking and Telecommunications at Industrial Training Fund Abuja</h3>
                                                    <span class="date">2017 – 2018</span>
                                                    <p>This program honed my abilities in designing, calculating, and implementing subnet masks and addresses in both IPv4 and IPv6 networks. Additionally, I gained proficiency in using common network utilities and navigating the Cisco Command Line Interface (CLI). Active participation in Cisco Networking activities and societies enriched my understanding of networking concepts.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">UI/UX Design With Figma at Udemy</h3>
                                                    <span class="date">Issued Jul 2023</span>
                                                    <p>I completed a course on UI/UX Design using Figma on Udemy in July 2023. This course equipped me with essential skills in UI/UX design and proficient harness of the Figma software. I gained valuable insights into creating user-friendly interfaces and optimizing user experiences.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">Security CISSP (ISC2-CISSP) at (ISC)²</h3>
                                                    <span class="date">Issued Jun 2023</span>
                                                    <p>I earned the (ISC)² Certified Information Systems Security Professional (CISSP) certification in June 2023. This certification demonstrates my expertise in cybersecurity and information security management. It is a testament to my commitment to ensuring the security and integrity of digital systems.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">Members Only Blog using PHP, MySQL & Ajax at Udemy</h3>
                                                    <span class="date">Issued Sep 2022</span>
                                                    <p>I completed a project where I developed a Members Only Blog using PHP, MySQL, and Ajax in September 2022. This project showcased my skills in wireframing, implementing REST APIs, and enhancing user experiences. It allowed me to gain hands-on experience in web development and database management.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="about__education__item">
                                                    <h3 class="title">Responsive Web Design at freeCodeCamp</h3>
                                                    <span class="date">Issued Jul 2021</span>
                                                    <p>I earned a credential in Responsive Web Design from freeCodeCamp in July 2021. This certification demonstrates my proficiency in creating responsive and user-friendly web designs. I have a strong foundation in wireframing and ensuring optimal user experiences across various devices.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- services-area -->
        <section class="services__style__two">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="section__title text-center">
                            <span class="sub-title">02 - my Services</span>
                            <h2 class="title">Building Tomorrows Digital World, One Line of Code at a Time</h2>
                        </div>
                    </div>
                </div>
                <div class="services__style__two__wrap">
                    <div class="row gx-0">
                        @foreach ($services as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="services__style__two__item">
                                    <div class="services__style__two__icon">
                                        <img src="{{ $item->service_icon }}" alt="">
                                    </div>
                                    <div class="services__style__two__content">
                                        <h3 class="title" style="word-wrap: break-word; overflow-wrap: break-word;"><a
                                                href="{{ route('service.details', $item->id) }}">{{ $item->service_title }}</a>
                                        </h3>
                                        <p>{!! Str::limit($item->service_description, 50) !!}</p>
                                        <a href="{{ route('service.details', $item->id) }}" class="services__btn"><i
                                                class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- services-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial testimonial__style__two">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-11">
                        <div class="testimonial__wrap">
                            <div class="section__title text-center">
                                <span class="sub-title">06 - Client Feedback</span>
                                <h2 class="title">Some happy clients feedback</h2>
                            </div>
                            <div class="testimonial__two__active">
                                @foreach ($allTestimonial as $item)
                                    <div class="testimonial__item">
                                        <div class="testimonial__icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>{!! $item->testimonial_description !!}</p>
                                            <div class="testimonial__avatar">
                                                <span>{{ $item->testimonial_name }}</span>
                                                <div class="testi__avatar__img">
                                                    <img src="{{ asset($item->testimonial_image) }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="testimonial__arrow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial__two__icons">
                <ul>
                    @foreach ($allTestimonial as $item)
                        <li><img src="{{ asset($item->testimonial_image) }}" alt=""></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- blog-area -->
        <section class="blog blog__style__two">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    @foreach ($blogs as $item)
                        <div class="col-lg-4 col-md-6 col-sm-9">
                            <div class="blog__post__item">
                                <div class="blog__post__thumb">
                                    <a href="{{ route('blog.details', $item->id) }}"><img src="{{ $item->blog_image }}"
                                            alt=""></a>
                                    <div class="blog__post__tags">
                                        <a
                                            href="{{ route('category.blog', $item->blog_category_id) }}" style="word-wrap: break-word; overflow-wrap: break-word;">{{ $item['category']['blog_category'] }}</a>
                                    </div>
                                </div>
                                <div class="blog__post__content">
                                    <span
                                        class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                    <h3 class="title" style="word-wrap: break-word; overflow-wrap: break-word;"><a
                                            href="{{ route('blog.details', $item->id) }}">{{ $item->blog_title }}</a>
                                    </h3>
                                    <a href="{{ route('blog.details', $item->id) }}" class="read__more">Read mORe</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="blog__button text-center">
                    <a href="{{ route('home.blog') }}" class="btn" style="border-radius: 50px; padding: 10px 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">more blog</a>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
