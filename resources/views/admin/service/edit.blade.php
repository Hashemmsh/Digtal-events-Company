@extends('admin.master')
@section('title', 'Services | Admin')
@section('content')

@section('styles')

{{-- Edit css in input price,discount and input file , button --}}
        <style>

            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button
                {
                    -webkit-appearance: none;
                    margin: 0;
                }

            input[type=file]::file-selector-button
                {
                    background-color: rgb(208, 187, 187);
                    color: #000;
                    border: 1px;
                    border-right: 1px solid #090909;
                    padding: 2px ;
                    margin-right: 20px;
                    transition: .5s;
                }

            input[type=file]::file-selector-button:hover
                {
                    cursor: pointer;
                    background-color: rgb(228, 199, 199);
                    border: 0px;
                    border-right: 1px solid #e5e5e5;
                }

            button
                {
                    width: 150px;
                    font-size: 163%;
                    margin: 20px;
                    padding: -24px;
                    border-radius: 12px;
                    font-weight: 100;
                    transition: all 0.3s;
                    box-shadow: silver 3px 3px 3px 0;
                }
            button:hover
                {
                    cursor: pointer;
                    color: #ffffff;
                    background:  #1D3867;
                }



        </style>

{{-- style when page arabic --}}
        @if (app()->currentLocale() == 'ar')
            <style>
                .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl
                    {
                        width: 100%;
                        direction: rtl;
                        padding-right: 7.5px;
                        padding-left: 7.5px;
                        margin-right: auto;
                        margin-left: auto;
                    }
            </style>

        @endif

@stop

{{-- add class bootstrap container  inside form add service --}}
<div class="container">
    {{-- title page --}}
    <h1>{{ __('site.Edit Service') }}</h1>
    <br>

    {{-- include page errors in file admin errors --}}
    @include('Admin.errors')

    <form action="{{ route('admin.service.update' , $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        {{-- input name en ar --}}
        <div class="row">
            <div class="col-md-6">
                <div  class="mb-3">
                    <label>{{ __('site.English Name') }}</label>
                    <input value="{{ $service->name_en }}" type="text" name="name_en" placeholder="{{ __('site.English Name') }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div  class="mb-3">
                        <label>{{ __('site.Arabic Name') }}</label>
                        <input value="{{ $service->name_ar }}" id="name" type="text" name="name_ar" placeholder="{{ __('site.Arabic Name') }}"
                        class="form-control">

                </div>
            </div>
        </div>

        {{-- input Image css --}}
        <div class="row">
            <div class="col-md-12">
                <div  class="mb-5">
                    <div class="input_container">
                        <label>{{ __('site.Image') }}</label>
                        <input type="file" id="fileUpload" class="form-control" name="image" >
                    </div>
                </div>
            </div>
        </div>

            {{-- input Video css --}}
        <div class="row">
            <div class="col-md-12">
                <div  class="mb-5">
                    <div class="input_container">
                        <label>{{ __('site.Video') }}</label>
                        <input type="file" id="fileUpload" class="form-control" name="video[]" multiple>
                        @php
                        $video = DB::table('services')
                            ->where('id', $service->id)
                            ->first();
                        $videos = explode('|', $video->video);
                     @endphp
                    @foreach ($videos as $item)
                        <td> <video src="{{ asset($item) }}" width="100px" height="100px" alt=""></td></video>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- textarea Bootstrap and scrpt tiny --}}
        <div class="row">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('site.English Description') }}</label>
                        <textarea name="description_en" placeholder="{{ __('site.English Description') }}" class="form_control customarea" >{{ $service->description_en }}</textarea>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="mb-3">
                        <label>{{ __('site.Arabic Description') }}</label>
                        <textarea name="description_ar" placeholder="{{ __('site.Arabic Description') }}"
                        class="form_control customarea" >{{ $service->description_ar }}</textarea>

                    </div>
            </div>
        </div>



        {{-- button --}}
        <div>
            <button>{{ __('site.Update') }}</button>
        </div>

    </form>
</div>

@stop


{{-- Calling a library tinymce in a script --}}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'.customarea',
        })
    </script>
@stop

