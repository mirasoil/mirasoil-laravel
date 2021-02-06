@extends('layouts.master')
@section('title', 'Cos')
@section('content')
 <div id="message-response"> <!--- mesaje de succes pt insert delete ---->
    
 </div>
 
 <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
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
        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
        <td class="actions" data-th="">
            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i>Update</button>
            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>Delete</button>
        </td>
    </tr>
 @endforeach
 @endif
 </tbody>
 <tfoot>
    <tr class="visible-xs">
        <td class="text-center"><strong>Total {{ $total }}</strong></td>
        <td class="text-center"><a href="{{ url('/cart/success') }}" class="btn btn-warning"><strong>Empty Cart</strong></a></td>
    </tr>
    <tr>
        <td><a href="{{ url('/shop') }}" class="btn btn-warning">Continue shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
    </tr>
</tfoot>
</table>
    <a href="{{ url('/confirm') }}" class="btn btn-warning" style="float:right;">Confirm order</a>
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
        if(confirm("Are you sure?")) {
            $.ajax({
                url: "{{ url('remove-from-cart') }}",
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    $("#message-response").addClass("alert alert-success")  //stilizare
                    $("#message-response").html("Product deleted succesfully")  //continutul mesajului
                    $("#product-show").remove(); //vreau doar sa dispara paragraful cu produsul sters, fara reload
            }
        });
    }
 });
 </script>
@endsection