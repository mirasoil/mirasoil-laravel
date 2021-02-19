@extends('layouts.master')
@section('extra-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="container">
    <div class="container-fluid p-5" style="background-color:#e4f1f9;">
        <h3 class="text-center">Detalii comenzi</h3>
        <ul class="order-list">
        @foreach($orders as $order)
        <div class="list-group my-2">
    <a href="/myorder/{{$order->id}}" class="list-group-item list-group-item-action flex-column align-items-start bg-info text-white mt-5">
        <div class="d-flex w-100 justify-content-between">
        <h3 class="mb-1">Comanda nr. {{$order->id}}</h3>
        <small>
            @if(!$order->shipped)
                In curs de livrare.
            @else
                Comanda livrata.
            @endif
        </small>
        </div>
        <p class="my-1 text-white"><strong><small>Plasata pe: </small></strong> {{$order->created_at->isoFormat('D MMM YYYY')}}   <strong><small>Total:</small></strong> {{$order->billing_total}} RON</p>
        <small>Adresa:</small>  {{$order->billing_address}} {{$order->billing_locality}} - {{$order->billing_county}}
        <!-- <small>
            <a href="/myorder/{{$order->id}}"><button class="btn btn-info float-right mt-3">Detalii</button></a>
        </small> -->
    </a>
    <!-- @foreach($products as $product)
    <a href="/details/{{$product->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">{{$product->name}}</h5>
        <small class="text-muted">Cantitate: {{$product->quantity}}</small>
        </div>
        <small>Pret: {{$product->price}} RON</small>
        <small class="text-muted">Produs certificat bio.</small>
    </a>
    @endforeach -->
    <br>
    </div>
    @endforeach
        </ul>
    </div>
</div>
@endsection
