@extends('layouts.master')
@section('title', 'Cos')
@section('content')
<div class="container">
    <div class="py-5 text-center">
        <h2>Cosul meu</h2>
        <p class="lead"></p>
    </div>
 @if (\Session::has('cart-success'))
<div class="alert alert-success">
<p id="message-response">{{ \Session::get('cart-success') }}</p>
</div><br />
@endif
@if (\Session::has('cart-failure'))
<div class="alert alert-danger">
<p id="message-response">{{ \Session::get('cart-failure') }}</p>
</div><br />
@endif
 <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:45%">Produse</th>
            <th style="width:10%">Pret unitar</th>
            <th style="width:8%">Cantitate</th>
            <th style="width:17%" class="text-center">Subtotal</th>
            <th style="width:20%" class="text-center">Actiune</th>
        </tr>
    </thead>
    <tbody>
    <?php $total = 0 ?>
 @if(session('cart'))
 @foreach(session('cart') as $id => $details)
 <?php $total += $details['price'] * $details['quantity'] ?>

    <tr id="product-show">
        <td data-th="Product">
        <div class="row">
            <div class="col-sm-3 hidden-xs"><img src="img/{{$details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                <div class="col-sm-9">
                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                </div>
            </div>
        </td>
        <td data-th="Price">{{ $details['price'] }} lei</td>
        <td data-th="Quantity">
            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
        </td>
        <td data-th="Subtotal" class="text-center" id="total-price">{{ $details['price'] * $details['quantity'] }} Lei</td>
        <td class="actions text-center" data-th="">
            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}" style="margin: 10px;"><i class="fa fa-refresh"></i>Modifica</button>
            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}" style="margin: 10px;"><i class="fa fa-trash-o"></i>Sterge</button>
        </td>
    </tr>
 @endforeach
 @endif
 </tbody>
 <tfoot>
    <tr class="visible-sm">
        <td colspan="3" class="hidden-xs"></td>
        <td class="text-center" style="font-size: 1.1rem;"><strong>Total: </strong> {{ $total }} Lei</td>
        <td></td>
    </tr>
    <tr>
        <td><a href="{{ url('/shop') }}" class="btn btn-warning">Contina cumparaturile</a></td>
        <td colspan="3" class="hidden-xs"></td>
        <td class="text-center"><a href="{{ url('/cart/success') }}" class="btn btn-warning text-center">Goleste cosul</a></td>
    </tr>
    <tr>
        <td colspan="4" class="hidden-xs"></td>
        <td class="text-center"><a href="{{ url('/checkout') }}" class="btn btn-warning">Plaseaza comanda</a></td>
</tfoot>
</table>
@for ($i = 0; $i < 13; $i++)
    <br>
@endfor
 <script>
 $(".update-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
        url: "{{ url('update-cart') }}",
        method: "patch",
        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity:
        ele.parents("tr").find(".quantity").val()},
        success: function (response) {
            window.location.reload(); //pagina isi face refresh
        }
    });
 });
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
</div>
@endsection