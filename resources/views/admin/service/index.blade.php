
@extends('admin.master')
@section('title', 'Services | Admin')

@section('content')

        @section('styles')
            <style>
                .description
                    {
                        white-space: nowrap;
                        text-overflow: ellipsis;
                    }
                .description p
                    {
                        width: 160px;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                @media screen and (max-width: 582px)
                    {
                        .c-table {
                            overflow-x: scroll;
                        }
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

<div class="container">

    <h1 class="">{{ __('site.All Service') }}</h1>
    <br>

    @if(session('msg'))
        <div style="text-align: center; !importent" class="alert alert-{{ session('type') }}">
           {{ session('msg') }}
        </div>
    @endif

     <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>{{ __('site.Id') }}</th>
            <th>{{ __('site.Name') }}</th>
            <th>{{ __('site.Image') }}</th>
            <th>{{ __('site.Descriptions') }}</th>
            <th>{{ __('site.Video') }}</th>
            <th>{{ __('site.Action') }}</th>
        </tr>
          @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{!! str_replace('script>','p>',$service->trans_name) !!}</td>
                <td><img width="70" src="{{ asset('uploads/service/'.$service->image) }}" alt=""></td>
                <td class="description">  {!! str_replace('<script></script>', '<p></p>', $service->trans_description) !!}
                </td>
                <td>
                    @php
                        $video = DB::table('services')
                            ->where('id', $service->id)
                            ->first();
                        $videos = explode('|', $video->video);
                    @endphp
                    @foreach ($videos as $item)
                    <video width="50" height="50" controls>
                        <source src="{{ asset($item) }}" type="video/mp4">
                      </video>

                     {{-- <video  type="video/mp4" src="{{ asset($item) }}" width="50px" height="50px" alt="" ></video> --}}
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.service.show',$service->id) }}">
                        <i class="fa fa-eye" ></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.service.edit' , $service->id) }}"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('admin.service.destroy' , $service->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>

        @endforeach

     </table>

     {{ $services->links() }}
</div>

@stop
