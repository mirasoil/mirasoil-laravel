@extends('layouts.master')
@section('title')
<title>Gestionare Comenzi - Admin</title>
@endsection
@section('extra-scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="container">
<h3 class="text-center">Gestionare Comenzi</h3>
    <div class="panel panel-default" style="padding:50px">
        <div class="panel-body">
            <!---Capul de tabel care ramane mereu la fel, nu depinde de foreach--->
            <table class="table table-bordered table-stripped">
            <tr>
                <th>ID Comanda</th>
                <th>ID Utilizator</th>
                <th>Data</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actiune</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <div class="d-none">{{ ++$i }}</div>
                <td>
                    <a href="/order/{{$order->id}}">{{ $order->id }}</a>
                </td>
                <td>
                    <a href="/order/{{$order->user_id}}">{{ $order->user_id }}</a>
                </td>
                <td>{{$order->created_at->isoFormat('D MMM YYYY')}}</td>
                <td>{{ $order->billing_total }} RON</td>
                <td>@if(!$order->shipped)
                        In curs de livrare.
                    @else
                        Comanda livrata.
                    @endif
                </td>
                <td>
                <a class="btn btn-success m-2" href="{{ url('/order',$order->id) }}">Detalii</a><br>
                    <a class="btn btn-primary m-2" href="{{ url('/order/edit',$order->id) }}">Modifică</a><br>
                    {{ Form::open(['method' => 'DELETE','route' => ['order.destroy', $order->id],'style'=>'display:inline']) }}   <!--se activeaza metoda destroy din ProductController-->
                    {{ Form::submit('Șterge', ['class' => 'btn btn-danger m-2']) }} <!---metoda delete din ProductController functia destroy---->
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </table>
            <div class="float-right">{{$orders->render()}}</div><br>
        </div>
    </div>
 </div>
@endsection