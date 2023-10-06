@php
    $partnerPage = App\Models\Partner::find(1);
    $partnerMultiImage = App\Models\PartnerMultiImage::latest()->get();
@endphp

<section class="partner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="partner__logo__wrap">
                    @foreach ($partnerMultiImage as $item)
                        <li>
                            <img class="light" src="{{ asset($item->multi_image) }}" alt="">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="partner__content">
                    <div class="section__title">
                        <span class="sub-title">05 - partners</span>
                        <h2 class="title">{{ $partnerPage->partner_title }}</h2>
                    </div>
                    <p>{!! $partnerPage->partner_description !!}</p>
                    <a href="{{ route('contact.me') }}" class="btn" style="border-radius: 50px; padding: 10px 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">Start a conversation</a>
                </div>
            </div>
        </div>
    </div>
</section>
