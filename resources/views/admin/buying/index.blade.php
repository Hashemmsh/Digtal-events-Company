
@extends('admin.master')
@section('title', ' Buying | Admin')

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
    @php
        use App\Models\Service;
        use App\Models\Reservation;

    @endphp
<div class="container">

    <h1 class="">{{ __('site.All Buying') }}</h1>
    <br>

     <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>{{ __('site.Id') }}</th>
            <th>{{ __('site.Name') }}</th>
            <th>{{ __('site.Phone') }}</th>
            <th>{{ __('site.Email') }}</th>
            <th>{{ __('site.Final_date') }}</th>
            <th>{{ __('site.Product') }}</th>
            <th>{{ __('site.Type') }}</th>
            <th>{{ __('site.Location') }}</th>
            <th>{{ __('site.City') }}</th>
            <th>{{ __('site.Street') }}</th>
            <th>{{ __('site.Many') }}</th>
            <th>{{ __('site.project_summary') }}</th>
        </tr>
        @foreach ($buyings as  $buying)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->final_date }}</td>
                <td>{{ $reservation->product->trans_name }}</td>
                <td>{{ $reservation->type }}</td>
                <td>{{ $reservation->location }}</td>
                <td>{{ $reservation->city }}</td>
                <td>{{ $reservation->street }}</td>
                <td>{{ $reservation->many }}</td>
                <td>{{ $reservation->project_summary }}</td>
            </tr>
        @endforeach
     </table>
</div>
{{ $buyings->links() }}
@stop
