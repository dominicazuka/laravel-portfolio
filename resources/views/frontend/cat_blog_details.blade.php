@extends('frontend.main_master')
@section('main')
    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">{{ $categoryName->blog_category }}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                        @foreach ($blogPost as $item)
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <a href="{{ route('blog.details', $item->id) }}"><img
                                            src="{{ asset($item->blog_image) }}" alt=""></a>
                                    <a href="{{ route('blog.details', $item->id) }}" class="blog__link"><i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                                <div class="standard__blog__content">
                                    <div class="blog__post__avatar">
                                        <div class="thumb"><img src="{{ asset($item->blog_image) }}" alt=""></div>
                                        <span class="post__by">By : <a href="#">Halina Spond</a></span>
                                    </div>
                                    <h2 class="title"><a
                                            href="{{ route('blog.details', $item->id) }}">{{ $item->blog_title }}</a></h2>
                                    <p>
                                        {!! Str::limit($item->blog_description, 200) !!}
                                    </p>
                                    <ul class="blog__post__meta">
                                        <li><i class="fal fa-calendar-alt"></i>
                                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
                                        {{--  <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                            <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>  --}}
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        {{--  Pagination  --}}
                        <div class="pagination-wrap">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="far fa-long-arrow-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="far fa-long-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    {{--  SideBar  --}}
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            <div class="widget">
                                <form action="#" class="search-form">
                                    <input type="text" placeholder="Search">
                                    <button type="submit"><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                            {{--  Recent Blog  --}}
                            <div class="widget">
                                <h4 class="widget-title">Recent Blog</h4>
                                <ul class="rc__post">
                                    @foreach ($allBlogs as $all)
                                        <li class="rc__post__item">
                                            <div class="rc__post__thumb">
                                                <a href="blog-details.html"><img src="{{ asset($all->blog_image) }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title"><a href="blog-details.html">{{ $all->blog_title }}</a>
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
                            {{--  Comments  --}}
                            <div class="widget">
                                <h4 class="widget-title">Recent Comment</h4>
                                <ul class="sidebar__comment">
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                    <li class="sidebar__comment__item">
                                        <a href="blog-details.html">Rasalina Sponde</a>
                                        <p>There are many variations of passages of lorem ipsum available, but the majority
                                            have</p>
                                    </li>
                                </ul>
                            </div>
                            {{--  Popular Tags  --}}
                            <div class="widget">
                                <h4 class="widget-title">Popular Tags</h4>
                                <ul class="sidebar__tags">
                                    <li><a href="blog.html">Business</a></li>
                                    <li><a href="blog.html">Design</a></li>
                                    <li><a href="blog.html">apps</a></li>
                                    <li><a href="blog.html">landing page</a></li>
                                    <li><a href="blog.html">data</a></li>
                                    <li><a href="blog.html">website</a></li>
                                    <li><a href="blog.html">book</a></li>
                                    <li><a href="blog.html">Design</a></li>
                                    <li><a href="blog.html">product design</a></li>
                                    <li><a href="blog.html">landing page</a></li>
                                    <li><a href="blog.html">data</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->


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
                                    <input name="name" type="text" placeholder="Enter name*">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="email" type="email" placeholder="Enter your mail*">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="subject" type="text" placeholder="Enter your subject*">
                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input name="phone" type="text" placeholder="Your Phone*">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <textarea name="message" id="message" placeholder="Message*"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
