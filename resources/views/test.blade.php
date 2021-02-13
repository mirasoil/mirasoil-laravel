@extends('layouts.master')
@section('content')
<div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @foreach ($products as $product)
    <div class="product-section container">
        <div>

            <div class="product-section-images">
                <div class="product-section-thumbnail selected">
                    <img src="img/{{ $product->image }}" alt="product" height="100" width="100">
                </div>

            </div>
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            
            <div>{!! $product->stock !!}</div>
            <div class="product-section-price">{{ $product->price }}</div>

            <p>
                {!! $product->description !!}
            </p>

            <p>&nbsp;</p>

            @if ($product->quantity > 0)
                <form action="{{ route('cart.store', $product) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="button button-plain">Add to Cart</button>
                </form>
            @endif
            
        </div>
    </div> <!-- end product-section -->
    @endforeach
  

@endsection
