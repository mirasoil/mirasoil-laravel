@extends('layouts.master')
@section('content')
<div id="checkout" class="container">
    <div class="py-5 text-center">
        <h2>Detalii Comanda</h2>
        <p class="lead"></p>
    </div>
    <div class="row">
        <!-- Sectiunea Cosul Meu si Adresa facturare -->
        <div class="col-md-4 order-md-2 mb-2">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Coșul meu</span>
                <span class="badge badge-primary badge-pill">2</span>
            </h4>
            <hr>
            <ul class="list-group mb-3">
                <?php $total = 0 ?>
                @if(session('cart'))
                @foreach((array) session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <img src="img/{{$details['image']}}" alt="Hidrolat de lavandă" width="40" height="40">
                        <div>
                            <h6 class="my-0">{{ $details['name'] }}</h6>
                            <small class="text-muted">Cantitate: {{ $details['quantity'] }}</small>
                        </div>
                        <span class="text-muted">{{ $details['price'] }} Lei</span>
                    </li>
                @endforeach
                @endif
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (RON)</span>
                    <strong>{{ $total }} Lei</strong>
                </li>
            </ul>
            <div class="card p-2 mb-3">
                <a href="/cart" class="btn btn-danger m-1"> &lt;&lt; Înapoi la Cosul meu</a> 
                <a href="/shop" class="btn btn-warning m-1"> &lt;&lt;&lt; Continua Cumparaturile </a>
                <a href="#" class="btn btn-success m-1"> Finalizare Comanda &gt;&gt;&gt; </a>    
            </div>
            <h4 class="d-flex text-center mb-3"><span class="text-muted">Adresa facturare</span></h4>
            <hr>
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Prenume</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Prenume" value="{{ Auth::user()->firstname }}" disabled="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nume</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Nume" value="{{ Auth::user()->lastname }}" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="exemplu@example.com" value="{{ Auth::user()->email }}" b="" disabled="">
                </div>
                <div class="form-group">
                    <label for="address">Adresa</label>
                    <textarea class="form-control" id="address" rows="3" disabled="">{{ Auth::user()->address }}</textarea>
                </div>
            </div>  
        </div>
        <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate="">
                <!-- Sectiunea Adresa de Livrare -->
                <h4 class="mb-3">Adresa livrare</h4><hr>
                <div class="card p-2 mb-3 shadow-sm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Prenume</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Prenume" value="{{ Auth::user()->firstname }}" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Nume</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Nume" value="{{ Auth::user()->lastname }}" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="tel">Număr de telefon</label>
                            <input type="email" class="form-control" id="tel" placeholder="{{ Auth::user()->phone }}" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Adresa</label>
                        <textarea class="form-control" id="address" rows="3" required="">{{ Auth::user()->address }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="state">Judet</label>
                            <select class="custom-select d-block w-100" id="state" required="">
                            <option value="">{{ Auth::user()->county }}</option>
                            <option>Bucuresti</option>
                            <option>Alba</option>
                            <option>Arad</option>
                            <option>Arges</option>
                            <option>Bacau</option>
                            <option>Bihor</option>
                            <option>Bistrita-Nasaud</option>
                            <option>Botosani</option>
                            <option>Brasov</option>
                            <option>Braila</option>
                            <option>Buzau</option>
                            <option>Caras-Severin</option>
                            <option>Calarasi</option>
                            <option>Cluj</option>
                            <option>Constanta</option>
                            <option>Covasna</option>
                            <option>Dambovita</option>
                            <option>Dolj</option>
                            <option>Galati</option>
                            <option>Giurgiu</option>
                            <option>Gorj</option>
                            <option>Harghita</option>
                            <option>Hunedoara</option>
                            <option>Ialomita</option>
                            <option>Iasi</option>
                            <option>Ilfov</option>
                            <option>Maramures</option>
                            <option>Mehedinti</option>
                            <option>Mures</option>
                            <option>Neamt</option>
                            <option>Olt</option>
                            <option>Prahova</option>
                            <option>Satu Mare</option>
                            <option>Salaj</option>
                            <option>Sibiu</option>
                            <option>Suceava</option>
                            <option>Teleorman</option>
                            <option>Timis</option>
                            <option>Tulcea</option>
                            <option>Valcea</option>
                            <option>Vaslui</option>
                            <option>Vrancea</option>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="locality">Localitate</label>
                            <input type="text" class="form-control" id="locality" placeholder="{{ Auth::user()->locality }}" required="">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Cod Postal</label>
                            <input type="text" class="form-control" id="zip" placeholder="{{ Auth::user()->zipcode }}" required="">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Adresa de livrare este aceeasi cu adresa de facturare</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Salveaza informatia pentru mai tarziu</label>
                    </div>
                </div>
            </form>
        </div>  
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit"><a href="{{ url('checkout') }}" style="text-decoration:none;color:white;">Continuati plata</a></button>
</div>
@for ($i = 0; $i < 5; $i++)
    <br>
@endfor
@endsection