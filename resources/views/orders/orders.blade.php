@extends('layouts.master')
@section('extra-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="container">
<h3 class="text-center my-5">Comenzile mele</h3>
<div  class="cart-gd">
    <table class="table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Creation Date</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>
                <a href="/orderdetails/{{$order->id}}">{{ $order->id }}</a>
            </td>
            <td>
                <a href="/orders/{{$order->user_id}}">{{ $order->user_id }}</a>
            </td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->billing_total }} RON</td>
            <td>@if(!$order->shipped)
                    In curs de livrare.
                @else
                    Comanda livrata.
                @endif
            </td>
            <td>
                <form action="" method=""> 
                    <input type="submit" value="Detalii"/>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection