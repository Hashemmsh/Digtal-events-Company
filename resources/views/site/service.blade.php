@extends('site.master')
@section('title' , '' .config('app.name'))
@section('content')
@php
    use App\Models\Post;
    use App\Models\Service;
    use App\Models\Branch;
    use App\Models\Buying;
    use App\Models\Product;
    use App\Models\Category;
@endphp

<style>
    .serv-img img {
        transform: unset;
        position: unset;
        background: padding-box, linear-gradient(45deg, slateblue, coral) background;
        padding: 10px;
        object-fit: cover;
        width: 100%;
        height: calc(100% + 80px);
        transform: translateY(-40px);
        border-radius: 20px;
    }
    .services-slider .slick-list {
        padding: 0 0 0 0 !important;
    }
    [dir='rtl'] .slick-slide,
    .slick-list,
    .slick-slide {
        float: unset !important;
    }
    video {
        width: 100%;
        height: auto;
    }
</style>

<main>
    <section class="product">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="container">
              <h2>{{ __('site.Our services') }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
@php
      //$products = Product::orderByDesc('id')->where('category_id', $products->category_id)->where('id','!=', $product->id)->get();
       $services = Service::select('id', 'name' ,'image' , 'video' ,'description')->get();
    //    $product = Product::select('id', 'title')->get();
  @endphp

@foreach ($services as $key => $service )
@php
$video = DB::table('services')
    ->where('id', $service->id)
    ->first();
$videos = explode('|', $video->video);
@endphp

    <div class="servises-info mb-5">
        @if ($key == 0)
            <img src="{{ asset('siteassets/images/Vector-1.svg') }}" alt="" />
        @endif
        <div class="container">
            <div class="srevises-box">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-5 serv-img">
                        <img src="{{ asset('uploads/service/'.$service->image) }}" alt="" />
                    </div>
                    <div class="col-lg-6 serv-text">
                        <img src="{{ asset('siteassets/images/تنظيم وافتتاح المعارض التجارية.svg') }}" alt="" />
                        <h3 class="mt-4 mb-4">{{ $service->trans_name }}</h3>
                        <p class="mx-4">
                            {!! $service->trans_description !!}
                        </p>
                        <a class="btn" href="https://wa.me/<number>">
                        <span>{{ __('site.Book now') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div id="carouselExample{{ $loop->index }}" class="carousel slide">
                <div class="carousel-inner">
                @foreach (explode('|', $service->video) as $video)
                    <div class="carousel-item active">
                        <video width="50" height="50" controls>
                            <source src="{{ asset($video) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="carousel-item">
                        <video width="50" height="50" controls>
                            <source src="{{ asset($video) }}" type="video/mp4">
                        </video>
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $loop->index }}" data-bs-slide="prev">
                  <img src="{{ asset('siteassets/images/nex.png') }}" alt="">
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $loop->index }}" data-bs-slide="next">
                    <img src="{{ asset('siteassets/images/prev.png') }}" alt="">
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
@endforeach
  </main>


@stop
