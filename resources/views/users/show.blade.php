@extends('layouts.master')
@section('content')
<div class="container">
<h5 class="text-center">Utilizator {{$user->id}}</h5>
    <div class="panel panel-default">
        <div class="panel-body text-center my-5">
            <div class="form-group">
                <strong>Nume: </strong><p>{{ $user->firstname }} {{ $user->lastname }}</p>
            </div>
            <div class="form-group">
                <strong>Email: </strong><p> {{ $user->email }}</p>
            </div>
            <div class="form-group">
                <strong>Telefon: </strong><p> {{ $user->phone }} buc </p>
            </div>
            <div class="form-group">
                <strong>Adresa: </strong><p> {{ $user->address }} </p>
            </div>
            <div class="form-group">
                <strong>Localitate: </strong><p> {{ $user->locality }} </p>
            </div>
            <div class="form-group">
                <strong>Judet: </strong><p> {{ $user->county }} </p>
            </div>
            <div class="form-group">
                <strong>Cod postal: </strong><p> {{ $user->zipcode }} </p>
            </div>
            <div class="float-right m-4">
                <a class="btn btn-info m-4" href="{{ route('users') }}">Înapoi</a>
            </div>
        </div>
    </div>
</div>
<div class="p-5"></div>
@endsection
<!--- afiseaza datele pe ecran cum sunt in baza de date cu id-ul curent --->