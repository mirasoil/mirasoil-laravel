@extends('layouts.master')
@section('content')
<div class="panel panel-default" style="padding:50px">
    <div class="panel-heading">
        View products
    </div>
    <div class="panel-body">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('shop.index') }}">Back</a>
        </div>
        <div class="form-group">
            <img src="{{'../img/'.$shop->image}}" style="width:400px; height:400px;" alt="{{$shop->name}}"/> <!--- preluam din shops numele --->
        </div>
        <div class="form-group">
            <strong>Name: </strong> {{ $shop->name }} 
        </div>
        <div class="form-group">
            <strong>Price: </strong> {{ $shop->price }} 
        </div>
        <div class="form-group">
            <strong>Stock: </strong> {{ $shop->stock }} 
        </div>
        <div class="form-group">
            <strong>Image: </strong> {{ $shop->image }} 
        </div>
        <div class="form-group">
            <strong>Description: </strong> {{ $shop->description }} 
        </div>
        <div class="form-group">
            <strong>Properties: </strong> {{ $shop->properties }}
        </div>
        <div class="form-group">
            <strong>Uses: </strong> {{ $shop->uses }}
        </div>
    </div>
</div>
@endsection
<!--- afiseaza datele pe ecran cum sunt in baza de date cu id-ul curent --->