@extends('layouts.master')
@section('content')
@if ($message = Session::get('success'))
 <div class="alert alert-success"> <!--- mesaje de succes pt insert delete ---->
    <p>{{ $message }}</p>
 </div>
 @endif
 <div class="panel panel-default" style="padding:50px">
    <div class="panel-heading">
        Products
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div class="pull-right">
                <!---Butonul pentru adaugarea unui produs nou--->
                <a href="/products/create" class="btn btn-info">Add new product</a>
            </div>
        </div>
        <!---Capul de tabel care ramane mereu la fel, nu depinde de foreach--->
        <table class="table table-bordered table-stripped">
        <tr>
            <th width="50">Id</th>
            <th width="200">Name</th>
            <th width="100">Quantity</th>
            <th width="100">Price</th>
            <th width="100">Stock</th>
            <th>Image</th>
            <th width="250">Description</th>
            <th width="250">Properties</th>
            <th width="250">Uses</th>
            <th width="100">Action</th>
        </tr>
        @if (count($products) > 0) <!---Numara cate produse sunt afisate pe ecran. Daca numarul e pozitiv, adica daca exista produse atunci le afisam. Cine e $products ? ---->
            <!---Afisarea propriu zisa a produselor--->
            @foreach ($products as $key => $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><a href="{{ route('products.show',$product->id) }}" style="text-decoration: none;">{{ $product->name }}</a></td>
                <td><p>{{ $product->quantity }}</p></td>
                <td><p>{{ $product->price }}</p></td>
                <td><p>{{ $product->stock }}</p></td>
                <td><a href="{{ route('products.show',$product->id) }}"><img src="img/{{$product->image}}" style="width:350px; height:250px;" alt="{{ $product->name }}"/></a></td>
                <td><p>{{Str::limit($product->description, 200)}}</p></td>
                <td><p>{{Str::limit($product->properties, 200)}}</p></td>
                <td>{{Str::limit($product->uses, 200)}}</td> <!---afiseaza doar primele 200 de caractere din descriere --->
                <td>
                    <a class="btn btn-success" href="{{ route('products.show',$product->id) }}">See</a><br>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Modify</a><br>
                    {{ Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) }}   <!--se activeaza metoda destroy din ProductController-->
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }} <!---metoda delete din ProductController functia destroy---->
                    {{ Form::close() }}
                </td>
            </tr>
             @endforeach
        @else
            <tr>
                <td colspan="4">There are no products!</td>
            </tr>
        @endif
        </table>
        <!-- Introduce nr pagina -->
        {{$products->render()}} <!---rendeaza ? need more info---->
    </div>
 </div>
@endsection