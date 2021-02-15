@extends('layouts.master')
@section('title', 'Cos')
@section('content')
<div class="container">
    <div class="py-2 text-center">
        <h2>Coșul meu</h2>
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
<div class="alert">
<p id="message-response"></p>
</div><br />
 <table id="cart" class="table table-hover table-condensed mt-3">
    <thead>
        <tr>
            <th style="width:45%">Produse</th>
            <th style="width:10%">Preț unitar</th>
            <th style="width:8%">Cantitate</th>
            <th style="width:17%" class="text-center">Subtotal</th>
            <th style="width:20%" class="text-center">Acțiune</th>
        </tr>
    </thead>
    <tbody>
    <?php $total = 0 ?>
 @if(Cart::count() > 0)
 @foreach(Cart::content() as $details)
 <?php $total += $details->price * $details->qty ?>
    <tr id="product-show">
        <td data-th="Product">
        <div class="row">
            <div class="col-sm-3 hidden-xs"><img src="img/{!!$details->options->image!!}" width="100" height="100" class="img-responsive"/></div>
                <div class="col-sm-9">
                    <h4 class="nomargin">{{ $details->name }}</h4>
                </div>
            </div>
        </td>
        <td data-th="Price">{{ $details->price }} lei</td>
        <td data-th="Quantity">
            <input type="number" value="{{ $details->qty }}" class="form-control quantity" />
        </td>
        <td data-th="Subtotal" class="text-center" id="total-price">{{ $details->price * $details->qty }} Lei</td>
        <td class="actions text-center" data-th="">
            <button class="btn btn-info btn-sm update-cart" data-id="{{ $details->id }}" style="margin: 10px;"><i class="fa fa-refresh"></i> Modifică</button>
            <button class="btn btn-danger btn-sm remove-from-cart" data-token="{{ csrf_token() }}" data-id="{{ $details->rowId}}" style="margin: 10px;"><i class="fa fa-trash-o"></i>Șterge</button> 
            <!-- <form action="{{ route('shop.destroy', $details->rowId) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="cart-options btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Șterge</button>
            </form> -->
        </td>
    </tr>
 @endforeach
 @endif
 </tbody>
 <tfoot>
    <tr class="visible-sm">
        <td colspan="3" class="hidden-xs"></td>
        <td class="text-center" style="font-size: 1.1rem;"><strong>Total: </strong> <p id="total" >{{ Cart::subtotal() }} Lei</p></td>
        <td></td>
    </tr>
    <tr>
        <td><a href="{{ url('/shop') }}" class="btn btn-warning">Continuă cumpărăturile</a></td>
        <td colspan="3" class="hidden-xs"></td>
        <td class="text-center"><a href="{{ url('/cart/success') }}" class="btn btn-warning text-center">Golește coșul</a></td>
    </tr>
    <tr>
        <td colspan="4" class="hidden-xs"></td>
        <td class="text-center"><a href="{{ url('/revieworder') }}" class="btn btn-warning">Plasează comanda</a></td>
</tfoot>
</table>
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
        var id = $(this).data('id');
        if(confirm("Sunteti sigur ca doriti sa stergeti acest produs?")) {
            $.ajax({
                type: 'DELETE',
                url: "/delete-from-cart",
                // method: "DELETE",
                data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                success: function (response) {
                    $(".alert").addClass("alert-success")  //stilizare
                    $("#message-response").html("Produsul a fost sters")  //continutul mesajului
                    $("#product-show").remove(); //vreau doar sa dispara paragraful cu produsul sters, fara reload
                    //$("#div_to_refresh").load("url_of_current_page.html #div_to_refresh")
                    $("#total").replaceWith({{Cart::subtotal()}});
            }
        });
    }
 });
 </script>
</div>
@endsection