@extends('admin.master')
@section('title', 'Image_product-Show | Admin')
@section('content')
@section('styles')
    <style>
        .row.mb-2 {
            justify-content: center !important;
        }

        .box {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .box .left {
            display: flex;
            flex-direction: column;
            align-content: center;
            width: 50%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 4px rgb(0 0 0 / 25%);
        }

        .box .right {
            display: flex;
            flex-direction: column;
            align-content: center;
            width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 4px rgb(0 0 0 / 25%);
        }

        h4,
        p {
            display: inline-block;
        }

        h4 {
            color: #1f8686;
        }

        p {
            font-size: 18px;
        }

        .box .right img {
            width: 100%;
            height: 450px !important;
        }

        @media (min-width: 576px) {
            .col-sm-6 {
                max-width: 100% !important;
            }
        }

        .row.mb-2 {
            justify-content: flex-start !important;
        }
        @media (min-width: 576px) {
            .col-sm-6 {
                flex: 0 0 auto !important;
                width: 100% !important;
            }
        }
        /* .carousel-item img {
                width: 100% !important;
                height: 100% !important;
            } */
    </style>
    @if (app()->currentLocale() == 'ar')
        <style>
            .container,
            .container-fluid,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl {
                width: 100%;
                direction: rtl;
                padding-right: 7.5px;
                padding-left: 7.5px;
                margin-right: auto;
                margin-left: auto;
            }
        </style>
    @endif
@endsection



<h1 class="">{{ __('site.Category') }}</h1>
<div class="box">
    <div class="left">
        <div class="name">
            <h4>{{ __('site.Title') }}:</h4>
            <p>{{ $products->trans_title }}</p>
        </div>
    </div>
    <div class="right">

        <div class="carousel-item active">
                <img src="{{ asset('uploads/product/'.$product->image) }}" class="d-block w-100" width="200px" height="100%" alt="image">
                </div>

    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.carousel').carousel();
        });
    </script>
@stop
