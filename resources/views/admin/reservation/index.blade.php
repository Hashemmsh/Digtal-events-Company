
@extends('admin.master')
@section('title', 'Reservation | Admin')

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

    <h1 class="">{{ __('site.All Reservation') }}</h1>
    <br>

     <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>{{ __('site.Id') }}</th>
            <th>{{ __('site.Name') }}</th>
            <th>{{ __('site.Phone') }}</th>
            <th>{{ __('site.Email') }}</th>
            <th>{{ __('site.Date') }}</th>
            <th>{{ __('site.Service') }}</th>
            <th>{{ __('site.Area') }}</th>
            <th>{{ __('site.City') }}</th>
            <th>{{ __('site.Street') }}</th>
            <th>{{ __('site.Lounge') }}</th>
            <th>{{ __('site.type') }}</th>
            <th>{{ __('site.project_summary') }}</th>
            <th>{{ __('site.Created') }}</th>
        </tr>
        @foreach ($reservations as  $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->phone }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->service->trans_name }}</td>
                <td>{{ $reservation->area }}</td>
                <td>{{ $reservation->city }}</td>
                <td>{{ $reservation->street }}</td>
                <td>{{ $reservation->lounge }}</td>
                <td>{{ $reservation->type }}</td>
                <td>{{ $reservation->project_summary }}</td>
                <td>{{ date('F d, Y', strtotime($reservation->created_at)) }}</td>
            </tr>
        @endforeach
     </table>


</div>
{{ $reservations->links() }}
@stop
