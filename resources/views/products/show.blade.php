@extends('layouts.master')
@section('content')
<div class="panel panel-default" style="padding:50px">
    <div class="panel-heading">
        View Product
    </div>
    <div class="panel-body">
        <div class="pull-right">
            <a class="btn btn-default" href="{{ route('products.index') }}">Back</a>
        </div>
        <div class="form-group">
            <img src="{{'../img/'.$product->image}}" style="width:400px; height:400px;" alt="{{$product->name}}"/> <!--- preluam din products numele --->
        </div>
        <div class="form-group">
            <strong>Name: </strong> {{ $product->name }} 
        </div>
        <div class="form-group">
            <strong>Price: </strong> {{ $product->price }} 
        </div>
        <div class="form-group">
            <strong>Stock: </strong> {{ $product->stock }} 
        </div>
        <div class="form-group">
            <strong>Image: </strong> {{ $product->image }} 
        </div>
        <div class="form-group">
            <strong>Description: </strong> {{ $product->description }} 
        </div>
        <div class="form-group">
            <strong>Properties: </strong> {{ $product->properties }}
        </div>
        <div class="form-group">
            <strong>Uses: </strong> {{ $product->uses }}
        </div>
    </div>
</div>
@endsection
<!--- afiseaza datele pe ecran cum sunt in baza de date cu id-ul curent --->