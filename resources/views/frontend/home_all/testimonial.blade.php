@php
    $allTestimonial = App\Models\Testimonial::latest()->get();
@endphp

<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="testimonial__avatar__img">
                    @foreach ($allTestimonial as $item)
                        <li>
                            <img class="light" src="{{ asset($item->testimonial_image) }}" alt="">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <span class="sub-title">06 - Client Feedback</span>
                        <h2 class="title">Happy clients feedback</h2>
                    </div>
                    <div class="testimonial__active">
                        @foreach ($allTestimonial as $item)
                            <div class="testimonial__item">
                                <div class="testimonial__icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="testimonial__content">
                                    <p>{!! $item->testimonial_description !!}</p>
                                    <div class="testimonial__avatar">
                                        <span>{{ $item->testimonial_name }}</span>
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
</section>
