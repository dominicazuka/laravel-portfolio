@extends('frontend.main_master')
@section('main')

@section('title', 'All Services - Software Engineer | Full Stack Developer')
@section('description', 'Discover the services offered by Dominic Azuka, a Software Engineer and Full Stack Developer,
    including web development, design, and more.')
@section('og_description', 'Explore the services provided by Dominic Azuka, a Software Engineer and Full Stack
    Developer, encompassing web development, design, and more.')
@section('twitter_description', 'Learn about the services offered by Dominic Azuka, a Software Engineer and Full Stack
    Developer, covering web development, design, and more.')

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
                                    <h2 class="title"><a
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
                        <aside class="blog__sidebar">
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
                                                <h5 class="title"><a
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
        <!-- blog-area-end -->
        <div style="height: 150px;"></div>

    </main>
    <!-- main-area-end -->
@endsection
