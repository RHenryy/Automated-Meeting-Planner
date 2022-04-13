@extends('layouts.layout')
@section('content')

<div class="container">


    <h1>Créer une réunion</h1>
    <h2 class="alert-danger text-center">{{ session('alert') }}</h2>
    <h3 class="mt-5 text-center">Les employés invités sont les suivants: </h3>
    <div class="text-center">
    <ul class="ulMeet">
        @foreach($meetings as $meeting)
        <li class="text-center" style="color:white;font-size:1.3rem;"><strong>{{ $meeting->firstname }} {{ $meeting->lastname }}</strong></li>
        @endforeach
    </ul>
</div>

    <form class="text-center" action="/events" method="post" enctype="multipart/form">
        @csrf
        <div class="form-group">
        <label class="mt-3" for="title">Nom de la réunion:</label>
        <div class="d-flex justify-content-center mt-2">
        <input class="form-control mt-2 mb-3 w-50" type="text" placeholder="Nom de la réunion" name="title">
        </div>
        <input class="form-control" hidden value="{{ $meetingDay }}" type="text" placeholder="Nom de la réunion" name="meetingDay">
        <input class="form-control" hidden value="@foreach($meetings as $meeting)  {{ $meeting->firstname }} {{ $meeting->lastname }}  @endforeach" type="text" placeholder="Nom de la réunion" name="employeeList">
        <input type="submit" value="Créer une réunion" class="btn btn-primary">
        </div>
</div>

@endsection