@extends('layouts.master')
@section('content')
<div class="container">
<h5 class="text-center my-5">Detalii comanda</h5>
@foreach($orders as $order)
<div class="form-group">
    <strong>Prenume: </strong><p> {{$order->billing_fname}} </p>
</div>
<div class="form-group">
    <strong>Nume: </strong><p> {{$order->billing_lname}} </p>
</div>
<div class="form-group">
    <strong>Email: </strong><p> {{$order->billing_email}} </p>
</div>
<div class="form-group">
    <strong>Telefon: </strong><p> {{$order->billing_phone}} </p>
</div>
<div class="form-group">
    <strong>Adresa: </strong><p> {{$order->billing_address}} </p>
</div>
<div class="form-group">
    <strong>Judet: </strong><p> {{$order->billing_county}} </p>
</div>
<div class="form-group">
    <strong>Localitate: </strong><p> {{$order->billing_locality}} </p>
</div>
<div class="form-group">
    <strong>Cod postal: </strong><p> {{$order->billing_zipcode}} </p>
</div>
<div class="form-group">
    <strong>Total comanda: </strong><p> {{$order->billing_total}} </p>
</div>
<div class="form-group">
    <strong>Status: </strong><p> {{ $order->shipped === "1" ? "Livrat" : "In curs de livrare" }} </p>
</div>
<h5 class="text-center my-5">Produse comandate</h5>
<table class="table">
        <thead>
        <tr>
            <th>Denumire</th>
            <!-- <th>Poza</th> -->
            <th>Pret</th>
            <th>Cantitate</th>
            <th>Data</th>
        </tr>
        </thead>
        <tbody>
    @foreach($products as $product)
    <tr>
            <td><p>{{ $product->name }}</p></td>
            <!-- <td><img src="../img/{{$product->image}}" width="300" height="200"></td> -->
            <td><p>{{$product->price}}</p></td>
            <!-- @foreach($details as $detail)
                <td><p>{{$detail->quantity}}</p></td>
            @endforeach -->
            <td></td>
            <td><p>{{$order->created_at}}</p></td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endforeach
</div>
<div class="p-5"></div>
@endsection
<!--- afiseaza datele pe ecran cum sunt in baza de date cu id-ul curent --->