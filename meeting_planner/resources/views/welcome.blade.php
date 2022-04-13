@extends('layouts.layout')
@section('content')
            
           {{-- <link href="{{ asset('fullCalendar/main.css') }}" rel="stylesheet">
           <!-- Scripts -->
           <script src="{{ asset('fullCalendar/main.js')}}"></script>
            <script src="{{ asset('fullCalendar/locales-all.js')}}"></script>
            <script>
     
           document.addEventListener('DOMContentLoaded', function() {
             var calendarEl = document.getElementById('calendar');
             var calendar = new FullCalendar.Calendar(calendarEl, {
               initialView: 'dayGridMonth'
             });
             
             calendar.render();
           }); --}}
  <div class="container">
           <h1>Création de réunion automatisée</h1>
           <h2 class="text-center mt-3">Ajouter un employé</h2>
           <h2 class="alert-success text-center"> {{ session('added') }} </h2>
           <h2 class="alert-danger text-center">{{ session('alert') }} </h2>

<form class="text-center" action="/welcome" method="post">
  @csrf
  <div class="form-group">
  <label class="mt-2" for="firstName">Prénom: </label>
  <div class="d-flex justify-content-center mt-2">
  <input class="form-control w-50" type="text" name="firstName" placeholder="employee firstname">
  </div>
  <label class="mt-2" for="lastName">Nom: </label>
  <div class="d-flex justify-content-center mt-2">
  <input class="form-control w-50"  type="text" name="lastName" placeholder="employee lastname">
  </div>
  <label class="mt-2" for="email">Email: </label>
  <div class="d-flex justify-content-center mt-2">
  <input class="form-control w-50 mb-3"  type="email" name="email" placeholder="employee email">
  </div>
  <input type="submit" value="Ajouter l'employé" class="btn btn-primary">
  </div>
</form>
</div>
           
@endsection