@extends('layouts.master')
@section('content')
<div id="checkout" class="container">
    <div class="py-5 text-center">
        <h2>Detalii Comandă</h2>
        <p class="lead"></p>
    </div>

<div class="alert">
<p id="message-response"></p>
</div><br />

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
                @if(Cart::count() >0 )
                @foreach(Cart::content() as $details)
                <?php $total += $details->price * $details->qty ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <img src="img/{!!$details->options->image!!}" alt="Hidrolat de lavandă" width="40" height="40">
                        <div>
                            <h6 class="my-0">{{ $details->name }}</h6>
                            <small class="text-muted">Cantitate: {{ $details->qty }}</small>
                        </div>
                        <span class="text-muted">{{ $details->price }} Lei</span>
                    </li>
                @endforeach
                @endif
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (RON)</span>
                    <strong>{{ Cart::subtotal() }} Lei</strong>
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
            <form method="POST" action="{{ route('orders.store') }}" id="update-data-form">
            @csrf
           
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
                            <option value="{{ Auth::user()->county }}">{{ Auth::user()->county }}</option>
                            <option value="Bucuresti">Bucuresti</option>
                            <option value="Alba">Alba</option>
                            <option value="Arad">Arad</option>
                            <option value="Arges">Arges</option>
                            <option value="Bacau">Bacau</option>
                            <option value="Bihor">Bihor</option>
                            <option value="Bistrita-Nasaud">Bistrita-Nasaud</option>
                            <option value="Botosani">Botosani</option>
                            <option value="Brasov">Brasov</option>
                            <option value="Braila">Braila</option>
                            <option value="Buzau">Buzau</option>
                            <option value="Caras-Severin">Caras-Severin</option>
                            <option value="Calarasi">Calarasi</option>
                            <option value="Cluj">Cluj</option>
                            <option value="Constanta">Constanta</option>
                            <option value="Covasna">Covasna</option>
                            <option value="Dambovita">Dambovita</option>
                            <option value="Dolj">Dolj</option>
                            <option value="Galati">Galati</option>
                            <option value="Giurgiu">Giurgiu</option>
                            <option value="Gorj">Gorj</option>
                            <option value="Harghita">Harghita</option>
                            <option value="Hunedoara">Hunedoara</option>
                            <option value="Ialomita">Ialomita</option>
                            <option value="Iasi">Iasi</option>
                            <option value="Ilfov">Ilfov</option>
                            <option value="Maramures">Maramures</option>
                            <option value="Mehedinti">Mehedinti</option>
                            <option value="Mures">Mures</option>
                            <option value="Neamt">Neamt</option>
                            <option value="Olt">Olt</option>
                            <option value="Prahova">Prahova</option>
                            <option value="Satu Mare">Satu Mare</option>
                            <option value="Salaj">Salaj</option>
                            <option value="Sibiu">Sibiu</option>
                            <option value="Suceava">Suceava</option>
                            <option value="Teleorman">Teleorman</option>
                            <option value="Timis">Timis</option>
                            <option value="Tulcea">Tulcea</option>
                            <option value="Valcea">Valcea</option>
                            <option value="Vaslui">Vaslui</option>
                            <option value="Vrancea">Vrancea</option>
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
                            <button type="submit" class="btn btn-primary" id="save-data" data-id="{{ Auth::user()->id }}">
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
                <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
            </form>
        </div>  
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit"><a href="{{ url('checkout') }}" style="text-decoration:none;color:white;">Continuați plata</a></button>
</div>
@for ($i = 0; $i < 5; $i++)
    <br>
@endfor
<script>
$("#save-data").click(function(event){
      event.preventDefault();

      let firstname = $("input[name=firstname]").val();
      let lastname = $("input[name=lastname]").val();
      let email = $("input[name=email]").val();
      let phone = $("input[name=phone]").val();
      let address = $("#address").val();
      let county = $("#county").val();
      let locality = $("input[name=locality]").val();
      let zipcode = $("input[name=zipcode]").val();

      var id = $(this).data('id');

      $.ajax({
        url: "revieworder/"+id,
        type:"PATCH",
        data:{
            "_token": "{{ csrf_token() }}",
            id:id,
          firstname:firstname,
          lastname:lastname,
          email:email,
          phone:phone,
          address:address,
          county:county,
          locality:locality,
          zipcode:zipcode,
        },
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(response){
            $(".alert").addClass("alert-success")  //stilizare
            $("#message-response").html("Informațiile au fost actualizate")  //continutul mesajului  
            $("#update-data-form")[0].reset();         
        },
       });
  });
</script>
@endsection