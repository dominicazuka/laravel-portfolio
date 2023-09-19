@php
    $aboutpage= App\Models\About::find(1);
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/react-js-logo.png') }}" alt="React">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/react-js-logo.png') }}" alt="React">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/mongo-db.png') }}"
                            alt="MongoDB">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/mongo-db.png') }}" alt="MongoDB">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/laravel-icon.png') }}"
                            alt="Laravel">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/laravel-icon.png') }}"
                            alt="Laravel">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/docker.png') }}"
                            alt="Docker">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/docker.png') }}" alt="Docker">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/adobe-suite.png') }}"
                            alt="Adobe">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/adobe-suite.png') }}" alt="Adobe">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/nodejs.png') }}"
                            alt="nodejs">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/nodejs.png') }}"
                            alt="nodejs">
                    </li>
                    <li>
                        <img class="light" src="{{ asset('frontend/assets/img/icons/figma_light.png') }}"
                            alt="Figma">
                        <img class="dark" src="{{ asset('frontend/assets/img/icons/figma.png') }}" alt="Figma">
                    </li>
                </ul>
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
                            <p>{{ $aboutpage->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $aboutpage->short_description }}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
