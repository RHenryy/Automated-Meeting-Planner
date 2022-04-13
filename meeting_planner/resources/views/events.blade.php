@extends('layouts.layout')
@section('content')

<div class="container">

<h1>Consultez les réunions programmées</h1>
<h2 class="alert-success mt-5 text-center">{{ session('msg') }}</h2>
<table>
    <tr>
        <th>Titre de la réunion</th>
        <th>Date</th>
        <th>Participants</th>
    </tr>
    @foreach($events as $event)
        <tr onclick="window.location='/events/destroy/{{ $event->id }}';">
            <td>{{ $event->title }}</td>
            <td>{{ $event->meetingDay }}</td>
            <td>{{ $event->invitedEmployees }}</td>
        </tr>
    @endforeach
</table>
    {{-- <li class="mt-3" style="color:white;font-size:1.6rem;cursor:pointer;">La réunion <strong>{{ $event->title }}</strong> aura lieu le <strong>{{ $event->meetingDay }}</strong>, et les employés invités sont : <li style="color:white;font-size:1.3rem"><strong>{{ $event->invitedEmployees }}</strong></li></li>
    @endforeach
</ul> --}}


</div>




@endsection