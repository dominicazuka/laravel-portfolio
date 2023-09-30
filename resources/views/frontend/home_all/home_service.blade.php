    @php
        $services = App\Models\Services::latest()->get();
    @endphp
    <section class="services">
        <div class="container">
            <div class="services__title__wrap">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="section__title">
                            <span class="sub-title">02 - my Services</span>
                            <h2 class="title">{{ "Building Tomorrow's Digital World, One Line of Code at a Time" }}
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-4">
                        <div class="services__arrow"></div>
                    </div>
                </div>
            </div>
            <div class="row gx-0 services__active">
                @foreach ($services as $item)
                    <div class="col-xl-3">
                        <div class="services__item">
                            <div class="services__thumb">
                                <a href="{{ route('service.details', $item->id) }}"><img
                                        src="{{ $item->service_image }}" alt=""></a>
                            </div>
                            <div class="services__content">
                                <div class="services__icon">
                                    <img class="light" src="{{ $item->service_icon }}" alt="">
                                </div>
                                <h3 class="title"><a
                                        href="{{ route('service.details', $item->id) }}">{{ $item->service_title }}</a>
                                </h3>
                                <div>{!! Str::limit($item->service_description, 200) !!}</div>
                                {{--  <ul class="services__list">
                                <li>Research & Data</li>
                                <li>Branding & Positioning</li>
                                <li>Business Consulting</li>
                                <li>Go To Market</li>
                            </ul>  --}}
                                <a href="{{ route('service.details', $item->id) }}" class="btn border-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
