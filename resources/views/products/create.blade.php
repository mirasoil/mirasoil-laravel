@extends('layouts.master')
@section('content')
<div class="panel panel-default" style="padding:100px">
    <div class="panel-heading">Add a new product</div>
        <div class="panel-body">
            @if (count($errors) > 0)
            <!---In cazul in care exista erori le vom afisa--->
            <div class="alert alert-danger">
                <strong>Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!---Vom trimite prin post toate datele introduse in formular, apeland functia store din ProductController --->
            {{ Form::open(array('route' => 'products.store','method'=>'POST')) }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name') }}">
                </div>
                <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{old('quantity') }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" value="{{old('price') }}">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control" value="{{old('stock') }}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="properties">Properties</label>
                    <input type="text" name="properties" class="form-control" value="{{old('properties') }}">
                </div>
                <div class="form-group">
                    <label for="uses">Uses</label>
                    <input type="text" name="uses" class="form-control" value="{{old('uses') }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Product" class="btn btn-info">
                    <a href="{{ route('products.index') }}" class="btn btndefault">Cancel</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection