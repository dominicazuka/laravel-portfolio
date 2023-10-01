@php
    $allFooter = App\Models\Footer::find(1);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact</h5>
                        <h4 class="title">{{ $allFooter->number }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{!! $allFooter->short_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">NIGERIA</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $allFooter->address }}</p>
                        <a href="mailto:{{ $allFooter->email }}" class="mail">{{ $allFooter->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Check out my profiles</p>
                        <ul class="footer__social__list">
                            <li><a href="{{ $allFooter->facebook }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $allFooter->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $allFooter->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="{{ $allFooter->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $allFooter->github }}" target="_blank"><i class="fab fa-github"></i></a></li>
                            <li><a href="{{ $allFooter->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>{{ $allFooter->copyright }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
