@extends('layouts.master')

@section('extra-scripts')
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
<div id="checkout" class="container justify-content-center">
            <div class="py-5 text-center">
                <h2>Detalii Comanda</h2>
                <p class="lead"></p>
            </div>
        <?php $total = 0 ?>
        @if(session('cart'))
        @foreach((array) session('cart') as $id => $details)
        <?php $total += $details['price'] * $details['quantity'] ?>
            
        @endforeach
        @endif
        <form id="payment-form" class="my-4">
            @csrf
        <input type="text" id="email" placeholder="Email address" />
            <div id="card-element"><!--Stripe.js injects the Card Element--></div>
                <button id="submitButton" class="btn btn-success my-4">
                    <span id="button-text">Pay</span>
                </button>
            <p id="card-error" role="alert"></p>
            <p class="result-message hidden">
                Payment succeeded, see the result in your
                <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
            </p>
        </form>
            <div class="card-group">
                <form class="needs-validation" novalidate="">
                    <div class="card p-5 shadow-sm">
                        <!--Formular-datele cardului -->
                        <div class="row m-0">
                            <div class="bg-white rounded-lg">
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
</form>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Plasati comanda</button>
</div>
</div>
</div>
@for ($i = 0; $i < 5; $i++)
    <br>
@endfor
@section('extra-js')
<script>
    var stripe = Stripe("pk_test_51IIzThFPoGjTfy5WZEzx4HhJ923HVamP4Ul8zA1D1Z961FxJXnnK6im7bDRA17LzsToUNLe0YySRY0Dn75M2HAjm00c0GgoLHD");
    var elements = stripe.elements();

    var clientSecret = 'pi_1IJ0LNFPoGjTfy5WMpaX3SCT_secret_ZtZJcMKUJEKXNGhYwrWjcFevU';

    var style = {
      base: {
        color: "#32325d",
        fontFamily: 'Arial, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#32325d"
        }
      },
      invalid: {
        fontFamily: 'Arial, sans-serif',
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };
    var card = elements.create("card", { style: style });
    // Stripe injects an iframe into the DOM
    card.mount("#card-element");

    card.on("change", function (event) {
      // Disable the Pay button if there are no card details in the Element
      document.querySelector("button").disabled = event.empty;
      document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
    });

    var form = document.getElementById("payment-form");
    form.addEventListener("submit-form", function(event) {
      event.preventDefault();
      // Complete payment when the submit button is clicked
      payWithCard(stripe, card, data.clientSecret);
    });

    submitButton.addEventListener('click', function(ev) {
    stripe.confirmCardPayment(clientSecret, {
        receipt_email: document.getElementById('email').value,
        payment_method: {
        card: card
      }
    })
    .then(function(result) {
      if (result.error) {
        // Show error to your customer
        showError(result.error.message);
      } else {
        // The payment succeeded!
        orderComplete(result.paymentIntent.id);
        console.log($paymentIntent);
      }
    });
    });

</script>
@endsection
@endsection
