
<header class="header header__style-one">
    <div class="header__top-info-wrap d-none d-lg-block">
        <div class="container">
            <div class="header__top-info ul_li_between mt-none-10">
                <ul class="ul_li mt-10">
                    @if (Auth::check())
                        <li><i class="fas fa-user"></i>{{ __('message.welcome') }}, {{ Auth::user()->name }}</li>
                    @endif
                </ul>
                <div class="header__top-right ul_li mt-10">
                    <div class="date">
                        <i class="fal fa-calendar-alt"></i>
                        {{ now()->locale(app()->getLocale())->translatedFormat('l, d F Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header__middle ul_li_between justify-content-xs-center">
            <div class="header__logo">
                <a href="{{ route('customer.index') }}">
                    <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</header>