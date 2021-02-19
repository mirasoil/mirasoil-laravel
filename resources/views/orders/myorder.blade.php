@extends('layouts.master')
@section('content')
<div class="container">
@foreach($orders as $order)
    <h3 class="text-center">Comanda nr. {{$order->id}}</h3>
@endforeach
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
    <h5 class="my-5">Detalii utilizator</h5>
      @foreach($orders as $order)
         <div class="form-group">
            <p><strong>Nume: </strong><em><strong>{{$order->billing_fname}} {{$order->billing_lname}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Email: </strong><em><strong>{{$order->billing_email}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Telefon: </strong><em><strong> 0{{$order->billing_phone}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Adresa: </strong><em><strong> {{$order->billing_address}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Judet: </strong><em><strong> {{$order->billing_county}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Localitate: </strong><em><strong> {{$order->billing_locality}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Cod postal: </strong><em><strong> {{$order->billing_zipcode}}</strong></em></p>
         </div>
         <div class="form-group">
            
            <p><strong>Total comanda: </strong><em><strong> {{$order->billing_total}}</strong></em></p>
         </div>
         <div class="form-group">
            <p><strong>Status: </strong><em><strong> {{ $order->shipped === "1" ? "Livrat" : "In curs de livrare" }}</strong></em></p>
         </div>
         @endforeach
    </div>
    <div class="col-sm-8">
    <h5 class="text-center mt-5">Produse comandate</h5>
         <table class="table mt-3">
            <thead>
               <tr>
                  <th>Denumire</th>
                  <th>Poza</th>
                  <th>Pret</th>
                  <th>Cantitate</th>
                  <th>Data</th>
               </tr>
            </thead>
            <tbody>
               @foreach($products as $product)
               <tr>
                  <td>
                     <p>{{ $product->name }}</p>
                  </td>
                  <td><img src="../img/{{$product->image}}" width="100" height="100"></td>
                  <td>
                     <p>{{$product->price}} RON</p>
                  </td>
                  <!-- @foreach($details as $detail)
                     <td><p>{{$detail->quantity}}</p></td>
                     @endforeach -->
                  <td></td>
                  <td>
                     <p>{{$order->created_at}}</p>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
    </div>
  </div>
</div>
</div>
<div class="p-5"></div>
@endsection
<!--- afiseaza datele pe ecran cum sunt in baza de date cu id-ul curent --->