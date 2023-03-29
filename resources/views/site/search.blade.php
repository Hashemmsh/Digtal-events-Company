@extends('site.master')
@section('title' , 'Search - '.config('app.name'))
@section('content')
  <main>

  <section class="about-us search-result">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-6">
            <div class="container">
              <h1 class="text-white mb-5">  ابحث هنا عن اي منتج تريده </h1>
              <form action="{{ route('site.search') }}" method="GET">
                <input class="form-control form-control-lg" type="search" placeholder="بحث" aria-label="Search" name="s" value="{{request()->s }}" >
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#333" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.81004 18.0861C5.24673 18.0861 1.53418 14.3735 1.53418 9.81022C1.53418 5.24691 5.24673 1.53436 9.81004 1.53436C14.3734 1.53436 18.0859 5.24691 18.0859 9.81022C18.0859 14.3735 14.3734 18.0861 9.81004 18.0861ZM9.81004 3.18954C6.15956 3.18954 3.18935 6.15974 3.18935 9.81022C3.18935 13.4607 6.15956 16.4309 9.81004 16.4309C13.4605 16.4309 16.4307 13.4607 16.4307 9.81022C16.4307 6.15974 13.4614 3.18954 9.81004 3.18954Z" fill="#333"/>
                  <path d="M21.6383 22.4657C21.5296 22.4658 21.4219 22.4444 21.3215 22.4028C21.2211 22.3612 21.1299 22.3002 21.0532 22.2232L14.6857 15.8557C14.6089 15.7789 14.5479 15.6877 14.5063 15.5873C14.4648 15.4869 14.4434 15.3793 14.4434 15.2706C14.4434 15.162 14.4648 15.0544 14.5063 14.954C14.5479 14.8536 14.6089 14.7624 14.6857 14.6855C14.7626 14.6087 14.8538 14.5477 14.9542 14.5062C15.0546 14.4646 15.1622 14.4432 15.2708 14.4432C15.3795 14.4432 15.4871 14.4646 15.5875 14.5062C15.6879 14.5477 15.7791 14.6087 15.8559 14.6855L22.2234 21.053C22.3395 21.1686 22.4186 21.316 22.4508 21.4767C22.4829 21.6373 22.4666 21.8039 22.4039 21.9553C22.3412 22.1066 22.235 22.236 22.0987 22.3268C21.9623 22.4177 21.8021 22.466 21.6383 22.4657Z" fill="#333"/>
                  </svg>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="product-info mb-5">
      <div class="container">
        <div class="row justify-content-center mb-5">

            @foreach ($products as $product)
            <div class="col-md-4">
                {{-- <div class="icon-product">

                </div> --}}
                 <div class="product-box">
                    <img src="{{ asset('uploads/product/'.$product->image) }}" alt="#">
                   <h3 class="mb-5">{{ $product->trans_title }}</h3>
                   <div class="button-product d-flex">
                     <button class="btn btn1-product mx-3">{{ __('site.Booking') }} </button>
                     <button class="btn btn2-product mx-3">{{ __('site.Buying') }} </button>
                   </div>
                 </div>

               </div>
            @endforeach


        </div>
      </div>

    </div>
  </main>
@stop
