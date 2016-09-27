@extends('layouts.index')

@section('content')
<div class="space-60"></div>
<div class="container">
    <div class="table-responsive">
        @if(Session::get('cart'))
        <table class="table table-condensed cart-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach(Session::get('cart') as $val)
                <tr>
                    <td class="product-image">
                        <img src="{{ asset('assets/images/men/'.$val['product']['preview']) }}" alt="" width="80">
                    </td>
                    <td class='product-name'><a href='#'>{{ $val['product']['product'] }}</a></td>
                    <td class="product-price">${{ $val['product']['price'] }}</td>
                    <td class="product-quantity">
                        <input type="number" value="1" min="1" class="fl qty-text" name="quantity">
                    </td>
                    <td class="product-total"></td>
                    <td class="product-delete"><a href="cart/del/{{ $val['product']['id'] }}" data-toggle="tooltip" data-placement="top" title="Remove this item"><i class="fa fa-times"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table><!--cart table-->
        @endif
    </div>
    <div class="space-20"></div>
    <div class="coupon-row">
        <div class="row">
            <div class="col-sm-4">
                <form class="coupon-form">
                    <input type="text" class="form-control" placeholder="Coupon code">
                    <button type="button">Apply</button>
                </form>
            </div>
            <div class="col-sm-3 col-sm-offset-5 text-right">
                <a href="#" class="btn btn-light-dark">Update Cart</a>
            </div>
        </div>
    </div>
    <!--cart row-->
    <div class="space-30"></div>
    <div class="cart-total">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
                <h2>Cart total</h2>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Subtotal</td>
                            <td class="subtotal"></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free Shipping <a href="#" class="shipping-calculate">Calculate Shipping</a></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td class="total"></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <a href="/checkout" class="btn btn-lg btn-skin">Proceed to checkout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="space-60"></div>
@endsection
