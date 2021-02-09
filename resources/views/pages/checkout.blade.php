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
    </div><h4 class="d-flex text-center mb-3">
    <span class="text-muted">Adresa facturare</span>
    </h4>
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
                    <!-- Sectiunea Adresa de Livrare -->
                    <h4 class="mb-3">Detalii plata</h4><hr>
                    <div class="card p-2 mb-3 shadow-sm">
                        <!--Formular-datele cardului -->
                        <div class="row m-0">
                            <div class="bg-white rounded-lg  ">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                                <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                    Credit Card
                                </a>
                                </li>
                                <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                    <i class="fab fa-paypal" aria-hidden="true"></i>
                                    Paypal
                                </a>
                                </li>
                                <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                    <i class="fa fa-university" aria-hidden="true"></i>
                                    Transfer Bancar
                                </a>
                                </li>
                                <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-ramburs" class="nav-link rounded-pill">
                                    <i class="fas fa-money-bill-alt" aria-hidden="true"></i>
                                    Ramburs
                                </a>
                                </li>
                            </ul>
                            <!-- Credit card form content -->
                            <div class="tab-content">

                            <!-- credit card info-->
                            <div id="nav-tab-card" class="tab-pane fade show active">
                                <p class="alert alert-success">Continuati plata</p>
                                
                                <div class="form-group">
                                    <label for="username">Numele Detinatorului</label>
                                    <input type="text" name="username" placeholder="Popescu Alin" required="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cardNumber">Numarul cardului</label>
                                    <div class="input-group">
                                    <input type="text" name="cardNumber" placeholder="Numar card" class="form-control" required="">
                                    <div class="input-group-append">
                                        <span class="input-group-text text-muted">
                                            <i class="fab fa-cc-visa" aria-hidden="true"></i>
                                            <i class="fab fa-cc-mastercard" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Data expirarii</span></label>
                                        <div class="input-group">
                                        <input type="number" placeholder="Luna" name="" class="form-control" required="">
                                        <input type="number" placeholder="Anul" name="" class="form-control" required="">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </label>
                                        <input type="text" required="" class="form-control">
                                    </div>
                                    </div>



                    </div>
                    <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm  </button>
                    
                </div>

                <!-- Paypal info -->
                <div id="nav-tab-paypal" class="tab-pane fade">
                    <p>Paypal este cea mai usoara modalitate de a plati online</p>
                    <p>
                    <button type="button" class="btn btn-primary rounded-pill"><i class="fab fa-cc-paypal" aria-hidden="true"></i> Intra in contul tau PayPal</button>
                    </p>
                </div>

                <!-- bank transfer info -->
                <div id="nav-tab-bank" class="tab-pane fade">
                    <h6>Detalii transfer bancar</h6>
                    <dl>
                        <dt>Banca</dt>
                        <dd> TRANSILVANIA</dd>
                    </dl>
                    <dl>
                        <dt>Numar cont</dt>
                        <dd>7775877975</dd>
                    </dl>
                    <dl>
                        <dt>IBAN</dt>
                        <dd>ROxxBTRLRONCRTxxxxxxxxxx</dd>
                    </dl>
                    <p class="text-muted">Pentru aceasta optiune se percepe un comision fix de 5 lei pentru fiecare transfer.</p>
                </div>
                <div id="nav-tab-ramburs" class="tab-pane fade">
                    <input type="checkbox" id="ramburs" name="ramburs" value="ramburs">
                        <label for="vehicle1"> Plata se va efectua ramburs la livrare</label><br>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Plasati comanda</button>
</div>
</div>
</div>
@for ($i = 0; $i < 5; $i++)
    <br>
@endfor
<script>
 $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Sunteti sigur ca doriti sa stergeti acest produs?")) {
            $.ajax({
                url: "{{ url('remove-from-cart') }}",
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    // $("#message-response").addClass("alert alert-success")  //stilizare
                    $("#message-response").html("Produsul a fost sters")  //continutul mesajului
                    $("#product-show").remove(); //vreau doar sa dispara paragraful cu produsul sters, fara reload
            }
        });
    }
 });
</script>
@endsection