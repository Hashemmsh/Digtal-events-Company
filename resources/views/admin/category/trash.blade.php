@extends('admin.master')

@section('title' , 'Category | Admin')

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

    <h1 class="">{{ __('site.Trashed') }}</h1>
    <br>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
        </div>

    @endif

  <table class="table table-bordered table-striped table-hover">

    <tr>
        <th>{{ __('site.Id') }}</th>
        <th>{{ __('site.Name') }}</th>
        <th>{{ __('site.Action') }}</th>
    </tr>

    @foreach ($categories as $category )

        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->trans_name }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.restore', $category->id) }}"><i class="fas fa-undo"></i></a>
                <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger" href="{{ route('admin.categories.forcedelete', $category->id) }}"><i class="fas fa-times"></i></a>

            </td>
        </tr>

    @endforeach
  </table>
 @stop
