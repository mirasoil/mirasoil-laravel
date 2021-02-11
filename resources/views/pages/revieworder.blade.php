@extends('layouts.master')
@section('content')
<div id="checkout" class="container">
    <div class="py-5 text-center">
        <h2>Detalii Comandă</h2>
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
                <a href="/cart" class="btn btn-danger m-1"> &lt;&lt; Înapoi la Coșul meu</a> 
                <a href="/shop" class="btn btn-warning m-1"> &lt;&lt;&lt; Continuă Cumpărăturile </a>
                <a href="{{ url('checkout') }}" class="btn btn-success m-1"> Finalizare Comandă &gt;&gt;&gt; </a>    
            </div>
            <h4 class="d-flex text-center mb-3"><span class="text-muted">Adresă facturare</span></h4>
            <hr>
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Prenume</label>
                        <input type="text" class="form-control" id="firstName1" placeholder="Prenume" value="{{ Auth::user()->firstname }}" disabled="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nume</label>
                        <input type="text" class="form-control" id="lastName1" placeholder="Nume" value="{{ Auth::user()->lastname }}" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email1" placeholder="exemplu@example.com" value="{{ Auth::user()->email }}" b="" disabled="">
                </div>
                <div class="form-group">
                    <label for="address">Adresă</label>
                    <textarea class="form-control" id="address1" rows="3" disabled="">{{ Auth::user()->address }}</textarea>
                </div>
            </div>  
        </div>
        <div class="col-md-8 order-md-1">
            <form method="POST" action="{{ url('revieworder',['id' => $id=Auth::user()->id]) }}">
            @csrf
            @method('PATCH')
                <!-- Sectiunea Adresa de Livrare -->
                <h4 class="mb-3">Adresă livrare</h4><hr>
                <div class="card p-2 mb-3 shadow-sm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstname">Prenume</label>
                            <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="firstname" value="{{ Auth::user()->firstname }}" required="">

                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname">Nume</label>
                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="lastname" value="{{ Auth::user()->lastname }}" required="">

                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ Auth::user()->email }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="tel">Număr de telefon</label>
                            <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" required value="{{ Auth::user()->phone }}" required="">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Adresă</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3" required="">{{ Auth::user()->address }}</textarea>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="county">Județ</label>
                            <select class="custom-select d-block w-100" name="county" id="county">
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
                            <input type="text" name="locality" class="form-control @error('locality') is-invalid @enderror" id="locality" required="" value="{{ Auth::user()->locality }}">

                            @error('locality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zipcode">Cod Poștal</label>
                            <input type="zipcode" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" id="zipcode" value="{{ Auth::user()->zipcode }}" required="">

                            @error('zipcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizează') }}
                            </button>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Adresa de livrare este aceeași cu adresa de facturare</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Salvează informația pentru mai târziu</label>
                    </div>
                </div>
            </form>
        </div>  
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit"><a href="{{ url('checkout') }}" style="text-decoration:none;color:white;">Continuați plata</a></button>
</div>
@for ($i = 0; $i < 5; $i++)
    <br>
@endfor
@endsection