@extends('layouts.master')
@section('content')
<div class="panel panel-default" style="padding:50px">
    <div class="panel-heading"> Modify product information</div>
        <div class="panel-body">
            <!---exista inregistrari in tabelul task --->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <!--populez campurile formularului cu datele aferente din tabela tbl_product pe care le pot modifica-->
            {!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id]]) !!}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$product->name }}"> 
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" name="stock" class="form-control" value="{{$product->stock }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" value="{{$product->image }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea> 
        </div>
        <div class="form-group">
            <label for="properties">Properties</label>
            <textarea name="properties" class="form-control" rows="3">{{ $product->properties }}</textarea> 
        </div>
        <div class="form-group">
            <label for="uses">Uses</label>
            <textarea name="uses" class="form-control" rows="3">{{ $product->uses }}</textarea> 
        </div>
        <div class="form-group">
                <input type="submit" value="Save" class="btn btn-info">
                <a href="{{route('products.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
<!---populam campurile pe baza routelor
prin product update cand da click pe modificare se transmite id-ul in controller care va insera in baza de date datele
la modificare metoda e PATCH ca se suprapun 2 metode din controller--->