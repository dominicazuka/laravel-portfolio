        @extends('frontend.main_master')
        @section('main')


        @section('title', $blog->blog_title)
        @section('description',
            'Read the detailed blog post titled "Blog Post Title" by Dominic Azuka, a Software
            Engineer and Full Stack Developer.')
        @section('og_description',
            'Dive into the blog post titled "Blog Post Title" by Dominic Azuka, a Software
            Engineer and Full Stack Developer, and explore the insights shared.')
        @section('twitter_description',
            'Explore the in-depth blog post titled "Blog Post Title" by Dominic Azuka, a
            Software Engineer and Full Stack Developer.')

            @php
                $allComments = App\Models\Comment::where('blog_id', $blog->id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
            @endphp
            {{--  <!-- main-area -->  --}}
            <main>
                {{--  <!-- breadcrumb-area -->  --}}
                <section class="breadcrumb__wrap">
                    <div class="container custom-container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-10">
                                <div class="breadcrumb__wrap__content">
                                    <h2 class="title" style="word-wrap: break-word;">{{ $blog->blog_title }}</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
                {{--  <!-- breadcrumb-area-end -->  --}}


                {{--  <!-- blog-details-area -->  --}}
                <section class="standard__blog blog__details">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="standard__blog__post">
                                    <div class="standard__blog__thumb">
                                        <img src="{{ asset($blog->blog_image) }}" alt="">
                                    </div>
                                    <div class="blog__details__content services__details__content">
                                        <ul class="blog__post__meta">
                                            <li><i class="fal fa-calendar-alt"></i>
                                                {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                                            {{--  <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                        <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li>  --}}
                                        </ul>
                                        <h2 class="title" style="word-wrap: break-word;">{{ $blog->blog_title }}</h2>
                                        <p>{!! $blog->blog_description !!}</p>
                                    </div>
                                    {{--  Tags  --}}
                                    <div class="blog__details__bottom">
                                        <ul class="blog__details__tag">
                                            <li class="title">Tag:</li>
                                            <li class="tags-list">
                                                @php
                                                    $tags = explode(',', $blog->blog_tags);
                                                @endphp

                                                @foreach ($tags as $tag)
                                                    <a href="#" class="tag-button">{{ $tag }}</a>
                                                @endforeach
                                            </li>
                                        </ul>

                                        {{--  social media handles  --}}
                                        <ul class="blog__details__social">
                                            <li class="title">Share :</li>
                                            <li class="social-icons">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-twitter-square"></i>
                                                </a>
                                                <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}"
                                                    target="_blank">
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Previous and next post -->
                                    <div class="blog__next__prev">
                                        <div class="row justify-content-between">
                                            {{-- Previous Post --}}
                                            <div class="col-xl-5 col-md-6 col-sm-12 col-xs-12">
                                                <div class="blog__next__prev__item">
                                                    <h4 class="title">Previous Post</h4>
                                                    @if ($previousPost)
                                                        <div class="blog__next__prev__post">
                                                            <div class="blog__next__prev__thumb">
                                                                <a href="{{ route('blog.details', $previousPost->id) }}">
                                                                    <img src="{{ asset($previousPost->blog_image) }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="blog__next__prev__content">
                                                                <h5 class="title">
                                                                    <a
                                                                        href="{{ route('blog.details', $previousPost->id) }}">
                                                                        {{ $previousPost->blog_title }}
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p>No previous post available.</p>
                                                    @endif
                                                </div>
                                            </div>

                                            {{-- Next Post --}}
                                            <div class="col-xl-5 col-md-6 col-sm-12 col-xs-12">
                                                <div class="blog__next__prev__item next_post text-end">
                                                    <h4 class="title">Next Post</h4>
                                                    @if ($nextPost)
                                                        <div class="blog__next__prev__post">
                                                            <div class="blog__next__prev__thumb">
                                                                <a href="{{ route('blog.details', $nextPost->id) }}">
                                                                    <img src="{{ asset($nextPost->blog_image) }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="blog__next__prev__content">
                                                                <h5 class="title">
                                                                    <a href="{{ route('blog.details', $nextPost->id) }}">
                                                                        {{ $nextPost->blog_title }}
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <p>No next post available.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  Comment  --}}
                                    <div class="comment comment__wrap">
                                        <div class="comment__title">
                                            <h4 class="title">({{ count($allComments) }}) Comment</h4>
                                        </div>
                                        <ul class="comment__list">
                                            @if ($allComments->isEmpty())
                                                <li class="comment__item">
                                                    <p>No comments available</p>
                                                </li>
                                            @else
                                                @foreach ($allComments as $item)
                                                    <li class="comment__item">
                                                        <div class="comment__thumb">
                                                            <img src=" {{ url('upload/anonymous.png') }}" alt="">
                                                        </div>
                                                        <div class="comment__content">
                                                            <div class="comment__avatar__info">
                                                                <div class="info">
                                                                    <h4 class="title">{{ $item->name }}</h4>
                                                                    <span
                                                                        class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                                </div>
                                                                {{--  <a href="#" class="reply"><i
                                                                    class="far fa-reply-all"></i></a> implement in future  --}}
                                                            </div>
                                                            <p>{{ $item->message }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    {{--  Comment Form  --}}
                                    <div class="comment__form">
                                        <div class="comment__title">
                                            <h4 class="title">Write your comment</h4>
                                        </div>
                                        <form id="commentForm" method="post" action="{{ route('store.comment') }}">
                                            @csrf
                                            <input name="blog_id" type="hidden" value="{{ $blog->id }}">
                                            <input name="blog_title" type="hidden" value="{{ $blog->blog_title }}">
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
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input name="phone" type="text"
                                                        placeholder="Enter your number*">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <span class="text-danger error-message"></span>
                                                    @error('website')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input name="website" type="text" placeholder="Website">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="text-danger error-message"></span>
                                                @error('message')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <textarea name="message" id="message" placeholder="Enter your Message*"></textarea>
                                            </div>
                                            <div class="form-grp checkbox-grp">
                                                <input type="checkbox" id="checkbox">
                                                <label for="checkbox">Save my name, email, and website in this browser for
                                                    the next time I comment.</label>
                                            </div>
                                            <div class="form-group mt-3 mb-5">
                                                <span class="text-danger recaptcha" ></span>
                                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" >
                                                </div>
                                            </div>
                                            <div class="form-group" id="loader" style="display: none; justify-content: center;">
                                                <div class="mb-3 spinner-border text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                                <button type="submit" class="btn">post a comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--  Recent Blog and Categories  --}}
                            <div class="col-lg-4">
                                <aside class="blog__sidebar">
                                    <div class="widget">
                                        {{--  <form action="#" class="search-form">
                                            <input type="text" placeholder="Search">
                                            <button type="submit"><i class="fal fa-search"></i></button>
                                        </form>  --}}
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
                                                        <h5 class="title"><a
                                                                href="{{ route('blog.details', $all->id) }}">{{ Str::limit($all->blog_title, 30) }}</a>
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
                                    {{--  Recent Comment  --}}
                                    {{--  <div class="widget">
                                        <h4 class="widget-title">Recent Comment</h4>
                                        <ul class="sidebar__comment">
                                            <li class="sidebar__comment__item">
                                                <a href="blog-details.html">Rasalina Sponde</a>
                                                <p>There are many variations of passages of lorem ipsum available, but the
                                                    majority have</p>
                                            </li>
                                            <li class="sidebar__comment__item">
                                                <a href="blog-details.html">Rasalina Sponde</a>
                                                <p>There are many variations of passages of lorem ipsum available, but the
                                                    majority have</p>
                                            </li>
                                            <li class="sidebar__comment__item">
                                                <a href="blog-details.html">Rasalina Sponde</a>
                                                <p>There are many variations of passages of lorem ipsum available, but the
                                                    majority have</p>
                                            </li>
                                            <li class="sidebar__comment__item">
                                                <a href="blog-details.html">Rasalina Sponde</a>
                                                <p>There are many variations of passages of lorem ipsum available, but the
                                                    majority have</p>
                                            </li>
                                        </ul>
                                    </div>  --}}
                                    {{--  Popular Tags  --}}
                                    {{--  <div class="widget">
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
                                    </div>  --}}
                                </aside>
                            </div>
                        </div>
                    </div>
                </section>
                {{--  <!-- blog-details-area-end -->  --}}
            </main>
            {{--  <!-- main-area-end -->  --}}
            <div style="height: 150px;"></div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#commentForm').submit(function(event) {
                        if ($('#commentForm').valid()) {
                            $('#loader').show();
                            // Submit the form
                            $('.recaptcha').text('');
                            $('#commentForm').submit();
                        } else {
                            if (grecaptcha.getResponse() === '') {
                                event.preventDefault();
                                $('#commentForm').find('.recaptcha').text(
                                    'Please complete the reCAPTCHA verification.');
                                $('#commentForm').find('.recaptcha').show();
                            }
                        }
                    });
                    $('#commentForm').validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            email: {
                                required: true,
                                email: true,
                            },
                            phone: {
                                required: true,
                            },
                            website: { //not required
                                url: true,
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
                            phone: {
                                required: 'Please Enter Phone Number',
                            },
                            website: {
                                url: 'Please Enter a Valid Website URL',
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
