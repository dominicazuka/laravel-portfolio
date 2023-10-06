    @php
        $blogs = App\Models\Blog::latest()
            ->limit(3)
            ->get(); //gets 3 latest post
    @endphp
    <section class="blog">
        <div class="container">
            <div class="row gx-0 justify-content-center">
                @foreach ($blogs as $item)
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="{{ route('blog.details', $item->id) }}"><img src="{{ $item->blog_image }}" alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="{{ route('category.blog', $item->blog_category_id) }}">{{ $item['category']['blog_category'] }}</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span
                                    class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                <h3 class="title" style="word-wrap: break-word; overflow-wrap: break-word;"><a
                                        href="{{ route('blog.details', $item->id) }}">{{ Str::limit($item->blog_title, 30) }}</a></h3>
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
