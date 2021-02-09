@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-12 main-section">
        <div class="dropdown" id="dropdown-cart">
            <button type="button" class="btn btn-info" data-toggle="dropdown" id="cart-button">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cos<span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </button>
        	<div class="dropdown-menu" id="dropdown-cart-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </div>
 					<?php $total = 0 ?>
 					@foreach((array) session('cart') as $id => $details)
 						<?php $total += $details['price'] * $details['quantity'] ?>
 					@endforeach
        				<div class="col-lg-6 col-sm-6 col-6 total-section text-right">
            				<p>Total: <span class="text-info">{{ $total }} lei</span></p>
        				</div>
    				</div>
 					@if(session('cart'))
 						@foreach(session('cart') as $id => $details)
       						<div class="row cart-detail">
            					<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                					<img src="img/{{$details['image'] }}" width="100" height="100"/>
            					</div>
        						<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
        							<p>{{ $details['name'] }}</p>
									<p class="text-muted small">Cantitate: <span class="price text-info">{{ $details['quantity'] }} buc</span></p>
        							<p class="text-muted small">Pret/buc: <span class="price text-info">{{ $details['price'] }} RON</span></p>
        						</div>
        					</div>
 						@endforeach
 					@endif
 					<div class="row">
            			<div class="col-lg-12 col-sm-12 col-12 text-center checkout">
            				<a href="{{ url('cart') }}" class="btn btn-primary btn-block">Vezi cos</a>
        				</div>
    				</div>
    			</div>
			</div>
		</div>	
	</div>
	<div class="card-deck justify-content-center">	
		@foreach($shop as $product)
		<div class="ml-5 text-center shadow p-4 bg-white rounded" style="width: 23rem;">
			<img class="card-img-top" src="img/{{$product->image}}" height="320">
			<div class="card-body text-center">
				<h4>{{ $product->name }}</h4>
				<p>{{Str::limit($product->description, 50)}}</p>
				<p><strong>Pret: </strong> {{ $product->price }} RON</p>
				<p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Adauga in cos</a> </p>
			</div>
		</div>
		@endforeach	
	</div>
@endsection