@extends('site.master')
@section('title','about -'.config('app.name'))
@section('content')
@php
    use App\Models\Reservation;
    use App\Models\Service;
@endphp

  <main>
    <section class="about-us">
        <div class="container">
            <div class="row">
            <div class="col-md-5">
                <div class="container">
                <div class="main-contect-detailes">
                    <h2>{{ __('site.About us') }}</h2>

                </div>

                </div>
            </div>
            </div>
        </div>
    </section>

        <div class="about-info">
            <div class="container">
                <div class="row justify-content-between align-items-center mb-5">
                <div class="col-md-5"  data-aos="fade-left">
                    <img src="{{ asset('siteassets/images/Rectangle 87.png') }}" alt="#">
                </div>
                <div class="col-md-6"  data-aos="fade-right">
                    <p class="mt-3">{{ __('site.We have been racing against time since our establishment in 2013, stepping with confidence and development, to embrace the sky and provide the best integrated services that meet your needs and the requirements of your occasions, according to the Kingdoms Vision 2030, which seeks to invest the strengths to achieve ambition. We put our experience over the years at the service of our customers, and we provide an exclusive service in an integrated and organized manner with creativity and professionalism, until we have become a leading company in the field of organizing exhibitions, events, parties and all events and events.') }}</p>
                </div>
                </div>
            </div>

            <div class="bg-light py-4"  data-aos="fade-up">
                <div class="container">
                <p>{{ __('site.After hardship and toil, the fruit was achievement') }}</p>
                </div>
            </div>
        </div>

        <div class="our-vision">
            <div class="container">
                <div class="row align-items-center justify-content-between mb-5">

                <div class="col-md-6 align-items-center"  data-aos="fade-right">
                    <h3>{{ __('site.Our vision') }}</h3>
                    <p class="mt-3">{{ __('site.We look forward to being the most distinguished, creative and pioneer in leading and organizing exhibitions and conferences at the local and regional levels through innovative and renewed services with high professionalism and skill.') }}</p>
                </div>
                <div class="col-md-5" data-aos="fade-left">
                    <img src="{{ asset('siteassets/images/Rectangle 87.png') }}" alt="#">

                </div>
                </div>
            </div>

            <div class="bg-light py-4" data-aos="fade-down">
                <div class="container">
                <p>{{ __('site.Whatever the size of your business, we carry it on our shoulders with love.') }}</p>
                </div>
            </div>


        </div>

        <div class="our-mision mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-between mb-5">
            <div class="col-md-5"  data-aos="fade-left">
                <img src="{{ asset('siteassets/images/Rectangle 87.png') }}" alt="#">

            </div>
            <div class="col-md-6 align-items-center" data-aos="fade-right">
                <h3>{{ __('site.Our message') }}</h3>
                <p class="mt-3">{{ __('site.Establishing and developing a wide range of renewable regulatory services and providing innovative and integrated solutions, in addition to promoting a culture of innovation and demonstrating continuous progress in everything we do with commitment and adherence to the highest quality standards.') }}</p>
            </div>

            </div>
        </div>

        <div class="bg-light py-4"  data-aos="fade-up">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                <h3 class="mt-5">{{ __('site.Our core') }}</h3>
                <p class="mt-3">{{ __('site.Enhancing our skills, expanding our services, and keeping abreast of developments in the world of events and events in order to meet the changing needs of customers, and to be your first choice.') }}</p>

                </div>
            </div>

            </div>
        </div>


        </div>

        <div class="rate-us mt-5 mb-5">
            @if (app()->currentLocale() == 'ar')
            <div class="container">
                <h3  data-aos="fade-left"> {{ __('site.rate us') }}  </h3>
                <img src="{{ asset('siteassets/images/قيمنا.png') }}" class="w-100 mb-5 d-none d-lg-block"  data-aos="fade-up" alt="">
                {{-- <img src="{{ asset('siteassets/images/قيمنا.png') }}" class="w-100 d-none d-md-block d-lg-none"  data-aos="fade-up" alt="" />
                <img src="{{ asset('siteassets/images/قيمنا.png') }}" class="w-100 d-md-none mb-5"  data-aos="fade-up" alt=""> --}}

            </div>

          @endif
            @if (app()->currentLocale() == 'en')
            <div class="container">
                <h3  data-aos="fade-left"> {{ __('site.rate us') }}  </h3>
                <img src="{{ asset('siteassets/images/Group 141.png') }}" class="w-100 mb-5 d-none d-lg-block"  data-aos="fade-up" alt="">
                {{-- <img src="{{ asset('siteassets/images/قيمنا.png') }}" class="w-100 d-none d-md-block d-lg-none"  data-aos="fade-up" alt="" />
                <img src="{{ asset('siteassets/images/قيمنا.png') }}" class="w-100 d-md-none mb-5"  data-aos="fade-up" alt=""> --}}

            </div>

          @endif


        </div>

        <div class="contact-us"  data-aos="fade-down">
        <h3> {{ __('site.Connect with us') }}</h3>
        <div class="container">
            <div class="contact-box">
            <div class="row">
                <div class="col-md-5">
                    <h4 class="mb-5">{{ __('site.Book with us now') }}</h4>
                    <form action="{{ route('site.reservation') }}" method="POST">
                        @csrf
                    <div class="mb-4">
                        <input name="name" type="text" class="form-control" placeholder="{{ __('site.Name') }}">
                    </div>
                    <div class="mb-4">
                        <input name="phone" type="text" class="form-control" placeholder="{{ __('site.Mobile number') }}">
                    </div>
                    <div class="mb-4">
                        <input name="email" type="text" class="form-control" placeholder="{{ __('site.E-mail') }}">
                    </div>
                    <div class="mb-4">
                    <select id="delivery-type" class="form-select"  name="service_id">
                    @php
                        $services = Service::select('id', 'name')->get();

                    @endphp
                    <option value="" disabled selected>--{{ __('site.Select Service') }}--</option>
                    @foreach ($services as $item)
                        <option value="{{ $item->id }}">{{ $item->trans_name }}</option>
                    @endforeach
                </select>
               </div>
                    <div class="mb-4">
                        <div class="mb-4">
                            <select name="type" id="delivery-type" class="form-select">
                              <option value="هدية"> هدية</option>
                              <option value="شخصي">شخصي</option>
                            </select>
                          </div>
                        {{-- <input name="type" type="text" class="form-control" placeholder="{{ __('site.Reservation type') }}"> --}}
                    </div>
                    <div class="mb-4">
                        <input name="city" type="text" class="form-control" placeholder="{{ __('site.City') }}">
                    </div>
                    <div class="mb-4">
                        <textarea name="project_summary" class="form-control" rows="6" placeholder="{{ __('site.project_summary') }}"></textarea>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-form rounded-pill">{{ __('site.send') }} </button>
                    </div>
                    </form>

                </div>
                <div class="col-md-5 mx-sm-5">
                    <h4 class="mb-5">  {{ __('site.Keep in touch with us') }}</h4>
                    <div class="d-flex align-items-left mb-5">
                    <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.0001 16.6613L32.3776 7.425C31.7995 6.99144 31.0976 6.75484 30.3751 6.75H5.62506C4.90251 6.75484 4.20059 6.99144 3.62256 7.425L18.0001 16.6613Z" fill="#898787"/>
                        <path d="M18.6075 18.945L18.4163 19.035H18.3263C18.2227 19.0813 18.1127 19.1116 18 19.125C17.9066 19.1367 17.8121 19.1367 17.7188 19.125H17.6288L17.4375 19.035L2.3625 9.29248C2.29048 9.56421 2.25268 9.84388 2.25 10.125V25.875C2.25 26.7701 2.60558 27.6285 3.23851 28.2615C3.87145 28.8944 4.72989 29.25 5.625 29.25H30.375C31.2701 29.25 32.1286 28.8944 32.7615 28.2615C33.3944 27.6285 33.75 26.7701 33.75 25.875V10.125C33.7473 9.84388 33.7095 9.56421 33.6375 9.29248L18.6075 18.945Z" fill="#898787"/>
                        </svg>

                    <div class="contact-details mx-3">
                        <span style="color:#40BDEB" >  {{ __('site.E-mail') }}</span>
                            <p class="mt-1"><a href="mailto: info@digitaleventspro.com">info@digitaleventspro.com</a> </p>
                    </div>
                    </div>
                    <div class="d-flex align-items-left mb-5">
                    <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_106_59)">
                        <path d="M17.985 3C9.705 3 3 9.72 3 18C3 26.28 9.705 33 17.985 33C26.28 33 33 26.28 33 18C33 9.72 26.28 3 17.985 3ZM28.38 12H23.955C23.475 10.125 22.785 8.325 21.885 6.66C24.645 7.605 26.94 9.525 28.38 12ZM18 6.06C19.245 7.86 20.22 9.855 20.865 12H15.135C15.78 9.855 16.755 7.86 18 6.06ZM6.39 21C6.15 20.04 6 19.035 6 18C6 16.965 6.15 15.96 6.39 15H11.46C11.34 15.99 11.25 16.98 11.25 18C11.25 19.02 11.34 20.01 11.46 21H6.39ZM7.62 24H12.045C12.525 25.875 13.215 27.675 14.115 29.34C11.355 28.395 9.06 26.49 7.62 24ZM12.045 12H7.62C9.06 9.51 11.355 7.605 14.115 6.66C13.215 8.325 12.525 10.125 12.045 12ZM18 29.94C16.755 28.14 15.78 26.145 15.135 24H20.865C20.22 26.145 19.245 28.14 18 29.94ZM21.51 21H14.49C14.355 20.01 14.25 19.02 14.25 18C14.25 16.98 14.355 15.975 14.49 15H21.51C21.645 15.975 21.75 16.98 21.75 18C21.75 19.02 21.645 20.01 21.51 21ZM21.885 29.34C22.785 27.675 23.475 25.875 23.955 24H28.38C26.94 26.475 24.645 28.395 21.885 29.34ZM24.54 21C24.66 20.01 24.75 19.02 24.75 18C24.75 16.98 24.66 15.99 24.54 15H29.61C29.85 15.96 30 16.965 30 18C30 19.035 29.85 20.04 29.61 21H24.54Z" fill="#898787"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_106_59">
                        <rect width="36" height="36" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>

                    <div class="contact-details mx-3">
                        <span style="color:#ED512D"> {{ __('site.Company website') }}</span>
                        <p class="mt-1"> <a href="www.digitaleventspro.com">www.digitaleventspro.com</a></p>
                    </div>
                    </div>
                    <div class="d-flex align-items-left mb-5">
                    <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.9346 0H11.9814C9.85098 0 8.11426 1.73672 8.11426 3.86719V32.1328C8.11426 34.2633 9.85098 36 11.9814 36H23.9346C26.065 36 27.8018 34.2633 27.8018 32.1328V3.86719C27.8018 1.73672 26.0721 0 23.9346 0ZM16.5025 1.58906H19.4697C19.8143 1.58906 20.0885 1.90547 20.0885 2.29219C20.0885 2.67891 19.8143 2.99531 19.4697 2.99531H16.5025C16.158 2.99531 15.8838 2.67891 15.8838 2.29219C15.8838 1.90547 16.158 1.58906 16.5025 1.58906ZM13.6971 1.48359C14.14 1.48359 14.5057 1.84219 14.5057 2.29219C14.5057 2.74219 14.14 3.09375 13.6971 3.09375C13.2541 3.09375 12.8885 2.73516 12.8885 2.28516C12.8885 1.83516 13.2471 1.48359 13.6971 1.48359ZM17.9861 33.5461C17.2689 33.5461 16.6924 32.9695 16.6924 32.2523C16.6924 31.5352 17.2689 30.9586 17.9861 30.9586C18.7033 30.9586 19.2799 31.5352 19.2799 32.2523C19.2799 32.9695 18.7033 33.5461 17.9861 33.5461ZM25.5518 30.1992H10.3713V4.68281H25.5518V30.1992Z" fill="#898787"/>
                        </svg>

                    <div class="contact-details mx-3">
                        <span style="color:#92599E"> {{ __('site.Mobile number') }}</span>
                        <p class="mt-1"> <a href="tel: (+966) 56 138 8363">(+966) 56 138 8363</a></p>
                    </div>
                    </div>
                    <div class="d-flex align-items-left mb-5">
                    <svg class="mt-2" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_78_949)">
                        <path d="M28.4132 4.21883C25.6292 1.50232 21.8899 -0.0126085 18.0002 7.90556e-05C13.9277 7.90556e-05 10.2467 1.61558 7.58718 4.21883C6.22357 5.54094 5.1392 7.1233 4.39831 8.87215C3.65741 10.621 3.27507 12.5008 3.27393 14.4001C3.27393 18.6076 7.36218 24.2416 10.0239 27.0001L18.0002 36.0001L25.7739 27.0001C28.4357 24.2393 32.7287 18.6076 32.7287 14.4001C32.7266 12.5007 32.3436 10.621 31.6024 8.87226C30.8611 7.12349 29.7767 5.54114 28.4132 4.21883ZM18.0002 19.6358C17.3549 19.637 16.7158 19.5108 16.1195 19.2643C15.5231 19.0179 14.9813 18.6561 14.5252 18.1997C14.069 17.7434 13.7075 17.2014 13.4613 16.605C13.2152 16.0085 13.0892 15.3693 13.0907 14.7241C13.0907 12.0083 15.2822 9.81683 18.0002 9.81683C20.7182 9.81683 22.9097 12.0083 22.9097 14.7241C22.9112 15.3693 22.7852 16.0085 22.539 16.605C22.2929 17.2014 21.9313 17.7434 21.4752 18.1997C21.019 18.6561 20.4772 19.0179 19.8809 19.2643C19.2846 19.5108 18.6454 19.637 18.0002 19.6358Z" fill="#898787"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_78_949">
                        <rect width="36" height="36" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>

                    <div class="contact-details mx-3">
                        <span style="color:#40BDEB">  {{ __('site.the address') }} </span>
                        <p class="mt-1">المملكة العربية السعودية – جدة  شارع حديقة رامي
                        – حي السلامة </p>
                    </div>
                    </div>

                </div>
            </div>



            </div>
        </div>


        </div>


  </main>
@stop
