@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container">
                <div class="text-right mb-4">
                    <a href="{{url('cart/myorders')}}" class="my-order-btn">My Orders</a>
                    <a href="{{url('cart/destroy')}}">
                        <button class="clear-cart-btn">Clear Cart</button>
                    </a>
                </div>
                <table id="cartTable">
                    <tbody>
                    <tr>
                        <th width="10%">S.N.</th>
                        <th width="15%">Image</th>
                        <th width="35%">Product Name</th>
                        <th width="10%">Qty</th>
                        <th width="20%">Unit Price</th>
                        <th width="10%"></th>
                    </tr>
                    <?php $i = 0;?>
                    @foreach($cartitems as $cartitem)
                        <?php $i++; ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                            <a href="{{url('product/details', $cartitem->id)}}">
                                <img class="cart-img" src="{{ asset('uploads/product/'.$cartitem->options['image']) }}">
                            </a>
                        </td>
                        <td>{{$cartitem->name}}</td>
                        <td>{{$cartitem->qty}}</td>
                        <td>Rs.{{$cartitem->price}}</td>
                        <td>
                            <a href="{{url('cart/remove', $cartitem->rowId)}}">
                                <button>
                                    <i class="fa fa-times-circle"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total</th>
                        <th></th>
                        <th>Rs.{{Cart::subtotal()}}</th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
                <div class="text-right my-4">
                    <a href="{{url('cart/checkout')}}" class="proceed-btn">Proceed to Checkout</a>
                    <a href="{{ URL::to('/') }}" class="continue-shop-btn">Continue Shopping</a>
                </div>
            </div>
        </section>
 
    </div>
@endsection
