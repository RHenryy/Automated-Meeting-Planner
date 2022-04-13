@extends("layouts.layout")
@section("content")

<div class="container">

<h1>Invitation des employés</h1>
<h2 class="text-center mt-5">Créer une réunion</h2>

<h2 class="alert-danger text-center">{{ session('msg') }}</h2>
<h2 class="alert-danger text-center">{{ session('alert') }}</h2>


<form class="text-center" action="/createMeeting" method="post" enctype="multipart/form">
    @csrf
    {{-- <label for="title">Meeting title</label>
    <input class="form-control mb-2" type="text" placeholder="meeting title" name="title"> --}}
    <label>Choisissez les employés à inviter</label>
    <div class="d-flex justify-content-center">
    <select class="form-select mt-3 w-50" multiple aria-label="multiple select example" name="employees[]">
    @foreach($employees as $employee)
    <option value="{{ $employee->id }}">{{ $employee->firstname }}  {{ $employee->lastname }}</option>
    @endforeach
    </select>
    </div>
    <input type="submit" value="Inviter les employés" class="btn btn-primary mt-3">
    </form>

</div>

@endsection