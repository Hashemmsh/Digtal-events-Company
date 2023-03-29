@extends('admin.master')

@section('title' , 'Branch | Admin')

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

    <h1 class="">{{ __('site.Trashed Branch') }}</h1>
    <br>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
        </div>

    @endif

  <table class="table table-bordered table-striped table-hover">

    <tr>
        <th>{{ __('site.Id') }}</th>
        <th>{{ __('site.Title') }}</th>
        <th>{{ __('site.Action') }}</th>
    </tr>

    @foreach ($branches as $branch )

        <tr>
            <td>{{ $branch->id }}</td>
            <td>{{ $branch->trans_title }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.branches.restore', $branch->id) }}"><i class="fas fa-undo"></i></a>
                <a onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger" href="{{ route('admin.branches.forcedelete', $branch->id) }}"><i class="fas fa-times"></i></a>

            </td>
        </tr>

    @endforeach
  </table>
 @stop
