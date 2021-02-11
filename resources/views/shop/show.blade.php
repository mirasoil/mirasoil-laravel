@extends('layouts.master')
@section('content')
<div class="container">
<div id="ulei">
            <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content text-center pt-4">
                          <div class="tab-pane active" id="pic-1"><img src="{{'../img/'.$shop->image}}" alt="{{$shop->name}}" height="350"></div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-5 text-center">
                        <h3 class="product-title">{{$shop->name}}</h3>
                        <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
                    <hr>
                    <div class="product-price"><strong>Preț:</strong> {{$shop->price}} RON</div>
                    <div class="product-stock">În stoc</div>
                    <hr>
                    <div class="btn-group cart">
                        <a href="{{ url('add-to-cart/'.$shop->id) }}" class="btn btn-success btn-block text-center" type="button">
                            Adaugă în coș 
                        </a>
                    </div>
                    <div class="btn-group wishlist">
                        <a href="{{ url('add-to-cart/'.$shop->id) }}" class="btn btn-warning btn-block text-center" type="button">
                            Adaugă la favorite 
                        </a>
                    </div>
                </div>
                <div class="container-fluid">       
            <div class="col-md-12 product-info p-4">
                <nav>
                    <div id="myTab" class="nav nav-tabs nav_tabs">
                        <a class="nav-item nav-link active" href="#service-one" data-toggle="tab">DESCRIERE</a>
                        <a class="nav-item nav-link" href="#service-two" data-toggle="tab">PROPRIETĂȚI</a>
                        <a class="nav-item nav-link" href="#service-three" data-toggle="tab">UTILIZĂRI</a>
                    </div>  
                </nav>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade show active" id="service-one">
                        <section class="container product-info">
                        <p class="text-justify">{!!$shop->description!!}</p>
                         </section>               
                    </div>
                    <div class="tab-pane fade" id="service-two">
                        <section class="container product-info">
                        <p class="text-justify">{!!$shop->properties!!}</p>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="service-three">
                        <p class="text-justify">{!!$shop->uses!!}</p>   
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
<!--- afiseaza datele pe ecran cum sunt in baza de date cu id-ul curent --->