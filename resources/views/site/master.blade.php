<!DOCTYPE html>
<html  @if (app()->currentLocale() == 'ar')
            lang="ar" dir="rtl"
        @elseif (app()->currentLocale() == 'en')
           lang="en" dir="ltr"
        @endif
>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ asset('siteassets/css/all.min.css') }}" />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css"
    />
    <link rel="shortcut icon" href="{{ asset('siteassets/images/icon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('siteassets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('siteassets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('siteassets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('siteassets/css/style.css') }}" />
    <link rel="icon" href="{{ asset('siteassets/images/logo.png') }}" />
  @yield('styles')
</head>
<style>
    /* .lang{
    border-radius: 26px;
    text-align: center;

    }
    .lang-o{
        color: #796565;
    border-radius: 26px;
    text-align: center;
    } */
</style>
@if (app()->currentLocale() == 'ar')
  <style>
    .wrapper {
        text-align: left;
        /* transform: translateX(-30%); */
}

@media (max-width: 767px) {
    .wrapper {
        text-align: center;
    }
}
  </style>
@endif

  <body>
    <header class="main-header">
        <!-- Desktop menu -->
        <div class="d-none d-xl-block">
          <nav class="navbar navbar-expand-xl"id="navbar" >
            <div class="container-fluid px-sm-5">
              <a class="navbar-brand" href="{{ route('site.index') }}">
                <img src="{{ asset('siteassets/images/Frame 13.svg') }}" alt="">
              </a>
            <form action="{{ route('site.search') }}" method="GET">
                <div class="search-wrapper">
                    <input class="form-control" type="search" placeholder="{{ __('site.Search') }}" aria-label="Search" name="s" value="{{request()->s }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.81004 18.0861C5.24673 18.0861 1.53418 14.3735 1.53418 9.81022C1.53418 5.24691 5.24673 1.53436 9.81004 1.53436C14.3734 1.53436 18.0859 5.24691 18.0859 9.81022C18.0859 14.3735 14.3734 18.0861 9.81004 18.0861ZM9.81004 3.18954C6.15956 3.18954 3.18935 6.15974 3.18935 9.81022C3.18935 13.4607 6.15956 16.4309 9.81004 16.4309C13.4605 16.4309 16.4307 13.4607 16.4307 9.81022C16.4307 6.15974 13.4614 3.18954 9.81004 3.18954Z" fill="white"/>
                    <path d="M21.6383 22.4657C21.5296 22.4658 21.4219 22.4444 21.3215 22.4028C21.2211 22.3612 21.1299 22.3002 21.0532 22.2232L14.6857 15.8557C14.6089 15.7789 14.5479 15.6877 14.5063 15.5873C14.4648 15.4869 14.4434 15.3793 14.4434 15.2706C14.4434 15.162 14.4648 15.0544 14.5063 14.954C14.5479 14.8536 14.6089 14.7624 14.6857 14.6855C14.7626 14.6087 14.8538 14.5477 14.9542 14.5062C15.0546 14.4646 15.1622 14.4432 15.2708 14.4432C15.3795 14.4432 15.4871 14.4646 15.5875 14.5062C15.6879 14.5477 15.7791 14.6087 15.8559 14.6855L22.2234 21.053C22.3395 21.1686 22.4186 21.316 22.4508 21.4767C22.4829 21.6373 22.4666 21.8039 22.4039 21.9553C22.3412 22.1066 22.235 22.236 22.0987 22.3268C21.9623 22.4177 21.8021 22.466 21.6383 22.4657Z" fill="white"/>
                    </svg>
                </div>
            </form>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                  </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.index') ? 'active' : '' }}" aria-current="page" href="{{ route('site.index') }}">{{ __('site.Home') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.about') ? 'active' : '' }}" href="{{ route('site.about') }}">{{ __('site.About us') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.service') ? 'active' : '' }}" href="{{ route('site.service') }}">{{ __('site.Our Service') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.product') ? 'active' : '' }}" href="{{ route('site.product') }}">{{ __('site.Our Product') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.booking') ? 'active' : '' }}" href="{{ route('site.booking') }}">{{ __('site.Booking') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.post') ? 'active' : '' }}" href="{{ route('site.post') }}">{{ __('site.Blog') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('site.contact') ? 'active' : '' }}" href="{{ route('site.contact') }}">{{ __('site.Contact us') }}</a>
                  </li>

                </ul>

              </div>

              <div class="collapse navbar-collapse justify-content-end custom-nav" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item">

            <a class="nav-link" href="{{ asset('digital-events.pdf') }}" >
                    <img src="{{ asset('siteassets/images/Group 138.svg') }}" alt="">
                </a>
                  </li>
                  <li class="nav-item">

                <a class="nav-link" href="tel: (+966) 56 138 8363">
                    <img src="{{ asset('siteassets/images/Group 139.svg') }}" alt="">
                </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg  class="mx-1" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.0002 1.17C10.8128 0.983753 10.5594 0.879211 10.2952 0.879211C10.031 0.879211 9.77756 0.983753 9.59019 1.17L6.00019 4.71L2.46019 1.17C2.27283 0.983753 2.01938 0.879211 1.75519 0.879211C1.49101 0.879211 1.23756 0.983753 1.05019 1.17C0.956464 1.26297 0.88207 1.37357 0.831301 1.49543C0.780533 1.61729 0.754395 1.74799 0.754395 1.88C0.754395 2.01202 0.780533 2.14272 0.831301 2.26458C0.88207 2.38644 0.956464 2.49704 1.05019 2.59L5.29019 6.83C5.38316 6.92373 5.49376 6.99813 5.61562 7.04889C5.73748 7.09966 5.86818 7.1258 6.00019 7.1258C6.1322 7.1258 6.26291 7.09966 6.38477 7.04889C6.50663 6.99813 6.61723 6.92373 6.71019 6.83L11.0002 2.59C11.0939 2.49704 11.1683 2.38644 11.2191 2.26458C11.2699 2.14272 11.296 2.01202 11.296 1.88C11.296 1.74799 11.2699 1.61729 11.2191 1.49543C11.1683 1.37357 11.0939 1.26297 11.0002 1.17Z" fill="white"/>
                        </svg>

                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <!-- Languages -->
                {{-- <li class="dropdown-item desktop">
                    <select class="form-control lang" onchange="window.location.href =this.value">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <option class="lang-o" {{ app()->currentLocale() == $localeCode ? 'selected' : '' }}
                                value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </option>
                        @endforeach
                    </select>
                </li> --}}
                <!-- / Languages -->
                </ul>
              </div>
            </div>
          </nav>
        </div>

        <!-- Mobile menu -->
        <div class="d-xl-none">
          <div class="d-flex justify-content-between align-items-center py-3 px-4 mobile-menu">
            <button class="menu-open">
              <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.9998 0.320007C6.43982 0.320007 0.319824 6.44001 0.319824 14C0.319824 21.56 6.43982 27.68 13.9998 27.68C21.5598 27.68 27.6798 21.56 27.6798 14C27.6798 6.44001 21.5598 0.320007 13.9998 0.320007ZM13.9998 26.24C7.23182 26.24 1.75982 20.768 1.75982 14C1.75982 7.23201 7.23182 1.76001 13.9998 1.76001C20.7678 1.76001 26.2398 7.23201 26.2398 14C26.2398 20.768 20.7678 26.24 13.9998 26.24ZM21.0198 14C21.0198 14.396 20.6958 14.72 20.2998 14.72H7.69982C7.30382 14.72 6.97982 14.396 6.97982 14C6.97982 13.604 7.30382 13.28 7.69982 13.28H20.2998C20.6958 13.28 21.0198 13.604 21.0198 14ZM21.0198 18.32C21.0198 18.716 20.6958 19.04 20.2998 19.04H7.69982C7.30382 19.04 6.97982 18.716 6.97982 18.32C6.97982 17.924 7.30382 17.6 7.69982 17.6H20.2998C20.6958 17.6 21.0198 17.924 21.0198 18.32ZM21.0198 9.68001C21.0198 10.076 20.6958 10.4 20.2998 10.4H7.69982C7.30382 10.4 6.97982 10.076 6.97982 9.68001C6.97982 9.28401 7.30382 8.96001 7.69982 8.96001H20.2998C20.6958 8.96001 21.0198 9.28401 21.0198 9.68001Z" fill="white"/>
                </svg>
            </button>

            <img src="{{ asset('siteassets/images/Frame 13.svg') }}" alt="">

            <button class="search">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.81004 18.0861C5.24673 18.0861 1.53418 14.3735 1.53418 9.81022C1.53418 5.24691 5.24673 1.53436 9.81004 1.53436C14.3734 1.53436 18.0859 5.24691 18.0859 9.81022C18.0859 14.3735 14.3734 18.0861 9.81004 18.0861ZM9.81004 3.18954C6.15956 3.18954 3.18935 6.15974 3.18935 9.81022C3.18935 13.4607 6.15956 16.4309 9.81004 16.4309C13.4605 16.4309 16.4307 13.4607 16.4307 9.81022C16.4307 6.15974 13.4614 3.18954 9.81004 3.18954Z" fill="white"/>
                <path d="M21.6383 22.4657C21.5296 22.4658 21.4219 22.4444 21.3215 22.4028C21.2211 22.3612 21.1299 22.3002 21.0532 22.2232L14.6857 15.8557C14.6089 15.7789 14.5479 15.6877 14.5063 15.5873C14.4648 15.4869 14.4434 15.3793 14.4434 15.2706C14.4434 15.162 14.4648 15.0544 14.5063 14.954C14.5479 14.8536 14.6089 14.7624 14.6857 14.6855C14.7626 14.6087 14.8538 14.5477 14.9542 14.5062C15.0546 14.4646 15.1622 14.4432 15.2708 14.4432C15.3795 14.4432 15.4871 14.4646 15.5875 14.5062C15.6879 14.5477 15.7791 14.6087 15.8559 14.6855L22.2234 21.053C22.3395 21.1686 22.4186 21.316 22.4508 21.4767C22.4829 21.6373 22.4666 21.8039 22.4039 21.9553C22.3412 22.1066 22.235 22.236 22.0987 22.3268C21.9623 22.4177 21.8021 22.466 21.6383 22.4657Z" fill="white"/>
                </svg>
            </button>

            <div class="mobile-search-wrapper">
              <form action="{{ route('site.search') }}" method="GET">
                <input class="form-control" type="search" placeholder="{{ __('site.Search') }}" aria-label="Search" name="s" value="{{request()->s }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.81004 18.0861C5.24673 18.0861 1.53418 14.3735 1.53418 9.81022C1.53418 5.24691 5.24673 1.53436 9.81004 1.53436C14.3734 1.53436 18.0859 5.24691 18.0859 9.81022C18.0859 14.3735 14.3734 18.0861 9.81004 18.0861ZM9.81004 3.18954C6.15956 3.18954 3.18935 6.15974 3.18935 9.81022C3.18935 13.4607 6.15956 16.4309 9.81004 16.4309C13.4605 16.4309 16.4307 13.4607 16.4307 9.81022C16.4307 6.15974 13.4614 3.18954 9.81004 3.18954Z" fill="white"/>
                  <path d="M21.6383 22.4657C21.5296 22.4658 21.4219 22.4444 21.3215 22.4028C21.2211 22.3612 21.1299 22.3002 21.0532 22.2232L14.6857 15.8557C14.6089 15.7789 14.5479 15.6877 14.5063 15.5873C14.4648 15.4869 14.4434 15.3793 14.4434 15.2706C14.4434 15.162 14.4648 15.0544 14.5063 14.954C14.5479 14.8536 14.6089 14.7624 14.6857 14.6855C14.7626 14.6087 14.8538 14.5477 14.9542 14.5062C15.0546 14.4646 15.1622 14.4432 15.2708 14.4432C15.3795 14.4432 15.4871 14.4646 15.5875 14.5062C15.6879 14.5477 15.7791 14.6087 15.8559 14.6855L22.2234 21.053C22.3395 21.1686 22.4186 21.316 22.4508 21.4767C22.4829 21.6373 22.4666 21.8039 22.4039 21.9553C22.3412 22.1066 22.235 22.236 22.0987 22.3268C21.9623 22.4177 21.8021 22.466 21.6383 22.4657Z" fill="white"/>
                  </svg>
              </form>
            </div>

            <div class="menu-wrapper">

              <div class="d-flex justify-content-between py-2 px-4 mb-4">
                <div></div>
                <img src="{{ asset('siteassets/images/Frame 13.svg') }}" alt="">

                <button class="menu-close">
                  <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.0003 0.320007C6.44031 0.320007 0.320312 6.44001 0.320312 14C0.320312 21.56 6.44031 27.68 14.0003 27.68C21.5603 27.68 27.6803 21.56 27.6803 14C27.6803 6.44001 21.5603 0.320007 14.0003 0.320007ZM14.0003 26.24C7.23231 26.24 1.76031 20.768 1.76031 14C1.76031 7.23201 7.23231 1.76001 14.0003 1.76001C20.7683 1.76001 26.2403 7.23201 26.2403 14C26.2403 20.768 20.7683 26.24 14.0003 26.24ZM15.0083 14L19.5443 9.46401C19.8323 9.17601 19.8323 8.74401 19.5443 8.45601C19.2563 8.16801 18.8243 8.16801 18.5363 8.45601L14.0003 12.992L9.46431 8.45601C9.17631 8.16801 8.74431 8.16801 8.45631 8.45601C8.16831 8.74401 8.16831 9.17601 8.45631 9.46401L12.9923 14L8.45631 18.536C8.16831 18.824 8.16831 19.256 8.45631 19.544C8.74431 19.832 9.17631 19.832 9.46431 19.544L14.0003 15.008L18.5363 19.544C18.8243 19.832 19.2563 19.832 19.5443 19.544C19.8323 19.256 19.8323 18.824 19.5443 18.536L15.0083 14Z" fill="white"/>
                    </svg>
                </button>
              </div>

              <ul class="navbar-nav mb-4">
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.index') ? 'active' : '' }}" aria-current="page" href="{{ route('site.index') }}">{{ __('site.Home') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.about') ? 'active' : '' }}" href="{{ route('site.about') }}">{{ __('site.About us') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.service') ? 'active' : '' }}" href="{{ route('site.service') }}">{{ __('site.Our Service') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.product') ? 'active' : '' }}" href="{{ route('site.product') }}">{{ __('site.Our Product') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.booking') ? 'active' : '' }}" href="{{ route('site.booking') }}">{{ __('site.Booking') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.post') ? 'active' : '' }}" href="{{ route('site.post') }}">{{ __('site.Blog') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::routeIs('site.contact') ? 'active' : '' }}" href="{{ route('site.contact') }}">{{ __('site.Contact us') }}</a>
                </li>

              </ul>

              <div class="quick-links d-flex justify-content-center">
                <a class="nav-link" href="tel: (+966) 56 138 8363">
                  <img src="{{ asset('siteassets/images/Group 138.svg') }}" alt="">
                </a>
                <a class="nav-link" href="#">
                  <img src="{{ asset('siteassets/images/Group 139.svg') }}" alt="">
                </a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg  class="mx-1" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.0002 1.17C10.8128 0.983753 10.5594 0.879211 10.2952 0.879211C10.031 0.879211 9.77756 0.983753 9.59019 1.17L6.00019 4.71L2.46019 1.17C2.27283 0.983753 2.01938 0.879211 1.75519 0.879211C1.49101 0.879211 1.23756 0.983753 1.05019 1.17C0.956464 1.26297 0.88207 1.37357 0.831301 1.49543C0.780533 1.61729 0.754395 1.74799 0.754395 1.88C0.754395 2.01202 0.780533 2.14272 0.831301 2.26458C0.88207 2.38644 0.956464 2.49704 1.05019 2.59L5.29019 6.83C5.38316 6.92373 5.49376 6.99813 5.61562 7.04889C5.73748 7.09966 5.86818 7.1258 6.00019 7.1258C6.1322 7.1258 6.26291 7.09966 6.38477 7.04889C6.50663 6.99813 6.61723 6.92373 6.71019 6.83L11.0002 2.59C11.0939 2.49704 11.1683 2.38644 11.2191 2.26458C11.2699 2.14272 11.296 2.01202 11.296 1.88C11.296 1.74799 11.2699 1.61729 11.2191 1.49543C11.1683 1.37357 11.0939 1.26297 11.0002 1.17Z" fill="white"/>
                        </svg>

                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg  class="mx-1" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.0002 1.17C10.8128 0.983753 10.5594 0.879211 10.2952 0.879211C10.031 0.879211 9.77756 0.983753 9.59019 1.17L6.00019 4.71L2.46019 1.17C2.27283 0.983753 2.01938 0.879211 1.75519 0.879211C1.49101 0.879211 1.23756 0.983753 1.05019 1.17C0.956464 1.26297 0.88207 1.37357 0.831301 1.49543C0.780533 1.61729 0.754395 1.74799 0.754395 1.88C0.754395 2.01202 0.780533 2.14272 0.831301 2.26458C0.88207 2.38644 0.956464 2.49704 1.05019 2.59L5.29019 6.83C5.38316 6.92373 5.49376 6.99813 5.61562 7.04889C5.73748 7.09966 5.86818 7.1258 6.00019 7.1258C6.1322 7.1258 6.26291 7.09966 6.38477 7.04889C6.50663 6.99813 6.61723 6.92373 6.71019 6.83L11.0002 2.59C11.0939 2.49704 11.1683 2.38644 11.2191 2.26458C11.2699 2.14272 11.296 2.01202 11.296 1.88C11.296 1.74799 11.2699 1.61729 11.2191 1.49543C11.1683 1.37357 11.0939 1.26297 11.0002 1.17Z" fill="white"/>
                    </svg>

                 English
                </a> --}}
                {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">عربي</a></li>
                </ul> --}}
              </div>
            </div>
          </div>
        </div>
     </header>

@yield('content')

   <footer class="bg-light">
    <div class="container">
      <div class="footer-content">
        <img src="./images/11120 1.svg" alt="" />

        <ul class="footer-menue list-unstyled d-flex justify-content-center">
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.index') ? 'active' : '' }} " href="{{ route('site.index') }}">{{ __('site.Home') }}</a>
          </li>
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.about') ? 'active' : '' }} " href="{{ route('site.about') }}">{{ __('site.About us') }}</a>
          </li>
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.service') ? 'active' : '' }} " href="{{ route('site.service') }}">{{ __('site.Our Service') }}</a>
          </li>
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.product') ? 'active' : '' }} " href="{{ route('site.product') }}">{{ __('site.Our Product') }}</a>
          </li>
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.booking') ? 'active' : '' }} " href="{{ route('site.booking') }}">{{ __('site.Booking') }}</a>
          </li>
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.post') ? 'active' : '' }}"  href="{{ route('site.post') }}">{{ __('site.Blog') }}</a>
          </li>
          <li class="footer-item mx-3">
            <a class="footer-link {{ Request::routeIs('site.contact') ? 'active' : '' }} " href="{{ route('site.contact') }}">{{ __('site.Contact us') }}</a>
          </li>
        </ul>
      </div>
      <div class="row justify-content-between">
        <div class="col-md-2 contact-footer">
          <ul class="list-unstyled">
            <li class="mb-3">
              <a href="https://wa.link/aba43g"> <img src="{{ asset('siteassets/images/whats app.svg') }}" /></a>
            </li>
            <li class="mb-3">
              <div class="go-top">
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.00041 11.2498C6.86907 11.2499 6.739 11.2241 6.61767 11.1738C6.49634 11.1235 6.38615 11.0498 6.29341 10.9568L4.00041 8.66379L1.70741 10.9568C1.5188 11.1389 1.2662 11.2397 1.00401 11.2375C0.741809 11.2352 0.490996 11.13 0.305588 10.9446C0.12018 10.7592 0.0150115 10.5084 0.0127331 10.2462C0.0104547 9.98399 0.111249 9.73139 0.293407 9.54279L3.29341 6.54279C3.48093 6.35532 3.73524 6.25 4.00041 6.25C4.26557 6.25 4.51988 6.35532 4.70741 6.54279L7.70741 9.54279C7.84722 9.68264 7.94242 9.8608 7.98099 10.0548C8.01956 10.2487 7.99976 10.4497 7.92409 10.6324C7.84842 10.8151 7.72027 10.9713 7.55586 11.0812C7.39145 11.1911 7.19816 11.2497 7.00041 11.2498ZM7.00041 5.74979C6.86907 5.74992 6.739 5.72411 6.61767 5.67383C6.49634 5.62354 6.38615 5.54978 6.29341 5.45679L4.00041 3.16379L1.70741 5.45679C1.5188 5.63894 1.2662 5.73974 1.00401 5.73746C0.741809 5.73518 0.490996 5.63001 0.305588 5.4446C0.12018 5.2592 0.0150115 5.00838 0.0127331 4.74619C0.0104547 4.48399 0.111249 4.23139 0.293407 4.04279L3.29341 1.04279C3.48093 0.855316 3.73524 0.75 4.00041 0.75C4.26557 0.75 4.51988 0.855316 4.70741 1.04279L7.70741 4.04279C7.84722 4.18264 7.94242 4.3608 7.98099 4.55476C8.01956 4.74871 7.99976 4.94974 7.92409 5.13244C7.84842 5.31514 7.72027 5.4713 7.55586 5.58119C7.39145 5.69107 7.19816 5.74974 7.00041 5.74979Z" fill="white"/>
                  </svg>

              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-8">
          <div class="cashcard text-center">
            <h3>{{ __('site.Available payment methods') }}</h3>
            <ul class="list-unstyled d-flex justify-content-center">
              <li class="mx-3">
                <a href="#">
                  <img src="{{ asset('siteassets/images/image 2.png') }}" />
                </a>
              </li>
              <li class="mx-3">
                <a href="#">
                  <img src="{{ asset('siteassets/images/image 3.png') }}" />
                </a>
              </li>
              <li class="mx-3">
                <a href="#">
                  <img src="{{ asset('siteassets/images/image 4.png') }}" />
                </a>
              </li>
              <li class="mx-3">
                <a href="#">
                  <img src="{{ asset('siteassets/images/image 5.png') }}" />
                </a>
              </li>
            </ul>
          </div>
          <div class="social-media">
            <h4 class="mb-3">{{ __('site.follow us on :') }}</h4>
            <div class="wrapper">
              <div class="button">
                <div class="icon">
                  <i class="fab fa-facebook-f"></i>
                </div>
               <a href="facebook.com/eventsarts.sa"><span>Facebook</span></a>
              </div>
              <div class="button">
                <div class="icon">
                  <i class="fab fa-twitter"></i>
                </div>
                <a href="https://twitter.com/eventsarts_sa"><span>Twitter</span></a>
              </div>
              <div class="button">
                <div class="icon">
                  <i class="fab fa-instagram"></i>
                </div>
                <a href="https://www.instagram.com/events_arts_/"><span>Instagram</span></a>
              </div>

              <div class="button">
                <div class="icon">
                  <i class="fab fa-youtube"></i>
                </div>
               <a href="https://www.youtube.com/channel/UCY6r7owVlapxXxNTHYIzpfw"><span>YouTube</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <ul class="contact-footer list-unstyled">
            <li class="mb-2">
              <h4>{{ __('site.Tax Number') }}</h4>
              <img src="{{ asset('siteassets/images/image 11.svg') }}" />
            </li>
            <li class="mb-2">
              <h4>{{ __('site.commercial register') }}</h4>
              <img src="{{ asset('siteassets/images/image 6.png') }}" />
            </li>
          </ul>
        </div>
      </div>
      <div class="copyright">
        <p class="text-center">{{ __('site.Copyright reserved to the Digital Events Company') }}</p>
      </div>
    </div>
   </footer>

   <div class="fixed-contact-mobile">
        <a href="tel: (+966) 56 138 8363">
        {{ __('site.communication') }} <i class="fas fa-phone"></i>
        </a>
        <a href="https://wa.link/aba43g">
        {{ __('site.message') }} <i class="fab fa-whatsapp"></i>
        </a>
   </div>
    <script src="{{ asset('siteassets/js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/aos.js') }}"></script>
    <script src="{{ asset('siteassets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('siteassets/js/script.js') }}"></script>
    <script>
      AOS.init();
    </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.services-slider').slick({
      rtl: $("html").attr("lang") == "ar" ? true : false,
      arrows: false,
      autoplay: true,
      dots: true
    });

    $('.slider').slick({
      rtl: $("html").attr("lang") == "ar" ? true : false,
      arrows: false,
      autoplay: true,
      dots: true,
      slidesToShow: 2,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });
  });

</script>
@yield('scripts')
  </body>
</html>
