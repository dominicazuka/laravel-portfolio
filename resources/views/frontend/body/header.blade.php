@php
    $allFooter = App\Models\Footer::find(1);
    $route = Route::current()->getName();
@endphp

{{--  <!-- header-area -->  --}}
<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ route('home') }}" class="logo__black"><img
                                        src="{{ asset('frontend/assets/img/logo/logo-dark.png') }}" alt=""></a>
                                <a href="{{ route('home') }}" class="logo__white"><img
                                        src="{{ asset('frontend/assets/img/logo/logo-light.png') }}" alt=""></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="{{ $route == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="{{ $route == 'home.about' ? 'active' : '' }}"><a href="{{ route('home.about') }}">About</a></li>
                                    <li class="{{ $route == 'home.services' ? 'active' : '' }}"><a href="{{ route('home.services') }}">Services</a></li>
                                    <li class="{{ $route == 'home.portfolio' ? 'active' : '' }} menu-item-has-children"><a
                                            href="{{ route('home.portfolio') }}">Portfolio</a>
                                        {{--  <ul class="sub-menu">
                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                    <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                                </ul>  --}}
                                    </li>
                                    <li class="{{ $route == 'home.blog' ? 'active' : '' }} menu-item-has-children"><a href="{{ route('home.blog') }}">
                                            Blog</a>
                                        {{--  <ul class="sub-menu">
                                                    <li><a href="blog.html">Our News</a></li>
                                                    <li><a href="blog-details.html">News Details</a></li>
                                                </ul>  --}}
                                    </li>
                                    <li class="{{ $route == 'contact.me' ? 'active' : '' }}"><a href="{{ route('contact.me') }}">contact</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('contact.me') }}" class="btn" style="border-radius: 50px; padding: 10px 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">Contact</a>
                            </div>
                        </nav>
                    </div>
                    {{--  <!-- Mobile Menu  -->  --}}
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('home') }}" class="logo__black"><img
                                        src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a>
                                <a href="{{ route('home') }}" class="logo__white"><img
                                        src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                {{--  <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->  --}}
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="{{ $allFooter->facebook }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $allFooter->twitter }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $allFooter->linkedin }}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $allFooter->instagram }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $allFooter->github }}" target="_blank"><i
                                                class="fab fa-github"></i></a></li>
                                    <li><a href="{{ $allFooter->youtube }}" target="_blank"><i
                                                class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    {{--  <!-- End Mobile Menu -->  --}}
                </div>
            </div>
        </div>
    </div>
</header>
{{--  <!-- header-area-end -->  --}}
